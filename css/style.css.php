<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

header('Content-type: text/css');

$colors = array
(
   'background' => '#99f'
);

$widths = array
(
   'border' => 4
);
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

h1
{
   font-family: serif;
   font-size: 40px;
   padding: 20px;
}

p
{
   margin-bottom: 12px;
   width: 310px;
}

#img-wrapper-div
{
   height: 375px;
}

input.highlight,
table
{
   background-color: <?php echo $colors['background']; ?>;
}

table
{
   border-collapse: collapse;
   margin-left: auto;
   margin-right: auto;
}

table,
th,
td
{
   border: solid <?php echo $widths['border']; ?>px #000;
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
   padding: 15px;
   width: 100%;
}

input.text-input,
select
{
   width: 100%;
}

input.submit-input
{
   width: 150px;
   height: 30px;
}

p.submit
{
   text-align: center;
}
