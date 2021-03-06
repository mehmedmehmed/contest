<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 12.09.2015
 * Time: 20:09
 */
class Login extends Controller
{
    function __construct(){
        Session::init();
        Session::set('title', "Sistemaga kirish");
        Session::set('navbar_active', "login");
        parent::__construct();
    }

    function index(){
        if(Session::get('loggedIn')){
            header("Location: ".URL);
			
            exit;
        }else{
            $this->view->render("login/index");
        }
    }

    function is_login_img($login = false){
        $img = $this->model->is_losin_img($login);
        if($login == null || $img == null){
            print "<img src='".URL."public/images/avatar.png' class=\"img-circle\" style=\"width: 120px; height: 120px;\">";
            return false;
        }else{
            foreach($img as $key => $val){
                $images = $val['photo'];
            }
            $file = "public/images/".$images;
            if(file_exists($file)){
                print "<img src='".URL.$file."' class=\"img-circle\" style=\"width: 120px; height: 120px;\">";
                return false;
            }else{
                print "<img src='".URL."public/images/avatar.png' class=\"img-circle\" style=\"width: 120px; height: 120px;\">";
                return false;
            }
            return false;
        }
    }

    function run() {
        $this->model->run();
    }

    function logOut(){
        Session::init();
        Session::destroy();
        header("location: ".URL."login");
        exit(0);
    }

}