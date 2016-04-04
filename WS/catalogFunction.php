<?php

require_once('/lib/Config.php');

function GetAllCatalogs(){
  $db = GetDb();
  return $db->select('SELECT CatalogId, DisplayName FROM Catalog');
}

function GetCatalogByName($catalogName){
  $db = GetDb();
  return $db->select('SELECT CatalogId FROM Catalog WHERE Catalog.Name = :catalogName', array('catalogName'=>$catalogName));
}

function GetCatalogById($catalogId){
  $db = GetDb();
  return $db->select('SELECT Name FROM Catalog WHERE Catalog.CatalogId = :catalogId', array('catalogId'=>$catalogId));
}

function GetCatalogNameById($catalogId){
    $db = GetDb();
    return $db->select('SELECT DisplayName FROM Catalog WHERE Catalog.CatalogId = :catalogId', array('catalogId'=>$catalogId));
  }

function GetAllCategories(){
  $db = GetDb();
  return $db->select('SELECT CategoryId, DisplayName FROM Category');
}

function GetCategoryById($categoryId){
  $db = GetDb();
  return $db->select('SELECT Name FROM Category WHERE Category.CategoryId = :categoryId', array('categoryId'=>$categoryId));
}

function GetCategoryByCatalogId($catalogId){
    $db = GetDb();
    return $db->select('SELECT CategoryId FROM Category WHERE Category.CatalogId = :catalogId', array('catalogId'=>$catalogId));
}

function GetCategoryNameById($categoryId){
  $db = GetDb();
  return $db->select('SELECT DisplayName FROM Category WHERE Category.CategoryId = :categoryId', array('categoryId'=>$categoryId));
}

function GetCategoryByName($categoryName){
  $db = GetDb();
  return $db->select('SELECT CategoryId FROM Category.Name = :categoryName', array('categoryName'=>$categoryName));
}

function GetAllSubCategories(){
  $db = GetDb();
  return $db->select('SELECT SubCategoryId, DisplayName FROM sub_category');
}

  function GetSubCategoryById($categoryId){
    $db = GetDb();
    return $db->select('SELECT Name FROM sub_category WHERE sub_category.SubCategoryId = :categoryId', array('categoryId'=>$categoryId));
  }

  function GetSubCategoryByName($categoryName){
    $db = GetDb();
    return $db->select('SELECT SubCategoryId FROM sub_category WHERE sub_category.Name = :categoryName', array('categoryName'=>$categoryName));
  }

  function GetSubCategoryByCatalogCategoryId($catalogId, $categoryId){
    $db = GetDb();
    return $db->select('SELECT SubCategoryId FROM sub_category WHERE sub_category.CatalogId = :catalogId AND sub_category.CategoryId = :categoryId', array('catalogId'=>$catalogId, 'categoryId'=>$categoryId));
  }

  function GetSubCategoryNameById($categoryId){
    $db = GetDb();
    return $db->select('SELECT DisplayName FROM sub_category WHERE sub_category.SubCategoryId = :categoryId', array('categoryId'=>$categoryId));
  }
 ?>
