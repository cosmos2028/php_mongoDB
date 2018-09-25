<?php namespace controller;

include_once('../common/view.php');
include_once('../entity/arbre.php');

use common\View;
//use entity\arbre;

// We verify the action first and set it as it should be set by the parameter [GET]
if(isset($_GET['action']))
{
	$action = $_GET['action'];
	ArbresController::$action($_GET);
}

// We verify the action first and set it as it should be set by the parameter [POST]
if(isset($_POST['action']))
{
	$action = $_POST['action'];
	ArbresController::$action($_POST);
}

class ArbresController
{
	public static function search($req)
	{

	$list = serialize(["test","test","test"]);
  View::show('arbre_search', array('data' => urlencode($list)));
	}

  //CREATE BASE
	public static function create($req)
	{
	}

  //READ BASE
	public static function read($req)
	{
	}

  //UPDATE BASE
	public static function update($req)
	{
	}

  //DELETE BASE
	public static function delete($req)
	{
	}

}

 ?>
