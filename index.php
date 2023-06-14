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
    </style>
    <script>
    function openPopup() {
        document.getElementById("popup-wrapper").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup-wrapper").style.display = "none";
    }
    </script>

</head>

<body class="wrapper">
    <header>
        <section>
            <form>
                <input type="hidden" name="option" value="person">
                <input type="search" name="keyword"><input type="submit" value="search">
            </form>
        </section>
    </header>
    <nav>
        <a href="?option=person">quan ly nguoi</a>
        <a href="?option=book">quan ly sach</a>
        <a href="?option=history">history</a>

    </nav>
    <section class="body">

        <article>
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
                }
            }
        ?>

        </article>

    </section>
    <footer>footer</footer>
</body>

</html>