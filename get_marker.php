<?php
require "config.php";

$doc = new DOMDocument('1.0');
$doc->formatOutput=true;
$doc->standalone=true;
$doc->recover=true;

$root = $doc->createElement('markers');
$doc->appendChild($root);

$flag    = isset($_GET['flag'])?intval($_GET['flag']):0;
$message ='';

if($flag){

  $message = $messages[$flag];

}

$filter = [];

$options = [
      'limit' => 100,
      'sort' => ['_id' => -1],
];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('hitema-mlab.paname', $query);

// Add to XML document node
$items = array();
$result = array();
$result['count'] = "ok";
foreach($cursor as $k => $row){
  if(isset($row->fields)){
    $node = array();
    if(isset($row->fields->objectid)) $node["objectid"] = $row->fields->objectid;
    if(isset($row->fields->libellefrancais)) $node["libellefrancais"] = $row->fields->libellefrancais;
    if(isset($row->fields->adresse)) $node["adresse"] = $row->fields->adresse;
    if(isset($row->fields->espece)) $node["espece"] = $row->fields->espece;
    if(isset($row->fields->hauteurenm)) $node["hauteurenm"] = $row->fields->hauteurenm;
  foreach ($row as $key => $value) {
    if (isset($row->_id)) {
      $node["_id"] = (string)$row->_id;
    }
    if (isset($value->geo_point_2d[1])) {
      $node["lng"] = $value->geo_point_2d[1];
    }
    if (isset($value->geo_point_2d[0])) {
      $node["lat"] = $value->geo_point_2d[0];
    }
  }
    array_push($items,$node);
  }
}

//$result["rows"] = $items;
echo json_encode(array('rows'=>$items));
