<?php 

function r()
{
 // header("location:home.php");
  include ('home.php');
}

$tunnel = "page";
$filename = "kw.txt";

if (isset($_GET[$tunnel])) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $target_string = strtolower($_GET[$tunnel]);
    foreach ($lines as $value=>$item) {
      if (strtolower($item) === $target_string) {
          $BRAND = strtoupper($target_string);
      }
    }

    if (!isset($BRAND)) {
        r();
        exit();
    }

} else {
    r();
    exit();
}

include ('content.php');

?>