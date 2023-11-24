
<?php
// include 'conn.php';

// $conn = getConn();
// echo "Connected Succesfully";
// CloseCon($conn);


require_once("conn.php");
    $query = " select * from produk p, kategori k where p.status_id = '1' and p.kategori_id = k.id_kategori";
    $query2 = "select * from kategori";
    $result = mysqli_query($conn,$query);
    $result2 =mysqli_query($conn,$query2);

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



</head>
<body class="bg-dark">


        <div class ="container">
            <div class ="row">
                <div class ="col m-auto">
                    <div class ="card mt-5" align="center">
                    <form action="tambahProduk.php" method="post" form>
                    <table>
                    <tr>
                        <h2>Tambah Produk</h2>
                    <tr>
                        <tr>			
				            <td>Id Produk :</td>
				            <td><input type="text" required name="idProduk"></td>
			            </tr>
			            <tr>
				            <td>Nama Produk :</td>
				            <td><input type="text" required name="namaProduk"></td>
		        	    </tr>
			            <tr>
				            <td>Harga :</td>
				            <td><input type="number" required name="harga"></td>
			            </tr>
                        <tr>
				            <td>Kategori(isi dengan id kategori) :</td>
				            <td><input type="text" required name="kategori"></td>
			            </tr>
                        <tr>
				            <td>Status : </td>
				            <td><input type="text" required name="status"></td>
			            </tr>
			            <tr>
				            <td></td>
				            <td><input type="submit" value="Tambah Produk"></td>
			            </tr>		
                    </table>
                
                    </form>

                    </div>
                </div>
            </div>
            
        </div>

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
                                        if ($row['status_id'] == '1'){
                                            $status = "bisa dijual";
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
                        <a href="notforsale.php">lihat produk yang tidak dijual</a> <br><br>
                        <!-- <?php echo 'id kategori 1-6 urut sesuai data dari API <br> contoh : id kategori 1 = L QUEENLY, id kategori 2 = L MTH AKSESORIS (IM), dst'?> -->
                        <table table align="center" border="1px" style="width:500px; line-height:40px;">
                            <tr>
                            <th colspan="7"><h2>Kategori</h2></th> 
                            </tr>
                                <th> Id Kategori </th>
                                <th> Nama Kategori </th>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result2))
                                    {
                                        $idkategori= $row['id_kategori'];
                                        $namaKategori = $row['nama_kategori'];
                            
                            ?>
                                    <tr>
                                        <td><?php echo $idkategori ?></td>
                                        <td><?php echo $namaKategori ?></td>
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