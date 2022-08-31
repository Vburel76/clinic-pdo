<?php 

class Medicalspecialities extends DataBase{
    private int $_medicalspecialities_id;
    private int $_medicalspecialities_name;


    public function get_medicalspecialities_id()
    {
        return $this->_medicalspecialities_id;
    }

    public function set_medicalspecialities_id($_medicalspecialities_id)
    {
        $this->_medicalspecialities_id = $_medicalspecialities_id;
        return $this;
    }

    public function get_medicalspecialities_name()
    {
        return $this->_medicalspecialities_name;
    }

    public function set_medicalspecialities_name($_medicalspecialities_name)
    {
        $this->_medicalspecialities_name = $_medicalspecialities_name;
        return $this;
    }



    /**
     * Permet de récuperer le nom des spécialités et leurs ids respectifs
     */
    public function getAllMedicalSpecialities(){

        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'insérer un patient dans la table patients
        // je mets en place des marqueurs nominatifs pour faciliter la manipulation des paramètres : :lastname, :firstname, :phonenumber, :address, :mail
        $sql = "SELECT * FROM `medicalspecialities`";
    
        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->query($sql);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }
    
}