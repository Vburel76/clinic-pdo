<?php
if (!isset($_SESSION['user'])) {
    header("Location: connection.php");
    exit;
}

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/patient.php';



$showForm = true;
$error = [];
$regexName = "/^[a-zA-Zéèêë]+$/";
$regexPhone = "/^[0-9]{10}+$/";



// je declenche mes vérifications lorsque j'appui sur le bouton validé car ça declenche un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['lastname'])) {

        if ($_POST['lastname'] == '') {
            $error['lastname'] = "champ obligatoire";
        } else if (!preg_match($regexName, $_POST['lastname'])) {
            $error['lastname'] = "Mauvais format";
        }
    }


    if (isset($_POST['firstname'])) {

        if ($_POST['firstname'] == '') {
            $error['firstname'] = "champ obligatoire";
        }
    }

    if (isset($_POST['mobile'])) {

        if ($_POST['mobile'] == '') {
            $error['mobile'] = "champ obligatoire";
        } else if (!preg_match($regexPhone, $_POST['mobile'])) {
            $error['mobile'] = "Mauvais format";
        }
    }


    if (isset($_POST['mail'])) {

        if ($_POST['mail'] == '') {
            $error['mail'] = "champ obligatoire";
        } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $error['mail'] = "Mauvais format";
        }
    }

    if (isset($_POST['adresse'])) {

        if ($_POST['adresse'] == '') {
            $error['adresse'] = "champ obligatoire";
        }
    }

    // nous allons créer un patient dans la table 'patients'
    if (count($error) == 0) {

        // Je stock les valeurs des inputs dans des variables en effectuant un htmlspecialchars afin de m'assurer que les données soient safe
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $phoneNumber = htmlspecialchars($_POST['mobile']);
        $address = htmlspecialchars($_POST['adresse']);
        $mail = htmlspecialchars($_POST['mail']);
        $patientid = htmlspecialchars($_POST['patientId']);

        $patientsModif = new Patients();

        $patientsModif->modifPatient($lastname, $firstname, $phoneNumber, $address, $mail, $patientid);
    }
}
$patientsObj = new Patients();

$infoPatient = $patientsObj->returnOnePatient($_GET['patientId']);

var_dump($infoPatient);
