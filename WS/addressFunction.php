<?php

  require_once('/lib/Config.php');

  function GetAllAddress(){
    $db=GetDb();
    return $db->select('SELECT Address, Address2, City, Zip, State FROM Address');
  }

  function GetAddress($addressId){
    $db=GetDb();
    return $db->select('SELECT Address, Address2, City, Zip, State FROM Address WHERE Address.AddressId = :addressId', array('addressId'=> $addressId));
  }

  function GetAddressProfile($profileId){
    $db = GetDb();
    return $db->select('SELECT Address, Address2, City, Zip, State FROM Address, Profile  WHERE Address.AddressId = Profile.AddressId AND Profile.ProfileId = :profileId', array('profileId'=>$profileId));
  }

  function PostAddress($address){
    $db = GetDb();
    return $db->secureInsert('Address', $address);
  }


 ?>
