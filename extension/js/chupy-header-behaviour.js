$('#navbarToggle').on('click', function(){
  let toggleTarget = $('#navbarNav');
  if (toggleTarget.hasClass('show')) {
    $('body').css({'overflow':'visible'})
  }else{
    $('body').css({'overflow':'hidden'})
  }
})
