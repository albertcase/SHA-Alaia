$(document).ready(function(){
//    select
    $('select').on('change',function(){
        $(this).parent().addClass('selected');
    })
});