<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>List Produk</title>





</head>
<body class="bg-dark">


        <div class ="container">
            <div class ="row">
                <div class ="col m-auto">
                    <div class ="card mt-5">
                    <a href="home.php">KEMBALI</a>
	                    <br/>
	                    <br/>
	                    <h3>EDIT DATA PRODUK</h3>
                    <?php
	                    include 'conn.php';
	                    $id = $_GET['id'];
	                    $data = mysqli_query($conn,"select * from produk p, kategori k, status s where p.id_produk='$id' and p.kategori_id = k.id_kategori and p.status_id = s.id_status");
	                    // $data = mysqli_query($conn,"select * from produk where id_produk='$id'");
	                    while($row = mysqli_fetch_array($data)){
	                    	?>
	                    	<form method="post" action="updateProduk.php">
	                    		<table>
	                    			<tr>			
	                    				<td>Nama Produk</td>
	                    				<td>
	                    					<input type="hidden" name="idProduk" value="<?php echo $row['id_produk']; ?>">
	                    					<input type="text" required name="namaProduk" value="<?php echo $row['nama_produk']; ?>">
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td>Harga</td>
	                    				<td><input type="number" required name="harga" value="<?php echo $row['harga']; ?>"></td>
	                    			</tr>
	                    			<tr>
	                    				<td>Kategori</td>
	                    				<td><input type="text" required  name="kategori" value="<?php echo $row['kategori_id']; ?>"></td>
	                    			</tr>
                                    <tr>
	                    				<td>Status</td>
	                    				<td><input type="text" required name="status" value="<?php echo $row['nama_status']; ?>"></td>
	                    			</tr>
	                    			<tr>
	                    				<td></td>
	                    				<td><input type="submit" value="SIMPAN"></td>
	                    			</tr>		
	                    		</table>
	                    	</form>
	                    	<?php 
	                    }
	                    ?>
                   
                    </div>
                </div>
            </div>
            
        </div>
    
</body>
</html>