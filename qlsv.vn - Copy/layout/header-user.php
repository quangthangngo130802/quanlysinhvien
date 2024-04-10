<?php 

    
if(!is_login('is_login_student') && get_action() != 'login'){
    redirect("?mod=user&action=login");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý đào tạo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>    

        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script> 
        <script src="public/js/main.js" type="text/javascript"></script>
    </head>
    <style>
        .section{
            margin-top: 10px;
        }
        .error{
            color: red;
            padding-bottom: 10px;
        }
    </style>

    <?php  
        $first_name = student($_SESSION['student_id'])['first_name'];
        $last_name = student($_SESSION['student_id'])['last_name'];
        $student_code = student($_SESSION['student_id'])['student_code'];
    ?>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div class="wp-inner clearfix">
                        <a href="?mod=zzz_subject" title="" id="logo" class="fl-left">Student</a>
                        <ul id="main-menu" class="fl-left">    
                        </ul>
                        <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                            <button class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <div id="thumb-circle" class="fl-left">
                                    <img src="public/images/img-admin.png">
                                </div>
                                <h3 id="account" class="fl-right"><?php echo $first_name." ".$last_name."(".$student_code.")"; ?></h3>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="?mod=zzz_subject&action=detail_user" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                <li><a href="?mod=user&action=logout" title="Thoát">Thoát</a></li>
                            </ul>
                        </div>
                    </div>
                </div>