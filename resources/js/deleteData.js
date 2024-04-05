import $ from 'jquery';

$('#deleteButton').on('click', function(){
    var id = $('#_id').val();
    var route = $(this).data('route');
    var csrf = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: route,
        type: "DELETE",
        data: {
            _token: csrf,
            id: id
        },
        dataType: 'json',

        success: function(response){
            alert('Dados de '+ response.name +' excluídos com sucesso');
        },

        error: function(response){
            alert('Erro: '. response.statusText);
        },

        complete: function(){
            window.location.reload(true);
        }
    })
})