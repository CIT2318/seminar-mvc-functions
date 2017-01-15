<?php
function insertFilm($title,$year,$duration,$certId)
{
	$conn = getConnection();
	$query="INSERT INTO films (id, title, year, duration, certificate_id) VALUES (NULL, :title, :year, :duration, :certificate_id)";
	$stmt=$conn->prepare($query);
	$stmt->bindValue(':title', $title);
	$stmt->bindValue(':year', $year);
	$stmt->bindValue(':duration', $duration);
	$stmt->bindValue(':certificate_id', $certId);
	$stmt->execute();
	$filmId=$conn->lastInsertId();
	closeConnection($conn);
	return $filmId;
}

function addGenreForFilm($filmId,$genreId)
{
	$conn = getConnection();
	$query="INSERT INTO film_genre (film_id,genre_id) VALUES (:filmId,:genreId)";
	$stmt=$conn->prepare($query);
	$stmt->bindValue(':filmId',$filmId);
	$stmt->bindValue(':genreId',$genreId);
	$affected_rows = $stmt->execute();	
	closeConnection($conn);
	return $affected_rows;
}