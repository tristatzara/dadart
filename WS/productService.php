<?php

require_once('/lib/nusoap.php');
require_once('productFunction.php');

$namespace = 'http://localhost:8081/ws';

$server = new soap_server();

$server->configureWsdl('ProductService');

$server->wsdl->schemaTargetNamespace = $namespace;

$server->wsdl->addComplexType(
    'Products',
    'complexType',
    'struct',
    'all',
    '',
    array(
      'Name'=>array('name'=>'Name', 'type'=>'xsd:string'),
      'Price'=>array('name'=>'Price', 'type'=>'xsd:float'),
      'Auction'=>array('name'=>'Auction', 'type'=>'xsd:boolean'),
      'Increment'=>array('name'=>'Increment', 'type'=>'xsd:float'),
      'Weight'=>array('name'=>'Weight', 'type'=>'xsd:float'),
      'CartDescription'=>array('name'=>'CartDescription', 'type'=>'xsd:string'),
      'ShortDescription'=>array('name'=>'ShortDescription', 'type'=>'xsd:string'),
      'LongDescription'=>array('name'=>'LongDescription', 'type'=>'xsd:string'),
      'Thumb'=>array('name'=>'Thumb', 'type'=>'xsd:string'),
      'Image'=>array('name'=>'Image', 'type'=>'xsd:string'),
      'ArtistId'=>array('name'=>'ArtistId', 'type'=>'xsd:string'),
      'CategoryId'=>array('name'=>'CategoryId', 'type'=>'xsd:string'),
      'SubCategoryId'=>array('name'=>'SubCategoryId', 'type'=>'xsd:string')
   )
);

$server->wsdl->addComplexType(
    'ProductList',
    'complexType',
    'struct',
    'all',
    '',
    array(
      'ProductId'=>array('name'=>'ProductId', 'type'=>'xsd:string'),
      'Name'=>array('name'=>'Name', 'type'=>'xsd:string'),
      'Auction'=>array('name'=>'Auction', 'type'=>'xsd:boolean'),
      'Increment'=>array('name'=>'Increment', 'type'=>'xsd:float'),
      'Price'=>array('name'=>'Price', 'type'=>'xsd:float'),
      'ShortDescription'=>array('name'=>'ShortDescription', 'type'=>'xsd:string'),
      'Thumb'=>array('name'=>'Thumb', 'type'=>'xsd:string'),
      'ArtistId'=>array('name'=>'ArtistId', 'type'=>'xsd:string')
    )
);

$server->wsdl->addComplexType(
    'ProductDetail',
    'complexType',
    'struct',
    'all',
    '',
    array(
      'ProductId'=>array('name'=>'ProductId', 'type'=>'xsd:string'),
      'Name'=>array('name'=>'Name', 'type'=>'xsd:string'),
      'Price'=>array('name'=>'Price', 'type'=>'xsd:float'),
      'Auction'=>array('name'=>'Auction', 'type'=>'xsd:boolean'),
      'Increment'=>array('name'=>'Increment', 'type'=>'xsd:float'),
      'Weight'=>array('name'=>'Weight', 'type'=>'xsd:float'),
      'LongDescription'=>array('name'=>'LongDescription', 'type'=>'xsd:string'),
      'Image'=>array('name'=>'Image', 'type'=>'xsd:string'),
      'ArtistId'=>array('name'=>'ArtistId', 'type'=>'xsd:string')
    )
);

$server->wsdl->addComplexType(
    'ProductCart',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'ProductId'=>array('name'=>'ProductId', 'type'=>'xsd:string'),
        'Name'=>array('name'=>'Name', 'type'=>'xsd:string'),
        'Price'=>array('name'=>'Price', 'type'=>'xsd:float'),
        'CartDescription'=>array('name'=>'CartDescription', 'type'=>'xsd:string'),
        'Thumb'=>array('name'=>'Thumb', 'type'=>'xsd:string')
    )
);

$server->wsdl->addComplexType(
    'ProductsArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:Products[]')),
    'tns:Products'
);

$server->wsdl->addComplexType(
  'ProductListArray',
  'complexType',
  'array',
  '',
  'SOAP-ENC:Array',
  array(),
  array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:ProductList[]')),
  'tns:ProductList'
);

$server->wsdl->addComplexType(
  'ProductDetailArray',
  'complexType',
  'array',
  '',
  'SOAP-ENC:Array',
  array(),
  array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:ProductDetail[]')),
  'tns:ProductDetail'
);

$server->wsdl->addComplexType(
  'ProductCartArray',
  'complexType',
  'array',
  '',
  'SOAP-ENC:Array',
  array(),
  array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:ProductCart[]')),
  'tns:ProductCart'
);

$server->register(
'GetAllProducts',
array(),
array('return'=>'tns:ProductsArray'),
$namespace,
false,
'rpc',
false,
'Return all Products'
);

$server->register(
'GetProductsCategoryList',
array('categoryId'=>'xsd:string'),
array('return'=>'tns:ProductListArray'),
$namespace,
false,
'rpc',
false,
'Return all Products for category'
);

$server->register(
'GetProductsSubCategoryList',
array('categoryId'=>'xsd:string', 'subCategoryId'=>'xsd:string'),
array('return'=>'tns:ProductListArray'),
$namespace,
false,
'rpc',
false,
'Return all products for subcategory'
);

$server->register(
'GetProductDetail',
array('productId'=>'xsd:string'),
array('return'=>'tns:ProductDetailArray'),
$namespace,
false,
'rpc',
false,
'Return the Detail for a product'
);

$server->register(
'GetProductCart',
array('productId'=>'xsd:string'),
array('return'=>'tns:ProductCartArray'),
$namespace,
false,
'rpc',
false,
'Return a product cart type'
);

$server->register(
'PostProduct',
array('product'=>'tns:Products'),
array('return'=>'xsd:string'),
$namespace,
false,
'rpc',
false,
'Insert or, if exist, update a product'
);

$server->register(
'UpdatePrice',
array('price'=>'xsd:float', 'productId'=>'xsd:string'),
array('return'=>'xsd:int'),
$namespace,
false,
'rpc',
false,
'Update price for a product'
);

// Get our posted data if the service is being consumed
// otherwise leave this data blank.
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA'])
                ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

$server->service($POST_DATA);
exit();
 ?>
