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
          SEARCH CRITERIA
          <select id="allorders">
            <option value="name">First name</option>
            <option value="surname">Family name</option>
            <option value="title">Title</option>
            <option value="telphone">Phone No.</option>
            <option value="email">Email address.</option>
            <option value="callway">Preferred way to contact</option>
            <option value="storeid">Store name</option>
            <option value="sguide">Need Chanese Shopping guide</option>
            <option value="status">Status</option>
          </select>
          <i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          SHOW：
          <select id="everypage">
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
          </select>
          <button class="btn-blue" id="searchbt" style="margin-left:80px;">Search</button>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <span id="sumtotal"></span>
          <span id="logout">Logout</span>
        </div>
        <div class="dataoption">

        </div>
        <div>
        </div>
      <div>
        <table border="1"  class="bespeaklist">
          <thead>
            <tr>
              <th>No.</th>
              <th>First name</th>
              <th>Family name</th>
              <th>Title</th>
              <th>Phone No.</th>
              <th>Email address</th>
              <th>Preferred way to contact</th>
              <th>Store</th>
              <th>Store Country</th>
              <th>Chinese Guide</th>
              <th>Appointment Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
<!-- bespeak list -->
<!-- bespeak list end -->
          </tbody>
        </table>
        <div class="bespeaklistfoot">
          <ul>
<!-- page list -->
<!-- page list end -->
          </ul>
        </div>
      </div>
    </div>
    <div class="tembox"></div>
    <div class="popupbox2"></div>
</body>
</html>
