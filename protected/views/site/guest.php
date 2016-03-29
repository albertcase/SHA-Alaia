<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>阿莱亚预约管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" >
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" type="text/css" href="/html/css/guest.css"/>
    <link rel="stylesheet" type="text/css" href="/html/css/font-awesome.min.css"/>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?1257181ffc5c8d308d6d34578b417ee2";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/html/js/guest.js"></script>
    <script>
    var pagecode = {
        xsscode:"<?php echo $xsscode; ?>",
    }
    </script>
</head>
<body>
    <div class="logpage">
      <div>登陆</div>
      <div>
        <div>
          <input id="logname" name="logname" maxlength="255" placeholder="User Name" type="text" value="" />
        </div>
        <div>
          <input id="logpassword" name="password" placeholder="Password" type="password" />
        </div>
      </div>
      <div>
        <button class="btn-blue" id="logbt">Login</button>
      </div>
    </div>
    <div class="tembox"></div>
    <div class="popupbox2"></div>
</body>
</html>
