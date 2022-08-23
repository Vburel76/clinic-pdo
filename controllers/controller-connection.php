<?php
$showForm =true;
    $error = [];
    $regexName = "/^[a-zA-Zéèêë]+$/";
    $login = "valentin";
    $passwordHash = '$2y$10$ozIqs0MLIh1fFdKMya1M.eNQfFVh9v51G1VOe9bDHIDE109tF25yi';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    if (isset($_POST['login'])) {

        if ($_POST['login'] == '') {
            $error['login'] = "champ obligatoire";
        }else if ($_POST['login'] != $login) {
            $error['login'] = "login erroné";
        }
    }


    if (isset($_POST['password'])) {

        if ($_POST['password'] == '') {
            $error['password'] = "champ obligatoire";
        }else if ($_POST['login'] == '' &&  $_POST['password'] != '') {
            $error['password'] = " veuillez remplir le login";
        } else if (!password_verify($_POST['password'], $passwordHash)) {
            $error['password'] = "mot de passe incorect";
        }
    }

    if (count($error) == 0) {
        $_SESSION['user'] = [
            'lastname' => 'burel',
            'firstname' => 'valentin',
            'role' => 1
        ];
        header('Location: dashboard.php');
    }
}
