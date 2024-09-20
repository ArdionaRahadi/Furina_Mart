<?php
include "koneksi.php";

function select($querySelect)
{
  global $koneksi;

  $query = mysqli_query($koneksi, $querySelect);
  $result = [];
  while ($fetch = mysqli_fetch_assoc($query)) {
    $result[] = $fetch;
  }
  return $result;
}

if (isset($_POST["tambahBarangMasuk"])) {
  $noBarangMasuk = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars(strtoupper($_POST["noBarangMasuk"]))
  );
  $namaBarangMasuk = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars(ucwords($_POST["namaBarangMasuk"]))
  );
  $hargaBarangMasuk = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars($_POST["hargaBarangMasuk"])
  );
  $jumlahBarangMasuk = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars($_POST["jumlahBarangMasuk"])
  );

  // var_dump("ok");

  if (
    $noBarangMasuk === "" ||
    $namaBarangMasuk === "" ||
    $hargaBarangMasuk === "" ||
    $jumlahBarangMasuk === ""
  ) {
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
                            \"$noBarangMasuk\",
                            \"$namaBarangMasuk\",
                              $hargaBarangMasuk,
                              $jumlahBarangMasuk,
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

if (isset($_POST["tambahBarangKeluar"])) {
  $noBarangKeluar = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars(strtoupper($_POST["noBarangKeluar"]))
  );
  $namaBarangKeluar = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars(ucwords($_POST["namaBarangKeluar"]))
  );
  $hargaBarangKeluar = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars($_POST["hargaBarangKeluar"])
  );
  $jumlahBarangKeluar = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars($_POST["jumlahBarangKeluar"])
  );
  
  if (
    $noBarangKeluar === "" ||
    $namaBarangKeluar === "" ||
    $hargaBarangKeluar === "" ||
    $jumlahBarangKeluar === ""
  ) {
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
    $queryInsert = "INSERT INTO t_barang_keluar VALUES (
                            NULL,
                            \"$noBarangKeluar\",
                            \"$namaBarangKeluar\",
                              $hargaBarangKeluar,
                              $jumlahBarangKeluar,
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
