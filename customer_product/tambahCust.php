<?php 
    include('koneksi.php');
    if(isset($_POST['proses'])){
        header('location: tampilCust.php');
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
                    <h3>Edit Data Customer : Tambah Data</h3>
                </header>
                    <form action="" method="POST">
                        <fieldset>
                            <legend>Form Data Customer</legend>
                            <table>
                                <tr>
                                    <td>Customer Number</td>
                                    <td> : </td>
                                    <td><input type="text" name="cust_number" required></td>
                                </tr>
                                <tr>
                                    <td>Customer Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="cust_name" required></td>
                                </tr>
                                <tr>
                                    <td>Contact Last Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="last_name" required></td>
                                </tr>
                                <tr>
                                    <td>Contact First Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="first_name" required></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td> : </td>
                                    <td><input type="text" name="phone" required></td>
                                </tr>
                                <tr>
                                    <td>Address Line 1</td>
                                    <td> : </td>
                                    <td><input type="text" name="address1" required></td>
                                </tr>
                                <tr>
                                    <td>Address Line 2</td>
                                    <td> : </td>
                                    <td><input type="text" name="address2"></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td> : </td>
                                    <td><input type="text" name="city" required></td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td> : </td>
                                    <td><input type="text" name="state"></td>
                                </tr>
                                <tr>
                                    <td>Postal Code</td>
                                    <td> : </td>
                                    <td><input type="text" name="postal_code"></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td> : </td>
                                    <td><input type="text" name="country" required></td>
                                </tr>
                                <tr>
                                    <td>Sales Rep Employee Number</td>
                                    <td> : </td>
                                    <td><select name="sales_number">
                                        <option></option>
                                        <?php
                                           $ambil = "SELECT * FROM employees";
                                           $tampil = $kon->query($ambil);
                                           $no = 1;
                                           while($cust = $tampil->fetch(PDO::FETCH_LAZY)):
                                        ?>
                                            <?php echo "<option> $cust[employeeNumber] ($cust[firstName] $cust[lastName])</option>"; ?>

                                            <?php endwhile ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Credit Limit</td>
                                    <td> : </td>
                                    <td><input type="text" name="credit_limit"></td>
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
                        $status = '';
                        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                            $cust_number = $_POST['cust_number'];
                            $cust_name = $_POST['cust_name'];
                            $last_name = $_POST['last_name'];
                            $first_name = $_POST['first_name'];
                            $phone = $_POST['phone'];
                            $address1 = $_POST['address1'];
                            $address2 = $_POST['address2'];
                            $city = $_POST['city'];
                            $state = $_POST['state'];
                            $postal_code = $_POST['postal_code'];
                            $country = $_POST['country'];
                            $sales_number = $_POST['sales_number'];
                            $credit_limit = $_POST['credit_limit'];
                    
                            $tambah_cust = $kon->prepare("INSERT INTO customers(customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES(:cust_number, :cust_name, :last_name, :first_name, :phone, :address1, :address2, :city, :state, :postal_code, :country, :sales_number, :credit_limit)");
                            
                            $tambah_cust->bindParam(':cust_number',$cust_number);
                            $tambah_cust->bindParam(':cust_name',$cust_name);
                            $tambah_cust->bindParam(':last_name',$last_name);
                            $tambah_cust->bindParam(':first_name',$first_name);
                            $tambah_cust->bindParam(':phone',$phone);
                            $tambah_cust->bindParam(':address1',$address1);
                            $tambah_cust->bindParam(':address2',$address2);
                            $tambah_cust->bindParam(':city',$city);
                            $tambah_cust->bindParam(':state',$state);
                            $tambah_cust->bindParam(':postal_code',$postal_code);
                            $tambah_cust->bindParam(':country',$country);
                            $tambah_cust->bindParam(':sales_number',$sales_number);
                            $tambah_cust->bindParam(':credit_limit',$credit_limit);
                            
                            if ($tambah_cust->execute()) {
                                $status = 'ok';
                            } else {
                                $status = 'err';
                            }
                            echo "<meta http-equiv='refresh' content='0'";
                        }
                    ?>

                    <?php 
                        if ($status=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">Tambah data customer berhasil</div>';
                        } else if($status=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">Tambah data customer gagal</div>';
                        }
                    ?>
                </main>
            </div>
    </body>
    </html>