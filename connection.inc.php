<?php
    session_start();
    $con = mysqli_connect("localhost","root","","nhom_2");
    define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/nhom_2/');
    define('SITE_PATH','http://127.0.0.1/php/nhom_2/');

    define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
    define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
    // $sql = "select * from danhmuc";
    // $res=mysqli_query($con, $sql);
    // print_r($res);
    // echo "aaaa";
?>