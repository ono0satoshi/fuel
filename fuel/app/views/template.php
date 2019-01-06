<!DOCTYPE html>
<html>
<head>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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
    body {
      margin: 50px;
    }
    .page-links a {margin:0 10px }
    .page-links .active{
      margin:0 10px;
      text-decoration: underline;
    }
    .validation_error{background:#ffecec;}
    label {float:none;}
  </style>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
</head>
<body>
  <nav class="navbar navbar-light">
  <?php echo Html::anchor('article','FuelPHP入門ブログ',array('class'=>'navbar-brand')); ?>
  <div class="">
    <ul class="nav">
      <?php if (Auth::check()): ?>
        <li class="nav-item">
          <?php echo Html::anchor('article/create','新規投稿',array('class'=>'btn btn-primary mx-auto')); ?>
        </li>
        <li class="nav-item">
          <?php echo Html::anchor('article/logout','ログアウト',array('class'=>'nav-link active')); ?>
        </li>


      <?php else: ?>
        <?php echo Html::anchor('article/login','ログイン',array('class'=>'nav-item nav-link active')); ?>
      <?php endif; ?>
    </ul>
  </div>
</nav>
  <div class="container mt-5">
    <div class="row">
      <div class="span16 mx-auto">
        <h1><?php echo $title; ?></h1>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="span16 mx-auto"><?php echo $content; ?></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
