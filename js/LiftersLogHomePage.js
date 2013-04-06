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

         $.ajax
         (
            {
               data:
               {
                  action: 'createUser',
                  params:
                  {
                     emailAddress: $('#email-address-input'  ).attr('value'),
                     password    : $('#choose-password-input').attr('value'),
                     username    : $('#choose-username-input').attr('value')
                  }
               }
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
   function _onClickChooseRandomPublicLog(ex)
   {
      try
      {
         var f = 'LiftersLogHomePage._onClickChooseRandomPublicLog()';
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
   function _displayCreateUserSuccessMessage(username)
   {
      var f = 'LiftersLogHomePage._displayCreateUserSuccessMessage()';
      UTILS.checkArgs(f, arguments, ['string']);

      alert('User ' + username + ' was successfully created.');

      $('#log-lifts'     ).click();
      $('#username-input').attr('value', username);
   }

   /*
    *
    */
   function _displayAjaxFailureMessage(message, boolRemoveAfterShortDelay)
   {
      var f = 'LiftersLogHomePage._displayAjaxFailureMessage()';
      UTILS.checkArgs(f, arguments, ['string', 'boolean']);

      alert(message);
   }

   /*
    *
    */
   function _init()
   {
      var f = 'LiftersLogHomePage._init()';
      UTILS.checkArgs(f, arguments, []);

      $('input.button'                    ).click(_onClickMainMenuButton       );
      $('#submit-sign-up'                 ).click(_onClickSubmitSignUp         );
      $('#choose-random-public-log-anchor').click(_onClickChooseRandomPublicLog);

      $.ajaxSetup
      (
         {
            dataType: 'json'        ,
            type    : 'POST'        ,
            url     : 'php/ajax.php',
            success : UTILS.ajax.createReceiveAjaxMessageFunction
            (
               f, _displayAjaxFailureMessage,
               {
                  createUser: _displayCreateUserSuccessMessage
               }
            )
         }
      );
   }

   // Initialisation code. //////////////////////////////////////////////////////////////////////

   _init();
}
