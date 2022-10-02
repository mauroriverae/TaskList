<?php

class UserModel {

    private $db;
    //la BD es HASHING (es solo para prueba de usaurios de registro)
    //acordate que la de este TP es db_tasks
    //pero no tengo hasheadas los passwords
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=hashing;charset=utf8', 'root', '');
    }

    function getUser($email){
        $query= $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }



}

