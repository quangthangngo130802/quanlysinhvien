<?php get_header() ?>

<style>
    
    input[type="text"],
    select {
        width: 376px; 
        height: 35px;
    }
</style>
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
                    <form  method="post" enctype="multipart/form-data">
                            <input type="file" name="file" id="">
                             <button type="submit" name="btnGui">Import</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>