
$('.deleteWishedItem').on('click', function(){
    let dataValue = $(this).attr('data-item')
    
    $.ajax({
        url:'/api/wishlist/hapus',
        method: 'POST',
        dataType: 'json',
        data: {
            idProduk : dataValue
        }
    }).done(function(response) {
        document.location.reload();
    })
})