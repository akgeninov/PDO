<?php 
    include('koneksi.php');
    if(isset($_POST['proses'])){
        header('location: tampilProd.php');
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
                <header>
                    <h3>Edit Data Produk : Tambah Data</h3>
                </header>
                    <form action="" method="POST">
                        <fieldset>
                            <legend>Form Data Produk</legend>
                            <table>
                                <tr>
                                    <td>Product Code</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_code" required></td>
                                </tr>
                                <tr>
                                    <td>Product Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_name" required></td>
                                </tr>
                                <tr>
                                    <td>Product Line</td>
                                    <td> : </td>
                                    <td><select name="prod_line" required>
                                        <option></option>
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
                                <tr>
                                    <td>Product Scale</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_scale" required></td>
                                </tr>
                                <tr>
                                    <td>Product Vendor</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_vendor" required></td>
                                </tr>
                                <tr>
                                    <td>Product Description</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_desc" required></td>
                                </tr>
                                <tr>
                                    <td>Quantity In Stock</td>
                                    <td> : </td>
                                    <td><input type="text" name="stock" required></td>
                                </tr>
                                <tr>
                                    <td>Buy Price</td>
                                    <td> : </td>
                                    <td><input type="text" name="bPrice" required></td>
                                </tr>
                                <tr>
                                    <td>MSRP</td>
                                    <td> : </td>
                                    <td><input type="text" name="msrp" required></td>
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
                        $statuss = '';
                        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                            $prod_code = $_POST['prod_code'];
                            $prod_name = $_POST['prod_name'];
                            $prod_line = $_POST['prod_line'];
                            $prod_scale = $_POST['prod_scale'];
                            $prod_vendor = $_POST['prod_vendor'];
                            $prod_desc = $_POST['prod_desc'];
                            $stock = $_POST['stock'];
                            $bPrice = $_POST['bPrice'];
                            $msrp = $_POST['msrp'];
                                                
                            $tambah_prod = $kon->prepare("INSERT INTO products(productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, msrp) VALUES
                            (:prod_code, :prod_name, :prod_line, :prod_scale, :prod_vendor, :prod_desc, :stock, :bPrice, :msrp)");
                                                
                            $tambah_prod->bindParam(':prod_code',$prod_code);
                            $tambah_prod->bindParam(':prod_name',$prod_name);
                            $tambah_prod->bindParam(':prod_line',$prod_line);
                            $tambah_prod->bindParam(':prod_scale',$prod_scale);
                            $tambah_prod->bindParam(':prod_vendor',$prod_vendor);
                            $tambah_prod->bindParam(':prod_desc',$prod_desc);
                            $tambah_prod->bindParam(':stock',$stock);
                            $tambah_prod->bindParam(':bPrice',$bPrice);
                            $tambah_prod->bindParam(':msrp',$msrp);
                                                
                            if ($tambah_prod->execute()) {
                                $statuss = 'ok';
                            } else {
                                $statuss = 'err';
                            }
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                    ?>

                    <?php 
                        if ($statuss=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">Tambah data product berhasil</div>';
                        } else if($statuss=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">Tambah data product gagal</div>';
                        }
                    ?>
                </main>
            </div>
    </body>
    </html>