/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

/*
 * 
 */
function LiftersLogHomePage()
{
   var f = 'LiftersLogHomePage()';
   UTILS.checkArgs(f, arguments, []);

   // Private functions. ////////////////////////////////////////////////////////////////////////

   /*
    *
    */
   function _onClickMainMenuButton(ev)
   {
      try
      {
         var f = 'LiftersLogHomePage._onClickMainMenuButton()';
         UTILS.checkArgs(f, arguments, ['object']);

         $('input[type="text"]'    ).attr('value', '');
         $('input[type="password"]').attr('value', '');

         var buttonId                    = $(ev.target).attr('id');
         var tdToRevealJq                = $('td.toggle-' + buttonId);
         var tdToRevealIsAlreadyRevealed = (tdToRevealJq.css('display') == 'table-cell');

         $('td[class^="toggle"]').css('display', 'none');
         $('input.button'       ).removeClass('highlight');

         if (tdToRevealIsAlreadyRevealed)
         {
            $('td.toggle-init').css('display', 'table-cell');
         }
         else
         {
            tdToRevealJq.css('display', 'table-cell');
            $('input#' + buttonId).addClass('highlight');
         }
      }
      catch (e)
      {
         UTILS.printExceptionToConsole(f, e);
      }
   }

   /*
    *
    */
   function _onClickSubmitSignUp(ev)
   {
      try
      {
         var f = 'LiftersLogHomePage._onClickSubmitSignUp()';
         UTILS.checkArgs(f, arguments, ['object']);

         _setDisabledForAllInputs(true);

         $.ajax
         (
            {
               data: JSON.stringify
               (
                  {
                     action: 'createUser',
                     params:
                     {
                        emailAddress: $('#email-address-input'  ).attr('value'),
                        password    : $('#choose-password-input').attr('value'),
                        username    : $('#choose-username-input').attr('value')
                     }
                  }
               )
            }
         );
      }
      catch (e)
      {
         UTILS.printExceptionToConsole(f, e);
      }
   }

   /*
    *
    */
   function _onClickSubmitLogLiftsLogin(ev)
   {
      try
      {
         var f = 'LiftersLogHomePage._onClickSubmitLogLiftsLogin()';
         UTILS.checkArgs(f, arguments, ['object']);

         _setDisabledForAllInputs(true);

         $.ajax
         (
            {
               data: JSON.stringify
               (
                  {
                     action: 'loginUser',
                     params:
                     {
                        password: $('#password-input').attr('value'),
                        username: $('#username-input').attr('value')
                     }
                  }
               )
            }
         );
      }
      catch (e)
      {
         UTILS.printExceptionToConsole(f, e);
      }
   }

   /*
    *
    */
   function _onClickChooseRandomPublicLogAnchor(ex)
   {
      try
      {
         var f = 'LiftersLogHomePage._onClickChooseRandomPublicLogAnchor()';
         UTILS.checkArgs(f, arguments, ['object']);

         var username = 'TMac';

         $('#view-log-username-input').attr('value', username);

         return false;
      }
      catch (e)
      {
         UTILS.printExceptionToConsole(f, e);
      }
   }

   /*
    *
    */
   function _onClickLogLiftsSigningUpAnchor(ex)
   {
      try
      {
         var f = 'LiftersLogHomePage._onClickLogLiftsSigningUpAnchor()';
         UTILS.checkArgs(f, arguments, ['object']);

         $('#sign-up').click();

         return false;
      }
      catch (e)
      {
         UTILS.printExceptionToConsole(f, e);
      }
   }

   /*
    *
    */
   function _displayCreateUserSuccessMessage(username)
   {
      var f = 'LiftersLogHomePage._displayCreateUserSuccessMessage()';
      UTILS.checkArgs(f, arguments, ['string']);

      alert('User ' + username + ' was successfully created.');

      $('#log-lifts'     ).click();
      $('#username-input').attr('value', username);

      _setDisabledForAllInputs(false);
   }

   /*
    *
    */
   function _respondToLoginUserRequestResponse(obj)
   {
      var f = 'LiftersLogHomePage._respondToLoginUserRequestResponse()';
      UTILS.checkArgs(f, arguments, ['object']);

      UTILS.validator.checkObject
      (
         obj,
         {
            username   : 'string',
            loginResult: 'string'
         }
      );

      switch (obj.loginResult)
      {
       case 'loginSuccessful':
         var loginSubmitButtonJq = $('#submit-log-lifts-login');
         loginSubmitButtonJq.attr('value', 'Access Granted');
         loginSubmitButtonJq.css('background-color', '#7f7');
         window.location.href = 'log_lifts.php';
         return;

       case 'passwordIncorrect':
         alert('Access denied.  Incorrect password for user "' + obj.username + '".');
         break;

       case 'usernameNotFound':
         alert('Access denied.  Username "' + obj.username + '" not found.');
         break;

       default:
         throw new Exception(f, 'Unexpected response from server.');
      }

      _setDisabledForAllInputs(false);
   }

   /*
    *
    */
   function _setDisabledForAllInputs(bool)
   {
      var f = 'LiftersLogHomePage._setDisabledForAllInputs()';
      UTILS.checkArgs(f, arguments, ['boolean']);

      $('input'   ).prop('disabled', bool);
      $('select'  ).prop('disabled', bool);
      $('textarea').prop('disabled', bool);
   }

   /*
    *
    */
   function _init()
   {
      var f = 'LiftersLogHomePage._init()';
      UTILS.checkArgs(f, arguments, []);

      $('input.button'                    ).click(_onClickMainMenuButton             );
      $('#submit-sign-up'                 ).click(_onClickSubmitSignUp               );
      $('#submit-log-lifts-login'         ).click(_onClickSubmitLogLiftsLogin        );
      $('#choose-random-public-log-anchor').click(_onClickChooseRandomPublicLogAnchor);
      $('#log-lifts-signing-up-anchor'    ).click(_onClickLogLiftsSigningUpAnchor    );

      $.ajaxSetup
      (
         {
            dataType: 'json'        ,
            type    : 'POST'        ,
            url     : 'php/ajax.php',
            success : UTILS.ajax.createReceiveAjaxMessageFunction
            (
               f, LiftersLogUtils.displayAjaxFailureMessage,
               {
                  createUser: _displayCreateUserSuccessMessage,
                  loginUser : _respondToLoginUserRequestResponse
               }
            )
         }
      );
   }

   // Initialisation code. //////////////////////////////////////////////////////////////////////

   _init();
}
