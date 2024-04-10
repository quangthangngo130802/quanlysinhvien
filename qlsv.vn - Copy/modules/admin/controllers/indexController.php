<?php

function construct() {

    load_model('index');
}

function indexAction(){
    load_view('index');
}

function loginAction() {
    global $error, $username, $password;

    $error = array();

    if(isset($_POST['btn_login'])){

        if(empty($_POST['username'])){
            $error['username'] = "Không được để trống tên đăng nhập";
        }else{
            $username = $_POST['username'];
        }
    
        if(empty($_POST['password'])){
            $error['password'] = "Không được để trống mật khẩu";
        }else{
            $password = $_POST['password'];
        }


        if(!empty($error)){
           
        }else{
           
            if(check_login($username, $password)){
                $id = get_department($username, $password)['department_id'];
                $name = get_department($username, $password)['name'];
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                $_SESSION['department_id'] = $id;
                $_SESSION['name_khoa'] = $name;
               // echo $id;
               redirect("?mod=home");
            }else{
                $error['account']  = "Tên đăng nhập và mật khẩu không dúng";
            }
            
        }
    }
    load_view('login');
}



function logoutAction(){
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    unset($_SESSION['department_id']);  
        redirect('?mod=admin&action=login');
  
}


?>