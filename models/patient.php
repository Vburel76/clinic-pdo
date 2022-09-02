<?php

class Patients extends DataBase
{
    private int $_patients_id;
    private string $_patients_lastname;
    private string $_patients_firstname;
    private string $_patients_phonenumber;
    private string $_patients_address;
    private string $_patients_mail;

    // Mise en place des Getters / Setters

    public function get_patients_id()
    {
        return $this->_patients_id;
    }

    public function set_patients_id($_patients_id)
    {
        $this->_patients_id = $_patients_id;
    }

    public function get_patients_lastname()
    {
        return $this->_patients_lastname;
    }

    public function set_patients_lastname($_patients_lastname)
    {
        $this->_patients_lastname = $_patients_lastname;
    }

    public function get_patients_firstname()
    {
        return $this->_patients_firstname;
    }

    public function set_patients_firstname($_patients_firstname)
    {
        $this->_patients_firstname = $_patients_firstname;
    }

    public function get_patients_phonenumber()
    {
        return $this->_patients_phonenumber;
    }

    public function set_patients_phonenumber($_patients_phonenumber)
    {
        $this->_patients_phonenumber = $_patients_phonenumber;
    }

    public function get_patients_address()
    {
        return $this->_patients_address;
    }

    public function set_patients_address($_patients_address)
    {
        $this->_patients_address = $_patients_address;
    }

    public function get_patients_mail()
    {
        return $this->_patients_mail;
    }

    public function set_patients_mail($_patients_mail)
    {
        $this->_patients_mail = $_patients_mail;
    }


    /**
     * Rajoute un patient dans la table patients
     * 
     * @param string $lastname Nom du patient
     * @param string $firstname Prénom du patient
     * @param string $phonenumber Numéro du patient
     * @param string $address Adresse du patient
     * @param string $mail Email du patient
     * 
     * @return void
     */
    public function addPatient(string $lastname, string $firstname, string $phonenumber, string $address, string $mail): void
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'insérer un patient dans la table patients
        // je mets en place des marqueurs nominatifs pour faciliter la manipulation des paramètres : :lastname, :firstname, :phonenumber, :address, :mail
        $sql = "INSERT INTO `patients` (`patients_lastname`,`patients_firstname`, `patients_phonenumber`, `patients_address`, `patients_mail`)
        VALUES (:lastname, :firstname, :phonenumber, :address, :mail)";

        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->prepare($sql);

        // je lie les valeurs des paramètres aux marqueurs nominatifs respectifs à l'aide de la méthode ->bindValue()
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':phonenumber', $phonenumber, PDO::PARAM_STR);
        $query->bindValue(':address', $address, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();
    }

    // retourne un tableau qui contient tous les patients avec leurs infos
    public function returnPatient()
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'insérer un patient dans la table patients
        // je mets en place des marqueurs nominatifs pour faciliter la manipulation des paramètres : :lastname, :firstname, :phonenumber, :address, :mail
        $sql = "SELECT * FROM `patients`";

        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->query($sql);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }


    // retourne un tableau qui contient tous les patients avec leurs infos
    public function getAllpatient()
    {

        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'insérer un patient dans la table patients
        // je mets en place des marqueurs nominatifs pour faciliter la manipulation des paramètres : :lastname, :firstname, :phonenumber, :address, :mail
        $sql = "SELECT * FROM `patients`";

        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->query($sql);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }

    // retourne les informations d'un seul patient par rapport à l'ID ui est renseigné.

    public function returnOnePatient($patient_id)
    {
        $pdo = parent::connectDb();

        $sql = "SELECT * FROM `patients` WHERE `patients_id` = :patients_id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':patients_id', $patient_id, PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }

    public function modifPatient(string $lastname, string $firstname, string $phoneNumber, string $address, string $mail, string $patientid): void
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'insérer un patient dans la table patients
        // je mets en place des marqueurs nominatifs pour faciliter la manipulation des paramètres : :lastname, :firstname, :phonenumber, :address, :mail
        $sql = "UPDATE `patients` SET `patients_lastname`=:patients_lastname ,`patients_firstname`=:patients_firstname , `patients_phonenumber`=:patients_phonenumber, `patients_address`=:patients_address, `patients_mail`=:patient_mail WHERE  `patients_id` =:patients_id";


        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->prepare($sql);

        // je lie les valeurs des paramètres aux marqueurs nominatifs respectifs à l'aide de la méthode ->bindValue()
        $query->bindValue(':patients_lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':patients_firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':patients_phonenumber', $phoneNumber, PDO::PARAM_STR);
        $query->bindValue(':patients_address', $address, PDO::PARAM_STR);
        $query->bindValue(':patient_mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':patients_id', $patientid, PDO::PARAM_STR);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();
    }

    public function deletePatient(string $patientid): void
    {
        $pdo = parent::connectDb();

        $sql = "DELETE	FROM `patients` WHERE `patients_id` =:patients_id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':patients_id', $patientid, PDO::PARAM_STR);

        $query->execute();
    }
}
