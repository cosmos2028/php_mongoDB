
<?php
try {
	$user = "hitema-mlab";
	$pwd = "Azerty01";
	$manager = new MongoDB\Driver\Manager("mongodb://${user}:${pwd}@ds113923.mlab.com:13923/hitema-mlab");

	$filter= [];
	$option=[
		'sort'=>['_id' =>-1],
	];
	$query = new MongoDB\Driver\Query($filter,$option);
	$cursor = $manager->executeQuery('hitema-mlab.paname',$query);
	foreach ($cursor as $collection) {
		var_dump($collection);
	}
} catch (\Exception $e) {
	echo $e->getMessage(), "\n";
}

?>
