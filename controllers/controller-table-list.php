<?php 
if (!isset($_SESSION['user'])) {
    header("Location: connection.php");
  exit;  
}

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/patient.php';

if(isset($_GET['patients_id'])) {
  echo 'delete patient';
  $attributDel = new Patients();
  $patientsDel = $attributDel->deletePatient($_GET['patients_id']);
}

$attribut = new Patients();
$patients = $attribut->returnPatient();

