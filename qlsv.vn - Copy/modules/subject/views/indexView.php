<?php  get_header() ?>
<style>
   
</style>
<script src="public/js/a.subject/subject.js"></script>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right" style="padding: 20px 8px;">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=subject&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count"><?php  //echo count($list_class)?> Lớp</span></a> |</li>
                            
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                        </ul>
                        <form method="post" class="form-s fl-right" id="form_student">
                            
                            <input type="text" name="s" id="code_student">
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
                    <div class="table-responsive" id="list_subject">
                       
                    </div>
                    <div class="section" id="paging_subject" style="text-align: center;">
                
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php get_footer() ?>