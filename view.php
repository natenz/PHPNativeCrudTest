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
        .max-auto {
            width: 1400px;
            justify-content: center;
            display: flex;
            display: grid;
            padding: 15px;
            padding-left: 35px;
        }

        .card {
            margin-top: 10px;
        }

        .table {

            justify-content: center;
            height: auto;
            width: 1300px;
            padding-left: 15px;
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
    <!-- Data Barang Semua -->
    <div class="max-auto">
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

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "SELECT * from tr_sales ORDER BY sales_id ASC";
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

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <!-- Data Barang Januari -->
    <div class="max-auto">
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Barang Bulan Januari
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

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "SELECT * from tr_sales WHERE month(tr_sales.sales_date)='01' ";
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

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <!-- Data Barang Februari -->
    <div class="max-auto">
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Barang Bulan Februari
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

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "SELECT * from tr_sales WHERE month(tr_sales.sales_date)='02' ";
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

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <!-- Data Barang Harga -->
    <div class="max-auto">
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Barang Lebih dari 500.000
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

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "SELECT * from tr_sales WHERE price >= '500000' ";
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