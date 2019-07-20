let transaksiData = []

$(document).ready(function () {
  $.ajax({
    url: '/api/order',
    method: 'GET',
    dataType: 'json'
  }).done(function (response) {
    let dataSet = []
    transaksiData = response.data
    for (let item of response.data) {
      transaksi = {
        id: item.id,
        tanggalTransaksi: item.tanggalTransaksi,
        totalPembelian: hitungTotalPembelian(item),
        statusBayar: statusBayar(item),
        aksi: '<button class="btn btn-success my-1 mr-1" data-toggle="modal" data-target="#confirm-modal" data-transaksi-hash="' + item.hash + '">Konfirmasi</button>'
      }

      dataSet.push(transaksi)
    }

    result = {
      'data': dataSet
    }
    $('#table-transaksi-list').DataTable({
      data: result.data,
      columns: [
        { data: "id" },
        { data: "tanggalTransaksi" },
        { data: "totalPembelian" },
        { data: "statusBayar" },
        { data: "aksi" }
      ]
    })
  })
}
)

function statusBayar(transaksi) {
  if (transaksi.statusBayar == 1 && transaksi.buktiBayar != null) {
    return "Lunas"
  }
  else if (transaksi.statusBayar == 0 && transaksi.buktiBayar !=null) {
    return "Menunggu Konfirmasi"
  }
  else {
    return "Belum Bayar"
  }
}

function hitungTotalPembelian(transaksi) {
  let total = 0;
  transaksi.productData.forEach(function (item) {
    let totalPerItem = item.jumlah * item.harga;
    total += totalPerItem;
  })

  return total;
}
$('#confirm-modal').on('hide.bs.modal', function(event){
  let modal = $(this)

  // remove assigned value on modal
  modal.find('#transaksi-produk-table tr.--populated-data').remove()
})


$('#confirm-modal').on('show.bs.modal', function (event) {
  let button = $(event.relatedTarget)
  let transaksiHash = button.data('transaksi-hash')
  let modal = $(this)

  let data = transaksiData.find(function (item) {
    return item.hash == transaksiHash
  })

  modal.find('#transaksi-hash').val(data.hash)
  modal.find('#transaksi-id').text(data.id)
  modal.find('#transaksi-tanggal').text(data.tanggalTransaksi)
  modal.find('#transaksi-user-nama').text(data.userData.nama)
  modal.find('#transaksi-user-kontak').text(data.kontak)
  modal.find('#transaksi-user-alamat').text(data.alamatPengiriman)
  let targetElement = modal.find('#transaksi-product-list-header');
  $(populateProductList(data)).insertAfter(targetElement)
  modal.find('#transaksi-total-payment').text(hitungTotalPembelian(data))

  let buktiBayarElement = modal.find('#transaksi-bukti-bayar')
  let paymentProofArea = modal.find('#payment-proof-area')
  if (data.buktiBayar) {
    buktiBayarElement.attr('src', `/extension/upload/${data.buktiBayar}`);
  }
  else {
    paymentProofArea.hide();
    $('button#confirm-button').attr('disabled', true);
  }

})

function populateProductList(transaksi) {
  let elements = [];
  for (let item of transaksi.productData) {
    let row = `<tr class="--populated-data"><td>${item.nama}</td><td>${item.jumlah}</td><td>${item.harga}</td><td>${item.jumlah * item.harga}</td></tr>`;

    elements += row
  }

  return elements;
}

$('#confirm-button').on('click', function ubahKategoriProduk() {
  let data = {
    transactionHash: $('#transaksi-hash').val()
  }

  $('#confirm-modal').modal('toggle')
  $.ajax({
    url: '/api/order/konfirmasi-bayar',
    method: 'post',
    dataType: 'json',
    data: data,
    beforeSend: function (response) {
      $('#chupy-msg').removeClass('show')
      $('#chupy-msg').removeClass('alert-warning')
      $('#chupy-msg').removeClass('alert-primary')
      $('#chupy-msg').removeClass('alert-danger')
      $('#chupy-msg').removeClass('alert-success')

      $('#chupy-msg').find('strong').text('Harap tunggu')
      $('#chupy-msg').find('strong + span').text('Permintaan sedang diproses..')

      $('#chupy-msg').addClass('alert-primary')
      $('#chupy-msg').addClass('show')
    }
  }).done(function (response) {
    $('#chupy-msg').addClass('alert-success')

    $('#chupy-msg').find('strong').text('Sukses')
    $('#chupy-msg').find('strong + span').text('Pembayaran Berhasil Dikonfirmasi.')
    $('#chupy-msg').addClass('show')
    setTimeout(function () {
      location.reload();
    }, 1000)
  }).fail(function (response) {
    
    $('#chupy-msg').addClass('alert-danger')

    $('#chupy-msg').find('strong').text('Gagal')
    $('#chupy-msg').find('strong + span').text('Terjadi kesalahan.')

    $('#chupy-msg').addClass('show')
  })
})
