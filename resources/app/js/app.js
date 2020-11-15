$(document).ready( function () {
    $('#myTable').DataTable();
    $('.select2').select2({
        placeholder: 'Выбрать роль',
        theme: "classic",
        allowClear: true
    });
} );
