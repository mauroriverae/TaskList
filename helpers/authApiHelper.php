<?php

    function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
    class AuthApiHelper {
        private $key;
        //Copiar authelper que subio
        function __construct(){
            $this ->key = "Hola123ab";
        }

        function getBasic(){
            $header = $this->getHeader();
            
            //strpos nos devuelve la primera pos
            if(strpos($header, "Basic")=== 0){
                //explode devuelve array de string
                //basic base64(user:pass), el sub uno me da la segunda parte    
                $userpass = explode(" ", $header)[1]; 
                //decodifico 
                $userpass = base64_decode($userpass);
                $userpass = explode(":", $userpass);
                if(count($userpass)== 2){
                    $user = $userpass[0];
                    $pass = $userpass[1];
                    return array(
                        "user" => $user,
                        "pass" => $pass,
                    );
                }
            }
            return null;
        }

        function createToken($user) {
            $header = array(
                'alg' => 'HS256',
                'typ' => 'JWT'
                  
            );
            $payload = array(
                'sub' => 1,
                'name' => $user["user"],
                'rol' => ['admin', 'other']
            );
            $payload =  base64url_encode(json_encode($payload));
            $header =  base64url_encode(json_encode($header));
            $signature = hash_hmac("SHA256", "$header.$payload", $this->key, true);
            $signature = base64url_encode($signature);

            return "$header.$payload.$signature";


        }

        function getHEader() {
            //REDIRECT DE APACHA 
            if(isset($_SERVER["REDIRECT_HTTP_AUTHORIZATION"])) {
                return $_SERVER["REDIRECT_HTTP_AUTHORIZATION"];
            }
            if(isset($_SERVER["HTTP_AUTHORIZATION"])) {
                return $_SERVER["HTTP_AUTHORIZATION"];
            }
            return null;


        }
}

//minuto 50