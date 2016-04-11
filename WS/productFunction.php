<?php

  require_once('/lib/Config.php');

  function GetAllProducts(){
    $db = GetDb();
    return $db->select('SELECT ProductId, Name, Price, Auction, Increment, Weight, CartDescription, ShortDescription, LongDescription, Thumb, Image, ArtistId, CategoryId, SubCategoryId FROM Product');
  }

  function GetProductsCategoryList($categoryId){
    $db = GetDb();
    return $db->select('SELECT ProductId, Name, Price, Auction, Increment, ShortDescription, Thumb, ArtistId FROM Product WHERE Product.CategoryId = :categoryId', array('categoryId'=>$categoryId));
  }

  function GetProductsSubCategoryList($categoryId, $subCategoryId){
    $db = GetDb();
    return $db->select('SELECT ProductId, Name, Price, Auction, Increment, ShortDescription, Thumb, ArtistId FROM Product WHERE Product.CategoryId = :categoryId AND Product.SubCategoryId = :subCategoryId', array('categoryId'=>$categoryId, 'subCategoryId'=>$subCategoryId));
  }

  function GetProductDetail($productId){
    $db = GetDb();
    return $db->select('SELECT ProductId, Name, Price, Auction, Increment, Weight, LongDescription, Image, ArtistId FROM Product WHERE Product.ProductId = :productId', array('productId'=>$productId));
  }

  function GetProductCart($productId){
    $db = GetDb();
    return $db->select('SELECT ProductId, Name, Price, CartDescription, Thumb FROM Product WHERE Product.ProductId = :productId', array('productId'=>$productId));
  }

  function GetUserProduct($productId){
    $db = GetDb();
    return $db->select('SELECT Profile.ProfileId, Profile.Name, Profile.Surname FROM ProfileToProduct, Profile WHERE Profile.ProfileId = ProfileToProduct.ProfileId AND ProfileToProduct.ProductId = :productId', array('productId'=>$productId));
  }

  function PostProduct($product){
    $db = GetDb();
    return $db->secureInsert('Product', $product);
  }

  function PostProductToProfile($profileToProduct){
    $db = GetDb();
    return $db->secureInsert('ProfileToProduct', $profileToProduct);
  }

  function UpdatePrice($price, $productId){
    $db = GetDb();
    return $db->update('Product', array('Price'=>$price), "ProductId = '$productId'");
  }

 ?>
