<?php 
if (!isset($_SESSION['user'])) {
    header("Location: connection.php");
  exit;  
}

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/patient.php';
require_once '../models/user.php';
require_once '../models/medicalspecialities.php';
require_once '../models/doctor.php';
require_once '../models/consultation.php';

$showForm = true;
$errors = [];
$regexName = "/^[a-zA-Zéèêë]+$/";



$patientsObj = new Patients();
$patientsArray = $patientsObj->getAllpatient();

$doctorsObj = new Doctors();
$doctorsArray = $doctorsObj->getAlldoctors();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['myDate'])) {
    
        if ($_POST['myDate'] == '') {
            $errors['myDate'] = "champ obligatoire";
        } 
    }
    
    
    if (isset($_POST['myHour'])) {
    
        if ($_POST['myHour'] == '') {
            $errors['myHour'] = "champ obligatoire";
        }
    }
    
    if (isset($_POST['motif'])) {
    
        if ($_POST['motif'] == '') {
            $errors['motif'] = "champ obligatoire";
        } else if (preg_match($regexName, $_POST['motif'])) {
            $errors['motif'] = "Mauvais format";
        }
    }

    if (count($errors) == 0) {

        // Je stock les valeurs des inputs dans des variables en effectuant un htmlspecialchars afin de m'assurer que les données soient safe
        $date = htmlspecialchars($_POST['myDate']);
        $hour = htmlspecialchars($_POST['myHour']);
        $description = htmlspecialchars($_POST['motif']);
        $patientsid = htmlspecialchars($_POST['selectPatient']);
        $doctorid = htmlspecialchars($_POST['selectDocteur']);
       
    
    
        // j'instancie un objet $patientsObj avec la class Patients
        $doctorObj = new Meeting();


    
        
        // Je fais appelle à la méthode addPatient pour ajouter mon patient : Attention bien respecter l'ordre des paramètres
        $doctorObj->addRendezvous( $date ,$hour, $description, $patientsid, $doctorid);
    
        
        // Si tout est ok, nous retournons sur une page données
        header('Location: dashboard.php');
    }
}