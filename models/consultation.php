<?php

class Meeting extends Database
{
    private int $_rendezvous_id;
    private string $_rendezvous_date;
    private string $_rendezvous_hour;
    private string $_rendezvous_description;
    private string $_patients_id_patients;
    private int $_doctors_id_doctors;


    public function get_rendezvous_id()
    {
        return $this->_rendezvous_id;
    }

    public function set_rendezvous_id($_rendezvous_id)
    {
        $this->_rendezvous_id = $_rendezvous_id;
    }


    public function get_rendezvous_date()
    {
        return $this->_rendezvous_date;
    }

    public function set_rendezvous_date($_rendezvous_date)
    {
        $this->_rendezvous_date = $_rendezvous_date;
    }


    public function get_rendezvous_hour()
    {
        return $this->_rendezvous_hour;
    }

    public function set_rendezvous_hour($_rendezvous_hour)
    {
        $this->_rendezvous_hour = $_rendezvous_hour;
    }

    public function get_rendezvous_description()
    {
        return $this->_rendezvous_description;
    }

    public function set_rendezvous_description($_rendezvous_description)
    {
        $this->_rendezvous_description = $_rendezvous_description;
    }


    public function get_patients_id_patients()
    {
        return $this->_patients_id_patients;
    }

    public function set_patients_id_patients($_patients_id_patients)
    {
        $this->_patients_id_patients = $_patients_id_patients;
    }


    public function get_doctors_id_doctors()
    {
        return $this->_doctors_id_doctors;
    }

    public function set_doctors_id_doctors($_doctors_id_doctors)
    {
        $this->_doctors_id_doctors = $_doctors_id_doctors;
    }


    public function addRendezvous(string $date, string $hour, string $description, int $patientsid, int $doctorsid): void
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'insérer un patient dans la table patients
        // je mets en place des marqueurs nominatifs pour faciliter la manipulation des paramètres : :lastname, :firstname, :phonenumber, :address, :mail
        $sql = "INSERT INTO `rendezvous` (`rendezvous_date`,`rendezvous_hour`, `rendezvous_description`,`patients_id_patients` ,`doctors_id_doctors`)
        VALUES (:date, :hour, :description, :patientsid, :doctorsid)";

        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->prepare($sql);

        // je lie les valeurs des paramètres aux marqueurs nominatifs respectifs à l'aide de la méthode ->bindValue()
        $query->bindValue(':date', $date, PDO::PARAM_STR);
        $query->bindValue(':hour', $hour, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':patientsid', $patientsid, PDO::PARAM_INT);
        $query->bindValue(':doctorsid', $doctorsid, PDO::PARAM_INT);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();
    }

    public function getAllpatient(){

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

    public function returnMeeting()
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'insérer un patient dans la table patients
        // je mets en place des marqueurs nominatifs pour faciliter la manipulation des paramètres : :lastname, :firstname, :phonenumber, :address, :mail
        $sql = "SELECT `rendezvous_id`,`rendezvous_date`,`rendezvous_hour`,`rendezvous_description`,`patients_lastname`,`doctors_name` FROM `rendezvous` INNER JOIN `patients` ON `patients_id_patients` = `patients_id` INNER JOIN `doctors` ON `doctors_id_doctors` = `doctors_id`" ;
    
        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->query($sql);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }
}
