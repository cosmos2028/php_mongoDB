<?php
require "config.php";
use \MongoDB\BSON\ObjectID as MongoId;

$_id = $_REQUEST['_id'];

$delRecTheRecord = new MongoDB\Driver\BulkWrite;
$delRecTheRecord->delete(['_id' =>new MongoDB\BSON\ObjectID($_id)], ['limit' => 1]);
$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
$result = $manager->executeBulkWrite('hitema-mlab.paname', $delRecTheRecord, $writeConcern);

   if($result->getDeletedCount()){
   	echo json_encode(array('success'=>true));
   } else {
   	echo json_encode(array('errorMsg'=>'Some errors occured.'));
   }
?>
