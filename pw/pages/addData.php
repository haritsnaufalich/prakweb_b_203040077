<?php

require '../config/functions.php';

if (isset($_POST['submit'])) {
  if (addData($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = '../index.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal Ditambahkan!');
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
  <title>Tambah Data</title>
</head>
<body>
  <!-- Create Form -->
  <h1>Tambah Data Buku</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
        <label for="judulBuku">Judul Buku</label>
        <input type="text" name="judulBuku" id="judulBuku" required>
      </li>
      <li>
        <label for="halamanBuku">Halaman Buku</label>
        <input type="text" name="halamanBuku" id="halamanBuku" required>
      </li>
      <li>
        <label for="terbitBuku">Tahun Terbit</label>
        <input type="text" name="terbitBuku" id="terbitBuku" required>
      </li>
      <li>
        <label for="penulisBuku">Penulis Buku</label>
        <input type="text" name="penulisBuku" id="penulisBuku" required>
      </li>
      <li>
        <label for="progresBuku">Progres Baca</label>
        <input type="text" name="progresBuku" id="progresBuku" required>
      </li>
      <li>
        <label for="imgBuku">Gambar Buku</label>
        <input type="file" name="imgBuku" id="imgBuku" onchange="previewImage()">
        <img src="../assets/img/default.jpg" width="96" height="126" class="img-preview">
      </li>
      <li>
        <button type="submit" name="submit">Tambah Data</button>
      </li>
    </ul>
  </form>
  <script>
    function previewImage() {
      const imgBuku = document.querySelector('#imgBuku');
      const imgPreview = document.querySelector('.img-preview');

      const oFReader = new FileReader();
      oFReader.readAsDataURL(imgBuku.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      };
    }
  </script>
</body>
</html>