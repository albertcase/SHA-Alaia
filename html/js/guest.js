var popbox={
  logsubmit:function(){
    html.pagehold();
    $.ajax({
      url:"./api/action/alaialogin/xsscode/"+pagecode.xsscode,
      dataType:"json",
      type:"POST",
      data:{
        user: $("#logname").val(),
        password: $("#logpassword").val()
      },
      success:function(data){
        if(data == '14'){
            window.location.href='./list/';
        }
        if(data == '15'|| data == '11'){
          html.closepop2();
          html.tips("密码或者账户错误");
        }
        if(data == '52' ||data =='53'){
          window.location.reload();
        }
      }
    });
  },

var adminlist = {
  order:{},
}
  onload: function(){
    var self = this;
    $("#logbt").click(function(){
      popbox.logsubmit();
    });
  }
}

var html={
  asshowa:function(data){//隐藏->显示
  var self = this;
  if(data.rgba > 1){
    clearTimeout(tb);
    return true;
  }
  data.rgba +=0.02;
  data.object.css("opacity",data.rgba);
  tb = setTimeout(function(){self.asshowa(data)} ,data.gap);
},
  asshowb:function(data){//显示->隐藏
  var self = this;
  if(data.rgba <0){
    clearTimeout(tb);
    clearTimeout(tc);
    $(".tembox").empty();
    return true;
  }
  data.rgba -=0.02
  data.object.css("opacity",data.rgba);
  tb = setTimeout(function(){self.asshowb(data)} ,data.gap);
  },
  tips:function(content){
  var self = this;
    $(".tembox").html('<div class="tips">'+content+'</div>');
    var obj= $(".tembox").children();
    var data = {
        object:obj,
        gap:15,
        total:50,
        rgba:0,
      }
    self.asshowa(data);
    tc = setTimeout(function(){self.asshowb(data)} ,1000);
  },
  pagehold:function(){
    $(".popupbox2").html('<div class="faload"><i class="fa fa-spinner fa-pulse"></i></div>');
    $(".popupbox2").css({"display":"block" ,"background-color":"rgba(0, 0, 0, 0.4)"});
  },
  closepop2:function(){
    $(".popupbox2").empty();
    $(".popupbox2").css("display","none");
  },
}

$(function(){
  popbox.onload();
});
