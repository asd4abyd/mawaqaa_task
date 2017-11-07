/**
 * Created by Abdelqader Osama on 07/11/17.
 */

$('.number-float').keypress(function(e){

    var key =  e.charCode || e.which;
    var char = String.fromCharCode(key);
    if( !(/[\d\.]/).test(char) || (char=='.' && String($(this).val()).match(/[\.]/g) != null)) {
        e.preventDefault();
        return false;
    }
});


$('.number').keypress(function(e){

    var key =  e.charCode || e.which;
    var char = String.fromCharCode(key);
    if( !(/[\d]/).test(char) ) {
        e.preventDefault();
        return false;
    }
});

$(':required').each(function () {
    var label = $('label[for="'+$(this).attr('id')+'"]');
    label.html(
        label.html()+
        '&nbsp;'+
        '<span class="text-danger h3">*</span>'
    );
});