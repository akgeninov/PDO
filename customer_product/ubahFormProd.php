<?php 
    include('koneksi.php');
        $ambil = "SELECT * FROM products WHERE productCode = '$_GET[kode]'";
        $ambil_data = $kon->prepare($ambil);
        $ambil_data->execute();
        $ambil_data->bindParam(':prod_code', $_GET['kode']);
        $prod = $ambil_data->fetch(PDO::FETCH_OBJ);
        if(isset($_POST['proses'])){
            header('location: ubahProd.php');
        }
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
                    Edit Data Produk : ubah data
                    <br><br><br>
                    <form action="" method="post">
                        <fieldset>
                        <legend>Form Data Produk</legend>
                            <table>
                                <tr>
                                    <td>Product Code</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_code" value="<?php echo $prod->productCode ?>"></td>
                                </tr>
                                <tr>
                                    <td>Product Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_name" value="<?php echo $prod->productName ?>"></td>
                                </tr>
                                <tr>
                                    <td>Product Scale</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_scale" value="<?php echo $prod->productScale ?>"></td>
                                </tr>
                                <tr>
                                    <td>Product Vendor</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_vendor" value="<?php echo $prod->productVendor ?>"></td>
                                </tr>
                                <tr>
                                    <td>Product Description</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_desc" value="<?php echo $prod->productDescription ?>"></td>
                                </tr>
                                <tr>
                                    <td>Quantity In Stock</td>
                                    <td> : </td>
                                    <td><input type="text" name="stock" value="<?php echo $prod->quantityInStock ?>"></td>
                                </tr>
                                <tr>
                                    <td>Buy Price</td>
                                    <td> : </td>
                                    <td><input type="text" name="bPrice" value="<?php echo $prod->buyPrice ?>"></td>
                                </tr>
                                <tr>
                                    <td>MSRP</td>
                                    <td> : </td>
                                    <td><input type="text" name="msrp" value="<?php echo $prod->MSRP ?>"></td>
                                </tr>
                                <tr>
                                    <td>Product Line</td>
                                    <td> : </td>
                                    <td><select name="prod_line">
                                        <option><?php echo $prod->productLine ?></option>
                                        <?php
                                           $ambil = "SELECT * FROM productlines";
                                           $tampil = $kon->query($ambil);
                                           $no = 1;
                                           while($prod = $tampil->fetch(PDO::FETCH_LAZY)):
                                        ?>
                                            <?php echo "<option> $prod[productLine]</option>"; ?>

                                            <?php endwhile ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Simpan" name="proses">
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>

                    <?php

                        if(isset($_POST['proses'])){
                        $ubah = "UPDATE products SET 
                            productCode = '$_POST[prod_code]',
                            productName = '$_POST[prod_name]',
                            productLine = '$_POST[prod_line]',
                            productScale = '$_POST[prod_scale]',
                            productVendor = '$_POST[prod_vendor]',
                            productDescription = '$_POST[prod_desc]',
                            quantityInStock = '$_POST[stock]',
                            buyPrice = '$_POST[bPrice]',
                            MSRP = '$_POST[msrp]'
                            WHERE productCode = '$_POST[prod_code]'";
                        $ubah_prod = $kon->prepare($ubah);
                        $ubah_prod->execute();
                        echo "<meta http-equiv='refresh' content='0'";
                        }
                    ?>
                </main>
            </div>
    </body>
    </html>