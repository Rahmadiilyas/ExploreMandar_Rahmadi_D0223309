<h2>Role</h2>
<h2>1. Admin</h2>
<p><strong>Tugas:</strong> Mengelola pengguna, manajemen sistem.</p>

<h3>Fitur Admin:</h3>
<ul>
  <li>Dashboard Admin</li>
  <li>Kelola Pengguna (tambah, lihat,edit, hapus user)</li>
   <li>Lihat Data Kategori (opsional untuk pengawasan)</li>
  <li>Lihat Data Produk (opsional untuk pengawasan)</li>
  <li>Lihat Data Pesanan (opsional)</li>
  <li>Lihat Laporan Pembayaran (opsional)</li>
  <li>Lihat Ulasan & Verifikasi (opsional)</li>
  <li>Lihat Wisata (opsional)</li>
</ul>

<h3>Tabel yang Dikelola:</h3>
<ul>
  <li><code>users</code> – tambah, ubah,lihat, hapus user</li>
  <li><em>(opsional)</em> <code>produk</code>, <code>pesanan</code>, <code>pembayaran</code>, <code>ulasan</code><code>Kategori</code><code>Wisata</code></li>
</ul>

<hr>

<h2>2. Kreator (Penjual)</h2>
<p><strong>Fitur:</strong> Mengelola produk, melihat dan memverifikasi pesanan & pembayaran serta mengelola informasi wisata.</p>

<h3>Menu Kreator:</h3>
<ul>
  <li>Dashboard Kreator</li>
  <li>Kelola Produk (tambah,lihat, edit, hapus)</li>
  <li>Kelola Wisata (tambah,lihat, edit, hapus)</li>
  <li>Lihat Pesanan Masuk</li>
  <li>Verifikasi Pembayaran</li>
  <li>Lihat Ulasan Produk</li>
  <li><em>(opsional)</em> Kelola Kategori</li>
</ul>

<h3>Tabel yang Dikelola:</h3>
<ul>
  <li><code>produk</code> – buat produk baru, ubah stok</li>
  <li><code>wisata</code> – mengelola wisata</li>
  <li><code>kategori</code> – kategori produk (jika diizinkan)</li>
  <li><code>pembayaran</code> – ubah status pembayaran</li>
  <li><code>ulasan</code> – verifikasi ulasan</li>
</ul>

<hr>

<h2>3. Pembeli (User biasa)</h2>
<p><strong>Tugas:</strong> Melihat produk, melakukan pemesanan, unggah bukti pembayaran, memberi ulasan.</p>

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
  <li><code>pesanan</code> – buat pesanan dan lihat status</li>
  <li><code>ulasan</code> – tulis ulasan produk</li>
</ul>

<h3>Table: users</h3>
<table border="1">
  <thead>
    <tr>
      <th>Field</th><th>Tipe Data</th><th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
    <tr><td>name</td><td>string</td><td>Nama pengguna</td></tr>
    <tr><td>email</td><td>string (unique)</td><td>Email pengguna</td></tr>
    <tr><td>email_verified_at</td><td>timestamp</td><td>Waktu verifikasi email</td></tr>
    <tr><td>password</td><td>string</td><td>Kata sandi (hash bcrypt)</td></tr>
    <tr><td>role</td><td>enum</td><td>admin, kreator, pembeli (default: pembeli)</td></tr>
    <tr><td>alamat</td><td>string</td><td>Alamat pengguna</td></tr>
    <tr><td>nomor_telepon</td><td>string</td><td>Nomor HP pengguna</td></tr>
    <tr><td>remember_token</td><td>string</td><td>Token sesi</td></tr>
    <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
  </tbody>
</table>
<h3>Table: kategori</h3>
<table border="1">
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
<table border="1">
  <thead>
    <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  </thead>
  <tbody>
    <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
    <tr><td>nama</td><td>string</td><td>Nama produk</td></tr>
    <tr><td>harga</td><td>integer</td><td>Harga produk</td></tr>
    <tr><td>deskripsi</td><td>text</td><td>Deskripsi produk</td></tr>
    <tr><td>kategori_id</td><td>foreignId</td><td>Relasi ke tabel kategori</td></tr>
    <tr><td>gambar</td><td>string</td><td>Path gambar</td></tr>
    <tr><td>stok</td><td>integer</td><td>Jumlah stok (default: 0)</td></tr>
    <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
  </tbody>
