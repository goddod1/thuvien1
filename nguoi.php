<?php session_start();?>
<?php $connect = new MySQLi('localhost:3306','root', 'root', 'thuvien');?>
<div>
    <div>
        <p>ten người</p>
        <?php


if(isset($_POST['username'])){
    $query="select * from person where status=1 and MSV  like '%".$_POST['username']."%' or name  like '%".$_POST['username']."%'";//name chua tu khoa day(like)
    $result=$connect->query($query);
    $rs4=mysqli_fetch_array($result);
    $_SESSION['idPerson1']=$rs4['id'];
}   
?>

        <section>
            <form method="post">
                <input style="border-radius: 100px; width:80%; height: 40px; font-size: 27px;" type="search"
                    name="username"><input type="submit" name="search" value="search">
            </form>
        </section>

        <form method="post">
            <?php foreach($result as $item):?>

            <input type="radio" name="ten[]" value="<?=$item['id']?>">
            <label> <?=$item['name']?></label><br>
            <?php endforeach;?>
            <input type="submit" value="Submit" name="submit">

        </form>


        <?php

        if(isset($_POST['submit'])){
            if(isset($_POST['ten'])){
                $item['ten']=$_POST['ten'];
                
                foreach($item['ten'] as $name){
                    
                    $_SESSION['idPerson']=$name;
                  
                }
                echo $_SESSION['idPerson'];
            }
            header("Location: sach.php");
        }
        
        ?>


    </div>
</div>