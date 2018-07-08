let produkHewan = []
let produkKategori = []
let itemShowPerPage = 6

$.ajax('/api/produk/hewan').done(function(response){
  produkHewan = response.data

  for (let item of produkHewan) {
    let article = document.createElement('article')
    article.classList.add('col-6','col-md-3','chupy-produk-card')

    let cardBody = document.createElement('a')
    cardBody.setAttribute('href','/produk/'+item.id)

    let cardImageHeader = document.createElement('img')
    cardImageHeader.classList.add('card-img-top')
    cardImageHeader.setAttribute('src','/extension/img/chupy-box-ATOL.png')

    let cardBodyText = document.createElement('div')
    cardBodyText.classList.add('cord-body')

    let cardTitle = document.createElement('h5')
    cardTitle.classList.add('card-title')
    cardTitle.innerHTML = item.nama

    let cardDescription = document.createElement('p')
    cardDescription.classList.add('card-text')
    cardDescription.innerHTML = item.harga
  }



$.ajax('/api/kategori_produk/jenis/1').done(function(response){
  produkKategori = response.data
})

$(function(){

})
