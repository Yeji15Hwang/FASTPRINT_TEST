
<?php
// include 'conn.php';

// $conn = getConn();
// echo "Connected Succesfully";
// CloseCon($conn);


require_once("conn.php");
    $query = " select * from produk p, kategori k where p.status_id = '0' and p.kategori_id = k.id_kategori";
    $result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>List Produk</title>


    <script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Yakin menghapus produk ini?');
}
</script>

<a href="home.php">KEMBALI</a>


</head>
<body class="bg-dark">

<br>


        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table table align="center" border="1px" style="width:1000px; line-height:40px;">
                            <tr>
                            <th colspan="7"><h2>List Produk</h2></th> 
                            </tr>
                                <th> Id Produk </th>
                                <th> Nama Produk </th>
                                <th> Harga </th>
                                <th> Kategori </th>
                                <th> Status  </th>
                                <th> Update </th>
                                <th> Delete </th>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $produkID= $row['id_produk'];
                                        $namaProduk = $row['nama_produk'];
                                        $harga = $row['harga'];
                                        $kategori = $row['nama_kategori'];
                                        if ($row['status_id'] == '0'){
                                            $status = "tidak bisa dijual";
                                        }
                            ?>
                                    <tr>
                                        <td><?php echo $produkID ?></td>
                                        <td><?php echo $namaProduk ?></td>
                                        <td><?php echo $harga ?></td>
                                        <td><?php echo $kategori ?></td>
                                        <td><?php echo $status ?></td>
                                        <td><a href="editProduk.php?id=<?php echo $row['id_produk'];?>" class="btn btn-pencil">EDIT</a></td>
                                        <td><a href="deleteProduk.php?id=<?php echo $row['id_produk']; ?>" onclick ="return checkDelete()">HAPUS</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>