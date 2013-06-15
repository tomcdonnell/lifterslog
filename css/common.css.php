<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

header('Content-type: text/css');

include dirname(__FILE__) . '/common_css_constants.php';
?>
*
{
   border-width: 0;
   margin: 0;
   padding: 0;
}

*.tiny-text
{
   font-size: 13px;
}

*.small-text
{
   font-size: 14px;
}

*.anchor-style
{
   text-decoration: underline;
}

*.anchor-style:hover
{
   cursor: pointer;
}

div#page-wrapper-div
{
   margin-left: auto;
   margin-right: auto;
   width: 508px;
}

div#header-div,
div#content-div
{
   border-style: solid;
   border-color: #000;
   background-color: <?php echo $colors['background']; ?>;
}

div#header-div
{
   border-width: <?php echo $widths['border']; ?>px;
   text-align: center;
}

div#content-div
{
   border-bottom-width: 0;
   border-left-width  : <?php echo $widths['border']; ?>px;
   border-right-width : <?php echo $widths['border']; ?>px;
   border-top-width   : 0;
}

h1
{
   font-family: serif;
   font-size: 40px;
   padding: 20px;
}
