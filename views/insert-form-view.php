<?php
include("header.inc.php");
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

<?php
include("footer.inc.php");
?>