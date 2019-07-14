<header class="chupy-admin-dashboard-header">
  <h2>Manajemen Transaksi</h2>
</header>
<main class="container">
  <div class="">

    <section class="chupy-data-list">
      <table id="table-transaksi-list" class="table">
        <thead>
          <tr>
            <th>Id Transaksi</th>
            <th>Tanggal Pembelian</th>
            <th>Total Pembelian</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </section>

  </div>
</main>

<div class="modal fade" tabindex="-1" role="dialog" id="confirm-modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal-title">Konfirmasi Pemesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <h4 id="transaksi-id"></h4>
      <h5 id="transaksi-tanggal"></h5>
      
      <div class="card mb-4">
        <div class="card-header">
          <h5>Detail Pembeli</h5>
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td id="transaksi-user-nama"></td>
            </tr>
            <tr>
              <td>Alamat Pengiriman</td>
              <td>:</td>
              <td id="transaksi-user-alamat"></td>
            </tr>
            <tr>
              <td>Kontak</td>
              <td>:</td>
              <td id="transaksi-user-kontak"></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="card mb-4">
        <div class="card-header">
          <h5>Ringkasan Belanja</h5>
        </div>
        <div class="card-body">
          <table class="table">
            <tr id="transaksi-product-list-header">
              <th>Nama Barang</th>
              <th>Banyak yang dibeli</th>
              <th>Harga</th>
              <th>Jumlah</th>
            </tr>

            <tr style="font-weight:bold">
              <td colspan="3">Total</td>
              <td id="transaksi-total-payment"></td>
            </tr>
          </table>
        </div>
      </div>

      <div id="payment-proof-area" class="card mb-4">
        <div class="card-header">
          <h5>Bukti Pembayaran</h5>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="row">
              <img id="transaksi-bukti-bayar" class="col-12" src="" alt="">
            </div>
          </div>
        </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" id="confirm-button" class="btn btn-primary" data-dismiss="modal">Konfirmasi</button>
      </div>

    </div>
  </div>
</div>