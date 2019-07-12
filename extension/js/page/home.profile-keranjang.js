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