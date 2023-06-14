<a href="nguoi.php">CREATE</a>

<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>ten sach</th>
            <th>soluongmuon</th>


            <th>ngay muon</th>
            <th>ngay tra</th>
            <th>opition</th>

        </tr>
    </thead>

    <tbody class="sidebar__header--des">
        <?php
        $id1=$_SESSION['idBook'];
        $qr="select namebook, soluong, (select sum(soluongmuon) from history where history.sachid=book.id ) as 'soluongmuon2' from book where id=$id1";
        $result3=$connect->query($qr);
        $result3=mysqli_fetch_array($result3);
        $c=$result3['soluong'];
       $d=$result3['soluongmuon2'];
        ?>
        <?php
        if(isset($_SESSION['ten'])){
            foreach($_SESSION['ten'] as $_SESSION['idPerson']){
        
        if($c>$d){
            if(!empty($_SESSION['idPerson'])||!empty($_SESSION['idBook'])){
        $ss1=$_SESSION['idPerson'];
        $ss2=$_SESSION['idBook'];
        $datemuon= date("Y/m/d");
        $query="insert history(personid, sachid, soluongmuon, ngaymuon, ngaytra, status) values('$ss1', '$ss2', '1', '$datemuon', NULL, '1')";
        $connect->query($query);
        $_SESSION['name']="";
        $_SESSION['idPerson']=""; //nhớ phần này
            }
        }
    }
    }
        ?>

        <?php
        $option= 'history';
        $query="select*from history, person, book where history.personid=person.id AND history.sachid= book.id;
        ";
        $result=$connect->query($query);
        
        ?>

        <?php
       if(isset($_GET['id1'])){
        $id=$_GET['id1'];
        $datetra = date("Y/m/d");
        $connect->query("UPDATE history SET ngaytra = '$datetra'  WHERE id1 = $id;");
        header("Location: ?option=history"); 
       }

   ?>

        <div>
            <?php foreach($result as $item):?>
            <tr>
                <td><?=$item['id1'];?></td>
                <td><?=$item['name'];?></td>
                <td><?=$item['namebook'];?></td>
                <td><?=$item['soluongmuon']?></td>
                <td><?=$item['ngaymuon'];?></td>
                <td><?=$item['ngaytra'];?></td>
                <td><a href="?option=<?=$option?>&id1=<?=$item['id1']?>"
                        onclick="return confirm('are you sure?')">trasach</a></td>

            </tr>
            <?php endforeach;?>
        </div>



        </div>

    </tbody>
</table>