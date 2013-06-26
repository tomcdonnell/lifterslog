<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

header('Content-type: text/css');

include dirname(__FILE__) . '/common_css_constants.php';

$percentageHeights = array
(
   'header-div'    => 15,
   'header-div h1' => 100
);
?>
*
{
   <?php echo $commonRulesets['box-sizing']; ?>
   border-width: 0;
   margin: 0;
   padding: 0;
}

*.tiny-text
{
   font-size: 0.75em;
}

*.small-text
{
   font-size: 0.8em;
}

*.anchor-style
{
   text-decoration: underline;
}

*.anchor-style:hover
{
   cursor: pointer;
}

body
{
   font-size: 15px; /* To be set in Javascript depending on browser window height and width. */
}

div#page-wrapper-div
{
   border: <?php echo $commonPixelWidths['border']; ?>px solid #000;
   height: 1000px; /* To be set in Javascript depending on browser window height and width. */
   margin-left: auto;
   margin-right: auto;
   width: 625px; /* To be set in Javascript depending on browser window height and width. */
}

div#header-div,
div#content-div
{
   border-style: solid;
   border-color: #000;
}

div#header-div
{
   background-color: <?php echo $commonColors['background-main-heading']; ?>;
   border-width: 0 0 <?php echo $commonPixelWidths['border']; ?>px 0;
   height: <?php echo $percentageHeights['header-div']; ?>%;
   text-align: center;
}

div#content-div
{
   background-color: <?php echo $commonColors['background-main-content']; ?>;
   height: <?php echo (100 - $percentageHeights['header-div']); ?>%;
}

h1
{
   font-family: serif;
   font-size: 4em;
   height: <?php echo $percentageHeights['header-div h1']; ?>%;
   padding-top: 0.5em;
   position: relative;
   top: <?php echo "-(0.5 * {$percentageHeights['header-div h1']})"; ?>%;
}
