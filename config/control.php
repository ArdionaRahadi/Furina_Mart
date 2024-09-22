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
  $barcodeBarangMasuk = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars($_POST["barcodeBarangMasuk"])
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

  if (
    $barcodeBarangMasuk === "" ||
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
                            $barcodeBarangMasuk,
                            '$namaBarangMasuk',
                              $hargaBarangMasuk,
                              $jumlahBarangMasuk,
                              NOW()
                        )";
    if(mysqli_query($koneksi, $queryInsert)){
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
    } else {
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
}

// edit barang
if(isset($_POST["editBarangMasuk"])){
  $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST["id"]));
  $barcode = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST["editBarcodeBarangMasuk"]));
  $namaBarang = mysqli_real_escape_string($koneksi, htmlspecialchars(ucwords($_POST["editNamaBarangMasuk"])));
  $harga = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST["editHargaBarangMasuk"]));
  $jumlahBarang = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST["editJumlahBarangMasuk"]));

  if($barcode === "" || $namaBarang === "" || $harga === "" || $jumlahBarang === ""){
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
    $queryUpdate = "UPDATE t_barang_masuk SET barcode = $barcode, nama_barang = '$namaBarang', harga = $harga, jumlah_barang = $jumlahBarang WHERE id = $id";
    if(mysqli_query($koneksi, $queryUpdate)) {

        echo "<script>
                setTimeout(function(){
                    Swal.fire({
                        title: 'SUCCESS',
                        text: 'Data Berhasil Di Perbarui',
                        icon: 'success',
                        allowOutsideClick: false
                    })
                },100)
              </script>";
    } else {
        echo "<script>
                setTimeout(function(){
                    Swal.fire({
                        title: 'ERROR',
                        text: 'Data Gagal Di Perbarui',
                        icon: 'error',
                        allowOutsideClick: false
                    })
                },100)
              </script>";
    }
  }
}

// hapus barang
if(isset($_POST{"hapus"})){
  $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST["id"]));

  $queryDelete = "DELETE FROM t_barang_masuk WHERE id = '$id'";
  if(mysqli_query($koneksi, $queryDelete)) {
        echo "<script>
                setTimeout(function(){
                    Swal.fire({
                        title: 'SUCCESS',
                        text: 'Data Berhasil Di Hapus',
                        icon: 'success',
                        allowOutsideClick: false
                    })
                },100)
              </script>";
  } else {
        echo "<script>
                setTimeout(function(){
                    Swal.fire({
                        title: 'ERROR',
                        text: 'Data Gagal Di Hapus',
                        icon: 'error',
                        allowOutsideClick: false
                    })
                },100)
              </script>";
  }
}