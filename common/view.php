<?php namespace common;

// Used to redirect to the given url
class View
{
	//First signature, because we may have some renders (without parameters)
	public static function show($view){
		$url = "/Project_MongoDB/view/$view.php";
		header('Location:'.$url);
	}

	//Second signature, because some pages will produce parameters
	public static function show($view, $data)
	{
		//Define the number of parameters
		$nb_param = count($data);
		$index = 0;
		$params = "";
		//Loop through all data
		foreach ($data as $key => $value) {
			$index ++;
			// Create parameters for the url
			$params .= "$key=$value&";
		}

		//Update the requested url with the right parameters
		$url = "/Project_MongoDB/view/$view.php?$params";
		//Redirect
		header('Location:'.$url);
	}
}

?>
