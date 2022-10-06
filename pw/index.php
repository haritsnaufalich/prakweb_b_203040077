<?php

require 'config/functions.php';

$books = query("SELECT * FROM buku");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="styles/styleIndex.css">
  <title>My BookShelf</title>
  <style>
    .leftImportant {
      text-align: left !important;
    }
  </style>
</head>
<body>
  <div class="container mx-auto my-5">
    <div class="flex justify-center">
      <a href="pages/addData.php" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded" target="_blank">Tambah Data</a>
    </div>
    <table class="table-auto mx-auto mt-5 text-center border-collapse">
      <thead class="bg-blue-200">
        <tr>
          <th class="border border-slate-800 px-4 py-2">#</th>
          <th class="border border-slate-800 px-4 py-2">Cover</th>
          <th class="border border-slate-800 px-4 py-2">Judul</th>
          <th class="border border-slate-800 px-4 py-2">Halaman</th>
          <th class="border border-slate-800 px-4 py-2">Penulis</th>
          <th class="border border-slate-800 px-4 py-2">Tahun</th>
          <th class="border border-slate-800 px-4 py-2">Progres</th>
          <th class="border border-slate-800 px-4 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($books as $book) : ?>
          <tr>
            <td class="border border-slate-800 px-4 py-2"><?= $i; ?></td>
            <td class="border border-slate-800 px-4 py-2"><img src="assets/img/<?= $book['imgBuku']; ?>" alt="" width="100"></td>
            <td class="border border-slate-800 px-4 py-2 leftImportant"><?= $book['judulBuku']; ?></td>
            <td class="border border-slate-800 px-4 py-2"><?= $book['halamanBuku']; ?> Halaman</td>
            <td class="border border-slate-800 px-4 py-2"><?= $book['penulisBuku']; ?></td>
            <td class="border border-slate-800 px-4 py-2"><?= $book['terbitBuku']; ?></td>
            <?php $percentage = $book['halamanBuku'] / 100; ?>
            <?php if ($book['progresBuku'] / $percentage >= 100) {
              $x = 3;
            } elseif ($book['progresBuku'] / $percentage < 10) {
              $x = 1;
            } else {
              $x = 2;
            } ?>
            <?php $progress = substr(($book['progresBuku'] / $percentage), 0, $x); ?>
            <?php if ($progress <= 35) : ?>
              <td class="border border-slate-800 px-4 py-2 text-red-500"><?= $progress; ?>%<p><?= $book['progresBuku'].' dari '.$book['halamanBuku']; ?></p></td>
            <?php elseif ($progress <= 70) : ?>
              <td class="border border-slate-800 px-4 py-2 text-blue-500"><?= $progress; ?>%<p><?= $book['progresBuku'].' dari '.$book['halamanBuku']; ?></p></td>
            <?php elseif ($progress <= 100) : ?>
              <td class="border border-slate-800 px-4 py-2 text-green-500"><?= $progress; ?>%<p><?= $book['progresBuku'].' dari '.$book['halamanBuku']; ?></p></td>
            <?php else : ?>
              <td class="border border-slate-800 px-4 py-2 text-green-500">100%</td>
            <?php endif; ?>
            <td class="border border-slate-800 px-4 py-2">
              <a href="pages/editData.php?id=<?= $book['idBuku']; ?>" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Ubah</a>
              <a href="pages/deleteData.php?id=<?= $book['idBuku']; ?>" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded" onclick="return confirm('Yakin?');">Hapus</a>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>