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

         $(window).resize(onResizeWindow);
         $(window).resize();
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
function onResizeWindow(ev)
{
   try
   {
      var f = 'main.js onResizeWindow()';
      UTILS.checkArgs(f, arguments, ['object']);

      var MAX_HEIGHT_WIDTH_RATIO   = 2.0;
      var MIN_HEIGHT_WIDTH_RATIO   = 1.3;
      var MIN_PAGE_WIDTH_IN_PIXELS = 300;

      var windowHeight     = $(window).height();
      var windowWidth      = $(window).width();
      var heightWidthRatio = windowHeight / windowWidth;
      var pageWrapperDivJq = $('#page-wrapper-div');

      var tooTall = (heightWidthRatio > MAX_HEIGHT_WIDTH_RATIO);
      var tooWide = (heightWidthRatio < MIN_HEIGHT_WIDTH_RATIO);

      switch (((tooTall)? '1': '0') + '-' + ((tooWide)? '1': '0'))
      {
       case '0-0': 
         // Set dimensions to match window dimensions.
         pageWrapperDivJq.height(windowHeight);
         pageWrapperDivJq.width(windowWidth);
         break;

       case '0-1':
         // Set height to window height and width to match MIN_HEIGHT_WIDTH_RATIO.
         pageWrapperDivJq.height(windowHeight);
         pageWrapperDivJq.width(windowHeight / MIN_HEIGHT_WIDTH_RATIO);
         break;

       case '1-0':
         // Set width to window width and height match MAX_HEIGHT_WIDTH_RATIO.
         pageWrapperDivJq.width(windowWidth);
         pageWrapperDivJq.height(windowWidth * MAX_HEIGHT_WIDTH_RATIO);
         break;

       case '1-1': // Fall through.
       default   :
         throw new Exception(f, 'Impossible case.');
      }

      var pageHeight           = $('#page-wrapper-div').height();
      var pageWidth            = $('#page-wrapper-div').width();
      var pageHeightWidthRatio = pageHeight / pageWidth;

      $('body').css('fontSize', $('#page-wrapper-div').height() * 0.015);

      new LiftersLogHomePage();

      onResizeForHomepage();
   }
   catch (e)
   {
      UTILS.printExceptionToConsole(f, e);
   }
}

/*
 *
 */
function onResizeForHomepage()
{
   var f = 'main.js onResizeForHomepage()';
   UTILS.checkArgs(f, arguments, []);

   var imgWrapperDivJq = $('#img-wrapper-div');
   var imageWidth      = 100;
   var imageHeight     = 100;

   // TODO: Hard-code image height and width, then fit image to imageWrapperDiv.

   imgWrapperDivJq.css
   (
      {
         backgroundSize    : imageWidth + 'px ' + imageHeight + 'px'           ,
         backgroundImage   : 'url(images/the_thinking_lifter_with_dumbell.jpg)',
         backgroundPosition: 'center bottom'                                   ,
         backgroundRepeat  : 'no-repeat'
      }
   );
}

/*
 *
 *
function onResizeForHomepage()
{
   var f = 'main.js onResizeForHomepage()';
   UTILS.checkArgs(f, arguments, []);

   var imgWrapperDivJq            = $('#img-wrapper-div'    );
   var imgJq                      = $('#img-wrapper-div img');
   var imgHeightWidthRatio        = imgJq.height() / imgJq.width();
   var imgWrapperHeight           = imgJq.height();
   var imgWrapperWidth            = imgJq.width();
console.log(f, 'imgWrapperHeight: ', imgWrapperHeight);
console.log(f, 'imgWrapperWidth: ', imgWrapperWidth);
   var imgWrapperHeightWidthRatio = imgWrapperHeight / imgWrapperWidth;

   var tooTall = (imgHeightWidthRatio > imgWrapperHeightWidthRatio);
   var tooWide = (imgHeightWidthRatio < imgWrapperHeightWidthRatio);

   switch (((tooTall)? '1': '0') + '-' + ((tooWide)? '1': '0'))
   {
    case '0-0': 
console.log('0-0');
      // Set img dimensions to match #img-wrapper-div dimensions.
      imgJq.height(imgWrapperHeight);
      imgJq.width(imgWrapperWidth);
      break;

    case '0-1':
console.log('0-1');
      // Set height to window height and width to match MIN_HEIGHT_WIDTH_RATIO.
      imgJq.height(imgWrapperHeight);
      imgJq.width(imgWrapperHeight / imgWrapperHeightWidthRatio);
      break;

    case '1-0':
console.log('1-0');
      // Set width to window width and height match MAX_HEIGHT_WIDTH_RATIO.
      imgJq.width(imgWrapperWidth);
      imgJq.height(imgWrapperWidth * imgWrapperHeightWidthRatio);
      break;

    case '1-1': // Fall through.
    default   :
      throw new Exception(f, 'Impossible case.');
   }
console.log(f, 'imgWrapperHeight: ', imgWrapperHeight);
console.log(f, 'imgWrapperWidth: ', imgWrapperWidth);

   // Ensure img is vertically aligned at the bottom of the #img-wrapper-div.
   imgWrapperDivJq.css('position', 'relative');
   imgJq.css
   (
      {
         'position': 'relative',
         'top'     : (imgWrapperDivJq.height() - imgJq.height()) + 'px'
      }
   );
}
 */

// TODO: Create function fitRectangleInsideRectangle(elementToFit, parentElement, maxHeightWidthRatio, minHeightWidthRatio)
