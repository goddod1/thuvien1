<a href="nguoi.php">CREATE</a>
<p><?php
echo $_SESSION['idPerson'];
echo $_SESSION["idBook1"];
print_r($_SESSION) 
?></p>



<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>ten sach</th>
            <th>soluongmuon</th>


            <th>ngay muon</th>
            <th>ngay tra</th>
            <th>status</th>

        </tr>
    </thead>

    <tbody class="sidebar__header--des">
        <?php
    //     $id1=$_SESSION['idBook1'];
    //     $qr="select namebook, soluong, (select sum(soluongmuon) from history where history.sachid=book.id1 ) as 'soluongmuon2' from book where id1=$id1";
    //     $result3=$connect->query($qr);
    //     $result3=mysqli_fetch_array($result3);
    //     $c=$result3['soluong'];
    //    $d=$result3['soluongmuon2'];
        ?>
        <?php
        // if($c>$d){
            if(!empty($_SESSION['idPerson'])||!empty($_SESSION['idBook1'])){
            
                $ss1=$_SESSION['idPerson'];
                $ss2=$_SESSION['idBook1'];
                
                $datemuon= date("Y/m/d");
                $query="insert history(personid, sachid, soluongmuon, ngaymuon, ngaytra, status) values('$ss1', '$ss2', '1', '$datemuon', NULL , '1')";
                $connect->query($query);
                $_SESSION['name']="";
                $_SESSION['idPerson']=""; //nhớ phần này
            }
        // }
        ?>
        <?php
   if(isset($_GET['id'])){
    $id=$_GET['id'];
    $datetra= date("Y/m/d");
    $connect->query("UPDATE history
    SET ngaytra = $datetra 
    WHERE id=$id");
    header("Location: ?option=history"); 
   }
   ?>
        <?php
        $option= 'history';
        $query="select*from history, person, book where history.personid=person.id AND history.sachid= book.id1;
        ";
        $result=$connect->query($query);
        
        ?>

        <div>
            <?php foreach($result as $item):?>
            <tr>
                <td><?=$item['id'];?></td>
                <td><?=$item['name'];?></td>
                <td><?=$item['namebook'];?></td>
                <td><?=$item['soluongmuon']?></td>
                <td><?=$item['ngaymuon'];?></td>
                <td><?=$item['ngaytra'];?></td>
                <td><a href="?option=<?=$option?>&id=<?=$item['id']?>"
                        onclick="return confirm('are you sure?')">delete</a></td>
            </tr>
            <?php endforeach;?>
        </div>



        </div>


    </tbody>
</table>