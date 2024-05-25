<?php
include 'templates/header.php';
require 'function.php';
if (isset($_POST['submit'])) {
    if (insertPengaduan($_POST) > 0) {
        echo "<script>alert('Data Konsultasi Anda berhasil terkirim.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data Konsultasi Anda gagal terkirim.'); window.location='form-konsultasi.php';</script>";
    }
}

$query = mysqli_query($conn, "SELECT max(id) as kodeTerbesar FROM pengaduan");
$r = mysqli_fetch_array($query);
$kodeKonsultasi = $r['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeKonsultasi, 6, 6);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "UNP";
$kodeKonsultasi = $huruf . sprintf("%06s", $urutan);
?>      
      <h1 style="margin-top: -40px;">Form konsultasi Parenting Anak</h1>
      <form action="" method="POST">
        <div class="form-row p-3">
          <div class="form-group">
              <label for="id">Nomor konsultasi</label>
              <input type="text" name="id" id="id" class="form-control" value="<?= $kodeKonsultasi; ?>" style="cursor: default;" readonly>
              <p class="text-sm"><span style="color: red;">*</span>Harap catat kode untuk melakukan pengecekan melalui kolom pencarian.</p>
          <div>
          <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control"  required>
          <div>
          <div class="form-group">
              <label for="Jenis_kelamin">Jenis Kelamin</label>
              <input type="text" name="Jenis_kelamin" id="Jenis_kelamin" class="form-control" required>
          <div>
          <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" name="alamat" id="alamat" class="form-control" required>
          <div>
          <div class="form-group">
              <label for="usia">Usia</label>
              <input type="text" name="usia" id="usia" class="form-control" required>
          <div>
          <div class="form-group">
              <label for="ket">Keterangan konsultasi</label>
              <textarea name="ket" id="ket" class="form-control" required></textarea>
          <div>
          <button class="btn btn-outline-success mt-3 mr-3" type="submit" name="submit" style="width: 100px;"><span class="fas fa-paper-plane mr-2"></span>Kirim</button>
          <button class="btn btn-outline-danger mt-3" type="reset" name="reset" style="width: 130px;"><span class="fas fa-undo mr-2"></span>Reset Form</button>
        </div>
      </form>
      
<?php
include 'templates/footer.php';
?>
