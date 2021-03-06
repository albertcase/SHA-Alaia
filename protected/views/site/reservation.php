<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>阿莱亚ALAIA-预约店内服务</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" >
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" type="text/css" href="/html/css/screen.css?v=1.0"/>
    <script type="text/javascript" src="/html/js/jquery.min.js"></script>
    <script type="text/javascript" src="/html/js/reservation.js"></script>
    <script>
      var pagecode = {
          xsscode:"<?php echo $xsscode; ?>",
          stores:<?php echo $stores; ?>
      }
    </script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?1257181ffc5c8d308d6d34578b417ee2";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body class="page-reservation page-form grey-bg">
    <div class="container">
        <div class="tips">
            请填写以下信息，预约店内服务
        </div>
        <form action="post" id="form-reservation">
            <h3>个人信息</h3>
            <div class="input-box input-box-name select-box">
                <label for="name">称呼</label>
                <select name="name" id="name">
                    <option value="1">先生</option>
                    <option value="2">女士</option>
                    <option value="3">小姐</option>
                </select>
            </div>
            <div class="input-box input-box-lastname">
                <input type="text" name="lastname" class="input-lastname" placeholder="姓"/>
            </div>
            <div class="input-box input-box-firstname">
                <input type="text" name="firstname" class="input-firstname" placeholder="名"/>
            </div>
            <div class="input-box input-box-phone">
                <input type="tel" name="phone" class="input-phone" maxlength="11" placeholder="联系电话"/>
            </div>
            <div class="input-box input-box-email">
                <input type="email" name="email" class="input-email" placeholder="电子邮件"/>
            </div>
            <div class="input-box input-box-contact">
                <!--<label for="contact">您期望的联系方式</label>-->
                <div class="c-tips">您期望的联系方式</div>
                <input type="radio" name="contact" value="1" checked="checked"/><label for="contact">联系电话</label>
                <input type="radio" name="contact" value="2"/><label for="contact">电子邮件</label>
            </div>

            <h3 class="">选择专卖店</h3>
            <div class="input-box input-box-country select-box">
                <label for="country">国家</label>
                <select name="country" id="country">
                  <option>请选择国家</option>
<?php
foreach($countrys as $x=>$x_val)
  print '<option value="'.$x_val.'">'.$x.'</option>';
?>
                </select>
            </div>
            <div class="input-box input-box-store select-box">
                <label for="store">专卖店</label>
                <select name="store" id="store" class="select-store">
                    <!-- <option value="1">阿莱亚MOUSSY店</option>
                    <option value="2">阿莱亚MARIGNAN店</option> -->
                </select>
            </div>
            <div class="input-box input-box-ischinese select-box">
                <label for="ischinese">是否需要中文导购</label>
                <select name="ischinese" id="ischinese">
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>

            <div class="input-box input-box-date">
                <h3>日期</h3>
                <input type="date" name="date" class="date"/>
            </div>

            <div class="buttons btn-submit">
                发送
            </div>
        </form>
    </div>
<script>
$(function(){
$("#country").change(function(){
  var val = $("#country").val();
  var list = (pagecode.stores.hasOwnProperty(val))?pagecode.stores[val]:[];
  var len = list.length;
  var html = '';
  for( var i=0; i<len; i++){
    html += '<option value="'+list[i]['id']+'">'+list[i]['name']+'</option>';
  }
  $("#store").html(html);
})
});
</script>
</body>
</html>
