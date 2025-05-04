<h2 style="text-align: center; font-size: 36px; color: #333; margin: 0; height: 100vh; display: flex; justify-content: center; align-items: center;">EXPLORE MANDAR</h2>
<img src="public/img/th.jpg" alt="Gambar" style="display: block; margin-left: auto; margin-right: auto;" />

<h2 style="text-align: center; font-size: 36px; color: #333; margin: 0; height: 100vh; display: flex; justify-content: center; align-items: center;">RAHMADI</h2>
<h2 style="text-align: center; font-size: 36px; color: #333; margin: 0; height: 100vh; display: flex; justify-content: center; align-items: center;">D0223309</h2>
<h2 style="text-align: center; font-size: 36px; color: #333; margin: 0; height: 100vh; display: flex; justify-content: center; align-items: center;">FRAMEWORK WEB BASED</h2>
<h2 style="text-align: center; font-size: 36px; color: #333; margin: 0; height: 100vh; display: flex; justify-content: center; align-items: center;">2025</h2>

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
  <li>users – tambah, ubah,lihat, hapus user</li>
  <li>(opsional) produk , pesanan , pembayaran , ulasan, Kategori, Wisata </li>
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
  <li>(opsional) Kelola Kategori</li>
</ul>

<h3>Tabel yang Dikelola:</h3>
<ul>
  <li>produk  – buat produk baru, ubah stok</li>
  <li>wisata  – mengelola wisata</li>
  <li>kategori  – kategori produk (jika diizinkan)</li>
  <li>pembayaran  – ubah status pembayaran</li>
  <li>ulasan  – verifikasi ulasan</li>
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
  <li>keranjang  – tambah produk ke keranjang</li>
  <li>pesanan  – buat pesanan dan lihat status</li>
  <li>ulasan  – tulis ulasan produk</li>
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
 <h1>Relasi Antar Tabel dan Jenis Relasi</h1>
    <h2>Tabel Relasi dan Jenisnya</h2>
    <table>
        <thead>
            <tr>
                <th>Relasi</th>
                <th>Tabel A</th>
                <th>Tabel B</th>
                <th>Jenis Relasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>users → pesanan</td>
                <td>users</td>
                <td>pesanan</td>
                <td>One to Many</td>
                <td>1 user bisa membuat banyak pesanan</td>
            </tr>
            <tr>
                <td>users → keranjang</td>
                <td>users</td>
                <td>keranjang</td>
                <td>One to Many</td>
                <td>1 user bisa memiliki banyak item di keranjang</td>
            </tr>
            <tr>
                <td>users → ulasan</td>
                <td>users</td>
                <td>ulasan</td>
                <td>One to Many</td>
                <td>1 user bisa memberikan banyak ulasan</td>
            </tr>
            <tr>
                <td>produk → keranjang</td>
                <td>produk</td>
                <td>keranjang</td>
                <td>One to Many</td>
                <td>1 produk bisa masuk ke banyak keranjang</td>
            </tr>
            <tr>
                <td>produk → ulasan</td>
                <td>produk</td>
                <td>ulasan</td>
                <td>One to Many</td>
                <td>1 produk bisa memiliki banyak ulasan</td>
            </tr>
            <tr>
                <td>produk → kategori</td>
                <td>produk</td>
                <td>kategori</td>
                <td>Many to One</td>
                <td>Banyak produk termasuk dalam satu kategori</td>
            </tr>
            <tr>
                <td>kategori → produk</td>
                <td>kategori</td>
                <td>produk</td>
                <td>One to Many</td>
                <td>1 kategori memiliki banyak produk</td>
            </tr>
            <tr>
                <td>pesanan → detail_pesanan</td>
                <td>pesanan</td>
                <td>detail_pesanan</td>
                <td>One to Many</td>
                <td>1 pesanan punya banyak detail pesanan</td>
            </tr>
            <tr>
                <td>pesanan → pembayaran</td>
                <td>pesanan</td>
                <td>pembayaran</td>
                <td>One to One</td>
                <td>1 pesanan hanya memiliki 1 data pembayaran</td>
            </tr>
            <tr>
                <td>detail_pesanan → produk</td>
                <td>detail_pesanan</td>
                <td>produk</td>
                <td>Many to One</td>
                <td>Setiap detail pesanan merujuk ke 1 produk</td>
            </tr>
            <tr>
                <td>wisata → galeri</td>
                <td>wisata</td>
                <td>galeri</td>
                <td>One to Many</td>
                <td>1 tempat wisata memiliki banyak galeri</td>
            </tr>
            <tr>
                <td>galeri → wisata</td>
                <td>galeri</td>
                <td>wisata</td>
                <td>Many to One</td>
                <td>Setiap galeri milik 1 tempat wisata</td>
            </tr>
        </tbody>
    </table>
    <h2>Relasi Many to Many (via Pivot)</h2>
    <table>
        <thead>
            <tr>
                <th>Tabel A</th>
                <th>Pivot/Tabel Penghubung</th>
                <th>Tabel B</th>
                <th>Kolom Tambahan di Pivot</th>
                <th>Jenis Relasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>pesanan</td>
                <td>detail_pesanan</td>
                <td>produk</td>
                <td>jumlah, sub_total</td>
                <td>Many to Many</td>
            </tr>
        </tbody>
    </table>

