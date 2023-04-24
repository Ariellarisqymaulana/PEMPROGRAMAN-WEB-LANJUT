<?php
  include 'koneksi.php';

  $query =  "SELECT * FROM member;";
  $sql   =  mysqli_query($conn , $query);

  $no = 0;
//
  


  
//header
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
    <title>Toko Bunga</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- font -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <!-- navbar -->
    <nav class="nav nav-pills flex-sm-row bg-primary mb-3">
        <a class="flex-sm-fill text-sm-start nav-link text-warning " aria-current="page" href="dashboard.php">Dashboard</a>
        <a class="flex-sm-fill text-sm-start nav-link text-light disabled" color="yellow"href="#">list : member</a>
        <a class="flex-sm-fill text-sm-start nav-link text-light disabled" href="#">User : <?= $user ;?></a>
        <a class="flex-sm-fill text-sm-end nav-link text-light" href="index2.php">Logout</a>
    </nav>

      <!-- judul -->
      <div class="container-fluid">
        <h1 class="mt-5">Data pelanggan</h1>
        <figure>
          <blockquote class="blockquote">
            <p>Data yang telah disimpan</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            CRUD<cite title="Source Title">Create Read Update Delete </cite>
          </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary">
          <i class="fa fa-plus" aria-hidden="true"></i>
          Tambah
        </a>
        <div class="table-responsive mt-3">
          <table class="table align-middle table-bordered table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>nama_member</th>
                <th>email</th>
                <th>telepon</th>
                <th>alamat</th>
                <th>kota</th>
                <th>provinsi</th>
                <th>gender</th>
                <th>username</th>
                <th>password</th>
                <th>foto</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($result = mysqli_fetch_assoc($sql)){
                
              ?>
              <tr>
                <td>
                  <?php echo $result['id']; ?>
                </td>
                <td>
                <?php echo $result['nama_member']; ?>
                </td>
                <td>
                <?php echo $result['email']; ?>
                </td>
                <td>
                <?php echo $result['telp']; ?>
                </td>
                <td>
                <?php echo $result['alamat']; ?>
                </td>
                <td>
                <?php echo $result['kota']; ?>
                </td>
                <td>
                <?php echo $result['provinsi']; ?>
                </td>
                <td>
                <?php echo $result['gender']; ?>
                </td>
                <td>
                <?php echo $result['username']; ?>
                </td>
                <td>
                <?php echo $result['password']; ?>
                </td>
                <td>
                  <img src="img/<?php echo $result['foto']; ?>" style="width: 150px;"alt="">
                </td>
                <td>
                  <a href="kelola.php?ubah=<?php echo $result['id']; ?>" type="button" class="btn btn-sm btn-success">
                    <i class="fa fas-pencil">ubah</i>
                  </a>
                  <a href="proses.php?hapus=<?php echo $result['id']; ?>" type="button"
                   class="btn btn-sm btn-danger" onClick="return confirm ('apakah anda ingin hapus data!!!')">
                    <i class="fa fas-trash">hapus</i>
                  </a>
                </td>
              </tr>
              <?php
              }
              ?>
              
            </tbody>
          </table>
        </div>
      </div>
      



    

    <!-- js -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>