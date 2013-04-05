/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

$(document).ready
(
   /*
    *
    */
   function (ev)
   {
      try
      {
         var f = 'main.js onReady()';
         UTILS.checkArgs(f, arguments, ['function']);

         $('input.button').click(onClickButton);
      }
      catch (e)
      {
         UTILS.printExceptionToConsole(f, e);
      }
   }
);

/*
 *
 */
function onClickButton(ev)
{
   try
   {
      var f = 'main.js onClickButton()';
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
