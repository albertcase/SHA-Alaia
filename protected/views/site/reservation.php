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
      }
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
                    <option value="先生">先生</option>
                    <option value="女士">女士</option>
                    <option value="小姐">小姐</option>
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
                <input type="radio" name="contact" value="phone" checked="checked"/><label for="contact">联系电话</label>
                <input type="radio" name="contact" value="email"/><label for="contact">电子邮件</label>
            </div>

            <h3 class="">选择专卖店</h3>
            <div class="input-box input-box-country select-box">
                <label for="country">国家</label>
                <select name="country" id="country">
                    <option value="法国">法国</option>
                </select>
            </div>
            <div class="input-box input-box-store select-box">
                <label for="store">专卖店</label>
                <select name="store" id="store" class="select-store">
                    <option value="MOUSSY">阿莱亚MOUSSY店</option>
                    <option value="MARIGNAN">阿莱亚MARIGNAN店</option>
                </select>
            </div>
            <div class="input-box input-box-ischinese select-box">
                <label for="ischinese">是否需要中文导购</label>
                <select name="ischinese" id="ischinese">
                    <option value="是">是</option>
                    <option value="否">否</option>
                </select>
            </div>

            <div class="input-box input-box-date">
                <h3>日期（按以下格式输入：04022016）</h3>
                <input type="date" name="date" class="date"/>
            </div>

            <div class="buttons btn-submit">
                发送
            </div>
        </form>
    </div>


</body>
</html>
