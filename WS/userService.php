<?php
require_once('/lib/nusoap.php');
require_once('userFunction.php');



$namespace = 'http://localhost:8081/ws';

$server = new soap_server();

$server->configureWsdl("UserService");

$server->wsdl->schemaTargetNamespace = $namespace;

$server->wsdl->addComplexType(
    'User',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Username' => array('name'=>'Username','type'=>'xsd:string'),
        'Password' => array('name'=>'Password','type'=>'xsd:string'),
        'PasswordSalt' => array('name'=>'PasswordSalt','type'=>'xsd:string')
    )
);

$server->wsdl->addComplexType(
    'UserCredential',
    'complexType',
    'struct',
    'all',
    '',
    array(
          'UserId'=>array('name'=>'UserId', 'type'=>'xsd:string'),
          'Username'=>array('name'=>'Username', 'type'=>'xsd:string'),
          'Password'=>array('name'=>'Password', 'type'=>'xsd:string'),
          'PasswordSalt'=>array('name'=>'PasswordSalt', 'type'=>'xsd:string')
    )
);

$server->wsdl->addComplexType(
'userid',
'complexType',
'struct',
'all',
'',
array('UserId'=>array('name'=>'UserId', 'type'=>'xsd:string'))
);

$server->wsdl->addComplexType(
  'passwordSalt',
  'complexType',
  'struct',
  'all',
  '',
  array('PasswordSalt'=>array('name'=>'PasswordSalt', 'type'=>'xsd:string'))
);

$server->wsdl->addComplexType(
    'Profile',
    'complexType',
    'struct',
    'all',
    '',
    array('ProfileId'=>array('name'=>'ProfileId', 'type'=>'xsd:string'),
          'Name'=>array('name'=>'Name', 'type'=>'xsd:string'),
          'Surname'=>array('name'=>'Surname', 'type'=>'xsd:string'),
          'Email'=>array('name'=>'Email', 'type'=>'xsd:string'),
          'Newsletter'=>array('name'=>'Newsletter', 'type'=>'xsd:boolean'),
          'UserId'=>array('name'=>'UserId', 'type'=>'xsd:string'),
          'AdressId'=>array('name'=>'AdressId', 'type'=>'xsd:string')
        )
);

$server->wsdl->addComplexType(
    'UserIdArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:userid[]')),
    'tns:userid'
);

$server->wsdl->addComplexType(
    'PasswordSaltArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:passwordSalt[]')),
    'tns:passwordSalt'
);

$server->wsdl->addComplexType(
    'UserArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:User[]')),
    'tns:User'
);

$server->wsdl->addcomplexType(
    'ProfileArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:Profile[]')),
    'tns:Profile'
);

$server->register(
// method name.
'processSimpleType',
// input pramater list.
array('name' => 'xsd:string'),
// return value(s).
array('return' => 'xsd:string'),
// namespace.
$namespace,
// soapaction: (use default).
false,
// style: rpc or document.
'rpc',
// use: encoded or literal.
false,
// description: documentation for the method.
'A simple Hello World method');

$server->register(
// method name.
'GetUserById',
// input pramater list.
array('userId' => 'xsd:string'),
// return value(s).
array('return' => 'tns:UserArray'),
// namespace.
$namespace,
// soapaction: (use default).
false,
// style: rpc or document.
'rpc',
// use: encoded or literal.
false,
// description: documentation for the method.
'Return User by id'
);

$server->register(
'GetAllUsers',
array(),
array('return'=>'tns:UserArray'),
$namespace,
false,
'rpc',
false,
'Return all users'
);

$server->register(
'GetUserId',
array('username'=>'xsd:string', 'password'=>'xsd:string'),
array('return'=>'tns:UserIdArray'),
$namespace,
false,
'rpc',
false,
'Return user id'
);

$server->register(
'GetUserIdFromProfile',
array('profileid'=>'xsd:string'),
array('return'=>'tns:UserIdArray'),
$namespace,
false,
'rpc',
false,
'Return user id from profile table'
);

$server->register(
'GetProfile',
array('userid'=>'xsd:string'),
array('return'=>'tns:ProfileArray'),
$namespace,
false,
'rpc',
false,
'Return the profile for a user'
);

$server->register(
'GetPasswordSalt',
array('username'=>'xsd:string'),
array('return'=>'tns:PasswordSaltArray'),
$namespace,
false,
'rpc',
false,
'Return the password salt (to encrypt the password and check login the user)'
);

$server->register(
'PutPassword',
array('Password'=>'xsd:string', 'PasswordSalt'=>'xsd:string', 'UserId'=>'xsd:string'),
array('return'=> 'xsd:int'),
$namespace,
false,
'rpc',
false,
'Set a new password for an existing user'
);

$server->register(
'PutEmail',
array('ProfileId'=>'xsd:string', 'Email'=>'xsd:string'),
array('return'=> 'xsd:int'),
$namespace,
false,
'rpc',
false,
'Set email for an existing user'
);

$server->register(
'PostUser',
array('usercredential'=>'tns:UserCredential'),
array('return'=> 'xsd:string'),
$namespace,
false,
'rpc',
false,
'Insert a new User'
);

$server->register(
'PostProfile',
array('profile'=>'tns:Profile'),
array('return'=> 'xsd:string'),
$namespace,
false,
'rpc',
false,
'Insert a profile (after user registration)'
);

// Get our posted data if the service is being consumed
// otherwise leave this data blank.
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA'])
                ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

$server->service($POST_DATA);
exit();
 ?>
