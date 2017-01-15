
<?php
include("header.inc.php");
echo "<h1>Add new film</h1>";
if($filmId){
	echo "<p>Successfully added the details for ".$title."</p>";
}else{
	echo "<p>There was a problem inserting the data.</p>";
}
include("footer.inc.php");
?>