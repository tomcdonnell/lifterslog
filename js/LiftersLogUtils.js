/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

/*
 * 
 */
window.LiftersLogUtils =
{
   /*
    *
    */
   displayAjaxFailureMessage: function (message, boolRemoveAfterShortDelay)
   {
      var f = 'LiftersLogUtils.displayAjaxFailureMessage()';
      UTILS.checkArgs(f, arguments, ['string', 'boolean']);

      alert(message);
   }
};
