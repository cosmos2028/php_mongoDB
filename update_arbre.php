<?php
require "config.php";
use \MongoDB\BSON\ObjectID as MongoId;

$objectid = $_REQUEST['objectid'];
$libellefrancais = htmlspecialchars($_REQUEST['libellefrancais']);
$adresse = htmlspecialchars($_REQUEST['adresse']);
$espece = htmlspecialchars($_REQUEST['espece']);
$hauteurenm = htmlspecialchars($_REQUEST['hauteurenm']);

$result = array();

$insRec = new MongoDB\Driver\BulkWrite;

$insRec->update(
  ['_id'=>new MongoDB\BSON\ObjectID("$objectid")],
  ['$set' =>[
    'filters.objectid' => $objectid,
    'filters.libellefrancais' =>$libellefrancais,
    'filters.adresse'=>$adresse,
    'filters.espece'=>$espece,
    'filters.hauteurenm'=>$hauteurenm
            ]
  ],
  [
    'multi' => false, 'upsert' => false
  ]
);

$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

$result = $manager->executeBulkWrite('hitema-mlab.paname', $insRec, $writeConcern);

if($result->getModifiedCount()){
  echo json_encode(array(
		'objectid' => $objectid,
		'libellefrancais' => $libellefrancais,
		'adresse' => $adresse,
		'espece' => $espece,
		'hauteurenm' => $hauteurenm
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
