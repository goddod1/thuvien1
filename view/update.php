<form method="post">
            <section class="class">
                <label >tensach</label><br><input
                    style="border-radius: 100px; width:80%; height: 40px; font-size: 27px;" type="text"
                    name="username1"><br>
            </section>
            <section class="class">
                <label >soluong: </label><br><input
                    style="border-radius: 100px; width:80%; height: 40px; font-size: 27px;" type="text" type="text"
                    name="soluong1">
            </section>
            <section class="class">
                 <label >UPDATE a theloaisach:</label>
                <select  name="theloai1">
                    <option value="truyendai">truyendai</option>
                    <option value="vanhoc">vanhoc</option>
                    <option value="tieuthuyet">tieuthuyet</option>
                    <option value="truyenngan">truyenngan</option>
                </select>
               
            </section>

            <section class="class">
                <input class="btn btn-sm btn-danger"
                    style="margin-top:10%; border-radius: 40px; background-color: aqua; border:0px; font-size: 29px; color: white; width: 50%"
                    type="submit" value="update" name="update">
            </section>
        </form>
        <?php

if(isset($_POST['update'])){
    $id1=$_GET['id2'];
    $username1=$_POST['username1'];
    $query2="select*from book where username=$username1";
    $result2=$connect->query($query2);
    if(mysqli_num_rows($result2)!=0){
        echo "username da co";

    }else{
        $soluong1=$_POST['soluong1'];
        $theloai1=$_POST['theloai1'];
        $query3="UPDATE book SET namebook='$username1', soluong='$soluong1', theloai= '$theloai1' WHERE id1 = $id1";
        $connect->query($query3);
        
        header("Location: ?option=book");
         
    }
    }

?>
