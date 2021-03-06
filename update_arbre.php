<?php
require "config.php";
use \MongoDB\BSON\ObjectID as MongoId;

$_id = $_REQUEST['_id'];
$objectid = $_REQUEST['objectid'];
$libellefrancais = htmlspecialchars($_REQUEST['libellefrancais']);
$adresse = htmlspecialchars($_REQUEST['adresse']);
$espece = htmlspecialchars($_REQUEST['espece']);
$hauteurenm = htmlspecialchars($_REQUEST['hauteurenm']);

$updateObj = new stdClass;
$updateObj->{"fields.objectid"} = $objectid;
$updateObj->{"fields.libellefrancais"} = $libellefrancais;
$updateObj->{"fields.adresse"} = $adresse;
$updateObj->{"fields.espece"} = $espece;
$updateObj->{"fields.hauteurenm"} = $hauteurenm;


$result = array();

$insRec = new MongoDB\Driver\BulkWrite;

$insRec->update(
  ['_id'=>new MongoDB\BSON\ObjectID("$_id")],
  ['$set' => $updateObj],
  ['multi' => false, 'upsert' => false]
);

try{

$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

$result = $manager->executeBulkWrite('hitema-mlab.paname', $insRec, $writeConcern);

if($result->getModifiedCount()){
  echo json_encode(array(
    '_id' => $_id,
		'objectid' => $objectid,
		'libellefrancais' => $libellefrancais,
		'adresse' => $adresse,
		'espece' => $espece,
		'hauteurenm' => $hauteurenm
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
}catch(Exception $ex){
  echo json_encode($ex->getMessage());
}
