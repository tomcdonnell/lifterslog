<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

// Includes. ///////////////////////////////////////////////////////////////////////////////////////

require_once dirname(__FILE__) . '/../lib/tom/php/utils/UtilsValidator.php';
require_once dirname(__FILE__) . '/database_connection.php';
require_once dirname(__FILE__) . '/utils/ConfigUtil.php';

// Globally executed code. /////////////////////////////////////////////////////////////////////////

try
{
   $msg = json_decode(file_get_contents('php://input'), true);

   UtilsValidator::checkArray($msg, array('action' => 'string', 'params' => 'array'));
   extract($msg);

   switch ($action)
   {
    case 'createUser':
      $returnArray = createUser($pdoEx, $params);
      break;

    case 'loginUser':
      $returnArray = loginUser($pdoEx, $params);
      break;

    case 'getLogLiftsSelectorOptionsInfo':
      $returnArray = getLogLiftsSelectorOptionsInfo($pdoEx, $params);
      break;

    default:
      throw new Exception("Unknown action '$action'.");
   }

   echo json_encode(array('action' => $action, 'success' => true, 'reply' => $returnArray));
}
catch (Exception $e)
{
   echo json_encode(array('action' => $action, 'success' => false, 'reply' => $e->getMessage()));
}

// Functions. //////////////////////////////////////////////////////////////////////////////////////

/*
 *
 */
function createUser(PdoExtended $pdoEx, Array $params)
{
   $params = assertCreateUserParamsAreValidAndReturnTrimmedVersions($pdoEx, $params);

   $pdoStatement = $pdoEx->prepare
   (
      'INSERT INTO `user` SET
       username=?,
       password_md5_hash=MD5(?),
       emailAddress=?'
   );

   $pdoEx->query('START TRANSACTION');

   try
   {
      $success = $pdoStatement->execute
      (
         array($params['username'], $params['password'], $params['emailAddress'])
      );

      $pdoEx->query('COMMIT');
   }
   catch (Exception $e)
   {
      $pdoEx->query('ROLLBACK');
      throw new Exception('Database error.  Transaction rolled back.  ' . $e->getMessage());
   }

   if (!$success)
   {
      throw new Exception('The user could not be created because of a database error.');
   }

   return $params['username'];
}

/*
 *
 */
function loginUser(PdoExtended $pdoEx, Array $params)
{
   UtilsValidator::checkArray
   (
      $params, array
      (
         'password' => 'string',
         'username' => 'string'
      )
   );
   extract($params);

   // NOTE: Do not trim password.  Use password exactly as entered.
   $username = trim($username);

   if (!$pdoEx->rowExistsInTable('user', array('username' => $username)))
   {
      return array('username' => $username, 'loginResult' => 'usernameNotFound');
   }

   $pdoStatement = $pdoEx->prepare
   (
      'SELECT EXISTS(
          SELECT *
          FROM `user`
          WHERE username=?
          AND password_md5_hash=MD5(?)
       ) AS `exists`'
   );

   $pdoStatement->execute(array($username, $password));

   $rows  = $pdoStatement->fetchAll();
   $nRows = count($rows);

   if (count($rows) != 1)
   {
      throw new Exception("Unexpected number of rows ($nRows) returned by SQL query.");
   }

   switch ($rows[0]['exists'])
   {
    case '1': return array('username' => $username, 'loginResult' => 'loginSuccessful'  );
    case '0': return array('username' => $username, 'loginResult' => 'passwordIncorrect');
    default : throw new Exception('Unexpected result returned by SQL query.');
   }
}

/*
 *
 */
function assertCreateUserParamsAreValidAndReturnTrimmedVersions(PdoExtended $pdoEx, Array $params)
{
   UtilsValidator::checkArray
   (
      $params, array
      (
         'username'     => 'string',
         'password'     => 'string',
         'emailAddress' => 'string'
      )
   );

   // NOTE: Do not trim password.  Save password exactly as entered.
   $params['username'    ] = trim($params['username'    ]);
   $params['emailAddress'] = trim($params['emailAddress']);

   extract($params);

   if ($pdoEx->rowExistsInTable('user', array('username' => $username)))
   {
      throw new Exception
      (
         "A user named '$username' already exists.  Please choose a different username."
      );
   }

   if (strlen($username) < ConfigUtil::N_CHARS_MINIMUM_USERNAME_LENGTH)
   {
      throw new Exception
      (
         'Please choose a username at least ' . ConfigUtil::N_CHARS_MINIMUM_USERNAME_LENGTH .
         " characters long.  '$username' is too short."
      );
   }

   if (strlen($password) < ConfigUtil::N_CHARS_MINIMUM_PASSWORD_LENGTH)
   {
      throw new Exception
      (
         'Please choose a password at least ' . ConfigUtil::N_CHARS_MINIMUM_PASSWORD_LENGTH .
         ' characters long.'
      );
   }

   if (!UtilsValidator::checkEmailAddress($emailAddress))
   {
      $msg = 'Please enter a valid email address.';

      if (strlen($emailAddress) > 0)
      {
         $msg .= "  '$emailAddress' is invalid.";
      }

      throw new Exception($msg);
   }

   return $params;
}

/*
 *
 */
function getLogLiftsSelectorOptionsInfo($pdoEx, $params)
{
   $exerciseNameById = $pdoEx->selectIndexedColumn
   (
      'SELECT id, nameLong
       FROM exercise
       ORDER BY nameLong ASC'
   );

   return array
   (
      'exercise' => $exerciseNameById
   );
}
?>
