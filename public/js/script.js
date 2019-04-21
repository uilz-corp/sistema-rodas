
$(document).on('focus','.button, input',function(){
  $(this).removeClass('blur-border-effect')
      .addClass('click-border-effect');
});

$(document).on('blur', '.button, input',function(){
  $(this).addClass('blur-border-effect')
      .removeClass('click-border-effect');
});

$(document).on('submit','form',function(){
  $('.submit input').removeClass('blur-border-effect')
      .addClass('click-border-effect');
});

$('.sidebarCollapse').click(()=>{
  $('.sidebar').toggleClass('d-none');
});