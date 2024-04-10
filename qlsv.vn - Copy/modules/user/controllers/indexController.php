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

    if(isset($_POST['login_student'])){

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
            $id = get_student($username)['student_id'];
            if(check_login($username, $password)){
               
                $_SESSION['is_login_student'] = true;
                $_SESSION['student_login'] = $username;
                $_SESSION['student_id'] = $id;
               
                redirect("?mod=zzz_subject");
            }else{
                $error['account']  = "Tên đăng nhập và mật khẩu không đúng !s";
            }
            
        }
    }
    load_view('login');
}


function logoutAction(){
    unset($_SESSION['is_login_student']);
    unset($_SESSION['student_login']);
    unset($_SESSION['student_id']);  
    redirect('?mod=user&action=login');
  
}





?>