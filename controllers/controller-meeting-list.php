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
require_once '../models/consultation.php';

$attribut = new Meeting();

$consult = $attribut->returnMeeting();