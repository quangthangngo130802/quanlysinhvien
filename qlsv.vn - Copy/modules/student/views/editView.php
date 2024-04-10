<?php get_header() ?>

<style>
    input[type="text"],input[type="date"],
    select {
        width: 376px; 
        height: 35px;
        /* box-sizing: border-box;  */
        /* margin-bottom: 10px;  */
    }
    input[type="date"]{
        margin-bottom: 13px;
    }
</style>
<script src="public/js/a.student/select_faculty_edit.js"></script>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="student_code_edit">Mã sinh viên</label>
                        <input type="text" name="student_code_edit" readonly id="student_code-name" value="<?php echo $student['student_code']; ?> ">

                        <label for="first_name_edit">Họ sinh viên</label>
                        <input type="text" name="first_name_edit" id="first_name_edit" value="<?php
                            if(isset($_POST['edit_student'])){
                                echo set_value('first_name_edit') ;
                            }else{
                                echo $student['first_name'];
                            }
                         ?>">
                        <?php echo form_error('first_name_edit') ?>

                        <label for="last_name_edit">Tên sinh viên</label>
                        <input type="text" name="last_name_edit" id="last_name_edit" value="<?php
                            if(isset($_POST['edit_student'])){
                                echo set_value('last_name_edit') ;
                            }else{
                                echo $student['last_name'];
                            }
                         ?>">
                        <?php echo form_error('last_name_edit') ?>
                        
                        <label for="student_birth_edit">Ngày sinh</label>
                        <input type="date" name="student_birth_edit" id="student_birth" value="<?php 
                            if(isset($_POST['edit_student']))
                            { 
                                echo set_value('student_birth_edit'); 
                            }else
                            { 
                                echo $student['date_of_birth']; 
                            } ?>">
                        <?php echo form_error('student_birth_edit') ?>

                        <label for="gender_edit">Giới tính</label>
                        <select name="gender_edit">
                            <option value="">-- Chọn giới tính --</option>
                            <option value="male" <?php if($student['gender'] == 'male') echo 'selected' ?> >Nam</option>
                            <option value="female" <?php if($student['gender'] == 'female') echo 'selected' ?>  >Nữ</option>    
                        </select>
                        <?php echo form_error('gender_edit') ?>

                        <label for="address_edit">Địa chỉ</label>
                        <input type="text" name="address_edit" id="address_edit" value="<?php 
                        if(isset($_POST['edit_student'])){
                                echo set_value('address_edit') ;
                            }else{
                                echo $student['address'];
                            }
                        ?>">
                        <?php echo form_error('address_edit') ?>

                        <label for="email_edit">Email</label>
                        <input type="text" name="email_edit" id="email_edit"  value=" <?php 
                        if(isset($_POST['edit_student'])){
                                echo set_value('email_edit') ;
                            }else{
                                echo $student['email'];
                            }?>">
                        <?php echo form_error('email_edit') ?>

                        <label for="phone_edit">Điện thoại</label>
                        <input type="text" name="phone_edit" id="phone_edit" value="<?php 
                        if(isset($_POST['edit_student'])){
                                echo set_value('phone_edit') ;
                            }else{
                                echo $student['phone'];
                            }?>">
                        <?php echo form_error('first_name_edit') ?>

                        <label for="student_faculty_edit">Khoa</label>
                        <select name="student_faculty_edit" id="student_faculty_a">
                                <option value="0">-- Chọn khoa --</option>
                                <?php
                                $faculty = faculty_by_class($student['class_id'])['faculty_id'];
                                    foreach ($list_faculty as $key => $value) {
                                ?>

                                        <option value="<?php echo $value['faculty_id'] ?>"
                                            <?php
                                            if(isset($_POST['edit_student'])){
                                                if($value['faculty_id'] == set_value('student_faculty_edit'))
                                                    echo "selected='selected'";
                                            }else{
                                                if($value['faculty_id'] == $faculty)
                                                    echo "selected='selected'";
                                            }
                                            
                                            ?>
                                            > <?php echo $value['faculty_name'] ?></option>
                                <?php       
                                        # code...
                                    }
                                ?>
                        </select>
                        <?php echo form_error('student_faculty_edit') ?>
                        

                        <label for="student_course_edit">Khóa</label>
                        <select name="student_course_edit" id="student_course">
                                <option value="0">-- Chọn khóa --</option>
                                <?php
                                    foreach ($list_course as $key => $value) {
                                 ?>

                                    <option value="<?php echo $value['course_id'] ?>"   
                                    <?php
                                            if(isset($_POST['edit_student'])){
                                                if($value['course_id'] == set_value('student_course_edit'))
                                                    echo "selected='selected'";
                                            }else{
                                                if($value['course_id'] == $student['course_id'])
                                                    echo "selected='selected'";
                                            }
                                            
                                            ?>
                                    >Khóa <?php echo $value['course_name'] ?></option>
                                <?php       
                                        # code...
                                    }
                                ?>
                        </select>
                        <?php echo form_error('student_course_edit') ?>

                        <label for="student_class_edit">Lớp</label>
                        <select name="student_class_edit" id="student_class">
                                <option value="0"> -- Chọn lớp --</option>  
                                <?php
                                    $list_class = list_class_by_course($student['course_id']);
                                    foreach ($list_class as $key => $value) {
                                 ?>

                                    <option value="<?php echo $value['class_id'] ?>"   
                                            <?php
                                                if(isset($_POST['edit_student'])){
                                                    if($value['class_id'] == set_value('student_class_edit'))
                                                        echo "selected='selected'";
                                                }else{
                                                    if($value['class_id'] == $student['class_id'])
                                                        echo "selected='selected'";
                                                }
                                            ?>
                                    ><?php echo $value['class_name'] ?></option>
                                <?php       
                                        # code...
                                    }
                                ?>                         
                        </select>  
                        <?php echo form_error('student_class_edit') ?>

                        <button type="submit" name="edit_student" id="btn-submit_edit">Sửa thông tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>