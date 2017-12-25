<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

$delete = filter_input(INPUT_POST, 'delete');
//$txt_arr = file("Line_log.txt");

unlink('Line_log.txt');



/* $fname = "test.txt";
  $fp = fopen($fname, 'rb');

  $ftest2 = "test2.txt";
  $fptest2 = fopen($ftest2, 'w');
  $size = sizeof($fp);
  echo $size;
  for ($i = 1; $i < $size; $i++) {
  $content = fgets($fp);
  //fwrite($fp,"123123123\r\n");
  fwrite($fptest2, $content . "\n");
  }
  echo $content;
  fclose($fp);
  fclose($fptest2);
 */
?>