$('button.deleteCartItem').on('click', function(){
    let buttonContext = $(this)
    $.ajax({
        url:'/api/cart/hapus',
        method:'POST',
        dataType:'json',
        data:{
            idProduk:buttonContext.attr('data-item')
        }
    }).done(function(response){
        document.location.reload()
    })
})

$('button#lanjut-pemesanan').on('click', function(){
    let buttonContext = $(this)
    $.ajax({
        url:'/api/order/tambah',
        method:'POST',
        dataType:'json'
    }).done(function(response){
        console.log(response);
        
        // document.location.href('/pembayaran')
    })
})

