<?php get_header();?>

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
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa thông tin giảng viên</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                       
                        <label for="teacher_name_edit">Họ tên giảng viên</label>
                        <input type="text" name="teacher_name_edit" id="teacher_name_edit" value="<?php echo $teacher['teacher_name'] ?>">

                        <label for="teacher_email_edit">Email</label>
                        <input type="text" name="teacher_email_edit" id="teacher_email_edit" value="<?php echo $teacher['email'] ?>">

                        <label for="teacher_address_edit">Địa chỉ</label>
                        <input type="text" name="teacher_address_edit" id="teacher_address_edit" value="<?php echo $teacher['address'] ?>">

                        <label for="teacher_phone_edit">Số điện thoại</label>
                        <input type="text" name="teacher_phone_edit" id="teacher_phone_edit" value="<?php echo $teacher['phone'] ?>">

                       
                        <label for="teacher_birth_edit">Ngày sinh</label>
                        <input type="date" name="teacher_birth_edit" id="teacher_birth_edit" value="<?php echo $teacher['teacher_date_of_birth'] ?>">

                        <label for="gender_teacher_edit">Giới tính</label>
                        <select name="gender_teacher_edit">
                            <option value="">-- Chọn giới tính --</option>
                            <option value="male" <?php if($teacher['gender'] == 'Male') echo " selected " ?> >Nam</option>
                            <option value="female"  <?php if($teacher['gender'] == 'Female') echo " selected " ?> >Nữ</option>    
                        </select>
                        
                        <label for="anh_teacher"> Ảnh</label>
                        <input type="file" name="anh_teacher" id="anh_teacher">

                        <label for="teacher_faculty_edit">Khoa</label>
                        <select name="teacher_faculty_edit" id="teacher_faculty_edit">
                                <option value="0">-- Chọn khoa --</option>
                                <?php
                                    foreach ($list_faculty as $key => $value) {
                                 ?>

                                        <option value="<?php echo $value['faculty_id'] ?>" <?php if($teacher['faculty_id'] == $value['faculty_id']) echo " selected " ?>  > <?php echo $value['faculty_name'] ?></option>
                                 <?php       
                                        # code...
                                    }
                                ?>
                        </select>

                        <label for="chucvu_edit">Chức vụ</label>
                        <select name="chucvu" id="chucvu_edit">
                                <option value="0">-- Chọn khoa --</option>
                                <?php
                                    foreach ($chucvu as $key => $value) {
                                 ?>

                                        <option value="<?php echo $value['chucvu_id'] ?>" <?php if($teacher['chucvu_id'] == $value['chucvu_id']) echo " selected " ?> > <?php echo $value['chucvu_name'] ?></option>
                                 <?php       
                                        # code...
                                    }
                                ?>
                        </select>

                        

                                          
                        <button type="submit" name="edit_student" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>