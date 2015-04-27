$('div.alert').delay(3000).slideUp(300);

$(function() {
    $('#amount').maskMoney({prefix:'R$ ', allowNegative: true,
        thousands:'.', decimal:',', affixesStay: false});
})

$(".counter").textcounter();

//Prevent the form to submit
$('.confirm-delete').on('click', function(e) {
    e.preventDefault();
});

$('#confirmDelete').on('show.bs.modal', function (e) {
    $message = $(e.relatedTarget).attr('data-message');
    $(this).find('.modal-body p').text($message);
    $title = $(e.relatedTarget).attr('data-title');
    $(this).find('.modal-title').text($title);

    // Pass form reference to modal for submission on yes/ok
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirm').data('form', form);
});

<!-- Form confirm (yes/ok) handler, submits form -->
$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
    $(this).data('form').submit();
});