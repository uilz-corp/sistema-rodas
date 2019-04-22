
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


function getUser(e){
  e.preventDefault();
  let id = e.path[1].id;

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      'Accept':'application/json'
    }
  });

  $.ajax({
    url: 'users/show',
    method: 'post',
    data: {
      id: id,
    },
    success: function(result){
      var $inputs = $('#form-update-user input');

      $.each(result.user, function(key, value) {
        $inputs.filter(function() {
          return key == this.name;
        }).val(value);
      });

      $('#modal-update-user').modal();
    }
  });
}
