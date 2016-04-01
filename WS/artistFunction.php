<?php

require_once('/lib/Config.php');

// Get functions.
function GetArtists(){
  $db = GetDb();
  return $db->select('SELECT Name, Surname, Image FROM  Artist');
}

function GetArtist($artistid){
  $db = GetDb();
  return $db->select('SELECT Name, Surname, Image, Biography FROM Artist WHERE Artist.ArtistId = :artistid', array('artistid' => $artistid));
}

function GetArtistName($artistid){
  $db = GetDb();
  return $db->select('SELECT Name, Surname FROM Artist WHERE Artist.ArtistId = :artistid', array('artistid'=>$artistid));
}

// Put functions.
function PutArtist($artistid, $data){
  $db = GetDb();
  $update = $db->update('Artist', $data, "ArtistId = '$artisid'");
  return $update;
}

// Post functions.
function PostArtist($newArtist){
  $db = GetDb();
  $insert = $db->secureInsert('Artist', $newArtist);
  return $insert;
}

 ?>
