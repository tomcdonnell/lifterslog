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
   UtilsValidator::checkArray($_POST, array('action' => 'string', 'params' => 'array'));
   extract($_POST);

   switch ($action)
   {
    case 'createUser':
      assertCreateUserParamsAreValid($pdoEx, $params);
      $returnArray = createUser($pdoEx, $params);
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
function assertCreateUserParamsAreValid(PdoExtended $pdoEx, Array $params)
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
         ' characters long.'
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
      throw new Exception("Please enter a valid email address.  '$emailAddress' is invalid.");
   }
}

/*
 *
 */
function createUser(PdoExtended $pdoEx, Array $params)
{
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
?>
