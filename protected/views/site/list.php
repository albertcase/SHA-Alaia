<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>阿莱亚预约管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" >
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" type="text/css" href="/html/css/guest.css"/>
    <link rel="stylesheet" type="text/css" href="/html/css/font-awesome.min.css"/>
    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/html/js/guest.js"></script>
</head>
<body>
    <div class="">
      <div class="checkoption">
        <div>
          搜索条件
          <select id="allorders">
            <option value="name">名字</option>
            <option value="surname">姓氏</option>
            <option value="title">称呼</option>
            <option value="telphone">联系电话</option>
            <option value="email">联系邮箱</option>
            <option value="callway">建议联系方式</option>
            <option value="storeid">店铺名</option>
            <option value="sguide">是否需要导购</option>
            <option value="status">状态</option>
          </select>
          <i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          每页显示：
          <select id="everypage">
            <option value="20">20条</option>
            <option value="30">30条</option>
            <option value="40">40条</option>
            <option value="50">50条</option>
          </select>
          <button class="btn-blue" id="searchbt" style="margin-left:80px;">搜索</button>
        </div>
        <div class="dataoption">

        </div>
        <div>
        </div>
      <div>
        <table border="0"  class="bespeaklist">
          <thead>
            <tr>
              <th>序号</th>
              <th>名字</th>
              <th>姓</th>
              <th>称呼</th>
              <th>联系电话</th>
              <th>电子邮件</th>
              <th>期望的联系方式</th>
              <th>专卖店</th>
              <th>店铺国家</th>
              <th>是否需要中文导购</th>
              <th>预约日期</th>
              <th>状态</th>
            </tr>
          </thead>
          <tbody>
            <tr userid="1">
              <th>3</th>
              <th>dirk</th>
              <th>wang</th>
              <th>先生</th>
              <th>+86-123123123123123</th>
              <th>757867658@qq.com</th>
              <th>电子邮件</th>
              <th>阿莱亚MARIGNAN店</th>
              <th>法国</th>
              <th>需要中文导购</th>
              <th>预约日期</th>
              <th><button class="btn-blue" id="logbt">签到</button></th>
            </tr>
          </tbody>
        </table>
        <div class="bespeaklistfoot">
          <ul>
            <li pagid = "1" class="pagenum">1</li>
            <li pagid = "1" class="notfeedback">…</li>
            <li pagid = "1" class="pagenum">23</li>
            <li pagid = "1" class="pagenum">24</li>
            <li pagid = "1" class="chooseli">25</li>
            <li pagid = "1" class="pagenum">26</li>
            <li pagid = "1" class="pagenum">27</li>
            <li pagid = "1" class="pagenum">28</li>
            <li pagid = "1" class="pagenum">29</li>
            <li pagid = "1" class="pagenum">30</li>
            <li pagid = "1" class="pagenum">31</li>
            <li pagid = "1" class="pagenum">32</li>
            <li pagid = "1" class="pagenum">33</li>
            <li pagid = "1" class="notfeedback">…</li>
            <li pagid = "1" class="pagenum">100</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="tembox"></div>
    <div class="popupbox2"></div>
</body>
</html>
