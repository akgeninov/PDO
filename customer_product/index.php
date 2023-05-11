<?php 
    include('koneksi.php');
    $hitung_cust = "SELECT * FROM customers";
    $cust = $kon->query($hitung_cust);
    $jml_cust = $cust->rowCount();
    
    $hitung_prod = "SELECT * FROM products";
    $prod = $kon->query($hitung_prod);
    $jml_prod = $prod->rowCount();
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
                <div class="cards">
                    <div class="card-single">
                        <div>
                            <span class="fa-solid fa-person"></span>
                        </div>
                        <div>
                            <h2>
                                <?php 
                                    echo $jml_cust;
                                ?>
                            </h2>
                            <small> Customers</small>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <span class="fa-solid fa-cart-shopping"></span>
                        </div>
                        <div>
                            <h2> 
                                <?php 
                                    echo $jml_prod;
                                ?>
                            </h2>
                            <small> Products</small>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    
</body>
</html>