<header class="chupy-admin-dashboard-header">
  <h2>Manajemen Produk</h2>
</header>
<main class="container">
  <div class="">
    <section class="chupy-admin-panel">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#input-modal-produk">Tambah Produk</button>
    </section>


    <section class="chupy-data-list">
      <table id="table-produk-list">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Jenis Produk</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </section>

  </div>
</main>

<div class="modal fade" id="input-modal-produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="input-modal-title">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-produk-new">
          <div class="form-group">
            <label for="form-nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="form-nama" name="nama" required autofocus>
          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="form-stok" class="col-form-label">Stok</label>
              <input type="text" name="stok" class="form-control" id="form-stok" required>
            </div>
            <div class="form-group col">
              <label for="form-harga" class="col-form-label">Harga</label>
              <input type="text" name="harga" class="form-control" id="form-harga" required>
            </div>
          </div>

          <div class="form-group">
              <label for="form-deskripsi">Deskripsi</label>
              <textarea id="form-deskripsi" class="form-control" rows="3" name="deskripsi" placeholder="Deskripsi produk" required></textarea>
              <div class="invalid-feedback">Harap masukkan deskripsi dengan benar.</div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="form-jenis">Jenis Produk</label>
              <select class="form-control" id="form-jenis" name="idJenis">
                <option value="0" disabled selected>Pilih Jenis Produk</option>
              </select>
            </div>
            <div class="form-group col">
              <label for="form-kategori">Kategori Produk (Pilih jenis terlebih dahulu)</label>
              <select class="form-control" id="form-kategori" name="idKategori" required disabled>
                <option value="0" disabled selected>Pilih Kategori Produk</option>
              </select>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" form="form-produk-new" class="btn btn-primary">Tambah Produk</button>
      </div>
    </div>
  </div>
</div>

<!--  Modal Edit  -->
<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal-produk">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal-title">Ubah Produk</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
      </div>
      <div class="modal-body">
        <form id="form-produk-edit">
          <input type="hidden" name="id" id="form-edit-id" value="">
          <div class="form-group">
            <label for="form-nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="form-edit-nama" name="nama" required autofocus>
          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="form-stok" class="col-form-label">Stok</label>
              <input type="text" name="stok" class="form-control" id="form-edit-stok" required>
            </div>
            <div class="form-group col">
              <label for="form-harga" class="col-form-label">Harga</label>
              <input type="text" name="harga" class="form-control" id="form-edit-harga" required>
            </div>
          </div>

          <div class="form-group">
              <label for="form-deskripsi">Deskripsi</label>
              <textarea id="form-edit-deskripsi" class="form-control" rows="3" name="deskripsi" placeholder="Deskripsi produk" required></textarea>
              <div class="invalid-feedback">Harap masukkan deskripsi dengan benar.</div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="form-jenis">Jenis Produk</label>
              <select class="form-control" id="form-edit-jenis" name="idJenis">
                <option value="0" disabled selected>Pilih Jenis Produk</option>
              </select>
            </div>
            <div class="form-group col">
              <label for="form-kategori">Kategori Produk (Pilih jenis terlebih dahulu)</label>
              <select class="form-control" id="form-edit-kategori" name="idKategori" required disabled>
                <option value="0" disabled selected>Pilih Kategori Produk</option>
              </select>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" form="form-produk-edit" data-dismiss="modal" class="btn btn-primary">Simpan Perubahan</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal Hapus -->

<div class="modal fade" tabindex="-1" id="hapus-modal-produk">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="hapus-modal-title">Hapus Produk</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
      </div>
      <div class="modal-body">
        <p>Produk dengan nama <span style="font-weight:bold" id="hapus-modal-nama-produk"></span> akan dihapus?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
<button class="btn btn-primary" data-dismiss="modal" onclick="deleteProduk(this)" id="hapus-modal-confirm" >Hapus Produk</button>
      </div>
    </div>
  </div>
</div>
