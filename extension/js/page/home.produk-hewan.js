var produkHewan = []
var produkKategori = []
var itemShowPerPage = 8

$.ajax({
  url:'/api/produk/hewan',
  method :'GET',
  dataType: 'json'
}).done(function(response){
  produkHewan = response.data

  showToPage(dataToCard(produkHewan))
})

$.ajax({
  url:'/api/kategori_produk/jenis/1',
  method :'GET',
  dataType: 'json'
}).done(function(response){
  produkKategori = response.data

  let  options = []
  for (let item of produkKategori) {
    let option = document.createElement('option')
    option.setAttribute('value', item.id)
    option.innerHTML = item.nama

    options.push(option)
  }
  $('#filter-kategori').append($(options).clone())
})

$('select#filter-kategori').on('change', function(){
  let kategoriId = $(this).val()
  let filteredData = ''
  if (kategoriId != 0) {
    filteredData = produkHewan.filter(function(item){
      return item.idKategori == kategoriId
    })
  }
  else{
    filteredData = produkHewan
  }

  showToPage(dataToCard(filteredData))
})

function showToPage(JElements){
  $('.chupy-product-list .row').html("")
  $('.chupy-product-list .row').append($(JElements).clone())
}

function dataToCard(data){
  let cardData = []
  for (let item of data) {
    let article = document.createElement('article')
    article.classList.add('col-6','col-md-3','chupy-product-card')

    let cardBody = document.createElement('a')
    cardBody.setAttribute('href','/produk/'+item.id)
    cardBody.classList.add("card")

    let cardImageHeader = document.createElement('img')
    cardImageHeader.classList.add('card-img-top')
    cardImageHeader.setAttribute('alt', "Foto Produk "+item.nama)
    let cardThumbnail = ''
    if (item.foto.length != 0) {
      cardThumbnail = '/extension/upload/'+item.foto[0].gambar
    }
    else{
      cardThumbnail = '/extension/img/chupy-box-ATOL.png'
    }
    cardImageHeader.setAttribute('src',cardThumbnail)

    let cardBodyText = document.createElement('div')
    cardBodyText.classList.add('card-body')

    let cardTitle = document.createElement('h5')
    cardTitle.classList.add('card-title')
    cardTitle.innerHTML = item.nama

    let cardDescription = document.createElement('p')
    cardDescription.classList.add('card-text')
    cardDescription.innerHTML = 'IDR '+item.harga

    cardBodyText.appendChild(cardTitle)
    cardBodyText.appendChild(cardDescription)

    cardBody.appendChild(cardImageHeader)
    cardBody.appendChild(cardBodyText)

    article.appendChild(cardBody)

    cardData.push(article)
  }

  return cardData
}


// breadcrumb


$(function(){

})
