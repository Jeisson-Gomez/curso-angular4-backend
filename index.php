<?php

require_once 'vendor/autoload.php';
use \Slim\App;
$db = new mysqli('localhost', 'root', '', 'curso_angular4');
$app = new \Slim\App($app);

$app->get("/pruebas", function() use($app, $db){
    echo "Hola mundo desde Slim PHP";
});

$app->get("/pruebas", function() use($app){
    echo "Otro texto Cualquiera";
});

$app->post('/productos', function() use($app, $db){
    $json = $app->request->post('json');
    $data = json_decode($json, true);

    var_dump($json);
    var_dump($data);

    if(!isset($data['nombre'])){
        $data['nombre'] = NULL;
    }

    if(!isset($data['descripcion'])){
        $data['descripcion'] = NULL;
    }

    if(!isset($data['precio'])){
        $data['precio'] = NULL;
    }

    if(!isset($data['imagen'])){
        $data['imagen'] = null;
    }

    $query = "Insert Into productos values(NULL,".
            "'{$data['nombre']}'".
            "'{$data['descripcion']}'".
            "'{$data['precio']}'".
            "'{$data['imagen']}'".
            ")";
    
    $insert = $db->query($query);

    if($insert){
        $result = array(
            'status'    => 'error',
            'code'      => '404',
            'message'   => 'Producto No se ha creado'
        );
    }

    if($insert){
        $result = array(
            'status'    => 'success',
            'code'      => '200',
            'message'   => 'Producto creado correctamente'
        );
    }

    echo json_decode($result);
});

$app-> run();