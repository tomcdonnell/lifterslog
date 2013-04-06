<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

require_once dirname(__FILE__) . '/php/database_connection.php';
require_once dirname(__FILE__) . '/lib/tom/php/utils/UtilsError.php';
require_once dirname(__FILE__) . '/lib/tom/php/utils/UtilsValidator.php';

if (count($_POST) == 0)
{
   header('Location: index.php');
   die;
}

UtilsError::initErrorAndExceptionHandler('log.txt');

var_dump(array_keys($_POST));

switch (getSubmissionTypeFromPostArray())
{
 case 'log-lifts': dealWithCaseLogLifts($pdoEx); break;
 case 'view-log' : dealWithCaseViewLog($pdoEx) ; break;
 default: throw new Exception('Impossible case.');
}

// Functions. //////////////////////////////////////////////////////////////////////////////////////

/*
 *
 */
function getSubmissionTypeFromPostArray()
{
   $submissionTypes = array('log-lifts', 'view-log');

   foreach ($submissionTypes as $submissionType)
   {
      if (array_key_exists($submissionType, $_POST))
      {
         return $submissionType;
      }
   }

   throw new Exception('Not valid submission.  $_POST array: ' . print_r($_POST, true));
}

/*
 *
 */
function dealWithCaseLogLifts(PdoExtended $pdoEx)
{
   UtilsValidator::checkArray
   (
      $_POST, array
      (
         'username'  => 'string',
         'password'  => 'string',
         'log-lifts' => 'string'
      )
   );
}

/*
 *
 */
function dealWithCaseViewLog(PdoExtended $pdoEx)
{
   UtilsValidator::checkArray
   (
      $_POST, array
      (
         'username' => 'string',
         'view-log' => 'string'
      )
   );

   
}
?>
