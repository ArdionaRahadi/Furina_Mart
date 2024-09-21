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
                        title: 'ERROR',
                        text: 'Inputan Tidak Boleh Kosong',
                        icon: 'error',
                        allowOutsideClick: false
                    })
                },100)
              </script>";
  } else {
    $queryInsert = "INSERT INTO t_barang_masuk VALUES (
                            NULL,
                            '$noBarangMasuk',
                            '$namaBarangMasuk',
                              $hargaBarangMasuk,
                              $jumlahBarangMasuk,
                              NOW()
                        )";
    $sqlInsert = mysqli_query($koneksi, $queryInsert);

    echo "<script>
                setTimeout(function(){
                    Swal.fire({
                        title: 'SUCCESS',
                        text: 'Data Berhasil Di Tambahkan',
                        icon: 'success',
                        allowOutsideClick: false
                    })
                },100)
              </script>";
  }
}