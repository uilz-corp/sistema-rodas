$(document).ready(()=>{
  $('.loading').toggle();
});

// ============= Simple events ===============

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

// ============= Complex events ===============


$(document).on('submit','#form-login-user',function(e){
  e.preventDefault();

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      'Accept':'application/json'
    }
  });

  $.ajax({
    url: 'login',
    method: 'post',
    data: $(this).serialize(),

    beforeSend: loading(),
    success: ()=>{
        window.location = 'dashboard'
    },
    error: (err)=>{
      loading();

      if (err.status == 422 || err.status == 400) {
        $.each(err.responseJSON, function(key, value) {
          $("#messagesDiv").fadeIn(400).removeAttr('hidden').html(value);
        });
      }
    }
  });
});


// ============= Simple functions ===============

function loading(){
  $('.loading').toggle();
}

// ============= Complex functions ===============

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
    beforeSend: loading(),
    success: function(result){
      var $inputs = $('#form-update-user input');

      $.each(result.user, function(key, value) {
        $inputs.filter(function() {
          return key == this.name;
        }).val(value);
      });

      loading();
      $('#modal-update-user').modal();
    }
  });
}
