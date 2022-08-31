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



if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['firstname'])) {

        if ($_POST['firstname'] == '') {
            $error['firstname'] = "champ obligatoire";
        } else if (!preg_match($regexName, $_POST['firstname'])) {
            $error['firstname'] = "Mauvais format";
        }
    }


    if (isset($_POST['lastname'])) {

        if ($_POST['lastname'] == '') {
            $error['lastname'] = "champ obligatoire";
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
    if (count($errors) == 0) {

        // Je stock les valeurs des inputs dans des variables en effectuant un htmlspecialchars afin de m'assurer que les données soient safe
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $phoneNumber = htmlspecialchars($_POST['mobile']);
        $address = htmlspecialchars($_POST['adresse']);
        $mail = htmlspecialchars($_POST['mail']);

        // j'instancie un objet $patientsObj avec la class Patients
        $patientsObj = new Patients();

        // Je fais appelle à la méthode addPatient pour ajouter mon patient : Attention bien respecter l'ordre des paramètres
        $patientsObj->addPatient($lastname, $firstname, $phoneNumber, $address, $mail);

        // Si tout est ok, nous retournons sur une page données
        header('Location: dashboard.php');

    }
}

