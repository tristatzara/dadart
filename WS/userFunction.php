<?php

require_once('/lib/Config.php');

// Get functions.
function processSimpleType($who){
  return "Hello $who";
}

function GetAllUsers(){
  $db = GetDb();
  return $db->select('SELECT Username, Password, PasswordSalt FROM User ');
}

function GetUserById($userid){
  $db = GetDb();
  return $db->select('SELECT Username, Password, PasswordSalt FROM User WHERE User.UserId = :userid', array('userid' => $userid));
}

function GetUserId($username, $password){
  $db = GetDb();
  return $db->select('SELECT UserId FROM User WHERE User.Username = :username AND User.Password = :password', array('username'=>$username, 'password'=>$password));
}

function GetUserFromProfile($profileid){
  $db = GetDb();
  return $db->select('SELECT UserId FROM Profile WHERE Profile.ProfileId = :profileid', array('profileid'=>$profileid));
}

function GetProfile($userid){
  $db = GetDb();
  return $db->select('SELECT Profile.* FROM Profile  WHERE Profile.UserId = :userid', array('userid' => $userid ));
}

function GetPasswordSalt($username){
  $db = GetDb();
  return $db->select('SELECT PasswordSalt FROM User WHERE User.Username = :username', array('username' => $username));
}

// Put funcitons.
function PutPassword($password, $passwordSalt, $userid){
  try{
    $db = GetDb();
    return $db->update('user', array('Password'=>$password, 'PasswordSalt'=>$passwordSalt), 'UserId = "' . $userid . '"');
  }
  catch(Exception $ex){
    return false;
  }
}

function PutEmail($profileid, $email){
  try{
    $db = GetDb();
    return $db->update('Profile', array("Email"=> $email), 'ProfileId = "' . $profileid . '"');

  }
  catch(Exception $ex){
    return false;
  }
}

// Post functions.

function PostUser($usercredential){
  $db = GetDb();
  return $db->insert('User', $usercredential);
}

function PostProfile($profile){
  $db = GetDb();
  return $db->insert('Profile', $profile);
}
 ?>
