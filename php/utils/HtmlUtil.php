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
   public static function echoHtmlForHeaderAndReturnIndent()
   {
      echo "<!DOCTYPE html>\n";
      echo "<html>\n";
      echo " <head>\n";
      echo "  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>\n";
      echo "  <title>Lifter's Log</title>\n";

      UtilsHtml::echoHtmlScriptAndLinkTagsForJsAndCssFiles
      (
         array
         (
            'css/style.css.php'
         ),
         array
         (
            // Order important.
            'lib/tom/js/contrib/jquery/1.7/jquery_minified.js',

            // Order unimportant.
            'js/LiftersLogHomePage.js'       ,
            'js/main.js'                     ,
            'lib/tom/js/utils/utils.js'      ,
            'lib/tom/js/utils/utilsAjax.js'  ,
            'lib/tom/js/utils/utilsObject.js',
            'lib/tom/js/utils/utilsValidator.js'
         )
      );

      echo " </head>\n";
      echo " <body>\n";
      echo "  <table>\n";
      echo "   <tbody>\n";
      echo "    <tr><th colspan='2'><h1>Lifter's Log</h1></th></tr>\n";
      echo "    <tr>\n";
      echo "     <th colspan='2'>\n";
      echo "      <div id='img-wrapper-div'>\n";
      echo "       <img src='images/the_thinking_lifter_with_dumbell.jpg'/>\n";
      echo "      </div>\n";
      echo "     </th>\n";
      echo "    </tr>\n";

      return '    ';
   }

   /*
    *
    */
   public static function echoHtmlForFooter()
   {
      echo "   </tbody>\n";
      echo "  </table>\n";
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
   public static function echoHtmlForLogLiftsForm($indent)
   {
      $i = &$indent; // Abbreviation.

      echo "$i<form method='post' action='submit.php'>\n";
      echo "$i <p>\n";
      echo "$i  <label for='username-input'>Username:</label><br/>\n";
      echo "$i  <input type='text' class='text-input' id='username-input' name='username'/>\n";
      echo "$i </p>\n";
      echo "$i <p>\n";
      echo "$i  <label for='password-input'>Password:</label><br/>\n";
      echo "$i  <input type='password' class='text-input' id='password-input' name='password'/>\n";
      echo "$i </p>\n";
      echo "$i <p class='submit'>\n";
      echo "$i  <input type='submit' class='submit-input' value='Submit' name='log-lifts'/>\n";
      echo "$i </p>\n";
      echo "$i</form>\n";
   }

   /*
    *
    */
   public static function echoHtmlForViewLogForm($indent)
   {
      $i = &$indent; // Abbreviation.

      echo "$i<form method='post' action='submit.php'>\n";
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
      echo "$i  <input type='submit' class='submit-input' value='Submit' name='view-log'/>\n";
      echo "$i </p>\n";
      echo "$i</form>\n";
   }

   /*
    *
    */
   public static function echoHtmlForLearnMoreSection($indent)
   {
      $i = &$indent; // Abbreviation.

      echo "$i<p class='tiny-text'>\n";
      echo "$i Lifter's Log is a very simple training log and analysis tool designed for";
      echo   " weightlifters.\n";
      echo "$i</p>\n";
      echo "$i<p class='tiny-text'>\n";
      echo "$i It is designed to be used during a workout, since the time each set is logged is\n";
      echo "$i recorded as the time the set was performed.\n";
      echo "$i</p>\n";
      echo "$i<p class='tiny-text'>\n";
      echo "$i Full logs may be downloaded at any time in CSV format.\n";
      echo "$i</p>\n";
      echo "$i<p class='tiny-text'>\n";
      echo "$i Click the 'View Log' button on the left and choose a public log to see what may\n";
      echo "$i be logged and what charting and analysis options are available.\n";
      echo "$i</p>\n";
      echo "$i<p class='tiny-text'>\n";
      echo "$i Site creator: <a action='_blank' href='http://tomcdonnell.net'>Tom McDonnell</a>\n";
      echo "$i (username TMac).\n";
      echo "$i</p>\n";
   }
}
