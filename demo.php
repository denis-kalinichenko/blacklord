<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>iPhone Style Radios Demo</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
  <script src="/js/checkbox.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="/css/checkbox.css" type="text/css" media="screen" charset="utf-8" />
  <style type="text/css">
    body {
      padding: 10px; }
    th {
      text-align: right;
      padding: 4px;
      padding-right: 15px;
      vertical-align: top; }
    .css_sized_container .iPhoneCheckContainer {
      width: 250px; }
  </style>

  <script type="text/javascript" charset="utf-8">
    $(window).load(function() {
      $('.long_tiny :checkbox').iphoneStyle({ checkedLabel: '&nbsp;<img src="http://png.findicons.com/files/icons/1579/devine/32/un_lock.png" width="20px"/>', uncheckedLabel: '<img src="http://png.findicons.com/files/icons/1579/devine/32/lock.png"  width="20px"/>&nbsp;' });
    });
  </script>
  
</head>
<body>
<?php
if(isset($_POST['privacy'])) {
   if($_POST['privacy']==0) {
     echo "нулевое значение";
   }
} else {
  echo "приватно";
}
?>
<form method="post" action="demo.php">
    <span class="long_tiny">
        <input type="checkbox" id="long_tiny" name="privacy" value="0" checked="checked" />
    </span>
    <input type="submit" value="Send">
    </form>


</body>
</html>
