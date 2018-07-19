<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=Yii_DB',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    'schemaCache' => 'cache',
    'schemaCacheDuration' => 60,

    // Schema cache options (for production environment)

    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
