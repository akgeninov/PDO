<?php 
    include('koneksi.php')
?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman Utama</title>
        <link rel="stylesheet" href="styleIndex.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    </head>
    <body>
        <header>
            <h2>DATA PRODUK DAN CUSTOMER</h2>
        </header>
            <div class="navigation">
                <ul>
                    <li>
                        <a href="index.php">
                            <span class="icon">
                                <i class="fa fa-house"></i>
                            </span>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="tampil.php">
                            <span class="icon">
                                <i class="fa-solid fa-database"></i>
                            </span>
                            <span class="title">Tampil Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="edit.php">
                            <span class="icon">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                            <span class="title">Edit Data</span>
                        </a>
                    </li>
                </ul>
            </div>
    
            <div class="main-content"> 
                <main>
                <header>
                    <h3>Edit Data Produk : Ubah Data</h3>
                </header>
                    <div class="tabelHasil">
                        <table border=1>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Product Line</th>
                                <th>Product Scale</th>
                                <th>Product Vendor</th>
                                <th>Product Drescription</th>
                                <th>Quantity In Stock</th>
                                <th>Buy Price</th>
                                <th>MSRP</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $ambil = "SELECT * FROM products";
                                $tampil = $kon->prepare($ambil);
                                $tampil->execute();
                                $no = 1;
                                while($prod = $tampil->fetch(PDO::FETCH_LAZY)): 
                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $prod['productCode']; ?></td>
                                        <td><?php echo $prod['productName']; ?></td>
                                        <td><?php echo $prod['productLine']; ?></td>
                                        <td><?php echo $prod['productScale']; ?></td>
                                        <td><?php echo $prod['productVendor']; ?></td>
                                        <td><?php echo $prod['productDescription']; ?></td>
                                        <td><?php echo $prod['quantityInStock']; ?></td>
                                        <td><?php echo $prod['buyPrice']; ?></td>
                                        <td><?php echo $prod['MSRP']; ?></td>
                                            <td>
                                                <a href='ubahFormProd.php?kode=<?php echo $prod['productCode']; ?>'>
                                                    ubah
                                                </a>
                                            </td>
                                    </tr>
                                    <?php $no++; ?>
                                    <?php endwhile ?>
                        </tbody>
                        </table>
                    </div>
                </main>
            </div>
    
        
    </body>
    </html>