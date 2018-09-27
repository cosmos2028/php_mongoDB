<?php
require "config.php";

//Pagination
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
//Search
$libellefrancais = isset($_POST['libellefrancais']) ? $_POST['libellefrancais'] : '';
$adresse = isset($_POST['adresse']) ? $_POST['adresse'] : '';
//ERRORS REPORTING
$flag    = isset($_GET['flag'])?intval($_GET['flag']):0;
$message ='';

if($flag){

  $message = $messages[$flag];

}

$filter = [];

$options = [
      'limit' => $rows,
      'sort' => ['_id' => -1],
];

$query = new MongoDB\Driver\Query($filter, $options);

$cursor = $manager->executeQuery('hitema-mlab.paname', $query);

$command = new MongoDB\Driver\Command(["count" => "paname"]);

try {
    // execute the command here on your database
    $result = $manager->executeCommand("hitema-mlab", $command);
    $res = current($result->toArray());
    $count = $res->n;
} catch (MongoDB\Driver\Exception\Exception $e) {

}

//Search  Purposes
$filter = [
  'fields.libellefrancais' => new \MongoDB\BSON\Regex($libellefrancais),
  'fields.adresse' => new \MongoDB\BSON\Regex($adresse)
];

$skip = ($page -1) * $rows;

//Pagination Purposes
$options = [
    'limit' => $rows,
    'sort' => ['_id' => -1],
    'skip' => $skip
];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('hitema-mlab.paname', $query);

	//$cursor = $collection->find();
	$items = array();
  $result = array();
  $result["total"] = $count;
  $objectIds = array();
  $startNode = array();
  $pushed_array = array();
  $nodeParrent = array();
	foreach($cursor as $k => $row){
    $node = array();
    $node["objectid"] = $row->fields->objectid;
    $node["libellefrancais"] = $row->fields->libellefrancais;
    $node["adresse"] = $row->fields->adresse;
    $node["espece"] = $row->fields->espece;
    $node["hauteurenm"] = $row->fields->hauteurenm;
    foreach ($row as $key => $value) {
      $node["_id"] = (string)$row->_id;
    }
      array_push($items,$node);
	}

  $result["rows"] = $items;
	echo json_encode($result);

?>
