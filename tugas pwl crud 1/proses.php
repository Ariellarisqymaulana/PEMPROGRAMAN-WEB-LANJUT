<?php
    include 'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

                    
            
            $id = $_POST['id'];
            $nama_member = $_POST['nama_member'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];
            $kota = $_POST['kota'];
            $provinsi = $_POST['provinsi'];
            $gender = $_POST['gender'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $foto = $_FILES['foto']['name'];

            $dir = "img/";
            $tmpFile = $_FILES['foto']['tmp_name'];
            
            move_uploaded_file($tmpFile, $dir.$foto);

            //die();

            $query = "INSERT INTO member VALUES('$id','$nama_member','$email','$telp','$alamat','$kota','$provinsi','$gender','$username','$password','$foto')";

            $sql = mysqli_query($conn , $query);

            if($sql){
                header("location: beranda.php");
            }else{
                echo $query;
            }

            
           // echo $id."|".$nama_member."|".$email."|".$telepon."|".$alamat."|".$kota."|".$provinsi."|".$gender."|".$ussername."|".$password."|".$foto;



           // echo "<br>data telah ditambahkan <a href='beranda.php'>[HOME]</a>"; 
        } else if($_POST['aksi'] == "edit"){
            echo "data telah diedit <a href='beranda.php'>[HOME]</a>";

            // var_dumb($_POST);

            $id = $_POST['id'];
            $nama_member = $_POST['nama_member'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];
            $kota = $_POST['kota'];
            $provinsi = $_POST['provinsi'];
            $gender = $_POST['gender'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $queryShow =" SELECT * FROM member where id= '$id'";
            $sqlShow = mysqli_query($conn , $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            if($_FILES['foto']['name'] == ""){
                $foto = $result['foto'];
            }else{
                $foto = $_FILES['foto']['name'];
                unlink("img/".$result['foto']);
                move_uploaded_file($_FILES['foto']['tmp_name'],'img/'.$_FILES['foto']['name']);
            }
            

            $query = "UPDATE member SET  nama_member ='$nama_member', email ='$email',telp ='$telp', alamat ='$alamat', kota ='$kota', provinsi ='$provinsi', gender ='$gender', username = '$username', password ='$password', foto = '$foto' WHERE id = '$id';";   

            $sql = mysqli_query($conn, $query);
            header("location: beranda.php");
        }   
        
    }
    if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];
        $queryShow =" SELECT * FROM member where id= '$id'";
        $sqlShow = mysqli_query($conn , $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        // var_dump($result);
        unlink("img/".$result['foto']);

        $query = "DELETE FROM member WHERE id ='$id'";

        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: beranda.php");
            //echo "data telah ditambahkan <a href='beranda.php'>[HOME]</a>";
        }else{
            echo $query;
        }
       // echo "data telah dihapus <a href='beranda.php'>[HOME]</a>";
    }
?>