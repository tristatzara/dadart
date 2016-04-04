<?php
  require_once('catalogFunction.php');
  require_once('/lib/nusoap.php');

  $namespace = 'http://localhost:8081/ws';

  $server = new soap_server();

  $server->configureWsdl("CatalogService");

  $server->wsdl->schemaTargetNamespace = $namespace;

  $server->wsdl->addComplexType(
      'Catalogs',
      'complexType',
      'struct',
      'all',
      '',
      array(
        'CatalogId'=>array('name'=>'CatalogId', 'type'=>'xsd:string'),
        'DisplayName'=>array('name'=>'DisplayName', 'type'=>'xsd:string')
      )
  );

  $server->wsdl->addComplexType(
      'Category',
      'complexType',
      'struct',
      'all',
      '',
      array(
        'CategoryId'=>array('name'=>'CategoryId', 'type'=>'xsd:string'),
        'DisplayName'=>array('name'=>'DisplayName', 'type'=>'xsd:string')
      )
  );

  $server->wsdl->addComplexType(
      'SubCategory',
      'complexType',
      'struct',
      'all',
      '',
      array(
        'SubCategoryId'=>array('name'=>'SubCategoryId', 'type'=>'xsd:string'),
        'DisplayName'=>array('name'=>'DisplayName', 'type'=>'xsd:string')
      )
  );

  $server->wsdl->addComplexType(
      'CatalogId',
      'complexType',
      'struct',
      'all',
      '',
      array(
        'CatalogId'=>array('name'=>'CatalogId', 'type'=>'xsd:string')
      )
  );

  $server->wsdl->addComplexType(
      'Name',
      'complexType',
      'struct',
      'all',
      '',
      array(
        'Name'=>array('name'=>'Name', 'type'=>'xsd:string')
      )
  );

  $server->wsdl->addComplexType(
      'DisplayName',
      'complexType',
      'struct',
      'all',
      '',
      array(
        'DisplayName'=>array('name'=>'DisplayName', 'type'=>'xsd:string')
      )
  );

  $server->wsdl->addComplexType(
      'CategoryId',
      'complexType',
      'struct',
      'all',
      '',
      array(
        'CategoryId'=>array('name'=>'CategoryId', 'type'=>'xsd:string')
      )
  );

  $server->wsdl->addComplexType(
      'SubCategoryId',
      'complexType',
      'struct',
      'all',
      '',
      array(
        'SubCategoryId'=>array('name'=>'SubCategoryId', 'type'=>'xsd:string')
      )
  );

  $server->wsdl->addComplexType(
      'CatalogsArray',
      'complexType',
      'array',
      '',
      'SOAP-ENC:Array',
      array(),
      array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:Catalogs[]')),
      'tns:Catalogs'
  );

  $server->wsdl->addComplexType(
      'CategoryArray',
      'complexType',
      'array',
      '',
      'SOAP-ENC:Array',
      array(),
      array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:Category[]')),
      'tns:Category'
  );

  $server->wsdl->addComplexType(
      'SubCategoryArray',
      'complexType',
      'array',
      '',
      'SOAP-ENC:Array',
      array(),
      array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:SubCategory[]')),
      'tns:SubCategory'
  );

  $server->wsdl->addComplexType(
      'DisplayNameArray',
      'complexType',
      'array',
      '',
      'SOAP-ENC:Array',
      array(),
      array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:DisplayName[]')),
      'tns:DisplayName'
  );

  $server->wsdl->addComplexType(
      'NameArray',
      'complexType',
      'array',
      '',
      'SOAP-ENC:Array',
      array(),
      array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:Name[]')),
      'tns:Name'
  );

  $server->wsdl->addComplexType(
      'CatalogIdArray',
      'complexType',
      'array',
      '',
      'SOAP-ENC:Array',
      array(),
      array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:CatalogId[]')),
      'tns:CatalogId'
  );

  $server->wsdl->addComplexType(
      'CategoryIdArray',
      'complexType',
      'array',
      '',
      'SOAP-ENC:Array',
      array(),
      array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:CategoryId[]')),
      'tns:CategoryId'
  );

  $server->wsdl->addComplexType(
      'SubCategoryIdArray',
      'complexType',
      'array',
      '',
      'SOAP-ENC:Array',
      array(),
      array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:SubCategoryId[]')),
      'tns:SubCategoryId'
  );

  // functions.

  $server->register(
      'GetAllCatalogs',
      array(),
      array('return'=>'tns:CatalogsArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return all catalogs'
  );

  $server->register(
      'GetCatalogByName',
      array('name'=>'xsd:string'),
      array('return'=>'tns:CatalogIdArray'),
      $namespace.
      false,
      'rpc',
      false,
      'Return the id of a catalog by the name'
  );

  $server->register(
      'GetCatalogById',
      array('catalogId'=>'xsd:string'),
      array('return'=>'tns:NameArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return the catalog name by id'
  );

  $server->register(
      'GetCategoryNameById',
      array('catalogId'=>'xsd:string'),
      array('return'=>'tns:DisplayNameArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return the display name of a catalog by id'
  );

  $server->register(
      'GetAllCategories',
      array(),
      array('return'=>'tns:CategoryArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return all categories'
  );

  $server->register(
      'GetCategoryById',
      array('categoryId'=>'xsd:string'),
      array('return'=>'tns:NameArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return the category name by id'
  );

  $server->register(
      'GetCategoryByName',
      array('name'=>'xsd:string'),
      array('return'=>'tns:CategoryIdArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return the category id by name'
  );

  $server->register(
      'GetCategoryByCatalogId',
      array('catalogId'=>'xsd:string'),
      array('return'=>'tns:CategoryIdArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return an array of categoryId by the catalog id'
  );

  $server->register(
      'GetCategoryNameById',
      array('categoryId'=>'xsd:string'),
      array('return'=>'tns:DisplayNameArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return the displayname of a catagory by id'
  );

  $server->register(
      'GetAllSubCategories',
      array(),
      array('return'=>'tns:SubCategoryArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return all subcategories'
  );

  $server->register(
      'GetSubCategoryById',
      array('categoryId'=>'xsd:string'),
      array('return'=>'tns:NameArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return the SubCategory name by id'
  );

  $server->register(
      'GetSubCategoryByName',
      array('name'=>'xsd:string'),
      array('return'=>'tns:SubCategoryIdArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return the SubCategory id by name'
  );

  $server->register(
      'GetSubCategoryByCatalogCategoryId',
      array('catalogId'=>'xsd:string', 'categoryId'=>'xsd:string'),
      array('return'=>'SubCategoryIdArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return an array of SubCategoryId by CatalogId and CategoryId'
  );

  $server->register(
      'GetSubCategoryNameById',
      array('categoryId'=>'xsd:string'),
      array('return'=>'tns:DisplayNameArray'),
      $namespace,
      false,
      'rpc',
      false,
      'Return the DisplayName of a SubCategory by id'
  );

  // Get our posted data if the service is being consumed
  // otherwise leave this data blank.
  $POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA'])
                  ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

  $server->service($POST_DATA);
  exit

 ?>
