<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <style>body{margin:50px;}</style>
</head>
<body>
  <div class="topbar">
    <div class="fill">
      <div class="container">
        <h3><a href=""></a></h3>
        <ul class="nav secondary-nav">
          <li class="menu">
            <?php if(Auth::check()): ?>
              <?php echo Html::anchor('member/logout','ログアウト'); ?>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="span16">
        <h1><?php echo $title; ?></h1>
        <?php if ($is_admin): ?>
          <p><a href="<?php echo Uri::create('member/admin'); ?>" class="btn btn-primary">管理者ページへ</a></p>
        <?php endif; ?>
        <hr>
      </div>
      <div class="span16">
        <?php echo $content; ?>
      </div>
    </div>
    <footer>
      <p>
        <a href="http://fuelphp.com">FuelPHP</a> is released under the MIT lisense.
        <br>
        <small>Version: <?php echo e(Fuel::VERSION); ?></small>
      </p>
    </footer>
  </div>
</body>
</html>
