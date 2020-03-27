<?php
require __DIR__ . '/vendor/autoload.php';

$container =  new \Slim\Container([]);

$app = new \Slim\App($container);

//ENDPOINT
$app->get('/agenda', function($request, $response, $args){
  //values -> (phone, birthday)
  $params = $request->getParams();

  $array_main = [
    'Juan' => ['phone' => '5555', 'birthday' => 'Julio'],
    'Cristian' => ['phone' => '1111', 'birthday' => 'Agosto'],
    'Ana' => ['phone' => '2222', 'birthday' => 'Mayo'],
    'Miguel' => ['phone' => '3333', 'birthday' => 'Enero']
  ];

  $array_return = [
    'status' => FALSE,
    'message' => 'Invalid query params',
    'data' => []
  ];

  if(array_key_exists('name', $params)){
    $name = ucfirst(mb_strtolower($params['name']));
    $array_return['message'] = "You search $name";
    if(array_key_exists($name, $array_main)){
      $array_return['status'] = TRUE;
      $array_return['data'] = $array_main[$name];
    }
  }

  return $response->withJson($array_return);
});

//ENDPOINT
$app->get('/clima', function($request, $response, $args){
  //values -> (city, weather)//$params = $request->getParams();
  $array = [
    ['city' => 'Mexico', 'weather' => '23'],
    ['city' => 'USA', 'weather' => '12'],
    ['city' => 'Italia', 'weather' => '7'],
    ['city' => 'Francia', 'weather' => '8'],
  ];
  return $response->withJson($array);

});

$app->run();
