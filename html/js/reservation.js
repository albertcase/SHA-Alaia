$(document).ready(function(){

    var errorMsg = {
        add:function(ele,msg){
            if(!ele.find('.error').length){
                ele.append('<div class="error">'+msg+'</div>');
            }else{
                ele.find('.error').html(msg);
            }
        },
        remove:function(ele){
            if(ele.find('.error').length){
                ele.find('.error').remove();
            }
        }
    };

//    select
//    reset all the select value
    $('select').val('');
    $('select').on('change',function(){
        $(this).parent().addClass('selected');
    });

//    Form Validation
    $('.btn-submit').on('click', function(){
        if(FormValidate()){
            console.log('true');
        }else{
            console.log('false');

        }
    });


    function FormValidate(formdata){
        var validate = true;
        if(!$('#name').val()){
            errorMsg.add($('#name').parent(),'请选择合适的称呼');
            validate = false;
        }else{
            errorMsg.remove($('#name').parent());
        }

        if(!$('.input-lastname').val()){
            errorMsg.add($('.input-lastname').parent(),'姓不能为空');
            validate = false;
        }else{
            errorMsg.remove($('.input-lastname').parent());
        }

        if(!$('.input-firstname').val()){
            errorMsg.add($('.input-firstname').parent(),'名不能为空');
            validate = false;
        }else{
            errorMsg.remove($('.input-firstname').parent());
        }

        if(!$('.input-phone').val()){
            errorMsg.add($('.input-phone').parent(),'手机号码不能为空');
            validate = false;
        }else{
            errorMsg.remove($('.input-phone').parent());

        }

        if(!$('.input-email').val()){
            errorMsg.add($('.input-email').parent(),'电子邮件不能为空');
            validate = false;
        }else{
            if($('.input-email').val().indexOf('@')<0){
                errorMsg.add($('.input-email').parent(),'电子邮件格式错误');
                validate = false;
            }else{
                errorMsg.remove($('.input-email').parent());
            }
        }

        if(!$('#country').val()){
            errorMsg.add($('#country').parent(),'请选择国家');
            validate = false;
        }else{
            errorMsg.remove($('#country').parent());
        }

        if(!$('#store').val()){
            errorMsg.add($('#store').parent(),'请选择专卖店');
            validate = false;
        }else{
            errorMsg.remove($('#store').parent());
        }

        if(!$('#ischinese').val()){
            errorMsg.add($('#ischinese').parent(),'是否需要导购');
            validate = false;
        }else{
            errorMsg.remove($('#ischinese').parent());
        }

        if(!$('.date').val()){
            errorMsg.add($('.date').parent(),'请填入日期');
            validate = false;
        }else{
            errorMsg.remove($('.date').parent());
        }

        return validate;
    }


});