<?php
require "config.php";
use \MongoDB\BSON\ObjectID as MongoId;

$libellefrancais = htmlspecialchars($_REQUEST['libellefrancais']);
$adresse = htmlspecialchars($_REQUEST['adresse']);
$espece = htmlspecialchars($_REQUEST['espece']);
$hauteurenm = htmlspecialchars($_REQUEST['hauteurenm']);

$updateObj = new stdClass;
$updateObj->{"fields.libellefrancais"} = $libellefrancais;
$updateObj->{"fields.adresse"} = $adresse;
$updateObj->{"fields.espece"} = $espece;
$updateObj->{"fields.hauteurenm"} = $hauteurenm;
$doc = [
"_id" => new MongoDB\BSON\ObjectID(),
"fields.libellefrancais" => $libellefrancais,
"fields.adresse" => $adresse,
"fields.espece" => $espece,
"fields.hauteurenm" => $hauteurenm
];

$insRec = new MongoDB\Driver\BulkWrite;

$insRec->insert($doc);

try{

$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

$result = $manager->executeBulkWrite('hitema-mlab.paname', $insRec, $writeConcern);

if($result->getModifiedCount()){
  echo json_encode(array(
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
