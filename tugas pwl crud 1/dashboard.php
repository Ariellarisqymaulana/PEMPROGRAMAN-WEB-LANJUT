<?php
    session_start();
    if(isset($_SESSION["username"])){
        $user = $_SESSION["username"];
    } else {
        header("location:index2.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <nav class="nav nav-pills flex-sm-row bg-primary">
        <a class="flex-sm-fill text-sm-start nav-link text-warning disabled" aria-current="page" href="#">Dashboard</a>
        <a class="flex-sm-fill text-sm-start nav-link text-light disabled" href="#">User : <?= $user ;?></a>
        <a class="flex-sm-fill text-sm-end nav-link text-light" href="index2.php">Logout</a>
    </nav>
    <div class="container p-5">
        <div class="row row-cols-2">
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="#">
                            <img src="img/user.png" class="rounded mx-auto d-block" width="72 cm" alt="...">
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        User
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="kelola.php">
                            <img src="img/barang.png" class="rounded mx-auto d-block" width="72 cm" alt="...">
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        Barang
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="#">
                            <img src="img/order.png" class="rounded mx-auto d-block" width="72 cm" alt="https://www.flaticon.com/free-icons/smart-cart">
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        Order
                    </div>
                </div>
            </div>
            <div>
            <div class="card text-center">
                    <div class="card-body">
                        <a href="beranda.php">
                            <img src="img/member.png"  width="72 cm" alt="...">
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        Member
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>