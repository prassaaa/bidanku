<?php
include 'templates/header.php';
require 'function.php';
?>      
  <h1 class="display-4" style="margin-top: -50px;">Status Konsultasi Anda</h1>

  <div class="row">
    <div class="col">
        <?php
          $keyword = $_POST['keyword'];
          $data = query("SELECT * FROM pengaduan WHERE id = '$keyword'");
          if ($data) {
          foreach ($data as $d) :
        ?>
          <p>Nomor Konsultasi : <?= $d['id']; ?></p>
          <p>Tanggal Konsultasi : <?= $d['tgl_lapor']; ?></p>
          <p>Nama : <?= $d['n_konsul']; ?></p>
          <p>Jenis Kelamin : <?= $d['j_kelamin']; ?></p>
          <p>Alamat : <?= $d['a_konsul']; ?></p>
          <p>Usia : <?= $d['u_konsul']; ?></p>
          <p>Keterangan : <?= $d['ket']; ?></p>
          <p>Status : <?= $d['status']; ?></p>
          <p><b><u>Catatan dari petugas</u></b> <br><?= $d['ket_petugas']; ?></p>
          <br>
          <a href="index.php" class="btn btn-sm btn-primary" style="width: 80px;"><span class="fas fa-arrow-left mr-2"></span>Back</a>
        <?php
        endforeach;
        } else {
            echo"<p>Data Konsultasitidak ditemukan.</p>";
        }
        ?>
    </div>
    
  </div>
<?php
include 'templates/footer.php';
?>
