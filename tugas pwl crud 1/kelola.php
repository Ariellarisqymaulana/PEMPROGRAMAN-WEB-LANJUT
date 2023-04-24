<?php
    include 'koneksi.php';

    session_start();
    if(isset($_SESSION["username"])){
        $user = $_SESSION["username"];
    } else {
        header("location:index2.php");
    }

    //ubah
      $id ='';
      $nama_member ='';
      $email ='';
      $telp ='';
      $alamat ='';
      $kota ='';
      $provinsi ='';
      $gender =''; 
      $username ='';
      $password ='';
      $foto ='';

    if(isset($_GET['ubah'])){
      $id = $_GET['ubah'];
      
      $query = "SELECT * FROM `member` WHERE id='$id'";
      $sql = mysqli_query($conn,$query);

      $result = mysqli_fetch_assoc($sql);

      $id = $result['id'];
      $nama_member = $result['nama_member'];
      $email = $result['email'];
      $telp = $result['telp'];
      $alamat = $result['alamat'];
      $kota = $result['kota'];
      $provinsi = $result['provinsi'];
      $gender = $result['gender']; 
      $username = $result['username'];
      $password = $result['password'];
      $foto = $result['foto'];
      
      // var_dump($result); 

      // die();
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
        <a class="flex-sm-fill text-sm-start nav-link text-light " href="kelola.php">User : barang</a>
        <a class="flex-sm-fill text-sm-start nav-link text-light disabled" href="#">User : <?= $user ;?></a>
        <a class="flex-sm-fill text-sm-end nav-link text-light" href="index2.php">Logout</a>
    </nav>

      <!-- kelola -->
      <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $id?>" name="id">
          <div class="mb-3 row">
              <label for="id" class="col-sm-2 col-form-label">ID</label>
              <div class="col-sm-10">
                <input required type="text" name="id" class="form-control" id="id" placeholder="Ex: 112233" value="<?php echo $id?>">
              </div>
          </div>
          <div class="mb-3 row">
              <label for="nama member" class="col-sm-2 col-form-label">nama member</label>
              <div class="col-sm-10">
                <input required type="text" name="nama_member" class="form-control" id="nama_member" placeholder="Ex: jons" value="<?php echo $nama_member?>">
              </div>
          </div>
          <div class="mb-3 row">
              <label for="nama member" class="col-sm-2 col-form-label">email</label>
              <div class="col-sm-10">
                <input required type="text" name="email" class="form-control" id="email" placeholder="Ex: jons@gmail.com" value="<?php echo $email?>">
              </div>
          </div>

          <div class="mb-3 row">
              <label for="telepon" class="col-sm-2 col-form-label">telepon</label>
              <div class="col-sm-10">
                <input required type="text" name="telp" class="form-control" id="telp" placeholder="Ex: 089121319040" value="<?php echo $telp?>">
              </div>
          </div>
          <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat?></textarea>
            </div>
          <div class="mb-3 row">
              <label for="kota" class="col-sm-2 col-form-label">kota</label>
              <div class="col-sm-10">
                <input required type="text" class="form-control" id="kota" name="kota" placeholder="Ex: kota" value="<?php echo $kota?>">
              </div>
          </div>
          <div class="mb-3 row">
              <label for="provinsi" class="col-sm-2 col-form-label">provinsi</label>
              <div class="col-sm-10">
                <input required type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Ex: provinsi" value="<?php echo $provinsi?>">
              </div>
          </div>
          <div class="mb-3 row">
              <label for="gender" class="col-sm-2 col-form-label">gender</label>
              <div class="col-sm-10">
                  <select required id="gender" name="gender" class="form-select" aria-label="Default select example" value="<?php echo $gender?>">
                      <option selected>jenis kelamin</option>
                      <option >laki laki</option>
                      <option >perempuan</option>
                  </select>
              </div>
          </div>
          <div class="mb-3 row">
              <label for="username" class="col-sm-2 col-form-label">username</label>
              <div class="col-sm-10">
                <input required type="text" class="form-control" id="username" name="username" placeholder="Ex: jons123" value="<?php echo $username?>">
              </div>
          </div>
          <div class="mb-3 row">
              <label for="password" class="col-sm-2 col-form-label">password</label>
              <div class="col-sm-10">
                <input selected type="text" class="form-control" id="password" name="password" value="<?php echo $password?>">
              </div>
          </div>
          <div class="mb-3">
              <label for="foto" class="form-label">foto</label>
              <input <?php if(!isset($_GET['ubah'])){echo "required";}?>selected class="form-control" type="file" id="foto" name="foto" accept="image/*" value="<?php echo $foto?>">
            </div>


            <div class="mb-3 row">
              <div class="col">
                <?php
                  if(isset($_GET['ubah'])){
                ?>
                  <button type="submit" name="aksi" value="edit" class="btn btn-primary">Simpan Perubahan</button>
                <?php
                  }else {
                ?>
                  <button  type="submit" name ="aksi" value="add" class="btn btn-primary">Tambahkan</button>
                <?php
                  }
                ?>
                  <a href="beranda.php" type="button" class="btn btn-danger">batal</a>
              </div>
                
            </div>
        </form>


          
      </div>
      



    

    <!-- js -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>