$('#delete').on('show.bs.modal',function (event){
    var button = $(event.relatedTarget)
    var member_id = button.data('memberid')
    var modal = $(this)
    modal.find('.modal-body #member_id').val(member_id);
})