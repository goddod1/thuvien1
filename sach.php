<?php session_start();?>
<?php $connect = new MySQLi('localhost:3306','root', 'root', 'thuvien');?>
<div>
    <div>

        <?php


if(isset($_POST['username'])){
    $query="select * from book where status=1 and namebook  like '%".$_POST['username']."%' ";//name chua tu khoa day(like)
    $result=$connect->query($query);
    $rs=mysqli_fetch_array($result);
    $_SESSION['idBook']=$rs['id1'];
}   
?>


        <section>
            <p><?php echo $_SESSION['idPerson']; print_r($_SESSION) ; ?></p>
            <form method="post">
                <label>
                    <p>ten sách</p>
                </label>
                <input style="border-radius: 100px; width:80%; height: 40px; font-size: 27px;" type="search"
                    name="username"><input type="submit" name="search" value="search">
            </form>
        </section>

        <?php
        $id=$_SESSION['idBook'];
        $query="select namebook, soluong, (select sum(soluongmuon) from history where history.sachid=book.id1 ) as 'soluongmuon1' from book where id1=$id;";
        $result2=$connect->query($query);
        $rs2=mysqli_fetch_array($result2);
        ?>
            <form method="post">
            <?php foreach($result as $_SESSION):?>

            <input type="radio" name="tensach[]" value="<?=$_SESSION['id1']?>">
            <label> <?=$_SESSION['namebook']?></label><br>
            <?php endforeach;?>
            <input type="submit" value="Submit" name="submit">

        </form>


<?php

        if(isset($_POST['submit'])){
            if(isset($_POST['tensach'])){
                $_SESSION['tensach']=$_POST['tensach'];
                foreach($_SESSION['tensach'] as $name1){
                    $_SESSION['idBook1']=$name1;
                    header("Location: index.php?option=history");
                }
                
            }
        }
        
        ?>

        
            <?php
//             $a=$rs2['soluongmuon1'];
//             $b=$rs2['soluong'];
// if(isset($_POST['create'])){
//     if($a < $b){
//         header("Location: index.php?option=history");   
//     }else{
//         echo '<script>alert("qua so luong sach"); location= "index.php?option=history";</script>';

//     }
// }
?>


        </section>
    </div>
</div>