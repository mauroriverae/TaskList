<?php
require_once './app/models/task.model.php';
require_once './app/views/apiView.php';


class ApiTaskController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new ApiView();
    }

    //Falta modifica HTACCESS y acomodar router
    function getToken($params = null) {
        $basic = "";
        if(isset($_SERVER('HTTP_AUTHORIZATION')))[
            $basic = $_SERVER('HTTP_AUTHORIZATION');
        ]
        if(isset($_SERVER('REDIRECT_HTTP_AUTHORIZATION')))[
            $basic = $_SERVER('REDIRECT_HTTP_AUTHORIZATION');
        ]
        if(empty($basic)){
            return $this -> view-> response("No autorizado", 401);
            return;
        }
        $basic = explode($basic, "");
        if($basic[0]!="Basic"){
            return $this -> view-> response("La autenticacion debe ser basic", 401);
            return;
        }   

        $userpass = base64_decode($basic[1]);
        $userpass = explode(";", $userpass);
        $user = $userpass[0];
        $pass = $userpass[1];
        if($user == "nico" && $pass == "web"){
            //Creo el token
                $header = array(
                    'alg' => 'H5256';
                    'tyo' => 'jwt'
                );
                $payload = array(
                    'id' =>1;
                    'name' => "nico";
                    'exp' => '123123'
                );
                $header = base64url_encode(json_encode($header));
                $header = base64url_encode(json_encode($payload));
                $signature = hash_hmac('SHA256', "$header.$payload", "Clave1234", true); // secreto 
                $signature = base64_encode($signature);
                $toke = "$header.$payload.$signature";
            return $this -> view-> response($token);
        }else{
            return $this -> view-> response("No autorizado", 401);
        }
        //obtengo lo que manda el usuario por basic
        //valido el usuario y password
        //creo el token 

    }
}
