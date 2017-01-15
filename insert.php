<!DOCTYPE html>
<html>
<head>
	<title>Insert film</title>
</head>
<body>
<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
//TODO form validation
$title=$_POST['title'];
$year=$_POST['year'];
$duration=$_POST['duration'];
$certId=$_POST['certificate'];
$query="INSERT INTO films (id, title, year, duration, certificate_id)
VALUES (NULL, :title, :year, :duration, :certificate_id)";
$stmt=$conn->prepare($query);
$stmt->bindValue(':title', $title);
$stmt->bindValue(':year', $year);
$stmt->bindValue(':duration', $duration);
$stmt->bindValue(':certificate_id', $certId);
$affected_rows = $stmt->execute();
$filmId=$conn->lastInsertId();
if($affected_rows==1){
	echo "<p>Successfully added the details for ".$title."</p>";
}else{
	echo "<p>There was a problem inserting the data.</p>";
	exit;
}

$genreIds=$_POST['genres'];
$query="INSERT INTO film_genre (film_id,genre_id) VALUES (:filmId,:genreId)";
$stmt=$conn->prepare($query);
$stmt->bindValue(':filmId',$filmId);

foreach($genreIds as $genreId)
{
	$stmt->bindValue(':genreId',$genreId);
	$stmt->execute();	
}
$conn=NULL;

?>
</body>
</html>