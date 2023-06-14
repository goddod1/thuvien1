<?php session_start();?>
<?php $connect = new MySQLi('localhost:3306','root', 'root', 'thuvien1');?>
<div>
    <div>
        <p>ten người</p>
        <?php


if(isset($_GET['username'])){
    $query="select * from person where status=1 and MSV  like '%".$_GET['username']."%' OR name like '%".$_GET['username']."%'";//name chua tu khoa day(like)
    $result=$connect->query($query);
    $option= 'home&username='.$_GET['username'];
    
    
    
}   
?>

        <section>
            <form>
                <input type="hidden" name="option" value="home">
                <input style="border-radius: 100px; width:80%; height: 40px; font-size: 27px;" type="search"
                    name="username"><input type="submit" value="search">
            </form>
        </section>
        <form method="post">
            <?php foreach($result as $_SESSION):?>

            <input type="checkbox" name="ten[]" value="<?=$_SESSION['id']?>">
            <label> <?=$_SESSION['name']?></label><br>
            <?php endforeach;?>
            <input type="submit" value="Submit" name="submit">

        </form>
        <?php
        if(isset($_POST['submit'])){
            if(isset($_POST['ten'])){
                $_SESSION['ten']=$_POST['ten'];
                foreach($_SESSION['ten'] as $name){
                    
                    $_SESSION['idPerson']=$name;
                  header("Location: sach.php");  
                }
                
            }
        }
        
        ?>
    </div>
</div>