<?php
require "config.php";

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
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

$skip = ($page -1) * $rows;

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

	foreach($cursor as $k => $row){
    	array_push($items, $row->fields);
      //print_r($result[$k]->fields);
	}
  $result["rows"] = $items;

	echo json_encode($result);

?>
