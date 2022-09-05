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

$showForm = true;
$errors = [];
$regexName = "/^[a-zA-Zéèêë]+$/";
$regexPhone = "/^[0-9]{10}+$/";


$medicalspecialitiesObj = new Medicalspecialities();
$specialitiesArray = $medicalspecialitiesObj->getAllMedicalSpecialities();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['firstname'])) {

        if ($_POST['firstname'] == '') {
            $errors['firstname'] = "champ obligatoire";
        } else if (!preg_match($regexName, $_POST['firstname'])) {
            $errors['firstname'] = "Mauvais format";
        }
    }


    if (isset($_POST['lastname'])) {

        if ($_POST['lastname'] == '') {
            $errors['lastname'] = "champ obligatoire";
        }
    }

    if (isset($_POST['mobile'])) {

        if ($_POST['mobile'] == '') {
            $errors['mobile'] = "champ obligatoire";
        } else if (!preg_match($regexPhone, $_POST['mobile'])) {
            $errors['mobile'] = "Mauvais format";
        }
    }


    if (isset($_POST['mail'])) {

        if ($_POST['mail'] == '') {
            $errors['mail'] = "champ obligatoire";
        } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = "Mauvais format";
        }
    }

    if (isset($_POST['password'])) {

        if ($_POST['password'] == '') {
            $errors['password'] = "champ obligatoire";
        } else if ($_POST['confirmPassword'] == '' &&  $_POST['password'] != '') {
            $errors['confirmPassword'] = 'champ obligatoire';
        } else if ($_POST['confirmPassword'] != $_POST['password']) {
            $errors['password'] = "mot de passe différent";
        }
    }

    // nous allons créer un patient dans la table 'patients'
    if (count($errors) == 0) {

        // Je stock les valeurs des inputs dans des variables en effectuant un htmlspecialchars afin de m'assurer que les données soient safe
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $phoneNumber = htmlspecialchars($_POST['mobile']);
        $specialities = htmlspecialchars($_POST['select']);
        $mail = htmlspecialchars($_POST['mail']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $doctorObj = new Doctors();
        $userObj = new Users();

        if ($doctorObj->checkIfMailDoctorExists($_POST['mail'])) {

            $errors['mail'] = 'existe deja';
        } else {

            $doctorObj->addDoctor($firstname, $lastname, $phoneNumber, $mail, $specialities);

            $userObj->addUser($mail, $password);
            header('Location: dashboard.php');
        }
        
    }
}
