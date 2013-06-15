<?php
/*
 * vim: ts=3 sw=3 et wrap co=100 go-=b
 */

header('Content-type: text/css');

include dirname(__FILE__) . '/common_css_constants.php';
?>
table#subheading-table-1,
table#subheading-table-2
{
   border-bottom-width: <?php echo $widths['border']; ?>px;
   border-color: #000;
   border-left-width: 0;
   border-righ-width: 0;
   border-style: solid;
   border-top-width: 0;
   font-family: monospace;
   font-size: 15px;
   width: 100%;
}

table#subheading-table-1 input ,
table#subheading-table-2 input ,
table#subheading-table-1 select,
table#subheading-table-2 select
{
   width: 100%;
}

table#subheading-table-1
{
   background: #000;
   color: #fff;
}

table#subheading-table-2
{
   background: #bbb;
   color: #000;
}


table#subheading-table-1 td.align-l {width: 20%;}
table#subheading-table-1 td.align-c {width: 60%;}
table#subheading-table-1 td.align-r {width: 20%;}

table#subheading-table-2 td.align-l {width: 40%;}
table#subheading-table-2 td.align-c {width: 20%;}
table#subheading-table-2 td.align-r {width: 40%;}

table#log-table
{
   border-style: solid;
   border-color: #000;
   border-top-width: 0;
   border-left-width: 0;
   border-right-width: 0;
   border-bottom-width: <?php echo $widths['border']; ?>px;
   border-collapse: collapse;
   width: 100%;
}

table#log-table th
{
   padding: 2px;
}

table#log-table th.column-1 {width: 42%;}
table#log-table th.column-2 {width: 20%;}
table#log-table th.column-3 {width: 14%;}
table#log-table th.column-4 {width: 10%;}
table#log-table th.column-5 {width: 14%;}

table#log-table td
{
   background: #fff;
   border-width: 0;
   margin: 0;
   padding: 0;
}

table#log-table td select
{
   width: 100%;
   background: #fff;
   border: 1px solid #ccc;
}

table#log-table td.done-td,
table#log-table td.time-td
{
   border-color: #ccc;
   border-left-width: 1px;
   border-bottom-width: 1px;
   border-style: solid;
}

table#log-table td.time-td
{
   font-family: monospace;
}

table#log-table td.add-row-td input
{
   width: 100%;
}

div#notes-div
{
   border-style: solid;
   border-color: #000;
   border-top-width: 0;
   border-left-width: 0;
   border-right-width: 0;
   border-bottom-width: <?php echo $widths['border']; ?>px;
}

div#notes-div h2
{
   font-size: medium;
}

div#notes-div textarea
{
   width: 100%;
}
