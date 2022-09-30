<?php

// Connect to the Database prakweb_2022_b_203040077
$conn = mysqli_connect("localhost", "root", "", "prakweb_2022_b_203040077");

// Function Query
function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// Function Upload Image
function uploadImage() {
  $namaFile = $_FILES['imgBuku']['name'];
  $ukuranFile = $_FILES['imgBuku']['size'];
  $error = $_FILES['imgBuku']['error'];
  $tmpName = $_FILES['imgBuku']['tmp_name'];

  if ($error === 4) {
    echo "
      <script>
        alert('Choose Pictures!');
      </script>
    ";
    return false;
  }

  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "
      <script>
        alert('Not Pictures!');
      </script>
    ";
    return false;
  }

  if ($ukuranFile > 1000000) {
    echo "
      <script>
        alert('Too Big!');
      </script>
    ";
    return false;
  }

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);
  return $namaFileBaru;
}

// If Picture is not Changed, Use Old Picture
function uploadImageOld($data) {
  $namaFile = $_FILES['imgBuku']['name'];
  $ukuranFile = $_FILES['imgBuku']['size'];
  $error = $_FILES['imgBuku']['error'];
  $tmpName = $_FILES['imgBuku']['tmp_name'];

  if ($error === 4) {
    return $data;
  }

  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "
      <script>
        alert('Not Pictures!');
      </script>
    ";
    return false;
  }

  if ($ukuranFile > 1000000) {
    echo "
      <script>
        alert('Too Big!');
      </script>
    ";
    return false;
  }

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);
  return $namaFileBaru;
}

// Function addData (``, `judulBuku`, `halamanBuku`, `terbitBuku`, `penulisBuku`, `progresBuku`, `imgBuku`)
function addData($data)
{
  global $conn;

  $judulBuku = htmlspecialchars($data['judulBuku']);
  $halamanBuku = htmlspecialchars($data['halamanBuku']);
  $terbitBuku = htmlspecialchars($data['terbitBuku']);
  $penulisBuku = htmlspecialchars($data['penulisBuku']);
  $progresBuku = htmlspecialchars($data['progresBuku']);
  $imgBuku = uploadImage();

  if (!$imgBuku) {
    return false;
  }

  $query = "INSERT INTO buku VALUES
            ('', '$judulBuku', '$halamanBuku', '$terbitBuku', '$penulisBuku', '$progresBuku', '$imgBuku')
            ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// Function deleteData
function deleteData($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM buku WHERE idBuku = $id");

  return mysqli_affected_rows($conn);
}

// Function editData
function editData($data)
{
  global $conn;

  $idBuku = $data['idBuku'];
  $judulBuku = htmlspecialchars($data['judulBuku']);
  $halamanBuku = htmlspecialchars($data['halamanBuku']);
  $terbitBuku = htmlspecialchars($data['terbitBuku']);
  $penulisBuku = htmlspecialchars($data['penulisBuku']);
  $progresBuku = htmlspecialchars($data['progresBuku']);
  $imgBukuLama = htmlspecialchars($data['imgBukuLama']);
  $imgBuku = uploadImageOld($imgBukuLama);
  if (!$imgBuku) {
    return false;
  }

  $query = "UPDATE buku SET
            judulBuku = '$judulBuku',
            halamanBuku = '$halamanBuku',
            terbitBuku = '$terbitBuku',
            penulisBuku = '$penulisBuku',
            progresBuku = '$progresBuku',
            imgBuku = '$imgBuku'
            WHERE idBuku = $idBuku
            ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
?>