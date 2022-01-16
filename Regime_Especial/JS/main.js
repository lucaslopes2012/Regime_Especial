/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
 $('#delete-modal').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget);
    var ID = button.data('registro');
    
    var modal = $(this);
    modal.find('.modal-title').text('Deletar Registro #' + ID);
    modal.find('#confirm').attr('href', 'Del.php?ID=' + ID);
  })