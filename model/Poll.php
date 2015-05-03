<?php

/**
* Model Poll - I use only the makejson - makephp - storedata - getcontent methods in process.php and form-example.php
*/
class Poll
{

	public $title, $image, $question1, $question2;

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setQuestion($question)
	{
		$this->question = $question;
	}

	public function getTitle()
	{
		return $this->title;
	}



	// converts php into json
	public function makeJson($data)
	{
		$dataJson = json_encode($data, JSON_PRETTY_PRINT);
		return $dataJson;
	}

	// converts json into php array
	public function makePhp($data)
	{
		$arrayPhp = json_decode($data, TRUE);
		return $arrayPhp;
	}

	// stores json string into data directory
	public function storeData($formdata)
	{

	
	$filejson = 'data/polldata.json';

    $arr_data = array();        // to store all form data

    // check if the file exists
    if(file_exists($filejson)) {

      $jsondata = file_get_contents($filejson);

      $arr_data = json_decode($jsondata, true);
    }

    // appends the array with new form data
    $arr_data[] = $formdata;

    

    // encodes the array into a string in JSON format
    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);


    // outputs error message if data cannot be saved
    if(file_put_contents('data/polldata.json', $jsondata)) echo 'Data successfully saved';
    else echo 'Unable to save data in "data directory"';
  }

  	public function getContent()
  	{
  		$filejson = 'data/polldata.json';
  		$jsondata = file_get_contents($filejson);

  		$object = new Poll();
  		return $object->makePhp($jsondata);
  	}
}

?>