<?php 
if (!isset($_SESSION['user'])) {
    header("Location: connection.php");
  exit;  
}

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/patient.php';

$attribut = new Patients();

$patients = $attribut->returnPatient();
