<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

require_once dirname(__FILE__) . '/../../lib/tom/php/utils/UtilsHtml.php';
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Lifter's Log</title>
<?php
UtilsHtml::echoHtmlScriptAndLinkTagsForJsAndCssFiles
(
   array
   (
      'css/style.css.php'
   ),
   array
   (
      '../../lib/tom/js/contrib/jquery/1.7/jquery_minified.js',
      '../../lib/tom/js/utils/utils.js'                       ,
      '../../lib/tom/js/utils/utilsValidator.js'              ,
      'js/main.js'
   )
);
?>
 </head>
 <body>
  <div id='content-wrapper'>
   <table>
    <tbody>
     <tr><th colspan='2'><h1>Lifter's Log</h1></th></tr>
     <tr>
      <th colspan='2'>
       <div id='img-wrapper-div'>
        <img src='images/the_thinking_lifter_with_dumbell.jpg'/>
       </div>
      </th>
     </tr>
     <tr>
      <th><input type='button' class='button' id='sign-up' value='Sign Up'/></th>
      <td class='toggle-init'>It's free and always will be.</td>
      <td class='toggle-sign-up expanded' rowspan='4'>
       <form target='submit.php'>
        <p>
         <label for='choose-username-input'>Choose a username:</label><br/>
         <input type='text' class='text-input' id='choose-username-input' name='username'/>
        </p>
        <p>
         <label for='choose-password-input'>Choose a password:</label><br/>
         <input type='password' class='text-input' id='choose-password-input' name='password'/>
        </p>
        <p>
         <label for='email-address-input'>
          Email address:<br/>
          <span class='tiny-text'>(to be used only for password reminders)</span>
         </label>
         <br/>
         <input type='text' class='text-input' id='email-address-input' name='email-address'/>
        </p>
        <p class='submit'><input type='submit' class='submit-input' value='Submit'/></p>
       </form>
      </td>
      <td class='toggle-log-lifts expanded' rowspan='4'>
       <form target='submit.php'>
        <p>
         <label for='username-input'>Username:</label><br/>
         <input type='text' class='text-input' id='username-input' name='username'/>
        </p>
        <p>
         <label for='password-input'>Password:</label><br/>
         <input type='password' class='text-input' id='password-input' name='password'/>
        </p>
        <p class='submit'><input type='submit' class='submit-input' value='Submit'/></p>
       </form>
      </td>
      <td class='toggle-view-log expanded' rowspan='4'>
       <form target='submit.php'>
        <p>
         <label for='username-select'>View whose lifting log?</label><br/>
         <select id='username-select'>
          <option>TMac</option>
          <option>Jimmy</option>
          <option>The elephant</option>
         </select>
        </p>
        <p class='submit'><input type='submit' class='submit-input' value='Submit'/></p>
       </form>
      </td>
      <td class='toggle-learn-more expanded' rowspan='4'>
       <p class='tiny-text'>
        Lifter's Log is a very simple training log and analysis tool designed for weightlifters.
       </p>
       <p class='tiny-text'>
        To log a workout, specify the exercise, the weight used, and the number of repititions.
        The time will also be recorded, so do this immediately after finishing each set.
       </p>
       <p class='tiny-text'>
        All logs are public, so you can see what else may be recorded and what analysis tools are
        available by viewing anyone's log.  (Click the 'View Log' button on the left.)
       </p>
       <p class='tiny-text'>
        Site creator: <a target='_blank' href='http://tomcdonnell.net'>Tom McDonnell</a>
        (username TMac).
       </p>
      </td>
     </tr>
     <tr>
      <th><input type='button' class='button' id='log-lifts' value='Log Lifts'/></th>
      <td class='toggle-init'>Sign in and log a workout.</td>
     </tr>
     <tr>
      <th><input type='button' class='button' id='view-log' value='View Log'/></th>
      <td class='toggle-init'>Check your progress in charts.</td>
     </tr>
     <tr>
      <th><input type='button' class='button' id='learn-more' value='Learn More'/></th>
      <td class='toggle-init'>Click for more information.</td>
     </tr>
    </tbody>
   </table>
  </div>
 </body>
</html>
