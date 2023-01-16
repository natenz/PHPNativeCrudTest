<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_sales";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak Terhubung Kedatabase");
}
$sales_id = "";
$product_name = "";
$qty = "";
$price = "";
$sales_date = "";
$notes = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $sales_id = $_GET['sales_id'];
    $sql1 = "DELETE FROM  tr_sales WHERE sales_id = '$sales_id' ";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Data Berhasil Dihapus !";
    } else {
        $error = " Data Gagal Terhapus!";
    }
}

if ($op == 'edit') {
    $sales_id = $_GET['sales_id'];
    $sql1 = "SELECT * FROM tr_sales WHERE sales_id = $sales_id ";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $sales_id = $r1['sales_id'];
    $product_name = $r1['product_name'];
    $qty = $r1['qty'];
    $price = $r1['price'];
    $sales_date = $r1['sales_date'];
    $notes = $r1['notes'];

    if ($sales_id == '') {
        $error = "Data Tidak ditemukan !";
    }
}

if (isset($_POST['simpan'])) { //buat data
    $sales_id = $_POST['sales_id'];
    $product_name = $_POST['product_name'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $sales_date = $_POST['sales_date'];
    $notes = $_POST['notes'];

    if ($sales_id && $product_name && $qty && $price && $sales_date) {
        if ($op == 'edit') { //update data
            $sql1   = "update tr_sales set sales_id='$sales_id',product_name='$product_name', qty='$qty', price='$price', sales_date='$sales_date',notes ='$notes' WHERE sales_id = '$sales_id'";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data Berhasil Diupdate";
            } else {
                $error = "Data gagal Terupdate!";
            }
        } else { // inset data
            $sql1 = "INSERT INTO tr_sales(sales_id,product_name,qty,price,sales_date,notes) VALUES ('$sales_id','$product_name','$qty','$price','$sales_date','$notes')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data Berhasil Dimasukan!";
            } else {
                $error = " Gagal Memasukan Data !";
            }
        }
    } else {
        $error = "Isi Semua Data !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>PT Nata Connexindo Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 1300px;
        }

        .card {
            margin-top: 10px;
        }
    </style>

</head>

<body>
    <!--Header -->

    <div class="fContainer">
        <nav class="wrapper">
            <div class="brand">
                <div class="firstname">Natz</div>
                <div class="lastname">Kun</div>
            </div>
            <ul class="navigation">
                <li><a href="index.php" class="active">Home</a> </li>
                <li><a href="view.php">View Data </Input></a> </li>

            </ul>

        </nav>
    </div>
    <!-- masuk data -->
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php

                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-succes" role="alert">
                        <?php echo $sukses ?>
                    </div>

                <?php
                    header("refresh:2;url=index.php");
                }
                ?>
                <form action="" method="post">
                    <div class="mb-3 row">
                        <label for="sales_id" class="col-sm-2 col-form-label"> Sales ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sales_id" name="sales_id" value="<?php echo $sales_id ?>">

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sales_id" class="col-sm-2 col-form-label"> Product Name </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sales_id" name="product_name" value="<?php echo $product_name ?>">

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sales_id" class="col-sm-2 col-form-label"> Quantity </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="qty" name="qty" value="<?php echo $qty ?>">

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sales_id" class="col-sm-2 col-form-label"> Price </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $price ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sales_id" class="col-sm-2 col-form-label"> Sales Date </label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="sales_date" name="sales_date" value="<?php echo $sales_date ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sales_id" class="col-sm-2 col-form-label"> Notes </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="notes" name="notes" value="<?php echo $notes ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sales_id" class="col-sm-2 col-form-label"> </label>
                        <div class="col-sm-10">

                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
        <!-- Out Data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Barang
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Sales ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Sales Date</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Input Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "SELECT * from tr_sales ORDER BY sales_id DESC";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $sales_id            = $r2['sales_id'];
                            $product_name        = $r2['product_name'];
                            $qty                 = $r2['qty'];
                            $price               = $r2['price'];
                            $sales_date          = $r2['sales_date'];
                            $notes               = $r2['notes'];
                            $input_date          = $r2['input_date'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <th scope="row"><?php echo $sales_id ?></th>
                                <td scope="row"><?php echo $product_name ?></td>
                                <td scope="row"><?php echo $qty ?></td>
                                <td scope="row"><?php echo $price ?></td>
                                <td scope="row"><?php echo $sales_date ?></td>
                                <td scope="row"><?php echo $notes ?></td>
                                <td scope="row"><?php echo $input_date ?></td>
                                <td scope="row">
                                    <a href="index.php?op=delete&sales_id=<?php echo $sales_id ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                                <td scope="row">
                                    <a href="index.php?op=edit&sales_id=<?php echo $sales_id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>




</body>

</html>