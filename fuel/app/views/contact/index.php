<div class="actions mb-4">以下のフォームに必要事項を記入して。「確認画面へ」をクリックしてください。<br>※のついた項目は必須です。</div>
<?php echo Form::open();?>
<div class="form-group">
  <?php echo Form::label('お名前※','name'); ?>
  <div class="field">
    <div class="error"><?php echo $val->error('name'); ?></div>
    <?php echo Form::input('name',Session::get_flash('name'),array('size'=>20,'required'=>'required','class'=>'form-control')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo Form::label('Emailアドレス※','email'); ?>
  <div class="field">
    <div class="error"><?php echo $val->error('email'); ?></div>
    <?php echo Form::input('email',Session::get_flash('email'),array('type'=>'email','size'=>40,'required'=>'required','class'=>'form-control')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo Form::label('お電話番号','tel'); ?>
  <div class="field">
    <div class="error"><?php echo $val->error('tel'); ?></div>
    <?php echo Form::input('tel',Session::get_flash('tel'),array('size'=>20,'class'=>'form-control')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo Form::label('お問合わせ内容※','body'); ?>
  <div class="field">
    <div class="error"><?php echo $val->error('body'); ?></div>
    <?php echo Form::textarea('body',Session::get_flash('body'),array('cols'=>40,'rows'=>5,'required'=>'required','class'=>'form-control')); ?>
  </div>
</div>
<div class="actions">
  <?php echo Form::submit('submit','確認画面へ',array('class'=>'btn btn-primary')); ?>&nbsp;&nbsp;
  <?php echo Form::reset('submit','クリア',array('class'=>'btn btn-primary')); ?>
  <?php echo Form::hidden(Config::get('security.csrf_token_key'),Security::fetch_token()); ?>
</div>
<?php echo Form::close(); ?>
