<header class="chupy-admin-dashboard-header">
  <h2>Kotak Saran</h2>
</header>
<main class="container">
  <div class="">


    <section class="chupy-data-list">
      <table id="table-jenis-list">
        <thead>
          <tr>
            <!-- <th>Id</th> -->
            <th>Email Pengirim</th>
            <th>Pesan</th>
            <th>Tanggal Kirim</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </section>

  </div>
</main>

<!-- Modal Hapus -->
<div class="modal fade" tabindex="-1" id="hapus-modal-pesan">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="hapus-modal-title">Hapus Pesan</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
      </div>
      <div class="modal-body">
        <p>Pesan tanggal <span style="font-weight:bold" id="hapus-modal-tanggal-kirim"></span> dengan pengirim  <span style="font-weight:bold" id="hapus-modal-nama-pengirim"></span> akan dihapus?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
<button class="btn btn-primary" data-dismiss="modal" onclick="deletePesan(this)" id="hapus-modal-confirm" >Hapus Pesan</button>
      </div>
    </div>
  </div>
</div>
