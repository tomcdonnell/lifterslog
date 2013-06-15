<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

header('Content-type: text/css');

include dirname(__FILE__) . '/common_css_constants.php';
?>
p
{
   margin-bottom: 11px;
   width: 310px;
}

#img-wrapper-div
{
   height: 375px;
}

input.highlight
{
   background-color: <?php echo $colors['background']; ?>;
}

table
{
   border-collapse: collapse;
   margin-left: auto;
   margin-right: auto;
   width: 500px;
}

th,
td
{
   border: <?php echo $widths['border']; ?>px solid #000;
}

th,
td
{
   border-left-width: 0;
   border-right-width: 0;
}

th
{
   width: 150px;
   height: 34px;
}

td
{
   padding-left: 10px;
}

td.expanded
{
   padding-left: 20px;
   padding-right: 20px;
}

td.toggle-sign-up,
td.toggle-log-lifts,
td.toggle-view-log,
td.toggle-learn-more
{
   display: none;
}

input.button
{
   font-size: 20px;
   padding: 18px;
   width: 100%;
}

input.text-input,
select
{
   width: 100%;
   padding: 1px;
}

input.submit-input
{
   width: 150px;
   height: 32px;
}

p.submit
{
   text-align: center;
}

label
{
   font-size: 16px;
}

p.heading-p
{
   text-align: center;
   font-family: serif;
   font-weight: bold;
   margin-bottom: 0;
}
