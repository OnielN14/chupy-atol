<header class="chupy-admin-dashboard-header">
  <h2>Manajemen Pengguna</h2>
</header>

<main class="container">
    <div class="">
      <section class="chupy-admin-panel">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#input-modal">Tambah Pengguna</button>
      </section>


      <section class="chupy-data-list">
        <table id="table-user-list">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>No Telepon</th>
              <th>Aksi</th>
            </tr>
          </thead>
        </table>
      </section>

    </div>

<div class="modal fade" id="input-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="input-modal-title">Tambah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-user-new">
          <div class="form-group">
            <label for="form-nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="form-nama" name="nama" required autofocus>
          </div>
          <div class="form-group">
            <div class="">
              <label for="">Jenis Kelamin</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="gender-laki" class="form-check-input" type="radio" name="gender" value="pria" required> <label for="gender-laki" class="form-check-label">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="gender-perempuan" class="form-check-input" type="radio" name="gender" value="wanita"> <label for="gender-perempuan" class="form-check-label">Perempuan</label>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="form-no-telepon" class="col-form-label">No. Telepon</label>
              <input type="text" name="noTelepon" class="form-control" id="form-no-telepon" required>
            </div>
            <div class="form-group col">
              <label for="form-email" class="col-form-label">Email</label>
              <input type="email" name="email" class="form-control" id="form-email" required>
            </div>
          </div>

          <div class="form-group">
            <label for="form-tempat">Tempat, Tanggal Lahir</label>
            <div class="form-row">
              <div class="form-group col">
                <input id="form-tempat" class="form-control" type="text" name="tempatLahir" placeholder="Kota/Kabupaten Kelahiran" required>
                <div class="invalid-feedback">Harap masukkan kota/kabupaten kelahiran dengan benar.</div>
              </div>
              <div class="form-group col">
                <input id="form-tanggal" class="form-control" type="date" name="tanggalLahir" required>
                <div class="invalid-feedback">Harap masukkan tanggal kelahiran dengan benar.</div>
              </div>
            </div>
          </div>

          <div class="form-group">
              <label for="form-alamat">Alamat</label>
              <textarea id="form-alamat" class="form-control" rows="3" name="alamat" placeholder="Alamat tempat tinggalmu" required></textarea>
              <div class="invalid-feedback">Harap masukkan alamat dengan benar.</div>
          </div>

          <div class="form-row">
            <div class="form-group col">
                <label for="form-password">Kata Sandi</label>
                <input id="form-password" class="form-control" type="password" name="password" placeholder="Masukkan kata sandi" required>
                <div class="invalid-feedback">Harap isi kata sandi. Pastikan mengandung angka, terdiri atas huruf kecil dan huruf besar</div>
            </div>
            <div class="form-group col">
                <label for="form-re-password">Ketik Ulang Kata Sandi</label>
                <input id="form-re-password" class="form-control" type="password" name="password" placeholder="Masukkan kembali kata sandi" required>
                <div class="invalid-feedback">Harap isi kata sandi dengan benar.</div>
            </div>
          </div>
          <div class="form-group">
            <label for="form-hak-akses">Hak Akses</label>
            <select class="form-control" id="form-hak-akses" name="idHakAkses">
              <option value="0" disabled selected>Pilih Hak Akses</option>

            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" form="form-user-new" class="btn btn-primary">Tambah Pengguna</button>
      </div>
    </div>
  </div>
</div>

<!--  Modal Edit  -->
<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal-title">Ubah Pengguna</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
      </div>
      <div class="modal-body">
        <form id="form-user-edit">
          <div class="form-group">
            <label for="form-edit-nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="form-edit-nama" name="nama" required autofocus>
          </div>
          <div class="form-group">
            <div class="">
              <label for="">Jenis Kelamin</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="gender-edit-laki" class="form-check-input" type="radio" name="gender" value="pria" required> <label for="gender-edit-laki" class="form-check-label">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="gender-edit-perempuan" class="form-check-input" type="radio" name="gender" value="wanita"> <label for="ender-edit-perempuan" class="form-check-label">Perempuan</label>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="form-edit-no-telepon" class="col-form-label">No. Telepon</label>
              <input type="text" name="noTelepon" class="form-control" id="form-edit-no-telepon" required>
            </div>
            <div class="form-group col">
              <label for="form-edit-email" class="col-form-label">Email</label>
              <input type="email" name="email" class="form-control" id="form-edit-email" required disabled>
            </div>
          </div>

          <div class="form-group">
            <label for="form-edit-tempat">Tempat, Tanggal Lahir</label>
            <div class="form-row">
              <div class="form-group col">
                <input id="form-edit-tempat" class="form-control" type="text" name="tempatLahir" placeholder="Kota/Kabupaten Kelahiran" required>
                <div class="invalid-feedback">Harap masukkan kota/kabupaten kelahiran dengan benar.</div>
              </div>
              <div class="form-group col">
                <input id="form-edit-tanggal" class="form-control" type="date" name="tanggalLahir" required>
                <div class="invalid-feedback">Harap masukkan tanggal kelahiran dengan benar.</div>
              </div>
            </div>
          </div>

          <div class="form-group">
              <label for="form-alamat">Alamat</label>
              <textarea id="form-edit-alamat" class="form-control" rows="3" name="alamat" placeholder="Alamat tempat tinggalmu" required></textarea>
              <div class="invalid-feedback">Harap masukkan alamat dengan benar.</div>
          </div>

          <div class="form-row">
            <div class="form-group col">
                <label for="form-edit-password">Kata Sandi</label>
                <input id="form-edit-password" class="form-control" type="password" name="password" placeholder="Masukkan kata sandi">
                <div class="invalid-feedback">Harap isi kata sandi. Pastikan mengandung angka, terdiri atas huruf kecil dan huruf besar</div>
            </div>
            <div class="form-group col">
                <label for="form-edit-re-password">Ketik Ulang Kata Sandi</label>
                <input id="form-edit-re-password" class="form-control" type="password" name="password" placeholder="Masukkan kembali kata sandi">
                <div class="invalid-feedback">Harap isi kata sandi dengan benar.</div>
            </div>
          </div>
          <div class="form-group">
            <label for="form-hak-akses">Hak Akses</label>
            <select class="form-control" id="form-edit-hak-akses" name="idHakAkses">
              <option value="0" disabled selected>Pilih Hak Akses</option>

            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" form="form-user-edit" class="btn btn-primary">Simpan Perubahan</button>
      </div>

    </div>
  </div>
</div>


<!-- Modal Hapus -->

<div class="modal fade" tabindex="-1" id="hapus-modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="hapus-modal-title">Hapus Pengguna</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
      </div>
      <div class="modal-body">
        <p>Pengguna dengan nama <span style="font-weight:bold" id="hapus-modal-nama-pengguna"></span> akan dihapus?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
<button class="btn btn-primary" data-dismiss="modal" onclick="deleteUser(this)" id="hapus-modal-confirm" >Hapus Pengguna</button>
      </div>
    </div>
  </div>
</div>

</main>
