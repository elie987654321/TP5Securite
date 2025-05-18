<?php
date_default_timezone_set('America/New_York');
session_start();

$acces = true;
$ip_client = $_SERVER["REMOTE_ADDR"]; //Adresse IP du client effectuant la requête.
$limit = 1;		//Nombre de connexions autorisé par $minutes. (vous pouvez le modifier)
$minutes = 1;	//Nombre de $minutes pour la vérification. (vous pouvez le modifier)

//**********Implémenter votre logique ICI*************/



$conn = new mysqli("localhost", "root", "", "ddos");
echo $ip_client;
$sql = "SELECT * FROM visitor WHERE ipAddress = \"" . $ip_client . "\"";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

if($row)
{		
	if(isset($row['lastUpdate']))
	{
		echo $row['lastUpdate'];
		echo gettype($row['lastUpdate']);
		$timeStamp = strtotime($row["lastUpdate"]);
		$secondsSinceLastUpdate = time() - $timeStamp ;
		if($secondsSinceLastUpdate < $minutes * 60)
		{
			
			$stmt = $conn->prepare("UPDATE visitor SET connSinceLastUpdate = ? WHERE id = ?");
			
			$newCount = $row['connSinceLastUpdate'] + 1;
			$stmt->bind_param("ii", $newCount, $row["id"]);

			$stmt->execute();
		}
	}
}

/*
if(empty($row))
{
	echo "Entré bd trouve";
	/*if(isset($row['id']))
	{
		echo "bonjour";
		echo $row['id'];
	}
	else
	{
		echo "Pas de derniere update";
	}
}*/

	/*if(isset($data['lastUpdate']))
	{
		echo "Derniere update :" . $data['lastUpdate'];
	}
	else
	{
		echo "Pas de derniere update";
	}*/


//TODO METTRE VOTRE CODE

//****************************************************/






//**********************NE PAS TOUCHER À CE CODE***********************/
//Si trop de requête on affiche ceci
if (!$acces)
{
	header("HTTP/1.1 429 Too Many Requests");
	$data = 'Vous avez atteint la limite';
	die (json_encode($data));
}
else{ //Sinon on affiche ceci
	
	
	$number = 35; 
	for ($counter = 0; $counter < $number; $counter++){   
		Fibonacci($counter); 
	} 

	$data = "Vous avez accès";
	header('Content-Type: application/json');
	die(json_encode($data)); 

}


//NE PAS TOUCHER À CE CODE
function Fibonacci($number){ 
      
	// if and else if to generate first two numbers 
	if ($number == 0) 
		return 0;     
	else if ($number == 1) 
		return 1;     
	  
	// Recursive Call to get the upcoming numbers 
	else
		return (Fibonacci($number-1) +  
				Fibonacci($number-2)); 
} 
//****************************************************************/
  