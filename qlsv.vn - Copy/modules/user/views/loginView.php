<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập sinh viên</title>
</head>

<style>

#wp_form-login {
    width: 300px; 
    position: absolute; 
    top: 40%; 
    left: 50%; 
    transform: translate(-50%, -50%); 
    border: 1px solid #ccc; 
    padding: 20px; 
    border-radius: 5px; 
    box-shadow: 1px 12px 33px 13px #AAA;
}

#form-login {
    text-align: center; 
}

input[type="text"],
input[type="password"],
input[type="submit"] {
    display: block; 
    margin: 10px auto; 
    padding: 10px; 
    width: 100%; 
    box-sizing: border-box;
}

.page-title {
    text-align: center; 
}

</style>

<body>
    <div id="wp_form-login">
        <h1 class="page-title">Đăng nhập sinh viên</h1>
        <form action="" id="form-login" method="POST">
            <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" placeholder="Tên đăng nhập">
            <?php echo form_error('username') ?>
            <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>" placeholder="Mật khẩu" >
            <?php echo form_error('password') ?>
            <input type="submit" id="login_student" name="login_student" value="Đăng nhập">
            <?php echo form_error('account') ?>
        </form>
    </div>
</body>
</html>