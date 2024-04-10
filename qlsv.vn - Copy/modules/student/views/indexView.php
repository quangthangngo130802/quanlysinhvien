<?php  get_header() ?>
<style>
    #student_faculty, #student_class, #code_student {
        width: 180px; 
        height: 25px; 
        padding: 0px 10px;
        margin-right: 10px;
        text-align: center;
    }
    #student_course{
        height: 25px;
        width: 120px;
        padding: 0px 10px;
        margin-right: 10px;
    }
    #submit{
        height: 25px;      
    }
    #form_student{
        display: flex;
    }
    .anh_img{
        width: 60px;
        height: auto;
    }
</style>
<script src="public/js/a.student/student.js"></script>
<script src="public/js/a.student/student_delete.js"></script>
<script src="public/js/a.student/select_faculty.js"></script>
<!-- <script src="public/js/a.student/search_student.js"></script> -->
<script src="public/js/a.student/timkiem.js"></script>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right" style="padding: 20px 8px;">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=student&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                    <a href="?mod=student&action=addexcel" title="" id="add-new" class="fl-left">Thêm excel</a>
                </div>
            </div>
            
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count"><?php echo count($list_student)?> Sinh viên</span></a> |</li>
                            
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                        </ul>
                        <form class="form-s fl-right" id="form_student">
                            <select name="student_faculty" id="student_faculty">
                                    <option value="0">--- Khoa ---</option>
                                    <?php
                                        foreach ($list_faculty as $key => $value) {
                                    ?>

                                            <option value="<?php echo $value['faculty_id'] ?>" <?php
                                                    if(set_value('student_faculty')==$value['faculty_id'])
                                                        echo "selected ='selected'";
                                                ?> > 
                                            <?php echo $value['faculty_name'] ?></option>
                                    <?php       
                                            # code...
                                        }
                                    ?>
                            </select>

                            <select name="student_course" id="student_course">
                                <option value="0">--- Khóa ---</option>
                                <?php
                                    foreach ($list_course as $key => $value) {
                                 ?>

                                        <option value="<?php echo $value['course_id'] ?>"  
                                        <?php
                                            if(set_value('student_course')==$value['course_id'])
                                            echo "selected ='selected'";
                                        ?>
                                        
                                        >Khóa <?php echo $value['course_name'] ?></option>
                                 <?php       
                                        # code...
                                    }
                                ?>
                            </select>

                            <select name="student_class" id="student_class">
                                    <option value="0"> --- Lớp ---</option>                               
                            </select> 
                            
                            <input type="text" name="s" id="code_student" placeholder="Mã sinh viên">
                            <input type="submit" name="sm_s" value="Tìm kiếm" id="submit">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive" id="list_student">
                       
                    </div>
                    <div class="section" id="paging_wp" style="text-align: center;">
                
                    </div>

                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php get_footer() ?>