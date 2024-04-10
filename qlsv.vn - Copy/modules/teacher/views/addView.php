<?php get_header() ?>

<style>
    input[type="text"],input[type="date"], input[type="file"],
    select {
        width: 376px; 
        height: 35px;
    }
    input[type="date"]{
        margin-bottom: 15px;
    }
</style>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<!-- <script src="public/js/a.teacher/add_teacher.js"></script> -->
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm giảng viên</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form id="addteacher" method="post">
                       
                        <label for="teacher_name">Họ tên giảng viên</label>
                        <input type="text" name="teacher_name" id="teacher_name" value="<?php echo set_value('teacher_name') ?>">
                        <?php echo form_error('teacher_name') ?>

                        <label for="teacher_email">Email</label>
                        <input type="text" name="teacher_email" id="teacher_email"  value="<?php echo set_value('teacher_email') ?>" >
                        <?php echo form_error('teacher_email') ?>

                        <label for="teacher_address">Địa chỉ</label>
                        <input type="text" name="teacher_address" id="teacher_address"  value="<?php echo set_value('teacher_address') ?>">
                        <?php echo form_error('teacher_address') ?>

                        <label for="teacher_phone">Số điện thoại</label>
                        <input type="text" name="teacher_phone" id="teacher_phone"  value="<?php echo set_value('teacher_phone') ?>">
                        <?php echo form_error('teacher_phone') ?>

                        <label for="teacher_birth">Ngày sinh</label>
                        <input type="date" name="teacher_birth" id="teacher_birth"  value="<?php echo set_value('teacher_birth') ?>"> 
                        <?php echo form_error('teacher_birth') ?>

                        <label for="gender_teacher">Giới tính</label>
                        <select name="gender_teacher" id="gender_teacher">
                            <option value="">-- Chọn giới tính --</option>
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>    
                        </select>    
                        <?php echo form_error('gender_teacher') ?>             

                        <label for="teacher_faculty">Khoa</label>
                        <select name="teacher_faculty" id="teacher_faculty">
                                <option value="0">-- Chọn khoa --</option>
                                <?php
                                    foreach ($list_faculty as $key => $value) {
                                 ?>

                                        <option value="<?php echo $value['faculty_id'] ?>"> <?php echo $value['faculty_name'] ?></option>
                                 <?php       
                                        # code...
                                    }
                                ?>
                        </select>
                        <?php echo form_error('teacher_faculty') ?>

                        <label for="anh_teacher"> Ảnh</label>
                        <input type="file" name="anh_teacher" id="anh_teacher">

                        <label for="chucvu">Chức vụ</label>
                        <select name="chucvu" id="chucvu">
                                <option value="0">-- Chọn khoa --</option>
                                <?php
                                    foreach ($chucvu as $key => $value) {
                                 ?>

                                        <option value="<?php echo $value['chucvu_id'] ?>"> <?php echo $value['chucvu_name'] ?></option>
                                 <?php       
                                        # code...
                                    }
                                ?>
                        </select>
                        <?php echo form_error('chucvu') ?>

                        <label for="education">Trình độ</label>
                        <select name="education" id="education">
                                <option value="0">-- Chọn trình độ --</option>
                                <?php
                                    foreach ($list_education as $key => $value) {
                                 ?>

                                        <option value="<?php echo $value['education_id'] ?>"> <?php echo $value['education_name'] ?></option>
                                 <?php       
                                        # code...
                                    }
                                ?>
                        </select>
                        <?php echo form_error('education') ?>
      
                        <button type="submit" name="add_teacher" id="add_teacher">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>