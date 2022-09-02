<?php

class Doctors extends DataBase
{
    private int $_doctors_id;
    private string $_doctors_name;
    private string $_doctors_lastname;
    private string $_doctors_phonenumber;
    private string $_doctors_mail;
    private int $_medicalspecialities_id_medicalspecialies;
    
    
 
    public function get_doctors_id()
    {
        return $this->_doctors_id;
    }

    public function set_doctors_id($_doctors_id)
    {
        $this->_doctors_id = $_doctors_id;
    }
 
    public function get_doctors_name()
    {
        return $this->_doctors_name;
    }

    public function set_doctors_name($_doctors_name)
    {
        $this->_doctors_name = $_doctors_name;
    }


    public function get_doctors_lastname()
    {
        return $this->_doctors_lastname;
    }

    public function set_doctors_lastname($_doctors_lastname)
    {
        $this->_doctors_lastname = $_doctors_lastname;
    }
    

    public function get_doctors_phonenumber()
    {
        return $this->_doctors_phonenumber;
    }

    public function set_doctors_phonenumber($_doctors_phonenumber)
    {
        $this->_doctors_phonenumber = $_doctors_phonenumber;
    }


    public function get_doctors_mail()
    {
        return $this->_doctors_mail;
    }

    public function set_doctors_mail($_doctors_mail)
    {
        $this->_doctors_mail = $_doctors_mail;
        return $this;
    }


    public function get_medicalspecialities_id_medicalspecialies()
    {
        return $this->_medicalspecialities_id_medicalspecialies;
    }

    public function set_medicalspecialities_id_medicalspecialies($_medicalspecialities_id_medicalspecialies)
    {
        $this->_medicalspecialities_id_medicalspecialies = $_medicalspecialities_id_medicalspecialies;
        return $this;
    }



    /**
     * Rajoute un patient dans la table patients
     * 
    * 
     * @return void
     */
    public function addDoctor(string $firstname ,string $lastname, string $phonenumber, string $mail, int $specialities): void
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'insérer un patient dans la table patients
        // je mets en place des marqueurs nominatifs pour faciliter la manipulation des paramètres : :lastname, :firstname, :phonenumber, :address, :mail
        $sql = "INSERT INTO `doctors` (`doctors_name`,`doctors_lastname`, `doctors_phonenumber`,`doctors_mail` ,`medicalspecialities_id_medicalspecialities`)
        VALUES (:name, :lastname, :phonenumber, :mail, :medicalspecialities)";

        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->prepare($sql);

        // je lie les valeurs des paramètres aux marqueurs nominatifs respectifs à l'aide de la méthode ->bindValue()
        $query->bindValue(':name', $firstname, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':phonenumber', $phonenumber, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':medicalspecialities', $specialities, PDO::PARAM_INT);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();
    }

    public function checkIfMailExists(string $mail): bool
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'aller chercher le mail dans la table users
        // je mets en place un marqueur nominatif :mail
        $sql = "SELECT `doctors_mail` FROM `doctors` WHERE `doctors_mail` = :mail";
        
        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->prepare($sql);

        // je lie la valeur du paramètre $mail au marqueur nominatif :mail à l'aide de la méthode ->bindValue()
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();

        // je stock dans $result les données récupèrées à l'aide de la méthode ->fetch()
        $resultDoctor = $query->fetchAll();

        // je fais un test pour savoir si $result est vide
        if (count($resultDoctor) != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword(string $mail) : array
    {

        // 1) connection a la base de donnée
        $pdo = parent::connectDb() ;

        // 2) j'ecris la requete pour aller chercher le password
        $sql = "SELECT * FROM `doctors` WHERE `doctors_mail` = :mail";  

        // 3) je prepare la requete 
        $query= $pdo->prepare($sql);

        // 4) je lie ':password' à $password
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        // 5) j'execute la requete 
        $query->execute();

        // 6) je stock le resultat dans une variable
        $resultDoctor = $query->fetch(PDO::FETCH_ASSOC);

        // 7) j'effectue les vérifications 
        return $resultDoctor;

    }

    public function returnPatient()
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'insérer un patient dans la table patients
        // je mets en place des marqueurs nominatifs pour faciliter la manipulation des paramètres : :lastname, :firstname, :phonenumber, :address, :mail
        $sql = "SELECT `doctors_id`,`doctors_name`,`doctors_lastname`,`doctors_phonenumber`,`doctors_mail`,`medicalspecialities_name` FROM `doctors` INNER JOIN `medicalspecialities` ON `medicalspecialities_id_medicalspecialities` = `medicalspecialities_id`";
    
        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->query($sql);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }

    public function getAlldoctors(){

        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'insérer un patient dans la table patients
        // je mets en place des marqueurs nominatifs pour faciliter la manipulation des paramètres : :lastname, :firstname, :phonenumber, :address, :mail
        $sql = "SELECT * FROM `doctors`";
    
        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->query($sql);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }

    public function returnOneDoctor($doctor_id)
    {
        $pdo = parent::connectDb();

        $sql = "SELECT `doctors_id`,`medicalspecialities_id`,`doctors_name`,`doctors_lastname`,`doctors_phonenumber`,`doctors_mail`,`medicalspecialities_name` FROM `doctors` INNER JOIN `medicalspecialities` ON `medicalspecialities_id_medicalspecialities` = `medicalspecialities_id` WHERE `doctors_id` = :doctors_id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':doctors_id', $doctor_id, PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }

    public function modifDoctor(string $nameDoctor, string $lastnameDoctors, string $phoneNumberDoctors, string $mailDoctors, string $specialitiesDoctors,string $doctorsid): void
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'insérer un patient dans la table patients
        // je mets en place des marqueurs nominatifs pour faciliter la manipulation des paramètres : :lastname, :firstname, :phonenumber, :address, :mail
        $sql = "UPDATE `doctors` SET `doctors_name`=:doctors_name ,`doctors_lastname`=:doctors_lastname , `doctors_phonenumber`=:doctors_phonenumber, `doctors_mail`=:doctors_mail,`medicalspecialities_id_medicalspecialities` =:medicalspecialities_id_medicalspecialities  WHERE `doctors_id` =:doctors_id";
        

        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->prepare($sql);

        // je lie les valeurs des paramètres aux marqueurs nominatifs respectifs à l'aide de la méthode ->bindValue()
        $query->bindValue(':doctors_name', $nameDoctor, PDO::PARAM_STR);
        $query->bindValue(':doctors_lastname', $lastnameDoctors, PDO::PARAM_STR);
        $query->bindValue(':doctors_phonenumber', $phoneNumberDoctors, PDO::PARAM_STR);
        $query->bindValue(':doctors_mail', $mailDoctors, PDO::PARAM_STR);
        $query->bindValue(':medicalspecialities_id_medicalspecialities', $specialitiesDoctors, PDO::PARAM_STR);
        $query->bindValue(':doctors_id', $doctorsid, PDO::PARAM_STR);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();


    }

   
}
