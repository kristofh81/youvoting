<?php

require 'model/Poll.php';

// create function for input sanitation
function sanitize($string){
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}


$formarray = array();
	
	// request method test && questions field set
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["questions"])) {
		
		//make uniq code for db and formarray
		$formarray[ 'formid' ] = uniqid();
		
		$title = sanitize($_POST["title"]);
		$formarray[ 'title' ] = $title;
		
		//checks image post and puts in formarray
		if (isset($_POST[ 'image' ])){
			$image = sanitize($_POST["image"]);
			$formarray[ 'image' ] = $image;
		} else { $formarray[ 'image' ] = "0";}

		// chech questions array post and put in formarray
		if (isset($_POST[ 'questions' ])){
		$arrayquestions = $_POST["questions"];

		foreach ($arrayquestions as $key => $value) {
			sanitize($value);
			$formarray['question'.($key+1)] = $value;
		}
		} else { echo "no questions has been input" ;}

		// create the object POLL to handle the data in formarray
		$object = new Poll();

		$object->storeData($formarray);
		
		
		//put uniqid in json db and in url for recup
		$formid = $formarray[ 'formid' ];
		$redirect = "index.php?success";

		// after storing all in json db redirect to index with get vars
		header('Location:' . $redirect . '&formid='. $formid);
			
	}





?>