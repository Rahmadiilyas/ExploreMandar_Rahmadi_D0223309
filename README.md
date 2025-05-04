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
