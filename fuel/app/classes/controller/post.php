<?php

class Controller_Post extends Controller
{
  public function action_auto_insert()
  {
    for ($i = 0; $i < 10; $i++) {
      $post = Model_Post::forge();

      $row = array();
      $row['title'] = $i.'番目の投稿件名';
      $row['summary'] = $i.'番目の概要';
      $row['body'] = 'これは'.$i.'番目の投稿です。'."\n".'テストで自動投稿してます。';

      $post->set($row);

      $post->save();
    }
    echo "Finished!";
  }

  public function action_index()
  {
    $data = array();
    $data['rows'] = Model_Post::find_all();
    return View::forge('post/list',$data);
  }
}