<?php
session_start();
include "config/control.php";

if (!isset($_SESSION["login"])) {
  header("location: login/");
}

$sqlSelect = select("SELECT * FROM t_barang_masuk");
$totalBarang = 0;
foreach ($sqlSelect as $data) {
  $totalBarang += $data["jumlah_barang"];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>

    <!-- Bootsrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <div class="group d-flex align-items-center">
                <!-- offcanvas trigger -->
                <i class="bi bi-list text-white fs-3 navbar-toggler" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"></i>
                <!-- offcanvas trigger -->
                <a class="navbar-brand ms-2" href="#">Furina Mart</a>
            </div>
            <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-person"></i>
                    <span><?= $_SESSION["login"] ?></span>
                </a>

                <ul class="bg-dark dropdown-menu dropdown-menu-end">
                    <li class="p-2">
                        <a class="text-white bg-dark dropdown-item" href="#">Account Setting</a>
                    </li>
                    <li class="px-2 pb-2">
                        <a class="text-white bg-danger rounded dropdown-item" href="login/logout.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0">
            <ul class="navbar-nav px-3 mt-3">
                <p class="text-uppercase">Main</p>
                <li class="px-2 mb-1">
                    <a href="" class="nav-link bg-primary p-2 rounded">
                        <span><i class="me-3 bx bxs-dashboard"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="px-2 mb-1">
                    <a class="p-2 nav-link d-flex align-items-center collapse-link" data-bs-toggle="collapse"
                        href="#collapse-transaksi" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span><i class="me-3 bx bxs-pie-chart-alt-2"></i></span>
                        <span>Transaksi</span>
                        <span class="right-icon ms-auto"><i class="bx bxs-chevron-right"></i></span>
                    </a>
                    <div class="collapse" id="collapse-transaksi">
                        <div class="ps-4">
                            <ul class="navbar-nav">
                                <li class="mb-2 mt-1">
                                    <a href="kasir/" class="px-2 nav-link">
                                        <span><i class="bi bi-cart pe-3"></i></span>
                                        <span>Kasir</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="px-2 mb-1">
                    <a class="p-2 nav-link d-flex align-items-center collapse-link" data-bs-toggle="collapse"
                        href="#collapse-Member" aria-expanded="false" role="button" aria-controls="collapseExample">
                        <span><i class="me-3 bx bxs-data"></i></span>
                        <span>Data Member</span>
                        <span class="right-icon ms-auto"><i class="bx bxs-chevron-right"></i></span>
                    </a>
                    <div class="collapse" id="collapse-Member">
                        <div class="ps-4">
                            <ul class="navbar-nav">
                                <li class="mb-2 mt-1">
                                    <a href="" class="px-2 rounded nav-link bg-regular">
                                        <span><i class="bi bi-suit-spade pe-3"></i></span>
                                        <span>Regular</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="" class="px-2 bg-diamond rounded nav-link">
                                        <span><i class="bi bi-gem pe-3"></i></span>
                                        <span>Premium</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <p class="text-uppercase mt-3">Tables</p>
                <li class="px-2 mb-1">
                    <a href="pemasukan/" class="p-2 nav-link">
                        <span><i class="me-3 bi bi-box-seam-fill"></i></span>
                        <span>Barang Masuk</span>
                    </a>
                </li>
                <li class="px-2 mb-1">
                    <a href="pengeluaran/" class="p-2 nav-link">
                        <span><i class="me-3 bi bi-box-seam"></i></span>
                        <span>Barang Keluar</span>
                    </a>
                </li>
                <p class="text-uppercase mt-3">Other</p>
                <li class="px-2 mb-1">
                    <a href="" class="p-2 nav-link">
                        <span><i class="me-3 bi bi-gear-fill"></i></span>
                        <span>System Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- offcanvas -->

    <!-- main -->
    <main class="my-3">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h2 class="fw-bold">Dashboard</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-bg-primary mb-3">
                        <div class="card-header">
                            <span class="me-1"><i class="bi bi-bag"></i></span>
                            <span>Total Barang</span>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title fw-bold"><?= $totalBarang ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-bg-success mb-3">
                        <div class="card-header">
                            <span class="me-1"><i class="bi bi-bar-chart"></i></span>
                            <span>Omset Bulan Ini</span>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title fw-bold">200.000</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-bg-secondary mb-3">
                        <div class="card-header">
                            <span class="me-1">
                                <i class="bi bi-person-add"></i>
                            </span>
                            <span>Total Pelanggan</span>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title fw-bold">50</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-bg-dark mb-3">
                        <div class="card-header">
                            <span class="me-1"><i class="bi bi-cash-coin"></i></span>
                            <span>Laba</span>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title fw-bold">500.000</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>