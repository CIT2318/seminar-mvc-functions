
<?php
require_once("db.php");
require_once("models/certificate-model.php");
require_once("models/genre-model.php");
$certificates=getAllCertificates();
$genres=getAllGenres();
$pageTitle="Insert new film";
include("views/insert-form-view.php");
?>
