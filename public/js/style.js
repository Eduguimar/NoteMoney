$('div.alert').delay(3000).slideUp(300);

$(function() {
    $('#amount').maskMoney({prefix:'R$ ', allowNegative: true,
        thousands:'.', decimal:',', affixesStay: false});
})