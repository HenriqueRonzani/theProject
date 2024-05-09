import $ from 'jquery';

$('tr').on('click', function() {
    var id = $(this).data('id');
    var name = $(this).find('td.name').text().trim();
    var bairro = $(this).find('td.bairro').text().trim();
    var contato = $(this).find('td.contato').text().trim();
    var lideranca = $(this).find('td.lideranca').text().trim();
    var resultado = $(this).find('td.resultado').text().trim();

    $('#_id').val(id);
    $('#name').val(name);
    $('#bairro').val(bairro);
    $('#contato').val(contato)
    $('#lideranca').val(lideranca);
    $('#resultado').val(resultado);
})