<?php
function getAllGenres()
{
	$conn = getConnection();
	$query = "SELECT * FROM genres";
	$resultset = $conn->query($query);
	$genres=[];
	while ($genre = $resultset->fetch()) {
	    $genres[] = $genre;
	}
	closeConnection($conn);
	return $genres;
}
