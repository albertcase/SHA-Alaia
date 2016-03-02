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
    $('.select-box label').on('click',function(){
        $(this).parent().find('select')[0].selectedIndex = 0;
        $(this).parent().addClass('selected');
        if($(this).next().hasClass('select-store')){
            if($(this).next().val()=='1'){
                $('.input-box-ischinese').addClass('hide');
            }else{
                $('.input-box-ischinese').removeClass('hide');
            }
        }
    });
    $('select').on('change',function(e){
        if($(this).hasClass('select-store')){
            if($(this).val()=='1'){
                $('.input-box-ischinese').addClass('hide');
            }else{
                $('.input-box-ischinese').removeClass('hide');
            }
        }
    });

//    Form Validation
    var enableSubmit = true;
    $('.btn-submit').on('click', function(){
        _hmt.push(['_trackEvent', 'btn-submit', 'click', '提交']);
        if(FormValidate()){
            var formdata = {
                name:$('.input-firstname').val(),
                surname:$('.input-lastname').val(),
                title:$('#name').val(),
                telphone:$('.input-phone').val(),
                email:$('.input-email').val(),
                country:$('#country').val(),
                storeid:$('#store').val(),
                callway:$("input:radio[name=contact]:checked").val(),
                sguide:($('#store').val()==1)?0:$('#ischinese').val(),
                bespeaktime:$('.date').val()
            };

            if(!enableSubmit) return;
            enableSubmit = false;
            $.ajax({
                url:'/site/api/action/addbespeak/xsscode/'+pagecode.xsscode,
                type:'post',
                dataType:'json',
                data:formdata,
                success:function(data){

                    enableSubmit = true;
                    if(data=='12'){
                        alert('提交成功');
                        window.location.reload();
                    }else if(data=='11'){
                        alert('数据格式不对');
                    }else if(data=='13'){
                        alert('数据提交失败');
                    }else if(data=='52' ||data=='53'){
                        window.location.reload();
                    }
                }
            })
        }else{
            console.log('数据格式不对');
        }
    });


    function FormValidate(){
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
            if(!((/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/).test($('.input-email').val()))){
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
        if(!$('.input-box-ischinese').hasClass('hide')){
            if(!$('#ischinese').val()){
                errorMsg.add($('#ischinese').parent(),'是否需要导购');
                validate = false;
            }else{
                errorMsg.remove($('#ischinese').parent());
            }
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