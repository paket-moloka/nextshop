<?php
$db_ini = parse_ini_file('db.ini');
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='.$db_ini['host'].';dbname='.$db_ini['dbname'],
    'username' => $db_ini['username'],
    'password' => $db_ini['password'],
    'charset' => $db_ini['charset'],
];
