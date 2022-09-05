<?php
if (!isset($_SESSION['user'])) {
    header("Location: connection.php");
    exit;
}

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/doctor.php';
require_once '../models/medicalspecialities.php';



$showForm = true;
$error = [];
$regexName = "/^[a-zA-Zéèêë]+$/";
$regexPhone = "/^[0-9]{10}+$/";

$medicalspecialitiesObj = new Medicalspecialities();
$specialitiesArray = $medicalspecialitiesObj->getAllMedicalSpecialities();





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

    if (isset($_POST['adresse'])) {

        if ($_POST['adresse'] == '') {
            $error['adresse'] = "champ obligatoire";
        }
    }

    // nous allons créer un patient dans la table 'patients'
    if (count($error) == 0) {

        // Je stock les valeurs des inputs dans des variables en effectuant un htmlspecialchars afin de m'assurer que les données soient safe
        $nameDoc = htmlspecialchars($_POST['nameDoctor']);
        $firstnameDoc = htmlspecialchars($_POST['firstnameDoctor']);
        $phoneNumberDoc = htmlspecialchars($_POST['mobileDoctor']);
        $mailDoc = htmlspecialchars($_POST['mailDoctor']);
        $specialitiesDoc = htmlspecialchars($_POST['select']);
        $doctorsid = htmlspecialchars($_POST['doctorsId']);

        $doctorsModif = new Doctors();

        $doctorsModif->modifDoctor($nameDoc, $firstnameDoc, $phoneNumberDoc,$mailDoc,$specialitiesDoc,$doctorsid);
    }
}
$doctorsObj = new Doctors();

$infodoctors = $doctorsObj->returnOneDoctor($_GET['doctors']);




