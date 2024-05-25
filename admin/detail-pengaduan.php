<?php
include "templates/header.php";
include "templates/sidebar-pengaduan.php";

if (isset($_POST['submit'])) {
  if (updatePengaduan($_POST) > 0) {
    echo "<script>alert('Update data successfully!'); window.location='data-pengaduan.php';</script>";
    } else {
        echo "<script>alert('Data update failed or you did not make any changes!'); window.location='data-pengaduan.php';</script>";
    }
  }

$id = $_GET['id'];
$data = query("SELECT * FROM pengaduan WHERE id = '$id'");
foreach ($data as $d) :

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Konsultasi <?= $d['id']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Report</a></li>
              <li class="breadcrumb-item active">Bulanan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <form action="" method="POST">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-2">
              <label for="id">Nomor Pengaduan :</label>
              <input type="text" name="id" id="id" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['id']; ?>" readonly>
              </div>
              <div class="col-md-2">
              <label for="tgl">Tanggal Pengaduan :</label>
              <input type="text" name="tgl" id="tgl" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['tgl_lapor']; ?>" readonly>
              </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="nk">Nama :</label>
                  <input type="text" name="nk" id="nk" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['n_konsul']; ?>" readonly>
                </div>
                <div class="col-md-4">
                  <label for="jk">Jenis Kelamin :</label>
                  <input type="text" name="jk" id="jk" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['j_kelamin']; ?>" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="ak">Alamat :</label>
                  <input type="text" name="ak" id="ak" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['a_konsul']; ?>" readonly>
                </div>
                <div class="col-md-4">
                  <label for="uk">Usia :</label>
                  <input type="text" name="uk" id="uk" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['u_konsul']; ?>" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <label for="ket">Keterangan :</label>
                  <textarea name="ket" id="ket" class="form-control mb-3 bg-transparent" style="cursor: default;" readonly><?= $d['ket']; ?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4" style="border: 1px solid #ced4da; border-radius: 5px; margin: 7px 7px; padding: 7px 10px;">
                  <p><b>Status :</b></p>
                  <?php
                    if ($d['status'] == 'Sedang diajukan') {
                  ?>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="Sedang diajukan" id="opt1" name="status" class="custom-control-input" checked>
                    <label class="custom-control-label" for="opt1">Sedang diajukan</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="Sedang diproses" id="opt2" name="status" class="custom-control-input">
                    <label class="custom-control-label" for="opt2">Sedang diproses</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="Selesai diproses" id="opt3" name="status" class="custom-control-input">
                    <label class="custom-control-label" for="opt3">Selesai diproses</label>
                  </div>
                    <?php
                    } elseif ($d['status'] == 'Sedang diproses') {
                    ?>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" value="Sedang diajukan" id="opt1" name="status" class="custom-control-input">
                        <label class="custom-control-label" for="opt1">Sedang diajukan</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" value="Sedang diproses" id="opt2" name="status" class="custom-control-input" checked>
                        <label class="custom-control-label" for="opt2">Sedang diproses</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" value="Selesai diproses" id="opt3" name="status" class="custom-control-input">
                        <label class="custom-control-label" for="opt3">Selesai diproses</label>
                      </div>
                        <?php                
                        } else {
                        ?>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" value="Sedang diajukan" id="opt1" name="status" class="custom-control-input">
                            <label class="custom-control-label" for="opt1">Sedang diajukan</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" value="Sedang diproses" id="opt2" name="status" class="custom-control-input">
                            <label class="custom-control-label" for="opt2">Sedang diproses</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" value="Selesai diproses" id="opt3" name="status" class="custom-control-input" checked>
                            <label class="custom-control-label" for="opt3">Selesai diproses</label>
                          </div>
                        <?php
                        }
                        ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 mt-2">
                  <label for="ket_petugas">Catatan dari petugas :</label>
                  <textarea name="ket_petugas" id="ket_petugas" class="form-control mb-2"><?= $d['ket_petugas']; ?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 mt-2">
                  <button type="submit" value="submit" name="submit" class="btn btn-outline-success mr-2" style="width: 100px;">
                    <span class="fas fa-check mr-2"></span>
                    Save
                  </button>
                  <button type="reset" value="reset" class="btn btn-outline-danger mr-2" style="width: 100px;">
                    <span class="fas fa-times mr-2"></span>
                    Reset
                  </button>
                  <a href="#" class="btn btn-outline-primary" onclick="history.back()" style="width: 100px;">
                    <span class="fas fa-arrow-left mr-2"></span>
                    Back
                  </a>
                </div>
              </div>
          </div>
          </form>
        </div>
        <!-- /.card-body -->
        <?php
        endforeach;
        ?>
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
<?php
include "templates/footer.php";
?>