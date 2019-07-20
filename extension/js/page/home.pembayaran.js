let userDeliverAddressTextArea = $('#user-deliver-address')
let userContactInput = $('#user-contact')
let verifyTransactionButton = $('#button-transaksi')
let uploadPaymentProofButton = $('#upload-bukti')
let buktiBayarElement = $('#buktiBayar')
let transactionValidStatus

// disable normal form behaviour
$('form#form-bukti-bayar').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
      e.preventDefault();
      return false;
    }
  });

buktiBayarElement.on('change',function(){
    let isFileAvailable = $(this).prop('files').length > 0? true:false
    console.log(isFileAvailable);
    
    if(isFileAvailable){
        uploadPaymentProofButton.attr('disabled', false)
    }
    else{
        uploadPaymentProofButton.attr('disabled', true)
    }
})

verifyTransactionButton.on('click', function(){
    let hashData = $('input[name="transaction-hash"]').val()
    let alamatPengirimanFinal = userDeliverAddressTextArea.val()
    let kontakFinal = userContactInput.val()
    
    $.ajax({
        url:'/api/order/konfirmasi-transaksi',
        method: 'POST',
        dataType:'json',
        data:{
            validSign :{
                transactionHash:hashData,
                alamatPengiriman : alamatPengirimanFinal,
                kontak: kontakFinal
            }
        }
    }).done(function(response){
        document.location.reload()
    })
})

uploadPaymentProofButton.on('click', function(){
    let formBukti = document.querySelector('form#form-bukti-bayar')
    let formData = new FormData(formBukti)

    formData.append('transactionHash', $('input[name="transaction-hash"]').val())

    $.ajax({
        url:'/api/order/upload-bukti-bayar',
        method:'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        data:formData
    }).done(function(response){
        console.log(response);
        document.location.reload()
    })
})

$(document).ready(function(){
    transactionValidStatus = $('input[name="transaction-valid-status"]').val()

    setTimeout(function(){
        goToPembayaran()
    }, 1000)
})

function goToPembayaran(){
    if(transactionValidStatus == 1){
        document.location.href = '#pembayaran'
    }
}