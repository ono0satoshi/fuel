<html>
<meta charset="utf-8">
<body>
  <?php foreach ($rows as $row): ?>
    <div style="background:#999">
      <?php echo $row['title']; ?>  
    </div>
    <div>
      <?php echo $row['summary']; ?>
    </div>
    <div>
      <?php echo $row['body']; ?>
    </div>
  <?php endforeach; ?>
</body>
</html>