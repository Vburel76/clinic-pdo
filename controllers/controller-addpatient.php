<?php
$showForm = true;
$error = [];
$regexName = "/^[a-zA-Zéèêë]+$/";
$regexPhone= "/^[0-9]{10}+$/";


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
        }else if ()) {
            $error['mail'] = "Mauvais format";
        }
    }


    if (isset($_POST['mail'])) {

        if ($_POST['mail'] == '') {
            $error['mail'] = "champ obligatoire";
        }else if (!filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
            $error['mail'] = "Mauvais format";
        }
    }

    if (isset($_POST['adresse'])) {

        if ($_POST['adresse'] == '') {
            $error['adresse'] = "champ obligatoire";
        }
    }

    
}
var_dump($error);