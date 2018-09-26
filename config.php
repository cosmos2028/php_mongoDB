<?php

$pwd = "Azerty01";
$user = "hitema-mlab";

$manager = new MongoDB\Driver\Manager("mongodb://${user}:${pwd}@ds113923.mlab.com:13923/hitema-mlab");

$messages = array(
 1=>'Record deleted successfully',
 2=>'Error occurred. Please try again',
 3=>'Record saved successfully',
 4=>'Record updated successfully',
 5=>'All fields are required' );
