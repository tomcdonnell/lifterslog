<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

require_once dirname(__FILE__) . '/../../lib/tom/php/utils/UtilsHtml.php';

/*
 *
 */
class HtmlUtil
{
   /*
    *
    */
   public static function echoHtmlForHeaderAndReturnIndent($pageName)
   {
      echo "<!DOCTYPE html>\n";
      echo "<html>\n";
      echo " <head>\n";
      echo "  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>\n";
      echo "  <title>Lifter's Log</title>\n";

      self::_echoHtmlScriptAndLinkTagsForJsAndCssFiles($pageName);

      echo " </head>\n";
      echo " <body>\n";
      echo "  <div id='page-wrapper-div'>\n";
      echo "   <div id='header-div'>\n";
      echo "    <h1>Lifter's Log</h1>\n";
      echo "   </div>\n";
      echo "   <div id='content-div'>\n";

      return '    ';
   }

   /*
    *
    */
   public static function echoHtmlForFooter()
   {
      echo "   </div>\n";
      echo "  </div>\n";
      echo " </body>\n";
      echo "</html>\n";
   }

   /*
    *
    */
   public static function echoHtmlForSignupSection($indent)
   {
      $i = &$indent; // Abbreviation.

      echo "$i<p>\n";
      echo "$i <label for='choose-username-input'>\n";
      echo "$i  Choose a username:<br/>\n";
      echo "$i  <span class='tiny-text'>(minimum length two characters)</span>\n";
      echo "$i </label>\n";
      echo "$i <br/>\n";
      echo "$i <input type='text' class='text-input' id='choose-username-input'/>";
      echo "$i</p>\n";
      echo "$i<p>\n";
      echo "$i <label for='choose-password-input'>\n";
      echo "$i  Choose a password:<br/>\n";
      echo "$i  <span class='tiny-text'>(minimum length five characters)</span>\n";
      echo "$i </label>\n";
      echo "$i <br/>\n";
      echo "$i <input type='password' class='text-input' id='choose-password-input'/>\n";
      echo "$i</p>\n";
      echo "$i<p>\n";
      echo "$i <label for='email-address-input'>\n";
      echo "$i  Email address:<br/>\n";
      echo "$i  <span class='tiny-text'>(to be used only for password reminders)</span>\n";
      echo "$i </label>\n";
      echo "$i <br/>\n";
      echo "$i <input type='text' class='text-input' id='email-address-input'/>";
      echo "$i</p>\n";
      echo "$i<p class='submit'>\n";
      echo "$i <input type='button' id='submit-sign-up' class='submit-input' value='Submit'/>\n";
      echo "$i</p>\n";
   }

   /*
    *
    */
   public static function echoHtmlForLogLiftsSection($indent)
   {
      $i = &$indent; // Abbreviation.

      echo "$i<p class='tiny-text'>In order to log lifts you must first log in.";
      echo    " This is to prevent others from modifying your log.</p>\n";
      echo "$i<p class='tiny-text'>If you do not have a username and password,";
      echo    " get them first by";
      echo    " <a id='log-lifts-signing-up-anchor' href=''>signing up</a>.</p>\n";
      echo "$i<p class='heading-p'>Log In To Log Lifts</p>\n";
      echo "$i<p>\n";
      echo "$i <label class='small-text' for='username-input'>Username:</label>\n";
      echo "$i <input type='text' class='text-input' id='username-input' name='username'/>\n";
      echo "$i</p>\n";
      echo "$i<p>\n";
      echo "$i <label class='small-text' for='password-input'>Password:</label>\n";
      echo "$i <input type='password' class='text-input' id='password-input' name='password'/>\n";
      echo "$i</p>\n";
      echo "$i<p class='submit'>\n";
      echo "$i <input type='button' id='submit-log-lifts-login' class='submit-input'";
      echo    " value='Submit'/>\n";
      echo "$i</p>\n";
   }

   /*
    *
    */
   public static function echoHtmlForViewLogForm($indent)
   {
      $i = &$indent; // Abbreviation.

      echo "$i<form method='post' action='view_log.php'>\n";
      echo "$i <p>\n";
      echo "$i  <label for='username-select'>\n";
      echo "$i   View whose lifting log?<br/>\n";
      echo "$i   <span class='tiny-text'>";
      echo       "(<a href='' id='choose-random-public-log-anchor'>";
      echo       "choose a random user whose log is public</a>)";
      echo      "</span>\n";
      echo "$i  </label>\n";
      echo "$i  <br/>\n";
      echo "$i  <input type='text' class='text-input' id='view-log-username-input'";
      echo     " name='username'/>\n";
      echo "$i </p>\n";
      echo "$i <p class='submit'>\n";
      echo "$i  <input type='submit' class='submit-input' value='Submit'/>\n";
      echo "$i </p>\n";
      echo "$i</form>\n";
   }

   /*
    *
    */
   public static function echoHtmlForLearnMoreSection($indent)
   {
      $i = &$indent; // Abbreviation.

      echo "$i<p class='small-text'>\n";
      echo "$i Lifter's Log is a very simple training log and analysis tool designed for";
      echo   " weightlifters.\n";
      echo "$i</p>\n";
      echo "$i<p class='small-text'>\n";
      echo "$i It is designed to be used during a workout, either on a phone, tablet, laptop, or";
      echo   " desktop computer.\n";
      echo "$i</p>\n";
      echo "$i<p class='small-text'>\n";
      echo "$i Full logs may be downloaded at any time in CSV format.\n";
      echo "$i</p>\n";
      echo "$i<p class='small-text'>\n";
      echo "$i Click the 'View Log' button on the left and choose a public log to see what may\n";
      echo "$i be logged and what charting and analysis options are available.\n";
      echo "$i</p>\n";
      echo "$i<p class='small-text'>\n";
      echo "$i Site creator: <a href='http://tomcdonnell.net'>Tom McDonnell</a> (username TMac)\n";
      echo "$i</p>\n";
   }

   // Private functions. ////////////////////////////////////////////////////////////////////////

   /*
    *
    */
   private static function _echoHtmlScriptAndLinkTagsForJsAndCssFiles($pageName)
   {
      $cssByPageName = array
      (
         'common'   => array('lib/tom/css/general_styles.css', 'css/common.css.php'   ),
         'home'     => array('css/home.css.php'     ),
         'logLifts' => array('css/log_lifts.css.php'),
         'viewLog'  => array('css/view_log.css.php' )
      );

      $jsByPageName = array
      (
         'common' => array
         (
            // Order important.
            'lib/tom/js/contrib/jquery/1.7/jquery_minified.js',

            // Order unimportant.
            'lib/tom/js/utils/utils.js'      ,
            'lib/tom/js/utils/utilsAjax.js'  ,
            'lib/tom/js/utils/utilsObject.js',
            'lib/tom/js/utils/utilsValidator.js'
         ),
         'home' => array
         (
            'js/LiftersLogHomePage.js',
            'js/main.js'
         ),
         'logLifts' => array(),
         'viewLog'  => array()
      );

      if (!array_key_exists($pageName, $cssByPageName))
      {
         throw new Exception("No css files specified for page name '$pageName'.");
      }

      if (!array_key_exists($pageName, $jsByPageName))
      {
         throw new Exception("No js files specified for page name '$pageName'.");
      }

      UtilsHtml::echoHtmlScriptAndLinkTagsForJsAndCssFiles
      (
         array_merge($cssByPageName['common'], $cssByPageName[$pageName]),
         array_merge($jsByPageName['common'] , $jsByPageName[$pageName] )
      );
   }
}
