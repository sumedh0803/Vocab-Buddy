<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->parameters->word;

	$word = array("Abate",
				  "Aberrant",
				  "Abeyance",
				  "Abscond",
				  "Abstemious");
	$meaning = array("Subside or moderate",
					 "Abnormal or deviant",
					 "Suspended action",
					 "Depart secretly and hide",
					 "Moderate in eating and drinking; temparate in diet");
	$random = rand(0,sizeof($word)-1);
	$speech = $word[$random]." : ".$meaning[$random];

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>