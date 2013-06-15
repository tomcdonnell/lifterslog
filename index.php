<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

require_once dirname(__FILE__) . '/lib/tom/php/utils/UtilsError.php';
require_once dirname(__FILE__) . '/php/utils/HtmlUtil.php';

UtilsError::initErrorAndExceptionHandler('log.txt');

$i = HtmlUtil::echoHtmlForHeaderAndReturnIndent('home');

echo "$i<div id='img-wrapper-div'>\n";
echo "$i <img src='images/the_thinking_lifter_with_dumbell.jpg'/>\n";
echo "$i</div>\n";
echo "$i<table>\n";
echo "$i <tbody>\n";
echo "$i  <tr>\n";
echo "$i   <th><input type='button' class='button' id='sign-up' value='Sign Up'/></th>\n";
echo "$i   <td class='toggle-init'>It's free and always will be.</td>\n";
echo "$i   <td class='toggle-sign-up expanded' rowspan='4'>\n";

HtmlUtil::echoHtmlForSignUpSection("$i    ");

echo "$i   </td>\n";
echo "$i   <td class='toggle-log-lifts expanded' rowspan='4'>\n";

HtmlUtil::echoHtmlForLogLiftsSection("$i    ");

echo "$i   </td>\n";
echo "$i   <td class='toggle-view-log expanded' rowspan='4'>\n";

HtmlUtil::echoHtmlForViewLogForm("$i    ");

echo "$i   </td>\n";
echo "$i   <td class='toggle-learn-more expanded' rowspan='4'>\n";

HtmlUtil::echoHtmlForLearnMoreSection("$i    ");

echo "$i   </td>\n";
echo "$i  </tr>\n";
echo "$i  <tr>\n";
echo "$i   <th><input type='button' class='button' id='log-lifts' value='Log Lifts'/></th>\n";
echo "$i   <td class='toggle-init'>Sign in and log a workout.</td>\n";
echo "$i  </tr>\n";
echo "$i  <tr>\n";
echo "$i   <th><input type='button' class='button' id='view-log' value='View Log'/></th>\n";
echo "$i   <td class='toggle-init'>Check your progress in charts.</td>\n";
echo "$i  </tr>\n";
echo "$i  <tr>\n";
echo "$i   <th><input type='button' class='button' id='learn-more' value='Learn More'/></th>\n";
echo "$i   <td class='toggle-init'>Click for more information.</td>\n";
echo "$i  </tr>\n";
echo "$i </tbody>\n";
echo "$i</table>\n";

HtmlUtil::echoHtmlForFooter();
?>
