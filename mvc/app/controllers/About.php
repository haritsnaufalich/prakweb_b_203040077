<?php

class About { 
  public function index($nama = 'Harits', $pekerjaan = 'Mahasiswa') {
    echo "Halo, Nama Saya $nama, Saya adalah Seorang $pekerjaan";
  }

  public function page() {
    echo 'About/page';
  }
}