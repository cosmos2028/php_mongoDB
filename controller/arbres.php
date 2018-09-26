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
	private $pwd = "Azerty01";
	private $user = "hitema-mlab";
	private $_instance = NULL;

	public static function search($req)
	{
		/*try {

    $mng = new MongoDB\Driver\Manager("mongodb://${user}:${pwd}@ds113923.mlab.com:13923/hitema-mlab");

    $stats = new MongoDB\Driver\Command(["dbstats" => 1]);
    $res = $mng->executeCommand("hitema-mlab", $stats);

    $stats = current($res->toArray());

    print_r($stats);

} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
}*/
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
