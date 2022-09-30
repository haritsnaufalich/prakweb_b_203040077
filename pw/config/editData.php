<?php

require 'functions.php';

$id = $_GET['id'];
$buku = query("SELECT * FROM buku WHERE idBuku = $id")[0];

if (isset($_POST['submit'])) {
  if (editData($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Diubah!');
            document.location.href = '../index.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal Diubah!');
            document.location.href = '../index.php';
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
  <title>Edit Data</title>
</head>
<body>
  <!-- Create Form -->
  <h1>Edit Data Buku</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
        <input type="hidden" name="idBuku" value="<?= $buku['idBuku']; ?>">
        <input type="hidden" name="imgBukuLama" value="<?= $buku['imgBuku']; ?>">
      </li>
      <li>
        <label for="judulBuku">Judul Buku</label>
        <input type="text" name="judulBuku" id="judulBuku" required value="<?= $buku['judulBuku']; ?>">
      </li>
      <li>
        <label for="halamanBuku">Halaman Buku</label>
        <input type="text" name="halamanBuku" id="halamanBuku" required value="<?= $buku['halamanBuku']; ?>">
      </li>
      <li>
        <label for="terbitBuku">Tahun Terbit</label>
        <input type="text" name="terbitBuku" id="terbitBuku" required value="<?= $buku['terbitBuku']; ?>">
      </li>
      <li>
        <label for="penulisBuku">Penulis Buku</label>
        <input type="text" name="penulisBuku" id="penulisBuku" required value="<?= $buku['penulisBuku']; ?>">
      </li>
      <li>
        <label for="progresBuku">Progres Baca</label>
        <input type="text" name="progresBuku" id="progresBuku" required value="<?= $buku['progresBuku']; ?>">
      </li>
      <li>
        <?php if ($buku['imgBuku'] == '') : ?>
          <label for="imgBuku">Gambar Buku</label>
          <input type="file" name="imgBuku" id="imgBuku" class="imgBuku">
        <?php else : ?>
          <img src="../assets/img/<?= $buku['imgBuku']; ?>" width="96" height="126" class="img-preview">
          <input type="file" name="imgBuku" id="imgBuku" class="imgBuku">
        <?php endif; ?>
      </li>
      <li>
        <button type="submit" name="submit">Edit Data</button>
      </li>
    </ul>
  </form>
  <script>
    const imgBuku = document.querySelector('.imgBuku');
    imgBuku.addEventListener('change', function() {
      const imgBuku = document.querySelector('.imgBuku');
      const imgPreview = document.querySelector('.img-preview');

      const fileImgBuku = new FileReader();
      fileImgBuku.readAsDataURL(imgBuku.files[0]);

      fileImgBuku.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    });
  </script>
</body>
</html>