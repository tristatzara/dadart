<?php
require_once('/lib/nusoap.php');
require_once('artistFunction.php');



$namespace = 'http://localhost:8081/ws';

$server = new soap_server();

$server->configureWsdl("ArtistService");

$server->wsdl->schemaTargetNamespace = $namespace;

$server->wsdl->addComplexType(
    'Artists',
    'complexType',
    'struct',
    'all',
    '',
    array(
      'Name'=>array('name'=> 'Name', 'type'=>'xsd:string'),
      'Surname'=>array('name'=>'Surname', 'type'=>'xsd:string'),
      'Image'=>array('name'=>'Image', 'type'=>'xsd:string')
    )
);

$server->wsdl->addComplexType(
    'Artist',
    'complexType',
    'struct',
    'all',
    '',
    array(
      'Name'=>array('name'=>'Name', 'type'=>'xsd:string'),
      'Surname'=>array('name'=>'Surname', 'type'=>'xsd:string'),
      'Image'=>array('name'=>'Image', 'type'=>'xsd:string'),
      'Biography'=>array('name'=>'Biography', 'type'=>'xsd:string')
    )
);

$server->wsdl->addComplexType(
      'ArtistName',
      'complexType',
      'struct',
      'all',
      '',
      array(
        'Name'=>array('name'=>'Name', 'type'=>'xsd:string'),
        'Surname'=>array('name'=>'Surname', 'type'=>'xsd:string')
      )
);

$server->wsdl->addComplexType(
      'ArtistInsert',
      'complexType',
      'struct',
      'all',
      '',
      array(
        'ArtistId'=>array('name'=>'ArtistId', 'type'=>'xsd:string'),
        'Name'=>array('name'=>'Name', 'type'=>'xsd:string'),
        'Surname'=>array('name'=>'Surname', 'type'=>'xsd:string'),
        'Image'=>array('name'=>'Image', 'type'=>'xsd:string'),
        'Biography'=>array('name'=>'Biography', 'type'=>'xsd:string')
      )
);

$server->wsdl->addComplexType(
    'ArtistsArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:Artists[]')),
    'tns:Artists'
);

$server->wsdl->addComplexType(
    'ArtistArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:Artist[]')),
    'tns:Artist'
);

$server->wsdl->addComplexType(
    'ArtistNameArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:ArtistName[]')),
    'tns:ArtistName'
);

$server->register(
'GetArtists',
array(),
array('return'=>'tns:ArtistsArray'),
$namespace,
false,
'rpc',
false,
'Return all artisti in db'
);

$server->register(
'GetArtist',
array('artistid'=>'xsd:string'),
array('return'=>'tns:ArtistArray'),
$namespace,
false,
'rpc',
false,
'Return an artist form artistid'
);

$server->register(
'GetArtistName',
array('artistid'=>'xsd:string'),
array('return'=>'tns:ArtistNameArray'),
$namespace,
false,
'rpc',
false,
'Return the full name of an artist'
);

$server->register(
'PostArtist',
array('artist'=>'tns:ArtistInsert'),
array('return'=>'xsd:string'),
$namespace,
false,
'rpc',
false,
'Insert or update an artist'
);

// Get our posted data if the service is being consumed
// otherwise leave this data blank.
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA'])
                ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

$server->service($POST_DATA);
exit();
 ?>
