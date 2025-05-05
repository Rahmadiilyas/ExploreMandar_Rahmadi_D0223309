<!DOCTYPE html>
<html lang="id">
<head>
  <style>
    table { width: 100%; border-collapse: collapse; margin-bottom: 1.5em; }
    th, td { border: 1px solid #aaa; padding: 0.5em; text-align: left; }
    th { background: #f0f0f0; }
    hr { margin: 2em 0; }
  </style>
</head>
<body>

  <!-- Sampul -->
  <div style="height:100vh; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;">
    <h2 style="margin:0; font-size:3em; color:#333;">EXPLORE MANDAR</h2>
    <img src="/img/th.jpg" alt="Logo Explore Mandar"
         style="display:block; margin:1em auto; max-width:80%; height:auto;" />
    <h2 style="margin:0; font-size:2em; color:#333;">RAHMADI</h2>
    <h2 style="margin:0; font-size:2em; color:#333;">D0223309</h2>
    <h2 style="margin:0; font-size:2em; color:#333;">FRAMEWORK WEB BASED</h2>
    <h2 style="margin-top:0.5em; font-size:2em; color:#333;">2025</h2>
  </div>

  <hr>

  <!-- Role & Fitur -->
  <h2>Role</h2>

  <h2>1. Admin</h2>
  <p><strong>Tugas:</strong> Mengelola pengguna, manajemen sistem.</p>
  <h3>Fitur Admin:</h3>
  <ul>
    <li>Dashboard Admin</li>
    <li>Kelola Pengguna (tambah, lihat, edit, hapus user)</li>
    <li>Lihat Data Kategori (opsional untuk pengawasan)</li>
    <li>Lihat Data Produk (opsional untuk pengawasan)</li>
    <li>Lihat Data Pesanan (opsional)</li>
    <li>Lihat Laporan Pembayaran (opsional)</li>
    <li>Lihat Ulasan & Verifikasi (opsional)</li>
    <li>Lihat Wisata (opsional)</li>
  </ul>
  <h3>Tabel yang Dikelola:</h3>
  <ul>
    <li><code>users</code> – tambah, ubah, lihat, hapus user</li>
    <li><em>(opsional)</em> <code>produk</code>, <code>pesanan</code>, <code>pembayaran</code>, <code>ulasan</code>, <code>kategori</code>, <code>wisata</code></li>
  </ul>

  <hr>

  <h2>2. Kreator (Penjual)</h2>
  <p><strong>Fitur:</strong> Mengelola produk, melihat & verifikasi pesanan & pembayaran, serta mengelola wisata.</p>
  <h3>Menu Kreator:</h3>
  <ul>
    <li>Dashboard Kreator</li>
    <li>Kelola Produk (tambah, lihat, edit, hapus)</li>
    <li>Kelola Wisata (tambah, lihat, edit, hapus)</li>
    <li>Lihat Pesanan Masuk</li>
    <li>Verifikasi Pembayaran</li>
    <li>Lihat Ulasan Produk</li>
    <li><em>(opsional)</em> Kelola Kategori</li>
  </ul>
  <h3>Tabel yang Dikelola:</h3>
  <ul>
    <li><code>produk</code> – buat produk, ubah stok</li>
    <li><code>wisata</code> – kelola wisata</li>
    <li><code>kategori</code> – kelola kategori</li>
    <li><code>pembayaran</code> – ubah status pembayaran</li>
    <li><code>ulasan</code> – verifikasi ulasan</li>
  </ul>

  <hr>

  <h2>3. Pembeli (User biasa)</h2>
  <p><strong>Tugas:</strong> Melihat produk, pesan, unggah bukti pembayaran, beri ulasan.</p>
  <h3>Menu Pembeli:</h3>
  <ul>
    <li>Dashboard Pembeli</li>
    <li>Lihat Produk</li>
    <li>Tambah ke Keranjang</li>
    <li>Checkout & Buat Pesanan</li>
    <li>Upload Bukti Pembayaran</li>
    <li>Lihat Status Pembayaran</li>
    <li>Tulis Ulasan</li>
  </ul>
  <h3>Tabel yang Dikelola:</h3>
  <ul>
    <li><code>keranjang</code> – tambah produk ke keranjang</li>
    <li><code>pesanan</code> – buat pesanan, cek status</li>
    <li><code>ulasan</code> – tulis ulasan produk</li>
  </ul>

  <hr>

  <!-- Struktur Tabel -->
  <h3>Table: users</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
      <tr><td>name</td><td>string</td><td>Nama pengguna</td></tr>
      <tr><td>email</td><td>string (unique)</td><td>Email pengguna</td></tr>
      <tr><td>email_verified_at</td><td>timestamp</td><td>Verifikasi email</td></tr>
      <tr><td>password</td><td>string</td><td>Hash bcrypt</td></tr>
      <tr><td>role</td><td>enum</td><td>admin, kreator, pembeli</td></tr>
      <tr><td>alamat</td><td>string</td><td>Alamat</td></tr>
      <tr><td>nomor_telepon</td><td>string</td><td>Telepon</td></tr>
      <tr><td>remember_token</td><td>string</td><td>Token sesi</td></tr>
      <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
    </tbody>
  </table>

  <h3>Table: kategori</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
      <tr><td>nama</td><td>string</td><td>Nama kategori</td></tr>
      <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
    </tbody>
  </table>

  <h3>Table: produk</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
      <tr><td>nama</td><td>string</td><td>Nama produk</td></tr>
      <tr><td>harga</td><td>integer</td><td>Harga</td></tr>
      <tr><td>deskripsi</td><td>text</td><td>Deskripsi</td></tr>
      <tr><td>kategori_id</td><td>foreignId</td><td>Relasi kategori</td></tr>
      <tr><td>gambar</td><td>string</td><td>Path gambar</td></tr>
      <tr><td>stok</td><td>integer</td><td>Stok default 0</td></tr>
      <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
    </tbody>
  </table>

  <h3>Table: pesanan</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
      <tr><td>user_id</td><td>foreignId</td><td>Relasi users</td></tr>
      <tr><td>produk_id</td><td>foreignId</td><td>Relasi produk</td></tr>
      <tr><td>jumlah</td><td>integer</td><td>Jumlah item</td></tr>
      <tr><td>total_harga</td><td>integer</td><td>Total harga</td></tr>
      <tr><td>status</td><td>string</td><td>Status pesanan</td></tr>
      <tr><td>status_pembayaran</td><td>string</td><td>Belum/Sudah dibayar</td></tr>
      <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
    </tbody>
  </table>

  <h3>Table: detail_pesanan</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
      <tr><td>pesanan_id</td><td>foreignId</td><td>Relasi pesanan</td></tr>
      <tr><td>produk_id</td><td>foreignId</td><td>Relasi produk</td></tr>
      <tr><td>jumlah</td><td>integer</td><td>Jumlah</td></tr>
      <tr><td>sub_total</td><td>integer</td><td>Harga × jumlah</td></tr>
      <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
    </tbody>
  </table>

  <h3>Table: pembayaran</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
      <tr><td>pesanan_id</td><td>foreignId</td><td>Relasi pesanan</td></tr>
      <tr><td>nama_penerima</td><td>string</td><td>Nama penerima</td></tr>
      <tr><td>alamat_pengiriman</td><td>string</td><td>Alamat tujuan</td></tr>
      <tr><td>nomor_telepon</td><td>string</td><td>No HP</td></tr>
      <tr><td>catatan</td><td>string</td><td>Catatan (nullable)</td></tr>
      <tr><td>bukti_pembayaran</td><td>string</td><td>Path file (nullable)</td></tr>
      <tr><td>status</td><td>enum</td><td>menunggu/disetujui/ditolak</td></tr>
      <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
    </tbody>
  </table>

  <h3>Table: ulasan</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
      <tr><td>produk_id</td><td>foreignId</td><td>Relasi produk</td></tr>
      <tr><td>user_id</td><td>foreignId</td><td>Relasi user</td></tr>
      <tr><td>isi</td><td>text</td><td>Isi ulasan</td></tr>
      <tr><td>rating</td><td>tinyint</td><td>1–5</td></tr>
      <tr><td>verifikasi</td><td>boolean</td><td>True/False</td></tr>
      <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
    </tbody>
  </table>

  <h3>Table: wisata</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
      <tr><td>nama</td><td>string</td><td>Nama wisata</td></tr>
      <tr><td>deskripsi</td><td>text</td><td>Deskripsi</td></tr>
      <tr><td>lokasi</td><td>string</td><td>Alamat</td></tr>
      <tr><td>gambar</td><td>string</td><td>Path (nullable)</td></tr>
      <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
    </tbody>
  </table>

  <h3>Table: galeri</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
      <tr><td>judul</td><td>string</td><td>Judul gambar</td></tr>
      <tr><td>path_gambar</td><td>string</td><td>Path file</td></tr>
      <tr><td>wisata_id</td><td>foreignId</td><td>Relasi wisata (nullable)</td></tr>
      <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
    </tbody>
  </table>

  <h3>Table: keranjang</h3>
  <table>
    <thead>
      <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
      <tr><td>user_id</td><td>foreignId</td><td>Relasi user</td></tr>
      <tr><td>produk_id</td><td>foreignId</td><td>Relasi produk</td></tr>
      <tr><td>jumlah</td><td>integer</td><td>Jumlah</td></tr>
      <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
    </tbody>
  </table>

  <!-- Relasi -->
  <h1>Relasi Antar Tabel dan Jenis Relasi</h1>
  <h2>Tabel Relasi dan Jenisnya</h2>
  <table>
    <thead>
      <tr><th>Relasi</th><th>Tabel A</th><th>Tabel B</th><th>Jenis Relasi</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
      <tr><td>users → pesanan</td><td>users</td><td>pesanan</td><td>One to Many</td><td>1 user bisa membuat banyak pesanan</td></tr>
      <tr><td>users → keranjang</td><td>users</td><td>keranjang</td><td>One to Many</td><td>1 user bisa memiliki banyak item</td></tr>
      <tr><td>users → ulasan</td><td>users</td><td>ulasan</td><td>One to Many</td><td>1 user bisa memberi banyak ulasan</td></tr>
      <tr><td>produk → keranjang</td><td>produk</td><td>keranjang</td><td>One to Many</td><td>1 produk bisa masuk banyak keranjang</td></tr>
      <tr><td>produk → ulasan</td><td>produk</td><td>ulasan</td><td>One to Many</td><td>1 produk punya banyak ulasan</td></tr>
      <tr><td>produk → kategori</td><td>produk</td><td>kategori</td><td>Many to One</td><td>Banyak produk di 1 kategori</td></tr>
      <tr><td>kategori → produk</td><td>kategori</td><td>produk</td><td>One to Many</td><td>1 kategori punya banyak produk</td></tr>
      <tr><td>pesanan → detail_pesanan</td><td>pesanan</td><td>detail_pesanan</td><td>One to Many</td><td>1 pesanan punya banyak detail</td></tr>
      <tr><td>pesanan → pembayaran</td><td>pesanan</td><td>pembayaran</td><td>One to One</td><td>1 pesanan punya 1 pembayaran</td></tr>
      <tr><td>detail_pesanan → produk</td><td>detail_pesanan</td><td>produk</td><td>Many to One</td><td>detail merujuk 1 produk</td></tr>
      <tr><td>wisata → galeri</td><td>wisata</td><td>galeri</td><td>One to Many</td><td>1 wisata punya banyak galeri</td></tr>
      <tr><td>galeri → wisata</td><td>galeri</td><td>wisata</td><td>Many to One</td><td>galeri milik 1 wisata</td></tr>
    </tbody>
  </table>
  
  <h2>Relasi Many to Many (via Pivot)</h2>
  <table>
    <thead>
      <tr><th>Tabel A</th><th>Pivot</th><th>Tabel B</th><th>Kolom Tambahan</th><th>Jenis Relasi</th></tr>
    </thead>
    <tbody>
      <tr><td>pesanan</td><td>detail_pesanan</td><td>produk</td><td>jumlah, sub_total</td><td>Many to Many</td></tr>
    </tbody>
  </table>

</body>
</html>
