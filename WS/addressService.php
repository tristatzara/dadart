<?php
  require_once('/lib/nusoap.php');
  require_once('addressFunction.php');

  $namespace = 'http://localhost:8081/ws';

  $server = new soap_server();

  $server->configureWsdl("AddressService");

  $server->wsdl->schemaTargetNamespace = $namespace;

  $server->wsdl->addComplexType(
      'Address',
      'complexType',
      'struct',
      'all',
      '',
      array(
        'Address'=>array('name'=>'Address', 'type'=>'xsd:string'),
        'Address2'=>array('name'=>'Address2', 'type'=>'xsd:string'),
        'City'=>array('name'=>'City', 'type'=>'xsd:string'),
        'Zip'=>array('name'=>'Zip', 'type'=>'xsd:string'),
        'State'=>array('name'=>'State', 'type'=>'xsd:string')
      )
  );

  $server->wsdl->addComplexType(
        'AddressInsert',
        'complexType',
        'struct',
        'all',
        '',
        array(
          'AddressId'=>array('name'=>'AddressId', 'type'=>'xsd:string'),
          'Address'=>array('name'=>'Address', 'type'=>'xsd:string'),
          'Address2'=>array('name'=>'Address2', 'type'=>'xsd:string', null),
          'City'=>array('name'=>'City', 'type'=>'xsd:string'),
          'Zip'=>array('name'=>'Zip', 'type'=>'xsd:string'),
          'State'=>array('name'=>'State', 'type'=>'xsd:string')
        )
  );

  $server->wsdl->addComplexType(
      'AddressArray',
      'complexType',
      'array',
      '',
      'SOAP-ENC:Array',
      array(),
      array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:Address[]')),
      'tns:Address'
  );

  $server->register(
  'GetAllAddress',
  array(),
  array('return'=>'tns:AddressArray'),
  $namespace,
  false,
  'rpc',
  false,
  'Return all addresses'
  );

  $server->register(
  'GetAddress',
  array('addressId'=>'xsd:string'),
  array('return'=>'tns:AddressArray'),
  $namespace,
  false,
  'rpc',
  false,
  'Return an addres (by addressId)'
  );

  $server->register(
  'GetAddressProfile',
  array('profileid'=>'xsd:string'),
  array('return'=>'tns:AddressArray'),
  $namespace,
  false,
  'rpc',
  false,
  'Return an address (by profileId)'
  );

  $server->register(
  'PostAddress',
  array('address'=>'tns:AddressInsert'),
  array('return'=>'xsd:string'),
  $namespace,
  false,
  'rpc',
  false,
  'Insert a new address or, if exist, update it'
  );

  // Get our posted data if the service is being consumed
  // otherwise leave this data blank.
  $POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA'])
                  ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

  $server->service($POST_DATA);
  exit();
 ?>