</table>
<h3>Table: pesanan</h3>
<table border="1">
  <thead>
    <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  </thead>
  <tbody>
    <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
    <tr><td>user_id</td><td>foreignId</td><td>Relasi ke tabel users</td></tr>
    <tr><td>produk_id</td><td>foreignId</td><td>Relasi ke tabel produk</td></tr>
    <tr><td>jumlah</td><td>integer</td><td>Jumlah produk dipesan</td></tr>
    <tr><td>total_harga</td><td>integer</td><td>Total harga pesanan</td></tr>
    <tr><td>status</td><td>string</td><td>Status pesanan (menunggu, diproses, selesai)</td></tr>
    <tr><td>status_pembayaran</td><td>string</td><td>belum dibayar / sudah dibayar</td></tr>
    <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
  </tbody>
</table>
<h3>Table: detail_pesanan</h3>
<table border="1">
  <thead>
    <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  </thead>
  <tbody>
    <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
    <tr><td>pesanan_id</td><td>foreignId</td><td>Relasi ke tabel pesanan</td></tr>
    <tr><td>produk_id</td><td>foreignId</td><td>Relasi ke tabel produk</td></tr>
    <tr><td>jumlah</td><td>integer</td><td>Jumlah produk</td></tr>
    <tr><td>sub_total</td><td>integer</td><td>harga * jumlah</td></tr>
    <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
  </tbody>
</table>
<h3>Table: pembayaran</h3>
<table border="1">
  <thead>
    <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  </thead>
  <tbody>
    <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
    <tr><td>pesanan_id</td><td>foreignId</td><td>Relasi ke tabel pesanan</td></tr>
    <tr><td>nama_penerima</td><td>string</td><td>Nama penerima</td></tr>
    <tr><td>alamat_pengiriman</td><td>string</td><td>Alamat tujuan</td></tr>
    <tr><td>nomor_telepon</td><td>string</td><td>No HP penerima</td></tr>
    <tr><td>catatan</td><td>string</td><td>Catatan tambahan (nullable)</td></tr>
    <tr><td>bukti_pembayaran</td><td>string</td><td>File gambar bukti (nullable)</td></tr>
    <tr><td>status</td><td>enum</td><td>menunggu / disetujui / ditolak</td></tr>
    <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
  </tbody>
</table>
<h3>Table: ulasan</h3>
<table border="1">
  <thead>
    <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  </thead>
  <tbody>
    <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
    <tr><td>produk_id</td><td>foreignId</td><td>Relasi ke produk</td></tr>
    <tr><td>user_id</td><td>foreignId</td><td>Relasi ke pengguna</td></tr>
    <tr><td>isi</td><td>text</td><td>Isi komentar</td></tr>
    <tr><td>rating</td><td>tinyInteger</td><td>1 - 5</td></tr>
    <tr><td>verifikasi</td><td>boolean</td><td>Status verifikasi ulasan</td></tr>
    <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
  </tbody>
</table>
<h3>Table: wisata</h3>
<table border="1">
  <thead>
    <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  </thead>
  <tbody>
    <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
    <tr><td>nama</td><td>string</td><td>Nama wisata</td></tr>
    <tr><td>deskripsi</td><td>text</td><td>Deskripsi tempat wisata</td></tr>
    <tr><td>lokasi</td><td>string</td><td>Alamat/lokasi wisata</td></tr>
    <tr><td>gambar</td><td>string</td><td>Path gambar (nullable)</td></tr>
    <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
  </tbody>
</table>
<h3>Table: galeri</h3>
<table border="1">
  <thead>
    <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  </thead>
  <tbody>
    <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
    <tr><td>judul</td><td>string</td><td>Judul gambar</td></tr>
    <tr><td>path_gambar</td><td>string</td><td>Lokasi file gambar</td></tr>
    <tr><td>wisata_id</td><td>foreignId</td><td>Relasi opsional ke wisata (nullable)</td></tr>
    <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
  </tbody>
</table>
<h3>Table: keranjang</h3>
<table border="1">
  <thead>
    <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
  </thead>
  <tbody>
    <tr><td>id</td><td>bigint</td><td>Primary Key</td></tr>
    <tr><td>user_id</td><td>foreignId</td><td>Relasi ke users</td></tr>
    <tr><td>produk_id</td><td>foreignId</td><td>Relasi ke produk</td></tr>
    <tr><td>jumlah</td><td>integer</td><td>Jumlah produk</td></tr>
    <tr><td>timestamps</td><td>timestamp</td><td>created_at & updated_at</td></tr>
  </tbody>
</table>
