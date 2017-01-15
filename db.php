<?php

function getConnection(){
	try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
	}
	catch (PDOException $exception) 
	{
		exit("Oh no, there was a problem" . $exception->getMessage());
	}
	return $conn;
}

function closeConnection($conn)
{
	$conn=null;
}

?>