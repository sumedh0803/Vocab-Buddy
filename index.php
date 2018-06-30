<?php 
$method = $_SERVER['REQUEST_METHOD'];
// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody,true);
//	$temp = $json->queryResult->parameters->word;
	$temp = $json['result']['parameters']['word'][0];
//	echo $temp;
	
	if (strpos($temp,"word") !== false || strpos($temp,"random") !== false || strpos($temp,"new") !== false || strpos($temp,"another") !== false || strpos($temp,"yes") !== false || strpos($temp,"sure") !== false)
	{
	
		$word = array("Abate", "Aberrant", "Abeyance", "Abscond", "Abstemious", "Admonish", "Adultrate", "Asthetic",
				  "Aggregate", "Alacrity", "Alleviate", "Amalgamate", "Ambiguous", "Ambivalence", "Ameliorate", "Anarchonism","Analogous","Anarchy","Anomalous","Antipathy","Apathy","Appease","Apprise","Approbation","Appropriate","Arduous","Artless","Asectic","Assiduous","Assuage","Attenuate","Audacious","Austere","Autonomous","Aver","Banal","Belie","Beneficient","Bolster","Bombastic","Boorish","Burgeon","Burnish","Buttress","Cacophonous","Capricious","Castigation","Catalyst","Caustic","Chicanery","Coagulate","Coda","Cogent","Commensurate","Compendium","Complaisant","Compliant","Conciliatory","Condone","Confound","Connoisseur","Contention","Contentious","Contrite","Conundrum","Converge","Convoluted","Craven");
		$meaning = array("Subside or moderate", "Abnormal or deviant","Suspended action","Depart secretly and hide", "Moderate in eating and drinking; temparate in diet", "Warn, reprove", "To make impure by adding inferior subtances","Dealing with or capable of appreciating the beautiful", "Sum, total, gather, accumulate", "Cheerful promptness, eagerness", "Relieve", "Combine","Unclear and doubtful in meaning","State of having contradictory or conflicting emotional attitudes","Improve","Something or someone misplaced in time","Comparable","Absence of governing body, State of disorder","Abnormal, irrgular","Aversion, dislike","Lack of caring, indifference","Pacify, soothe","Inform","Approval","Acquire, take; take possession of something, for one\'s use","Hard; Strenous","Without guile; open and honest","Practicing self denial; austere","Diligent","Ease; lessen (pain)","Make thin; weaken","Daring; bold","Strict; stern","Self governing","State confidently","Hackneyed; Commonplace; Titre","Contradict; give a false impression","Kindly; doing good","Support; reinforce","Pompous; using inflated language","Rude; insensitive","Grow forth, send out buds","Make shiny by rubbing; polish","Support, prop up","Discordant, inharmonous","Fickle, incalculable","Punishment, severe criticism","Agent that brings about a chemical change while it remains unaffected","Burning, sarcastically biting","Trickery, deception","Thicken, clot","Concluding part of a musical or literary composition","Convincing","Equal in extent","Brief, comprehensive summary","trying to please, oblige","yielding","Reconciling, soothing","Overlook, forgive, excuse","Confuse, puzzle","Lover of art","Claim, thesis","Quarrelsome","Penitent, regretful","Riddle, difficult problem","Come together","Coiled around, involved, intricate","Cowardly");
		$random = rand(0,sizeof($word)-1);
		$speech = "Here's a word for you.\n\n".$word[$random].". It means, ".$meaning[$random]."\n\n\nDo you want a new word?";
	}
	else
	{
		$speech = "I didn't get that. Try saying \"Show me a random word\" OR \"I want to learn a new word\"";
	}
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
