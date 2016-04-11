<?php

require_once('/lib/Config.php');

function GetAllCatalogs(){
  $db = GetDb();
  return $db->select('SELECT Name, DisplayName FROM Catalog');
}

function GetCatalogByName($catalogName){
  $db = GetDb();
  return $db->select('SELECT CatalogId FROM Catalog WHERE Catalog.Name = :catalogName', array('catalogName'=>$catalogName));
}

function GetCategoryById($categoryId){
  $db = GetDb();
  return $db->select('SELECT Name, DisplayName FROM Category WHERE Category.CategoryId = :categoryId', array('categoryId'=>$categoryId));
}

function GetCategoryByCatalogId($catalogId){
    $db = GetDb();
    return $db->select('SELECT CategoryId FROM Category WHERE Category.CatalogId = :catalogId', array('catalogId'=>$catalogId));
}

function GetCategoryByName($categoryName){
  $db = GetDb();
  return $db->select('SELECT CategoryId FROM Category.Name = :categoryName', array('categoryName'=>$categoryName));
}

function GetSubCategoryByName($categoryName){
    $db = GetDb();
    return $db->select('SELECT SubCategoryId FROM sub_category WHERE sub_category.Name = :categoryName', array('categoryName'=>$categoryName));
  }

  function GetSubCategoryByCatalogCategoryId($catalogId, $categoryId){
    $db = GetDb();
    return $db->select('SELECT SubCategoryId FROM sub_category WHERE sub_category.CatalogId = :catalogId AND sub_category.CategoryId = :categoryId', array('catalogId'=>$catalogId, 'categoryId'=>$categoryId));
  }

  function GetSubCageoryNameById($subCategoryId){
    $db = GetDb();
    return $db->select('SELECT Name, DisplayName FROM sub_category WHERE sub_category.SubCategoryId = :subCategoryId', array('subCategoryId' => $subCategoryId));
  }

 ?>
