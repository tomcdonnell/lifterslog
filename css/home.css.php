<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

header('Content-type: text/css');

include dirname(__FILE__) . '/common_css_constants.php';

$percentageHeights = array
(
   'img-wrapper-div' => 55
);

$percentageWidths = array
(
   'th' => 30
);
?>
p
{
   width: 100%;
}

#img-wrapper-div
{
   border-bottom: <?php echo $commonPixelWidths['border']; ?>px solid #000;
   height: <?php echo $percentageHeights['img-wrapper-div']; ?>%;
   text-align: center;
}

#img-wrapper-div img
{
   overflow: hidden;
   width: 100%;
}

input.highlight
{
   background-color: <?php echo $commonColors['background-main-heading']; ?>;
}

table
{
   border-collapse: collapse;
   height: <?php echo (100 - $percentageHeights['img-wrapper-div']); ?>%;
   margin-left: auto;
   margin-right: auto;
   width: 100%;
}

th,
td
{
   border: 0;
   border-bottom: <?php echo $commonPixelWidths['border']; ?>px solid #000;
   height: 25%;
}

tr:last-child th,
tr:last-child td
{
   border-bottom: 0;
}

th
{
   width: <?php echo $percentageWidths['th']; ?>%;
}

td,
td.expanded
{
   width: <?php echo (100 - $percentageWidths['th']); ?>%;
}

td
{
   background-color: <?php echo $commonColors['background-main-heading']; ?>;
   font-size: 1.5em;
   padding-left: 10px;
}

td.expanded
{
}

td.toggle-learn-more,
td.toggle-log-lifts ,
td.toggle-sign-up   ,
td.toggle-view-log
{
   display: none;
}

input.button
{
   font-size: 1.6em;
   height: 100%;
   width: 100%;
}

input.text-input,
select
{
   padding: 1px;
   width: 90%;
}

input.submit-input
{
   height: 100%;
   width: 80%;
}

p.submit
{
   text-align: center;
}

label
{
   font-size: 1.5em;
}

p.heading-p
{
   font-family: serif;
   font-weight: bold;
   margin-bottom: 0;
   text-align: center;
}
