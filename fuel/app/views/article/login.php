<?php echo Form::open(array('class'=>'form-signin')); ?>
<fieldset class="">
  <?php if(isset($error)): ?>
    <div class="clearfix" style="color:red">ユーザー名またはパスワードが間違っています。</div>
  <?php endif; ?>
  <div class="hidden">
    <?php echo Form::hidden(Config::get('security.csrf_token_key'),Security::fetch_token()); ?>
  </div>
  <div class="clearfix">
    <?php echo Form::label('ユーザー名','username',array('for'=>'inputUsername')); ?>
    <?php echo Form::input('username','',array('class'=>'form-control')); ?>
  </div>
  <div class="clearfix">
    <?php echo Form::label('パスワード','password'); ?>
    <?php echo Form::password('password','',array('class'=>'form-control')); ?>
  </div>
  <div class="action mt-4">
    <?php echo Form::submit('submit','ログイン',array('class'=>'btn btn-lg btn-primary btn-block')); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>
