<?php
require_once("db.php");
require_once("models/film-model.php");

//TODO form validation
$title=$_POST['title'];
$year=$_POST['year'];
$duration=$_POST['duration'];
$certId=$_POST['certificate'];
$genreIds=$_POST['genres'];

$filmId = insertFilm($title, $year, $duration, $certId);

foreach($genreIds as $genreId)
{
	addGenreForFilm($filmId,$genreId);	
}

$pageTitle="Insert new film";
include("views/insert-view.php");
?>
