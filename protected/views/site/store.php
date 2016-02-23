<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>阿莱亚ALAIA-店铺显示</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" >
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" type="text/css" href="/html/css/screen.css?v=1.0"/>
</head>
<body class="page-store">
<div class="avatar">
    <img src="/img/avatar.png" alt=""/>
</div>
<div class="add-content">
    <h3 class="store-name"><?php echo $store['name']?></h3>
    <hr>
    <div class="store-address">地址：<?php echo $store['address']?></div>
    <div class="store-phone">电话：<?php echo $store['telphone']?></div>
    <div class="store-mail">邮箱： <?php echo $store['email']?></div>
    <div class="store-time">营业时间：<?php echo $store['open']?></div>
</div>
<div class="store-map">
    <img src="/img/avatar.png" alt=""/>
</div>
</body>
</html>
