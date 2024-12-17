<?php
session_start();
include "../config/control.php";

// cek sesi
if (isset($_SESSION["login"])) {
  header("location: ../");
}

// Cek Tombol Login Di klik
if (isset($_POST["login"])) {
  // Mengambil Inputan User
  $username = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars(strtolower($_POST["username"]))
  );
  $password = mysqli_real_escape_string(
    $koneksi,
    htmlspecialchars($_POST["password"])
  );

  // Validasi Jika User Tidak Menginputkan Apa-Apa
  if ($username === "" || $password === "") {
    $error = true;
  } else {
    $select = "SELECT * FROM t_users WHERE username = '$username'";
    $querySelect = mysqli_query($koneksi, $select);
    $result = mysqli_fetch_assoc($querySelect);

    // Cek Baris DI Tabel t_users
    if (mysqli_num_rows($querySelect)) {
      if (password_verify($password, $result["password"])) {
        $_SESSION["login"] = $result["username"];
        header("location: ../");
      } else {
        $errorPassword = true;
      }
    } else {
      $errorUsername = true;
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="background-image">
        <div class="container">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-9">
                    <form autocomplete="off" method="post" class="rounded-4 p-4 form">
                        <h1 class="mb-5 text-center fw-bold">LOGIN</h1>
                        <!-- Pesan Jika Inputan Kosong -->
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Semua Inputan Wajib Di isi</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <!-- Pesan Jika Inputan Kosong -->

                        <!-- Pesan Jika Username Tidak Ada -->
                        <?php if (isset($errorUsername)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Username Tidak Terdaftar</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <!-- Pesan Jika Username Tidak Ada -->

                        <!-- Pesan Jika Password Salah -->
                        <?php if (isset($errorPassword)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Password Salah</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <!-- Pesan Jika Password Salah -->

                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Username</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required />
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input name="password" type="password" class="form-control password" id="password"
                                required />
                        </div>
                        <div class="mb-4 form-check d-flex gap-1">
                            <input type="checkbox" class="form-check-input cursor-pointer" id="show-pw" />
                            <label class="form-check-label cursor-pointer" for="show-pw">Show Password</label>
                        </div>
                        <button name="login" type="submit" class="btn btn-primary fw-bold mb-3 login">
                            Log in
                        </button>
                        <a class="text-center text-decoration-none" href="">
                            <p>Forgot Password?</p>
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- My JS -->
    <script src="../js/script.js"></script>
</body>

</html>