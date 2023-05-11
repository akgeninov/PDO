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
                    Tabel Customer
                    <div class="tabelHasil">
                        <table border=3>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Customer Number</th>
                                <th>Customer Name</th>
                                <th>Contact Last Name</th>
                                <th>Contact First Name</th>
                                <th>Phone</th>
                                <th>Address Line1</th>
                                <th>Address Line2</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Postal Code</th>
                                <th>Country</th>
                                <th>Sales Rep Employee Number</th>
                                <th>Credit Limit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $ambil = "SELECT * FROM customers";
                                $tampil = $kon->query($ambil);
                                $no = 1;
                                while($cust = $tampil->fetch(PDO::FETCH_LAZY)): 
                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $cust['customerNumber']; ?></td>
                                        <td><?php echo $cust['customerName']; ?></td>
                                        <td><?php echo $cust['contactLastName']; ?></td>
                                        <td><?php echo $cust['contactFirstName']; ?></td>
                                        <td><?php echo $cust['phone']; ?></td>
                                        <td><?php echo $cust['addressLine1']; ?></td>
                                        <td><?php echo $cust['addressLine2']; ?></td>
                                        <td><?php echo $cust['city']; ?></td>
                                        <td><?php echo $cust['state']; ?></td>
                                        <td><?php echo $cust['postalCode']; ?></td>
                                        <td><?php echo $cust['country']; ?></td>
                                        <td><?php echo $cust['salesRepEmployeeNumber']; ?></td>
                                        <td><?php echo $cust['creditLimit']; ?></td>
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