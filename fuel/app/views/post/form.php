<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body>
  <form action="/post/save" accept-charset="utf-8" method="post">
    <p>
      <label for="form_title">件名</label>
      <input type="text" name="title" value="" id="form_title">
    </p>
    <p>
      <label for="form_summary">概要</label>
      <input type="text" name="summary" id="form_summary">
    </p>
    <p>
      <label for="form_body">本文</label>
      <textarea name="body" id="form_body" cols="60" rows="8"></textarea>
    </p>
    <div class="actions">
      <input type="submit" name="submit" value="投稿" id="form_submit">    
    </div>
  </form>
</body>
</html>