<?php  get_header() ?>
<style>
    #content{
        padding-top: 10px;
    }
    .dp_flex {
    display: flex;
    }
    #home>div{
        padding: 0px 10px;
    }
    

    #home_center {
        flex: 3;
        min-height: 200px; 
    }
    .home_center>div{
        padding: 10px;
    }

    #home_right {
        flex: 2;
        min-height: 200px; 
       
    }

    #acc, #student{
        flex: 1;
        text-align: center;
    }
    #home_center{
        border-right: 1px solid;
    }

  

    
    .header_detail{
        padding: 5px;
        border: 1px solid;
    }
 

    #chart2{
        width: 480px;
        height: auto;
    }
    #chart2, #chart1{
        padding-top: 10px;
    }
    #detail {
        flex: 1;
        min-height: 100px;
        padding: 10px;
    }
    #detail>div{
         border: 1px solid; 
        padding: 10px;
        
    }
    #detail #first{
        margin-bottom: 15px;
    }

    #detail_st{
        flex: 1;
        /* border: 1px solid; */
        padding: 10px;
       
    }
    #detail_st>div{
        padding: 10px;
        border: 1px solid;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"> </script>

<script src="public/js/a.home/bieudo.js"></script>

<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right" style="padding: 20px 10px;">
            
                <div id="home" class="dp_flex">

                    <div id="home_center" >
                        <?php //if(isset($_SESSION['faculty_id'])) echo $_SESSION['faculty_id'] ?>
                        <div id="thong_so_center" class="dp_flex ">
                            <div id="acc" class="home_center">
                                <div>
                                    <div class="header_detail">
                                        <p>Tổng số tài khoản</p>
                                        <span><?php
                                             $sum = count($teachers) + count($students);
                                             echo $sum;
                                        ?></span>
                                    </div>
                                </div>
                            </div>

                            <div id="student" class="home_center">
                                <div>
                                    <div class="header_detail">
                                        <p>Tổng số sinh viên</p>
                                        <span><?php echo count($students); ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div id="bieudo">
                           

                            <div id="">                         
                                <canvas id="chart1"></canvas>
                            </div>

                        </div>

                        <div id='list' class="dp_flex ">
                            
                            <div id="detail">
                                <div id="first">
                                    <p>Tổng số chương trình đào tạo</p>
                                    <span><?php echo count($majors); ?></span>
                                </div>
                                <div >
                                    <p>Tổng số ngành học</p>
                                    <span><?php echo count($facultys); ?></span>
                                </div>
                            </div>

                            <div id="detail_st">
                                <div>
                                    <h2 style="font-weight: bold;">Sinh viên ở mỗi khoa khoa</h2>
                                    <table class='table list-table-wp'>
                                            <thead>
                                                <tr>
                                                   
                                                    <td><span class='thead-text'>Khoa</span></td>
                                                    <td><span class='thead-text'>Số lượng</span></td>
                                                </tr>  
                                            </thead>
                                            <tbody>
                                    <?php 
                                        foreach ($facultys as $key => $faculty) {
                                            
                                            $list_class = list_class_faculty($faculty['faculty_id']);
                                            $dem = 0;
                                            foreach ($list_class as $key => $class) {
                                                
                                                $student = list_student_class($class['class_id']);
                                                $dem += count($student);

                                            }
                                            if($dem){
                                                $faculty_name = $faculty['faculty_name'];
                                     ?>

                                        
                                                <tr> 
                                                    <td><span class='tbody-text'><?php echo $faculty_name ?></span></td>
                                                    <td><span class='tbody-text'><?php echo $dem ?></span></td>
                                                </tr>
                                                  
                                     <?php                                                          
                                            }
                                           

                                       }
                                    ?>
                                            </tbody>
                                    </table> 
                                </div>
                            </div>

                        </div>

                    </div>
                    <div id="home_right">
                        <div id="teacher" class="home_center">
                            <div style="text-align: center;">
                                <div class="header_detail">
                                    <p>Tổng số giảng viên</p>
                                    <span><?php echo count($teachers); ?></span>
                                </div>
                            </div>
                        </div>
                        <div id="bieudo">
                        
                            <div id="">
                                <canvas id="chart2"></canvas>
                            </div>

                        </div>
                    </div>

                </div>  
        </div>
    </div>
</div>
<!-- <?php //get_footer() ?> -->

