<?php
require_once './app/models/task.model.php';
require_once './app/views/apiView.php';
require_once './helpers/authApiHelper.php';


class authApiTaskController {
    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new ApiView();
        $this->authHelper = new AuthApiHelper();
    }

    //Falta modifica HTACCESS y acomodar router
    function getToken($params = null) {
        $userpass = $this->authHelper->getBasic();
        $user = array("user" =>$userpass["user"]);
        //$user = $this->model->getUser($userpass);
        if(true){
            $token = $this->authHelper->createToken($user);
            $this->view->response(["token"=>$token], 200);
        } else {
            $this->view->response("No autirazado", 401);
        }
    }
}
