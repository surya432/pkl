<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once("header.php")?>
<body class="left-sidebar">
    <div id="container">
        <header class="clearfix">
            <?php include_once("menu.php");?>
            <div id="sub-menu" class="clearfix">
        </header>
        <!-- COntent Start -->
        <div id="content" class="clearfix">
            <div id="slider" class="version1 clearfix">
                <div class="flexslider">
                    <?php include_once("sliders.php");?>
                    <div class="flex-pause-play"></div>
                </div>
            </div>
            <div id="content" class="clearfix">
                <div class="posts-container clearfix">
                <div class="page-title">GALERI FOTO</div>
                <div class="carousel">
                    <?php include_once("galeri.php");?>
                </div>
            </div>
            <div class="posts-container clearfix">
                <div class="page-title">BERITA TERBARU</div>
                <?php include_once("contents.php");?>
            </div>

            <div class="posts-container clearfix">
                <div class="page-title">AGENDA</div>
                <div class="carousel">
                <?php include_once("agenda.php");?>
                </div>
            </div>
        </div>
        <!-- COntent End -->
    </div>
    <?php 
        include_once("sidebar.php");  
        include_once("footer.php");
    ?>
</body>

</html>