<?php session_start();?>
<?php $connect = new MySQLi('localhost:3306','root', 'root', 'thuvien');?>
<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <style>
    .popup-wrapper {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    .popup {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        height: 200px;
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
    .popup-wrapper1 {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    .popup1 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        height: 200px;
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    .close1 {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
    </style>
    <script>
    function openPopup() {
        document.getElementById("popup-wrapper").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup-wrapper").style.display = "none";
    }
    function openPopup1() {
        document.getElementById("popup-wrapper1").style.display = "block";
    }

    function closePopup1() {
        document.getElementById("popup-wrapper1").style.display = "none";
    }
    </script>

</head>

<body class="wrapper" style="background-image: url('background-mau-xanh-1.jpeg'); background-size: 100%;" >
    
    <nav style="height: 50px; border: none;">
        <a href="?option=person" style="font-size: 27px; margin-top:0.6%; border-radius: 50px;">QUẢN LÝ NGƯỜI</a>
        <a href="?option=book" style="font-size: 27px; margin-top:0.6%; border-radius: 50px;">QUẢN LÝ SÁCH</a>
        <a href="?option=history" style="font-size: 27px; margin-top:0.6%; border-radius: 50px;">LỊCH SỬ </a>

    </nav>
    <section class="body">

        <article  style="border: none; ">
            <?php
           if(isset($_GET['option'])){
            switch($_GET['option']){
                case 'person':
                    include "view/person.php";
                    break;
                case 'book':
                    include "view/book.php";
                    break;
                case 'history':
                    include "view/history.php";
                    break;
                case 'bookupdate':
                    include "view/update.php";
                    break;
                }
            }
        ?>

        </article>

    </section>

</body>

</html>