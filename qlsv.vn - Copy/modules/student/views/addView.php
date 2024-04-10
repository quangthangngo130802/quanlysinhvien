<?php get_header() ?>

<style>
    input[type="text"],input[type="date"], input[type="file"],
    select {
        width: 376px; 
        height: 35px;
    }
    
    input[type="date"]{
        margin-bottom: 13px;
    }
</style>
<script src="public/js/a.student/select_faculty.js"></script>
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
                        <label for="student_code">Mã sinh viên</label>
                        <input type="text" name="student_code" id="student_code" value="<?php echo set_value('student_code') ?>">
                        <?php echo form_error('student_code') ?>

                        <label for="first_name">Họ sinh viên</label>
                        <input type="text" name="first_name" id="first_name" value="<?php echo set_value('first_name') ?>">
                        <?php echo form_error('first_name') ?>

                        <label for="last_name">Tên sinh viên</label>
                        <input type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name') ?>">
                        <?php echo form_error('last_name') ?>

                        <label for="student_birth">Ngày sinh</label>
                        <input type="date" name="student_birth" id="student_birth" value="<?php echo set_value('student_birth') ?>">
                        <?php echo form_error('student_birth') ?>

                        <label for="gender">Giới tính</label>
                        <select name="gender">
                            <option value="">-- Chọn giới tính --</option>
                            <option value="male" <?php if(set_value('gender') == 'male') echo "selected ='selected'"; ?> >Nam</option>
                            <option value="female" <?php if(set_value('gender') == 'mfemle') echo "selected ='selected'"; ?>  >Nữ</option>    
                        </select>
                        <?php echo form_error('gender') ?>

                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" value="<?php echo set_value('address') ?>">
                        <?php echo form_error('address') ?>

                        <label for="email_student">Email</label>
                        <input type="text" name="email_student" id="email_student" value="<?php echo set_value('email_student') ?>">
                        <?php echo form_error('email_student') ?>

                        <label for="phone">Điện thoại</label>
                        <input type="text" name="phone" id="phone" value="<?php echo set_value('phone') ?>">
                        <?php echo form_error('phone') ?>

                        <label for="student_faculty">Khoa</label>
                        <select name="student_faculty" id="student_faculty">
                                <option value="0">-- Chọn khoa --</option>
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
                        <?php echo form_error('student_faculty') ?>

                        <label for="student_course">Khóa</label>
                        <select name="student_course" id="student_course">
                                <option value="0">-- Chọn khóa --</option>
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
                        <?php echo form_error('student_course') ?>
                        
                        <label for="student_class">Lớp</label>
                        <select name="student_class" id="student_class">
                                <option value="0"> -- Chọn lớp --</option>                               
                        </select>   
                        <?php echo form_error('student_class') ?>

                        <label for="anh_img"> Ảnh</label>
                        <input type="file" name="anh_img" id="anh_img" value="<?php echo set_value('anh_img') ?>">

                        <button type="submit" name="add_student" id="btn-submit">Thêm mới</button>
                        <?php echo form_error('add_student') ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>