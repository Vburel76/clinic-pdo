<?php 
if (!isset($_SESSION['user'])) {
    header("Location: connection.php");
  exit;  
}

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/patient.php';
require_once '../models/doctor.php';
require_once '../models/medicalspecialities.php';
require_once '../models/user.php';

if(isset($_GET['doctors_id'])) {
  
  $attributDel = new Doctors();
  $doctorDel = $attributDel->deleteDoctor($_GET['doctors_id']);

  $attributUserDel = new Users();
  $userDel = $attributUserDel->deleteUser($_GET['doctor_mail']);
}

$attribut = new Doctors();

$doctors = $attribut->returnDoctor();