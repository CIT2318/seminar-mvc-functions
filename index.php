<!DOCTYPE html>
<html>
<head>
	<title>MVC Seminar</title>
</head>
<body>
<?php
try{
   $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
}
catch (PDOException $exception) 
{
	exit("Oh no, there was a problem" . $exception->getMessage());
}

$query = "SELECT * FROM certificates";
$resultset = $conn->query($query);
$certificates=[];
while ($certificate = $resultset->fetch()) {
    $certificates[] = $certificate;
}
?>

<h1>Add a new film</h1>

<form action="insert.php" method="post">
<div>
<label for="title">Title:</label>
<input type="text" id="title" name="title">
</div>
<div>
<label for="year">Year:</label>
<input type="text" id="year" name="year">
</div>
<div>
<label for="duration">Duration:</label>
<input type="text" id="duration" name="duration">
<div>
<label for="certificate">Certificate</label>
<select id='certificate' name='certificate'>
<?php
foreach($certificates as $certificate){
	echo "<option value='".$certificate["id"]."'>".$certificate["name"]."</option>";
}
?>
</div>
</select>
<?php
$query = "SELECT * FROM genres";
$resultset = $conn->query($query);
$genres=[];
while ($genre = $resultset->fetch()) {
    $genres[] = $genre;
}
?>
<fieldset>
<legend>Select genres</legend>
<?php
foreach ($genres as $genre) {
	echo "<div>";
    echo "<input type='checkbox' name='genres[]' id='genre-".$genre["id"]."' value='".$genre["id"]."'>";
    echo "<label for='genre-".$genre["id"]."'>".$genre["name"]."</label>";
    echo "</div>";
}
?>
<input type='submit' name='submitBtn' value='Add new film'>
</form>
</body>
</html>