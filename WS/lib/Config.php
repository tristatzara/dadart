<?php
// A config file to configure the 'database.class.php' library.

/**
 * @author      Yannick Renner
 * @copyright   Copyright (C), 2016 Yannick Renner
 *
 * @link        http://www.yannickrenner.info
 *
 */


require_once('/database.class.php');

function GetDb(){
  if(isset($db))
    return $db;
  else {
    $db = new \lib\Database(array(
      'type' => 'mysql',
      // Change?
      'host' => 'localhost',
      'name' => 'dadart',
      // CHange?
      'user'=> 'root',
      'pass' => ''
    ));
    return $db;
  }
}
 ?>
