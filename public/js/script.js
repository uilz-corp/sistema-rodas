$(document).ready(()=>{
  loading();

  window.language = {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "Exibindo _MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
  }

  $('#indexTable').DataTable({"oLanguage": language});

  // $('input[name=cpf]').mask('000.000.000-00');
});


// ============= Simple events ===============

$(document).on('focus','.button, select, input',function(){
  $(this).removeClass('blur-border-effect')
      .addClass('click-border-effect');
});

$(document).on('blur', '.button, select, input',function(){
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

function getData(e){
  e.preventDefault();
  let id = e.composedPath()[1].id;
  let route = $('[data-data]').data('data');

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      'Accept':'application/json'
    }
  });

  $.ajax({
    url: route + '/show',
    method: 'post',
    data: {
      id: id,
    },
    beforeSend: loading(),
    success: function(result){
      var inputs = $('#form-update input');

      $.each(result.data, function(key, value) {
        inputs.filter(function() {
          return key == this.name;
        }).val(value);
      });

      loading();

      if (route === 'temas'){
        let subtemas = $.parseJSON(result.subtemas);

        $('#subtemasTable').DataTable({
          "info": false,
          "paging": false,
          "dom": 'ftip',
          "oLanguage": window.language,
          "data": subtemas,
          "columns" : [
            { "data": "id" },
            { "data": "descricao" },
          ]
        });
      }
      
      $('#modal-update').modal();
    }
  });
}
