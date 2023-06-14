<?php session_start();?>
<?php $connect = new MySQLi('localhost:3306','root', 'root', 'thuvien1');?>
<div>
    <div>

        <?php


if(isset($_POST['username'])){
    $query="select * from book where status=1 and namebook  like '%".$_POST['username']."%' ";//name chua tu khoa day(like)
    $result=$connect->query($query);
    $result=mysqli_fetch_array($result); 
    $_SESSION['namebook']=$result['namebook'];
    $_SESSION['idBook']=$result['id'];
    
}   
?>


        <section>
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
        $query="select namebook, soluong, (select sum(soluongmuon) from history where history.sachid=book.id ) as 'soluongmuon1' from book where id=$id;";
        $result2=$connect->query($query);
        $result2=mysqli_fetch_array($result2);
       
       
        ?>
        <p><?=$_SESSION['namebook'];?></p>
        <p><?=$_SESSION['idBook'];?></p>
        <p><?=$result2['soluongmuon1']?></p>
        <section>
            <form method="post">
                <input type="submit" value="create" name="create">

            </form>
            <?php
            $a=$result2['soluongmuon1'];
            $b=$result2['soluong'];
if(isset($_POST['create'])){
    if($a < $b){
        header("Location: index.php?option=history");
    }else{
        echo '<script>alert("qua so luong sach"); location= "index.php?option=history";</script>';

    }
}
?>

        </section>
        </form>
    </div>
</div>