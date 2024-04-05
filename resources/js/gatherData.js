import $ from 'jquery';

$('tr').on('click', function() {
    var id = $(this).data('id');
    var name = $(this).find('td.name').text().trim();
    var idade = $(this).find('td.idade').text().trim();
    var cargo = $(this).find('td.cargo').text().trim();
    var telefone = $(this).find('td.telefone').text().trim();

    $('#_id').val(id);
    $('#name').val(name);
    $('#idade').val(idade);
    $('#cargo').val(cargo);
    $('#telefone').val(telefone);
})