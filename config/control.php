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

// Tambah
if (isset($_POST["tambah_barang_masuk"])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barcode = trim(
      mysqli_real_escape_string($koneksi, htmlspecialchars($_POST["barcode"]))
    );
    $namaBarang = trim(
      mysqli_real_escape_string(
        $koneksi,
        htmlspecialchars(ucwords($_POST["nama_barang"]))
      )
    );
    $hargaBarang = trim(
      mysqli_real_escape_string(
        $koneksi,
        htmlspecialchars($_POST["harga_barang"])
      )
    );
    $jumlahBarang = trim(
      mysqli_real_escape_string(
        $koneksi,
        htmlspecialchars($_POST["jumlah_barang"])
      )
    );
    if (
      empty($barcode) ||
      empty($namaBarang) ||
      empty($hargaBarang) ||
      empty($jumlahBarang)
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
      if (
        strlen($barcode) !== 8 &&
        strlen($barcode) !== 9 &&
        strlen($barcode) !== 10 &&
        strlen($barcode) !== 11 &&
        strlen($barcode) !== 12
      ) {
        echo "<script>
                    setTimeout(function(){
                        Swal.fire({
                          title: 'ERROR',
                          text: 'Panjang Barcode Harus 8 - 12',
                          icon: 'error',
                          allowOutsideClick: false
                        })
                    },100)
                  </script>";
      } else {
        $queryInsert = "INSERT INTO t_barang_masuk VALUES (
                              NULL,
                              '$barcode',
                             '$namaBarang',
                              $hargaBarang,
                              $jumlahBarang,
                              NOW()
                          )";
        if (mysqli_query($koneksi, $queryInsert)) {
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
                      title: 'ERROR',
                      text: 'Data Gagal Di Tambahkan',
                      icon: 'error',
                      allowOutsideClick: false
                    })
                },100)
              </script>";
        }
      }
    }
  }
}

// edit barang
if (isset($_POST["edit_barang_masuk"])) {
  $idBarang = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars($_POST["id_barang"])
  );
  $barcode = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars($_POST["barcode"])
  );
  $namaBarang = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars(ucwords($_POST["nama_barang"]))
  );
  $hargaBarang = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars($_POST["harga_barang"])
  );
  $jumlahBarang = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars($_POST["jumlah_barang"])
  );

  if (
    $barcode === "" ||
    $namaBarang === "" ||
    $hargaBarang === "" ||
    $jumlahBarang === ""
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
    $queryUpdate = "UPDATE t_barang_masuk SET barcode = '$barcode', nama_barang = '$namaBarang', harga = $hargaBarang, jumlah_barang = $jumlahBarang WHERE id = $idBarang";
    if (mysqli_query($koneksi, $queryUpdate)) {
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
if (isset($_POST["hapus_barang_masuk"])) {
  $id = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars($_POST["id_barang"])
  );

  $queryDelete = "DELETE FROM t_barang_masuk WHERE id = '$id'";
  if (mysqli_query($koneksi, $queryDelete)) {
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
