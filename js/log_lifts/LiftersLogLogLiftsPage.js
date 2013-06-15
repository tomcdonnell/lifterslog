/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

/*
 * 
 */
function LiftersLogLogLiftsPage()
{
   var f = 'LiftersLogLogLiftsPage()';
   UTILS.checkArgs(f, arguments, []);

   // Private functions. ////////////////////////////////////////////////////////////////////////

   /*
    *
    */
   function _onClickMainMenuButton(ev)
   {
      try
      {
         var f = 'LiftersLogLogLiftsPage._onClickMainMenuButton()';
         UTILS.checkArgs(f, arguments, ['object']);
      }
      catch (e)
      {
         UTILS.printExceptionToConsole(f, e);
      }
   }

   /*
    *
    */
   function _createSelector(optionTextByValue)
   {
      var f = 'LiftersLogLogLiftsPage._createSelector()';
      UTILS.checkArgs(f, arguments, ['object']);

      var selector = SELECT();

      for (var value in optionTextByValue)
      {
         $(selector).append(OPTION({value: value}, optionTextByValue[value]));
      }

      return selector;
   }

   /*
    *
    */
   function _initDomElementTemplates(optionsBySelectorName)
   {
      var f = 'LiftersLogLogLiftsPage._initDomElementTemplates()';
      UTILS.checkArgs(f, arguments, ['object']);

      _domElementTemplates =
      {
         logTableTr: TR
         (
            TD(_createSelector(optionsBySelectorName.exercise)                                  ),
            TD(INPUT({'class': 'weight-textbox', type: 'text'})                                 ),
            TD(INPUT({'class': 'reps-textbox'  , type: 'text'})                                 ),
            TD({'class': 'align-c done-td'}, INPUT({'class': 'done-checkbox', type: 'checkbox'})),
            TD({'class': 'align-r time-td time-td'}, '00:00:00'                                 )
         )
      };
   }

   /*
    *
    */
   function _init()
   {
      var f = 'LiftersLogLogLiftsPage._init()';
      UTILS.checkArgs(f, arguments, []);

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
                  getLogLiftsSelectorOptionsInfo: _initDomElementTemplates
               }
            )
         }
      );

      $.ajax({data: JSON.stringify({action: 'getLogLiftsSelectorOptionsInfo', params: []})});
   }

   // Private variables. ////////////////////////////////////////////////////////////////////////

   var _domElementTemplates = null;

   // Initialisation code. //////////////////////////////////////////////////////////////////////

   _init();
}
