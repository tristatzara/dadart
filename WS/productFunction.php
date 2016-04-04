<?php

  require_once('/lib/Config.php');

  function GetAllProducts(){
    $db = GetDb();
    return $db->select('SELECT Name, Price, Auction, Incement, Weight, CartDescription, ShortDescription, LongDescription, Thumb, Image, ArtistId, CategoryId, SubCategoryId FROM Product');
  }

  function GetProductsCategoryList($categoryId){
    $db = GetDb();
    return $db->select('SELECT ProductId, Name, Price, Auction, Incement, ShortDescription, Thumb, ArtistId FROM Product WHERE Product.CategoryId = :categoryId', array('categoryId'=>$categoryId));
  }

  function GetProductsSubCategoryList($categoryId, $subCategoryId){
    $db = GetDb();
    return $db->select('SELECT ProductId, Name, Price, Auction, Incement, ShortDescription, Thumb, ArtistId FROM Product WHERE Product.CategoryId = :categoryId AND Product.SubCategoryId = :subCategoryId', array('categoryId'=>$categoryId, 'subCategoryId'=>$subCategoryId));
  }

  function GetProductDetail($productId){
    $db = GetDb();
    return $db->select('SELECT ProductId, Name, Price, Auction, Incement, Weight, LongDescription, Image, ArtistId FROM Product WHERE Product.ProductId = :productId', array('productId'=>$productId));
  }

  function GetProductCart($productId){
    $db = GetDb();
    return $db->select('SELECT ProductId, Name, Price, CartDescription, Thumb FROM Product WHERE Product.ProductId = :productId', array('productId'=>$productId));
  }

  function PostProduct($product){
    $db = GetDb();
    return $db->secureInsert('Product', $product);
  }

  function UpdatePrice($price, $productId){
    $db = GetDb();
    return $db->update('Product', array('Price'=>$price), "ProductId = '$productId'");
  }

 ?>
