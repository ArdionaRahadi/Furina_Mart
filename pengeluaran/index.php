<?php
session_start();
include "../config/control.php";

if (!isset($_SESSION["login"])) {
  header("location: ../login/");
}

$sqlSelect = select("SELECT * FROM t_barang_keluar");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pengeluaran</title>

    <!-- Bootsrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css" />
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
                        <a class="text-white bg-danger rounded dropdown-item" href="../login/logout.php">Log out</a>
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
                    <a href="../" class="nav-link p-2 rounded">
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
                                    <a href="../kasir/" class="px-2 nav-link">
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
                    <a href="../pemasukan/" class="p-2 nav-link">
                        <span><i class="me-3 bi bi-box-seam-fill"></i></span>
                        <span>Barang Masuk</span>
                    </a>
                </li>
                <li class="px-2 mb-1">
                    <a href="" class="p-2 bg-primary rounded nav-link">
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
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <img class="img-fluid" src="../img/comingSoon.png" alt="Coming Soon">
            <div class="container text-center">
              <h1>Coming Soon</h1>
              <h1>😁😁😁</h1>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- main -->

    <!-- Modal form tambah -->
    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input name="barcode" type="number" class="form-control" id="floatingNoBarang"
                                placeholder="No Barang" required />
                            <label for="floatingNoBarang">Barcode</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="nama_barang" type="text" class="form-control" id="floatingNamaBarang"
                                placeholder="Nama Barang" required />
                            <label for="floatingNamaBarang">Nama Barang</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="harga_barang" type="number" class="form-control" id="floatingHarga"
                                placeholder="Harga" required />
                            <label for="floatingHarga">Harga</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="jumlah_barang" type="number" class="form-control" id="floatingJumlah"
                                placeholder="Jumlah" required />
                            <label for="floatingJumlah">Jumlah</label>
                        </div>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button name="tambah_barang_keluar" type="submit" class="btn btn-primary">
                            <span><i class="bi bi-floppy"></i></span>
                            <span>Save</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal form tambah -->

    <!-- Modal form edit -->
    <?php $i = 1; ?>
    <?php foreach ($sqlSelect as $data): ?>
    <?php $i++; ?>
    <div class="modal fade" id="modalEdit<?= $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="post">
                        <input name="id_barang" type="hidden" value="<?= $data[
                          "id"
                        ] ?>">
                        <div class="form-floating mb-3">
                            <input value="<?= $data[
                              "barcode"
                            ] ?>" name="barcode" type="text"
                                class="form-control" id="floatingNoBarang" placeholder="Barcode" />
                            <label for="floatingNoBarang">Barcode</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="<?= $data[
                              "nama_barang"
                            ] ?>" name="nama_barang" type="text"
                                class="form-control" id="floatingNamaBarang" placeholder="Nama Barang" />
                            <label for="floatingNamaBarang">Nama Barang</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="<?= $data[
                              "harga"
                            ] ?>" name="harga_barang" type="text"
                                class="form-control" id="floatingHarga" placeholder="Harga" />
                            <label for="floatingHarga">Harga</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="<?= $data[
                              "jumlah_barang"
                            ] ?>" name="jumlah_barang" type="number"
                                class="form-control" id="floatingJumlah" placeholder="Jumlah" />
                            <label for="floatingJumlah">Jumlah</label>
                        </div>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button name="edit_barang_keluar" type="submit" class="btn btn-primary">
                            <span><i class="bi bi-floppy"></i></span>
                            <span>Save</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!-- modal form edit -->

    <!-- Modal form hapus -->
    <?php $i = 1; ?>
    <?php foreach ($sqlSelect as $data): ?>
    <?php $i++; ?>
    <div class="modal fade" id="modalHapus<?= $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Yakin Ingin Menghapus Data Ini?</h2>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input name="id_barang" type="hidden" value="<?= $data[
                          "id"
                        ] ?>">
                        <ul class="navbar-nav mb-3">
                            <li>
                                <p class="fw-bold fs-5  text-danger">Barcode: <?= $data[
                                  "barcode"
                                ] ?></p>
                            </li>
                            <li>
                                <p class="fw-bold fs-5 text-danger">Nama Barang: <?= $data[
                                  "nama_barang"
                                ] ?></p>
                            </li>
                            <li>
                                <p class="fw-bold fs-5 text-danger">Harga: Rp.
                                    <?= number_format(
                                      $data["harga"],
                                      0,
                                      ",",
                                      "."
                                    ) ?></p>
                            </li>
                            <li>
                                <p class="fw-bold fs-5 text-danger">Jumlah: <?= $data[
                                  "jumlah_barang"
                                ] ?></p>
                            </li>
                        </ul>

                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            No
                        </button>
                        <button name="hapus_barang_keluar" type="submit" class="btn btn-primary">
                            <span>Yes</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!-- modal form hapus -->

    <!-- Bootsrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>

    <!-- My Script -->
    <script>
    new DataTable('#table', {
        ordering: false
    });

    // Disabel Confirm Resubmition
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>