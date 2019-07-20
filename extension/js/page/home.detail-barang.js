let userWishList = []
let userCart = []
let idProduk = ''


$(document).ready(function () {
    idProduk = $('input[name="idProduk"]').val();

    $.ajax('/api/wishlist', { dataType: 'json' })
        .done(function (response) {
            userWishList = response.data
            setProductHadWished(idProduk)
        })

    $.ajax('/api/cart', { dataType: 'json' })
        .done(function (response) {
            userCart = response.data
            setProductHadInCart(idProduk)
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
    let jumlahBarang = $('input#jumlah-pesanan').val();
    $.ajax({
        url: '/api/cart/tambah',
        method: 'POST',
        dataType: 'json',
        data: {
            idProduk: idProduk,
            jumlah: jumlahBarang
        }
    }).done(function (response) {
        document.location.reload()
    })
})


function setProductHadWished(idProduk) {
    if (isProductExistInList(idProduk, userWishList)) {
        $('#addToWishlist').attr('disabled', true)
    }
    else {
        $('#addToWishlist').attr('disabled', false)
    }
}

function setProductHadInCart(idProduk){
    let button = $('#addToCart')
    if (isProductExistInList(idProduk, userCart)) {
        button.attr('disabled', true)
        button.text('Sudah Di Keranjang')
    }
    else {
        button.attr('disabled', false)
        button.text('Tambah Ke Keranjang')
    }
}


function isProductExistInList(idProduk, list) {
    return list.find(function (item) {
        return item.idProduk == idProduk
    })
}