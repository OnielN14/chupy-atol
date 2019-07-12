let userWishList = []
let idProduk = ''


$(document).ready(function () {
    idProduk = $('input[name="idProduk"]').val();

    $.ajax('/api/wishlist', { dataType: 'json' })
        .done(function (response) {
            userWishList = response.data
            setProductHadWished(idProduk)
        })

})

$('#addToWishlist').on('click', function () {
    $.ajax({
        url: '/api/wishlist/tambah',
        method: 'POST',
        dataType: 'json',
        data: {
            idProduk: idProduk
        }
    }).done(function (response) {
        document.location.reload()
    })
})

$('#addToCart').on('click', function () {
    $('#addToWishlist').attr('disabled', true)
})


function setProductHadWished(idProduk) {
    if (isProductWished(idProduk)) {
        $('#addToWishlist').attr('disabled', true)
    }
    else {
        $('#addToWishlist').attr('disabled', false)
    }

}


function isProductWished(idProduk) {
    return userWishList.find(function (item) {
        return item.idProduk == idProduk
    })
}