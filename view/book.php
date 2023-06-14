<?php
if(isset($_POST['username'])){
    $username=$_POST['username'];
    $query="select*from book where username=$username";
    $result=$connect->query($query);
    if(mysqli_num_rows($result)!=0){
        echo "username da co";

    }else{
        $soluong=$_POST['soluong'];
        
        

        $query="insert book(namebook, soluong) values('$username', '$soluong')";
        $connect->query($query);
        
        header("Location: ?option=book");
         

    }
}?>

<a href="#" onclick="openPopup()" style="text-decoration: none;">CREATE</a>

</button>




<div class="popup-wrapper" id="popup-wrapper" style="text-align: center;">
    <div class="popup" style="border-radius: 40px; background-image: url('https://i0.wp.com/thatnhucuocsong.com.vn/wp-content/uploads/2021/12/hinh-anh-bau-troi.jpg?ssl=1');
" ;>
        <span class="close" onclick="closePopup()">&times;</span>
        <form method="post">
            <section class="class">
                <label style="color: white;">NAMEBOOK</label><br><input
                    style="border-radius: 100px; width:80%; height: 40px; font-size: 27px;" type="text"
                    name="username"><br>
            </section>
            <section class="class">
                <label style="color: white;">soluong: </label><br><input
                    style="border-radius: 100px; width:80%; height: 40px; font-size: 27px;" type="text" type="text"
                    name="soluong">
            </section>

            <section class="class">
                <input class="btn btn-sm btn-danger"
                    style="margin-top:10%; border-radius: 40px; background-color: aqua; border:0px; font-size: 29px; color: white; width: 50%"
                    type="submit" value="create" name="create">
            </section>
        </form>
    </div>
</div>


<?php
   if(isset($_GET['id'])){
    $id=$_GET['id'];
    $connect->query("delete from book where id=$id");
    header("Location: ?option=book"); 
   }
   ?>

<?php
$option= 'book';

$query="select namebook, soluong, (select sum(soluongmuon) from history where history.sachid=book.id ) as 'soluongmuon' from book where status=1";
if(isset($_GET['keyword'])){
    $query.="and namebook  like '%".$_GET['keyword']."%'";//name chua tu khoa day(like)
    $option= 'show&keyword='.$_GET['keyword'];
    
}   

$result=$connect->query($query);


?>



<table border="1" style="width: 100%; height: 750px; text-decoration: none;text-align: center;">
    <thead>
        <tr>
            <th>ten sach</th>
            <th>so luong</th>
            <th>so luong muon</th>
            <th>so luong con lai</th>
            <th>OPITION</th>

        </tr>
    </thead>

    <tbody>
        <div>
            <?php foreach($result as $item):?>
            <tr>
                <td><?=$item['namebook'];?></td>
                <td><?=$item['soluong']?></td>

                <td><?=$item['soluongmuon']?></td>
                <td><?=$soluongconlai=$item['soluong']-$item['soluongmuon'];?></td>
                <td><a href="?option=<?=$option?>&id=<?=$item['id']?>"
                        onclick="return confirm('are you sure?')">delete</a></td>
            </tr>

        </div>
        <?php endforeach;?>


    </tbody>
</table>
<?php for($i=1; $i<=$totalPages; $i++):?>
<a href="?option=<?=$option?>&page=<?=$i?>" class="custom-btn btn-1" style="margin-right: 1%;"><?=$i?></a>
<?php endfor;?>