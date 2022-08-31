<?php

// la classe Users sera un enfant de Database
class Users extends DataBase
{
    private int $_users_id;
    private string $_users_mail;
    private string $_users_password;
    private int $_role_id_role;

    // mise en place des setters / getters

    public function setUsersId(int $id)
    {
        $this->_users_id = $id;
    }

    public function getUsersId()
    {
        return $this->_users_id;
    }

    public function setUsersMail(string $mail)
    {
        $this->_users_mail = $mail;
    }

    public function getUsersMail()
    {
        return $this->_users_mail;
    }

    public function setUsersPassword(string $password)
    {
        $this->_users_mail = $password;
    }

    public function getUsersPassword()
    {
        return $this->_users_password;
    }

    public function setUsersRoleId(int $roleId)
    {
        $this->_role_id_role = $roleId;
    }

    public function getUsersRoleId()
    {
        return $this->_role_id_role;
    }

    public function addUser(string $users_mail ,string $users_password): void
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();


        $sql = "INSERT INTO `users` (`users_mail`,`users_password`,`role_id_role`)
        VALUES (:mail,:password,3)";

        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->prepare($sql);

        // je lie les valeurs des paramètres aux marqueurs nominatifs respectifs à l'aide de la méthode ->bindValue()
        $query->bindValue(':mail', $users_mail , PDO::PARAM_STR);
        $query->bindValue(':password', $users_password, PDO::PARAM_STR);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();
    }




    /**
     * Fonction permettant de savoir si un mail est present dans la table users
     * 
     * @param string $mail : Mail à rechercher
     * 
     * @return bool
     */
    public function checkIfMailExists(string $mail): bool
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'aller chercher le mail dans la table users
        // je mets en place un marqueur nominatif :mail
        $sql = "SELECT `users_mail` FROM `users` WHERE `users_mail` = :mail";
        
        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->prepare($sql);

        // je lie la valeur du paramètre $mail au marqueur nominatif :mail à l'aide de la méthode ->bindValue()
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();

        // je stock dans $result les données récupèrées à l'aide de la méthode ->fetch()
        $result = $query->fetchAll();

        // je fais un test pour savoir si $result est vide
        if (count($result) != 0) {
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
        $sql = "SELECT * FROM `users` WHERE `users_mail` = :mail";  

        // 3) je prepare la requete 
        $query= $pdo->prepare($sql);

        // 4) je lie ':password' à $password
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        // 5) j'execute la requete 
        $query->execute();

        // 6) je stock le resultat dans une variable
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // 7) j'effectue les vérifications 
        return $result;

    }
}
