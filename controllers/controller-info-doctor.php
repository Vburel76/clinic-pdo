<?php 
if (!isset($_SESSION['user'])) {
    header("Location: connection.php");
  exit;  
}


require_once '../config.php';
require_once '../models/database.php';
require_once '../models/doctor.php';
require_once '../models/medicalspecialities.php';

if(isset($_GET['patients_id'])) {
  echo 'delete patient';
  $attributDel = new Patients();
  $patientsDel = $attributDel->deletePatient($_GET['patients_id']);
}


$attribut = new Doctors();
$doctor = $attribut->returnOneDoctor($_GET['doctors']);


