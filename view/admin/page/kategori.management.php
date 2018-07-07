<header class="chupy-admin-dashboard-header">
  <h2>Manajemen Kategori Produk</h2>
</header>
<main class="container">
  <div class="">
    <section class="chupy-admin-panel">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#input-modal-kategori">Tambah Kategori Produk</button>
    </section>


    <section class="chupy-data-list">
      <table id="table-produk-list">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Jenis Produk</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </section>

  </div>
</main>

<!-- Modal Input -->
<div class="modal fade" id="input-modal-kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="input-modal-title">Tambah Kategori Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-kategori-new">
          <div class="form-group">
            <label for="form-nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="form-nama" name="nama" required autofocus>
          </div>
          <div class="form-group">
            <label for="form-jenis">Jenis Produk</label>
            <select class="form-control" id="form-jenis" name="idJenis">
              <option value="0" disabled selected>Pilih Jenis Produk</option>
            </select>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" form="form-kategori-new" class="btn btn-primary">Tambah Produk</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal-kategori">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal-title">Ubah Kategori Produk</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
      </div>
      <div class="modal-body">
        <form id="form-kategori-edit">
          <input type="hidden" id="form-edit-id" name="id" value="">
          <div class="form-group">
            <label for="form-nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="form-edit-nama" name="nama" required autofocus>
          </div>
          <div class="form-group">
            <label for="form-jenis">Jenis Produk</label>
            <select class="form-control" id="form-edit-jenis" name="idJenis">
              <option value="0" disabled selected>Pilih Jenis Produk</option>
            </select>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" form="form-kategori-edit" class="btn btn-primary">Simpan Perubahan</button>
      </div>

    </div>
  </div>
</div>


<!-- Modal Hapus -->

<div class="modal fade" tabindex="-1" id="hapus-modal-kategori">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="hapus-modal-title">Hapus Kategori Produk</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
      </div>
      <div class="modal-body">
        <p>Kategori produk dengan nama <span style="font-weight:bold" id="hapus-modal-nama-produk"></span> akan dihapus?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
<button class="btn btn-primary" data-dismiss="modal" onclick="deleteKategoriProduk(this)" id="hapus-modal-confirm" >Hapus Kategori</button>
      </div>
    </div>
  </div>
</div>
