<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    #wrapper {
      margin:0 auto;
      width:960px;
    }
		#wrapper > h1 {
			background: aqua;
		}
    #middle {
      background: #fcc;
    }

    #menu {
      float:left;
      width:230px;
    }
    #content {
      float:left;
      padding-left: 20px;
      background:#fff;
      width:710px;
    }
    #footer {
      background:#cfc;
      padding:10px;
    }
    .clearfix:after {
      content:"";
      display: block;
      clear:both;
      height: 0;
      visibility: hidden;
    }
    .clearfix {
      min-height: 1px;
    }
    * html .clearfix {
      height: 1px;
      /*¥*//*/
      height: auto;
      overflow:hidden;
      /**/
    }
  </style>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
</head>
<body>
  <div id="wrapper">
    <h1><?php echo $title; ?></h1>
  </div>
  <div id="middle" class="clearfix">
    <div id="menu">
      <ul>
        <li>FuelPHP</li>
        <li>Controllerとは</li>
        <li>Viewとは</li>
        <li>Modelとは</li>
      </ul>
    </div>
    <div id="content">
      <?php echo $content; ?>
    </div>
  </div>
  <div id="footer">&copy; Satoshi Ono 2018</div>
</body>
</html>
