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
$stmt = $conn->prepare("SELECT * FROM visitor WHERE ipAddress = ?");
$stmt->bind_param("s", $ip_client);

$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

echo "Resultat trouve";

if(isset($row))
{
	if(isset($row["lastUpdate"]))
	{
		
	}
}

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
  