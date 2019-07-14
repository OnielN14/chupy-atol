<header class="chupy-admin-dashboard-header">
  <h2>Manajemen Jenis Produk</h2>
</header>
<main class="container">
  <div class="">
    <section class="chupy-admin-panel">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#input-modal-jenis">Tambah Jenis Produk</button>
    </section>


    <section class="chupy-data-list">
      <table class="table" id="table-jenis-list">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </section>

  </div>
</main>

<!-- Modal Input -->
<div class="modal fade" id="input-modal-jenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="input-modal-title">Tambah Jenis Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-jenis-new">
          <div class="form-group">
            <label for="form-nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="form-nama" name="nama" required autofocus>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" form="form-jenis-new" class="btn btn-primary">Tambah Jenis Produk</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal-jenis">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal-title">Ubah Jenis Produk</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
      </div>
      <div class="modal-body">
        <form id="form-jenis-edit">
          <input type="hidden" id="form-edit-id" name="id" value="">
          <div class="form-group">
            <label for="form-nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="form-edit-nama" name="nama" required autofocus>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" form="form-jenis-edit" class="btn btn-primary" data-dismiss="modal">Simpan Perubahan</button>
      </div>

    </div>
  </div>
</div>


<!-- Modal Hapus -->
<div class="modal fade" tabindex="-1" id="hapus-modal-jenis">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="hapus-modal-title">Hapus Jenis Produk</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
      </div>
      <div class="modal-body">
        <p>Jenis produk dengan nama <span style="font-weight:bold" id="hapus-modal-nama-jenis"></span> akan dihapus?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
<button class="btn btn-primary" data-dismiss="modal" onclick="deleteJenisProduk(this)" id="hapus-modal-confirm" >Hapus Jenis</button>
      </div>
    </div>
  </div>
</div>
