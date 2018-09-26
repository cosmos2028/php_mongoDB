<?php
include_once('dao/mongoDB.php');
use dao\MongoDBSingleton;

error_reporting(E_ALL & ~E_NOTICE);
//We set our start view
$mongoDB = MongoDBSingleton::getMongoConnection();

var_dump($mongoDB);
$start_view = 'arbres_search';
//We verifiy if a view is already set and store it, otherwise we define it at empty
$view = (isset($_GET['view'])) ? $_GET['view'] : "";
if(!empty($view)){
  //We get the first result as the controler name
  $controller = explode("_", $view)[0];
  //We get the second result as an action
  $action = explode("_", $view)[1];
    header('Location:/Project_MongoDB/controller/'.$controller.'.php?action='.$action);
} else {
  $controller = explode("_", $start_view)[0];
  $action = explode("_", $start_view)[1];
    header('Location:/Project_MongoDB/controller/'.$controller.'.php?action='.$action);
}
