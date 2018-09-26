<?php namespace common;

// Used to redirect to the given url
class View
{
	
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
