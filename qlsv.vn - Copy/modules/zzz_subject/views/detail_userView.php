<?php  get_header('user') ?>
<style>
   
    #change_pas {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        flex-direction: column; 
        align-items: center; 
    }
    
    .dp_flex {
        display: flex;
        align-items: center; 
        margin-bottom: 10px; 
    }

    .dp_flex label {
        flex: 0 0 auto;
        width: 150px; 
       
        margin-right: 10px; 
    }

    .dp_flex input {
        flex: 1; 
    }
    button{
        display: block;
        margin: 0 auto;
       
      
    }

    h1{
        text-align: center;
        font-size: 22px;
        font-weight: bold;
        margin-bottom:20px ;
    }
    
</style>

<link rel="stylesheet" href="public/css/dang_ky_hoc.css">
<div id="main-content-wp" class="list-product-page" style="display: flex;">
    
        <?php get_sidebar('user') ?>
        <div id="content" class="fl-right" style="padding: 0px;">
            <div class="section" id="title-page">
                
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <div id="detail_user">

                        <div id="change_pas">
                        <h1>Đổi mật khẩu</h1>
                            <form action="" method="post">
                                <div class="dp_flex">
                                    <label for="">Mật khẩu cũ :</label>
                                    <input type="password" id="password" name="password">
                                </div>

                                <div class="dp_flex">
                                    <label for="">Mật khẩu mới :</label>
                                    <input type="password" id="password_new" name="password_new">
                                </div>

                                <div class="dp_flex" >
                                    <label for="">Gõ lại mật khẩu mới :</label>
                                    <input type="password" id="textpassword" name="textpassword">
                                </div>

                                <button>Thay đổi</button>
                            </form>
                        </div>

                    </div>

                        

                    </div>
                   
                </div>
            </div>
            
        </div>
   
</div>
