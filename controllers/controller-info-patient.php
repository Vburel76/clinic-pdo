<?php 
if (!isset($_SESSION['user'])) {
    header("Location: connection.php");
  exit;  
}

var_dump($_GET);

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/patient.php';

$attribut = new Patients();

$patient = $attribut->returnOnePatient($_GET['patients']);


var_dump($patient);


