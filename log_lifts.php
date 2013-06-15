<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

require_once dirname(__FILE__) . '/lib/tom/php/utils/UtilsError.php';
require_once dirname(__FILE__) . '/lib/tom/php/utils/UtilsValidator.php';
require_once dirname(__FILE__) . '/php/database_connection.php';
require_once dirname(__FILE__) . '/php/utils/HtmlUtil.php';

UtilsError::initErrorAndExceptionHandler('log.txt');

$i = HtmlUtil::echoHtmlForHeaderAndReturnIndent('logLifts');

echo "$i<table id='subheading-table-1'>\n";
echo "$i <tbody>\n";
echo "$i  <tr>\n";
echo "$i   <td class='align-l'><span class='anchor-style'>TMac</span></td>\n";
echo "$i   <td class='align-c'>Workout #31 - 2013-06-15</td>\n";
echo "$i   <td class='align-r'><span class='anchor-style'>Settings</span></td>\n";
echo "$i  </tr>\n";
echo "$i </tbody>\n";
echo "$i</table>\n";
echo "$i<table id='subheading-table-2'>\n";
echo "$i <tbody>\n";
echo "$i  <tr>\n";
echo "$i   <td class='align-l'><select><option>Load workout template</option></select></td>\n";
echo "$i   <td class='align-c'></td>\n";
echo "$i   <td class='align-r'><input type='button' value='Save workout as template'/></td>\n";
echo "$i  </tr>\n";
echo "$i </tbody>\n";
echo "$i</table>\n";
echo "$i<table id='log-table'>\n";
echo "$i <thead>\n";
echo "$i  <tr>\n";
echo "$i   <th class='column-1'>Exercise</th>\n";
echo "$i   <th class='column-2'>Weight (";
echo       "<span class='anchor-style' title='Click to toggle between kilograms and pounds'>";
echo       "kg</span>)</th>\n";
echo "$i   <th class='column-3'>Reps</th>\n";
echo "$i   <th class='column-4'>Done</th>\n";
echo "$i   <th class='column-5'>Time</th>\n";
echo "$i  </tr>\n";
echo "$i </thead>\n";
echo "$i <tfoot>\n";
echo "$i  <tr>\n";
echo "$i   <td colspan='5' class='add-row-td'><input type='button' value='Add row'/></td>\n";
echo "$i  </tr>\n";
echo "$i </tfoot>\n";
echo "$i <tbody>\n";
echo "$i  <tr>\n";
echo "$i   <td><select><option>Squats</option></select></td>\n";
echo "$i   <td><input type='text' value='20'/></td>\n";
echo "$i   <td><input type='text' value='10'/></td>\n";
echo "$i   <td class='align-c done-td'><input type='checkbox'/></td>\n";
echo "$i   <td class='align-r time-td'>21:30:04</td>\n";
echo "$i  </tr>\n";
echo "$i  <tr>\n";
echo "$i   <td><select><option>Squats</option></select></td>\n";
echo "$i   <td><input type='text' value='50'/></td>\n";
echo "$i   <td><input type='text' value='5'/></td>\n";
echo "$i   <td class='align-c done-td'><input type='checkbox'/></td>\n";
echo "$i   <td class='align-r time-td'>+4:04</td>\n";
echo "$i  </tr>\n";
echo "$i </tbody>\n";
echo "$i</table>\n";

echo "$i<div id='notes-div'>\n";
echo "$i <h2>Notes</h2>\n";
echo "$i <textarea></textarea>\n";
echo "$i</div>\n";

HtmlUtil::echoHtmlForFooter();
?>
