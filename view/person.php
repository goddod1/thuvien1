<?php
if(isset($_POST['username'])){
    $username=$_POST['username'];
    $query="select*from person where username=$username";
    $result=$connect->query($query);
    if(mysqli_num_rows($result)!=0){
        echo "username da co";

    }else{
        $maSV=$_POST['maSV'];
        
        

        $query="insert person(name, MSV) values('$username', '$maSV')";
        $connect->query($query);
        
        header("Location: ?option=person");
         

    }
}?>

<p><a href="#" onclick="openPopup()" style="text-decoration: none; margin-left: 50%; border-style: solid; font-size: 27px; border-radius: 10px; border-width: 1px; background-color:aqua">CREATE</a></p>

</button>




<div class="popup-wrapper" id="popup-wrapper" style="text-align: center;">
    <div class="popup" style="border-radius: 40px; background-image: url('https://i0.wp.com/thatnhucuocsong.com.vn/wp-content/uploads/2021/12/hinh-anh-bau-troi.jpg?ssl=1');
" ;>
        <span class="close" onclick="closePopup()">&times;</span>
        <form method="post">
            <section class="class">
                <label style="color: white;">NAME</label><br><input
                    style="border-radius: 100px; width:80%; height: 40px; font-size: 27px;" type="text"
                    name="username"><br>
            </section>
            <section class="class">
                <label style="color: white;">ma SV: </label><br><input
                    style="border-radius: 100px; width:80%; height: 40px; font-size: 27px;" type="text" type="text"
                    name="maSV">
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
    $connect->query("delete from person where id=$id");
    header("Location: ?option=person"); 
   }
   ?>

<?php
$option= 'person';
$query="select*from person where status=1";
if(isset($_GET['keyword'])){
    $query.=" and name  like '%".$_GET['keyword']."%' ";//name chua tu khoa day(like)
    $option= 'show&keyword='.$_GET['keyword'];
}   


$page=1;
if(isset($_GET['page'])){
    $page=$_GET['page'];
}

$usernamesperpage=7;
$from=($page-1)*$usernamesperpage;
$totalUsernames=$connect->query($query);
$totalPages=ceil(mysqli_num_rows($totalUsernames)/$usernamesperpage);
$query.=" ORDER BY id DESC  limit $from,$usernamesperpage";

$result=$connect->query($query);//truy van de thuc thi

?>



<table border="1" style="width: 100%; height: 750px; text-decoration: none; text-align: center; border-radius: 10px;">
    <thead>
        <tr>
            <th style="background-color: antiquewhite;">NAME</th>
            <th style="background-color: antiquewhite;">MSV</th>
            <th style="background-color: antiquewhite;">OPITION</th>

        </tr>
    </thead>

    <tbody>
        <div>
            <?php foreach($result as $item):?>
            <tr>
                <td><?=$item['name'];?></td>
                <td><?=$item['MSV']?></td>
                <td><a style="text-decoration: none; font-size: 17px;" href="?option=<?=$option?>&id=<?=$item['id']?>"
                        onclick="return confirm('are you sure?')">DELETE</a></td>
            </tr>

        </div>
        <?php endforeach;?>


    </tbody>
</table>
<div class="page" style="margin-left: 45%; margin-top: 2%;">
<?php for($i=1; $i<=$totalPages; $i++):?>
<a class="<?=(empty($_GET['page'])&&$i==1)||(isset($_GET['page'])&&$_GET['page']==$i)?'highlight':''?>" href="?option=<?=$option?>&page=<?=$i?>" style="margin-left: 5%; "><?=$i?></a>
<?php endfor;?>
</div>