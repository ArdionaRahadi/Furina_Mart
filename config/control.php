<?php
include "koneksi.php";

function select($querySelect){
    global $koneksi;

    $query = mysqli_query($koneksi, $querySelect);
    $result = [];
    while($fetch = mysqli_fetch_assoc($query)){
        $result[] = $fetch;
    }
    return $result;
}

if(isset($_POST["tambah"])){
    $noBarang = mysqli_real_escape_string($koneksi, htmlspecialchars(strtoupper($_POST["no_barang"])));
    $namaBarang = mysqli_real_escape_string($koneksi, htmlspecialchars(ucfirst($_POST["nama_barang"])));
    $harga = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST["harga"]));     
    $jumlahBarang = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST["jumlah_barang"]));

    // var_dump("ok");
    
    if($noBarang === "" || $namaBarang === "" || $harga === "" || $jumlahBarang === ""){
        echo "<script>
                setTimeout(function(){
                    Swal.fire({
                        title: \"ERROR\",
                        text: \"Inputan Tidak Boleh Kosong\",
                        icon: \"error\",
                        showConfirmButton: false
                    })
                },100)
                setTimeout(function(){
                    location.replace(\"index.php\");
                },1500)
              </script>";
    } else {
        $queryInsert = "INSERT INTO t_barang_masuk VALUES (
                            NULL,
                            \"$noBarang\",
                            \"$namaBarang\",
                              $harga,
                              $jumlahBarang,
                              NOW()
                        )";
        $sqlInsert = mysqli_query($koneksi, $queryInsert);
                        
        echo "<script>
                setTimeout(function(){
                    Swal.fire({
                        title: \"SUCCESS\",
                        text: \"Data Berhasil Di Tambahkan\",
                        icon: \"success\",
                        showConfirmButton: false
                    })
                },100)
                setTimeout(function(){
                    location.replace(\"index.php\");
                },2000)
              </script>";
    }
}