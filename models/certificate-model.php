<?php
function getAllCertificates()
{
	$conn = getConnection();
	$query = "SELECT * FROM certificates";
	$resultset = $conn->query($query);
	$certificates=[];
	while ($certificate = $resultset->fetch()) {
	    $certificates[] = $certificate;
	}
	closeConnection($conn);
	return $certificates;
}
