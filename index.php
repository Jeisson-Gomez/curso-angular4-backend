<?php

require_once 'vendor/autoload.php';
use \Slim\App;

$app = new \Slim\App($app);

$app-> get("/pruebas", function() use($app){
    echo "Hola mundo desde Slim PHP";
});

$app-> get("/pruebas", function() use($app){
    echo "Otro texto Cualquiera";
});

$app-> run();