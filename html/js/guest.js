var popbox={
  logsubmit:function(){
    html.pagehold();
    $.ajax({
      url:"/site/api/action/alaialogin/xsscode/"+pagecode.xsscode,
      dataType:"json",
      type:"POST",
      data:{
        user: $("#logname").val(),
        password: $("#logpassword").val()
      },
      error: function(jqXHR, textStatus, errorMsg){
        html.closepop2();
        html.tips("Request Error");
      },
      success:function(data){
        if(data == '14'){
            window.location.href='/site/list/';
        }
        if(data == '15'|| data == '11'){
          html.closepop2();
          html.tips("password or username Error");
        }
        if(data == '52' ||data =='53'){
          window.location.reload();
        }
      }
    });
  },
  onload: function(){
    var self = this;
    $("#logbt").click(function(){
      popbox.logsubmit();
    });
  }
}


var adminlist = {
  orderlist:[],
  page:1,
  count:0,
  buildname:function(){
    var a='<dl>';
    a += '<dt><i class="fa fa-minus-square faleft" opt="name"></i>First name:</dt>';
    a += '<dd><input type="text" id="ordername"></input></dd>';
    a += '</dl>';
    return a;
  },
  buildsurname:function(){
    var a='<dl>';
    a += '<dt><i class="fa fa-minus-square faleft" opt="surname"></i>Family name:</dt>';
    a += '<dd><input type="text" id="ordersurname"></input></dd>';
    a += '</dl>';
    return a;
  },
  buildtitle:function(){
    var a='<dl>'
    a += '<dt><i class="fa fa-minus-square faleft" opt="title"></i>Title：</dt>';
    a += '<dd>';
    a +='<select id="ordertitle">';
    a += '<option value="1">Sir</option>';
    a += '<option value="2">Ms</option>';
    a += '<option value="3">Miss</option>';
    a += '</select>';
    a += '</dd>';
    a += '</dl>';
    return a;
  },
  buildemail:function(){
    var a='<dl>';
    a += '<dt><i class="fa fa-minus-square faleft" opt="email"></i>Email address:</dt>';
    a += '<dd><input type="text" id="orderemail"></input></dd>';
    a += '</dl>';
    return a;
  },
  buildtelphone:function(){
    var a='<dl>';
    a += '<dt><i class="fa fa-minus-square faleft" opt="telphone"></i>Phone No:</dt>';
    a += '<dd><input type="text" id="ordertelphone"></input></dd>';
    a += '</dl>';
    return a;
  },
  buildcallway:function(){
    var a='<dl>';
    a += '<dt><i class="fa fa-minus-square faleft" opt="callway"></i>Contact Way：</dt>';
    a += '<dd>';
    a += '<select id="ordercallway">';
    a += '<option value="1">Telephone</option>';
    a += '<option value="2">Email</option>';
    a += '</select>';
    a += '</dd>';
    a += '</dl>';
    return a;
  },
  buildstoreid:function(){
    var a='<dl>';
    a += '<dt><i class="fa fa-minus-square faleft" opt="storeid"></i>Store：</dt>';
    a += '<dd>';
    a += '<select id="orderstoreid">';
    a += '<option value="1">阿莱亚MOUSSY店</option>';
    a += '<option value="2">阿莱亚MARIGNAN店</option>';
    a += '</select>';
    a += '</dd>';
    a += '</dl>';
    return a;
  },
  buildsguide: function(){
    var a='<dl>';
    a += '<dt><i class="fa fa-minus-square faleft"  opt="sguide"></i>Chinese Guide：</dt>';
    a += '<dd>';
    a += '<select id="ordersguide">';
    a += '<option value="1">Need</option>';
    a += '<option value="0">Not Need</option>';
    a += '</select>';
    a += '</dd>';
    a += '</dl>';
    return a;
  },
  buildstatus: function(){
    var a='<dl>';
    a += '<dt><i class="fa fa-minus-square faleft"  opt="status"></i>Status：</dt>';
    a += '<dd>';
    a += '<select id="orderstatus">';
    a += '<option value="1">Processed</option>';
    a += '<option value="0">Unprocessed</option>';
    a += '</select>';
    a += '</dd>';
    a += '</dl>';
    return a;
  },
  showlsit: function(data){
    var al = data.length;
    var a = '';
    var b,c,d,e;
    for(var i=0 ;i<al ;i++){
        b='' ;c='';d='';e='';
        a += '<tr sid="'+data[i]["id"]+'">';
        a += '<th>'+i+'</th>';
        a += '<th>'+data[i]["name"]+'</th>';
        a += '<th>'+data[i]["surname"]+'</th>';
        if(data[i]["title"] == "1")
          b = "Sir";
        if(data[i]["title"] == "2")
            b = "Ms";
        if(data[i]["title"] == "3")
            b = "Miss";
        a += '<th>'+b+'</th>';
        a += '<th>'+data[i]["telphone"]+'</th>';
        a += '<th>'+data[i]["email"]+'</th>';
        if(data[i]["callway"] == "1")
          c = "Telephone";
        if(data[i]["callway"] == "2")
          c = "Email";
        a += '<th>'+c+'</th>';
        // if(data[i]["storeid"] == "1")
        //   e = "阿莱亚MOUSSY店";
        // if(data[i]["storeid"] == "2")
        //   e = "阿莱亚MARIGNAN店";
        a += '<th>'+pagecode.storeid[data[i]["storeid"]]+'</th>';
        a += '<th>'+data[i]["country"]+'</th>';
        if(data[i]["sguide"] == '1')
          d = "Need";
        if(data[i]["sguide"] == '0')
          d = "Not Need";
        a += '<th>'+d+'</th>';
        a += '<th>'+data[i]["bespeaktime"]+'</th>';
        if(data[i]["status"] != '0'){
          a += '<th>Processed</th>';
        }else{
          a += '<th><button class="btn-blue logbt">Process</button></th>';
        }
        a += '</tr>';
    }
    return a;
  },
  shownav: function(pm, pc){/*a is pagenumber b count of pag*/
    var a = '';
    var b = '';
    if(pc <= 15 ){
      for(var i=0 ;i<pc ;i++){
        b = i+1;
        if( pm == b){
          a += '<li pagid = "'+b+'" class="chooseli">'+b+'</li>';
        }else{
          a += '<li pagid = "'+b+'" class="pagenum">'+b+'</li>';
        }
      }
      return a;
    }
    if( pm <= 8 ){
      for(var i=0 ;i<13 ;i++){
        b = i+1;
        if( pm == b){
          a += '<li pagid = "'+b+'" class="chooseli">'+b+'</li>';
        }else{
          a += '<li pagid = "'+b+'" class="pagenum">'+b+'</li>';
        }
      }
      a += '<li class="notfeedback">…</li>';
      a += '<li  pagid = "'+pc+'" class="pagenum">'+pc+'</li>';
      return a;
    }
    if( pm > 8 && pm <= pc-8 ){
      a += '<li pagid = "1" class="pagenum">1</li>';
      a += '<li class="notfeedback">…</li>';
      var c = pm-5;
      for(var i=0 ;i<11 ;i++){
        b = i+c;
        if( pm == b){
          a += '<li pagid = "'+b+'" class="chooseli">'+b+'</li>';
        }else{
          a += '<li pagid = "'+b+'" class="pagenum">'+b+'</li>';
        }
      }
      a += '<li class="notfeedback">…</li>';
      a += '<li  pagid = "'+pc+'" class="pagenum">'+pc+'</li>';
      return a;
    }
    if( pm > pc-8 ){
      a += '<li pagid = "1" class="pagenum">1</li>';
      a += '<li class="notfeedback">…</li>';
      for(var i=0 ;i<13 ;i++){
        b = i+pc-12;
        if( pm == b){
          a += '<li pagid = "'+b+'" class="chooseli">'+b+'</li>';
        }else{
          a += '<li pagid = "'+b+'" class="pagenum">'+b+'</li>';
        }
      }
      return a;
    }
  },
  addoption: function(){
    var self = this;
    var val = $("#allorders").val();
    var opt ='';
    if(self.orderlist.indexOf(val) == "-1"){
      switch (val){
        case 'name':
          opt = self.buildname();
          break;
        case 'surname':
          opt = self.buildsurname();
          break;
        case 'title':
            opt = self.buildtitle();
            break;
        case 'telphone':
          opt = self.buildtelphone();
          break;
        case 'email':
          opt = self.buildemail();
          break;
        case 'callway':
          opt = self.buildcallway();
          break;
        case 'storeid':
          opt = self.buildstoreid();
          break;
        case 'sguide':
          opt = self.buildsguide();
          break;
        case 'status':
          opt = self.buildstatus();
          break;
      }
      self.orderlist.push(val);
      $(".dataoption").append(opt);
      return true;
    }
    html.tips("This option already added!!!");
  },
  deloption:function(obj){
    var self = this;
    self.orderlist = self.delarraykey(self.orderlist ,obj.attr("opt"));
    obj.parent().parent().remove();
  },
  delarraykey: function(ar ,key){
    var a = [];
    var b = ar.length;
    for(var i=0 ;i<b; i++){
      if(ar[i] != key)
        a.push(ar[i]);
    }
    return a;
  },
  submitsearch:function(){
    var self = this;
    var subdata = {};
    var a = self.orderlist.length;
    for(var i=0 ;i<a ;i++){
      var b = self.trim($("#order"+self.orderlist[i]).val());
      if(b.length == 0){
        html.tips("Please check your input!!!");
        return true;
      }
      subdata[self.orderlist[i]] = b;
    }
    return subdata;
  },
  opsearch:function(){
    var self = this;
    adminlist.page = 1;
    self.getpagecount(self.submitsearch());
  },
  changepage:function(){
    var self = this;
    self.ajaxsend(self.submitsearch() ,adminlist.page ,$("#everypage").val());
  },
  ajaxsend:function(subdata ,a ,b){/*a is pagnumber ,b is suminonepage*/
    html.pagehold();
    subdata['numb'] = a;
    subdata['one'] = b;
    $.ajax({
      url:"/site/adminapi/action/getpage",
      dataType:"json",
      type:"POST",
      data:subdata,
      error: function(jqXHR, textStatus, errorMsg){
        html.closepop2();
        html.tips("Request Error");
      },
      success:function(data){
        if(data == '4'){
          window.location.reload();
          return true;
        }
        if(data != '11'){
          $(".bespeaklist tbody").html(adminlist.showlsit(data));
          $(".bespeaklistfoot ul").html(adminlist.shownav(adminlist.page ,adminlist.count));
          html.closepop2();
          return true;
        }
        html.closepop2();
        html.tips("Please check your input!!!");
      }
    });
  },
  trim:function(str){
　　    return str.replace(/(^\s*)|(\s*$)/g, "");
　},
  comfircome:function(sid){
    html.pagehold();
    $.ajax({
      url:"/site/adminapi/action/comfirmbespk",
      dataType:"json",
      type:"POST",
      data:{id: sid},
      error: function(jqXHR, textStatus, errorMsg){
        html.closepop2();
        html.tips("Request Error");
      },
      success:function(data){
        if(data == '4'){
          window.location.reload();
          return true;
        }
        if(data == '12'){
          adminlist.changepage();
          html.closepop2();
          html.tips("Update Success");
          return true;
        }
        adminlist.changepage();
        html.closepop2();
        html.tips("Update error");
      }
    });
  },
  getpagecount:function(subdata){
    var self = this;
    html.pagehold();
    $.ajax({
      url:"/site/adminapi/action/getcount",
      dataType:"json",
      type:"POST",
      data:subdata,
      error: function(jqXHR, textStatus, errorMsg){
        html.closepop2();
        html.tips("Request Error");
      },
      success:function(data){
        if(data == '4'){
          window.location.reload();
          return true;
        }
        if(data != '11'){
          adminlist.count = Math.ceil(parseInt(data['count'])/parseInt($("#everypage").val()));
          $("#sumtotal").text("TOTLE:"+parseInt(data['count']));
          html.closepop2();
          self.ajaxsend(self.submitsearch() ,1 ,$("#everypage").val());
          return true;
        }
        html.closepop2();
        html.tips("Please check your input!!!");
      }
    });
  },
  logout:function(){
    html.pagehold();
    $.ajax({
      url:"/site/logout",
      dataType:"json",
      type:"POST",
      error: function(jqXHR, textStatus, errorMsg){
        html.closepop2();
        html.tips("Request Error");
      },
      success:function(data){
          window.location.reload();
          return true;
      }
    });
  },
  onload:function(){
    var self = this;
    $(".checkoption .fa-plus-square").click(function(){
      self.addoption();
    });
    $(".dataoption").on("click" ,".fa-minus-square" ,function(){
      self.deloption($(this));
    });
    $("#searchbt").click(function(){
      self.opsearch();
    });
    $("#logout").click(function(){
      self.logout();
    });
    $(".bespeaklist").on("click" ,"tbody .logbt" ,function(){
      var id = $(this).parent().parent().attr("sid");
      self.comfircome(id);
    });
    $(".bespeaklistfoot").on("click" ,".pagenum" ,function(){
      var pagid = $(this).attr("pagid");
      adminlist.page = pagid;
      adminlist.changepage();
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
  adminlist.onload();
});
