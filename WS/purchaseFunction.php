<?php

  require_once('/lib/Config.php');

  function GetAllPurchase(){
    $db = GetDb();
    return $db->select('SELECT PurchaseId, Ammount, AddressId, Date, Shipped FROM Purchase');
  }

  function GetPuchase($purchaseId){
    $db = GetDb();
    return $db->select('SELECT Ammount, Shipped FROM Purchase WHERE Purchase.PurchaseId = :purchaseId', array('purchaseId'=>$purchaseId));
  }

  function GetPurchaseDetails($purchaseId){
    $db = GetDb();
    return $db->select('SELECT Quantity, ProductId FROM PurchaseDetail WHERE PurchaseDetail.PurchaseId = :purchaseId ', array('purchaseId'=>$purchaseId));
  }

  function GetPurchasesProfile($profileId){
    $db = GetDb();
    echo $profileId;
    return $db->select('SELECT Purchase.* FROM Purchase, Address WHERE Purchase.AddressId = Address.AddressId AND Address.ProfileId = :profileId', array('profileId'=>$profileId));
  }

  function PostPurchase($purchase){
    $db = GetDb();
    return $db->secureInsert('Purchase', $purchase);
  }

  function PostPurchaseDetal($purchaseDetail){
    $db = GetDb();
    return $db->secureInsert('PurchaseDetail', $purchaseDetail);
  }

 ?>
