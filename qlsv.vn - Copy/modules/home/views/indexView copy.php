<?php  get_header() ?>
<style>
    #home {
        display: flex;
        flex-wrap: wrap;
        margin-left: 26px; 
    }


    .item {
        padding: 10px;
        width: 330px; 
        margin-bottom: 20px;
        margin-left: 10px;
        box-sizing: border-box;
    }
    .item>div{
        /* padding: 20px 20px 0px 20px; */
        box-sizing: border-box;
        border: 1px solid ;
    }
    .item>div #solg {
        padding: 25px 20px 20px 15px;
    }
    .item>div #solg h2{
         padding: 10px 0px; 
         font-size: 30px;
         font-weight: 900;
    }
    .item>div #solg p{
        font-size: 20px;
        margin-top: 5px;
    }
    .link{
        font-size: 13px;
        text-align: center;
        text-transform: uppercase;
    }
    .link i{
        margin-left: 5px;
        font-size: 15px;
    }
    .item:last-child {

        margin-right: 0; 
    }

</style>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right" style="padding: 20px 8px;">
            
                <div id="home">
                    <div class="item">
                        <div>
                            <div id="solg">
                                <h2><?php echo count($students) ?></h2>
                                <p>Sinh viên</p>
                            </div>
                            <div class="link">
                                <a href="">Xem thêm <i class="fas fa-arrow-alt-circle-right"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="item">
                        <div>
                            <div id="solg">
                                <h2><?php echo count($class) ?></h2>
                                <p>Lớp</p>
                            </div>
                            <div class="link">
                                <a href="">Xem thêm <i class="fas fa-arrow-alt-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div>
                            <div id="solg">
                                <h2><?php echo count($subjects) ?></h2>
                                <p>Môn</p>
                            </div>
                            <div class="link">
                                <a href="">Xem thêm <i class="fas fa-arrow-alt-circle-right"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="item">
                        <div>
                            <div id="solg">
                                <h2><?php echo count($teachers) ?></h2>
                                <p>Giảng viên</p>
                            </div>
                            <div class="link">
                                <a href="">Xem thêm <i class="fas fa-arrow-alt-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div>
                            <div id="solg">
                                <h2><?php echo count($departments) ?></h2>
                                <p>Khoa</p>
                            </div>
                            <div class="link">
                                <a href="">Xem thêm <i class="fas fa-arrow-alt-circle-right"></i></a>
                            </div>
                        </div>
                    </div>        
                </div>
            
        </div>
    </div>
</div>
<?php get_footer() ?>
