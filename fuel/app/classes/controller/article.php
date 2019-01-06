<?php

class Controller_Article extends Controller_Template
{
  private $per_page = 3;

  public function before()
  {
    parent::before();
    if (!Auth::check() and ! in_array(Request::active()->action, array('login','index','view'))) {
      Response::redirect('article/login');
    }
  }

  public function action_index()
  {
    $data = array();

    $count = Model_Article::count();
    $config = array(
            'pagination_url' => 'article/index',
            'uri_segment' => 3,
            'num_links' => 4,
            'per_page' => $this->per_page,
            'total_items' => $count,
          );
    $pagination = Pagination::forge('article_pagination',$config);

    $data['articles'] = Model_Article::query()
                        ->order_by('id','desc')
                        ->limit($this->per_page)
                        ->offset($pagination->offset)
                        ->get();
    $this->template->title = '記事一覧';
    $this->template->content = View::forge('article/list',$data);
    $this->template->content->set_safe('pagination',$pagination);
  }

  public function action_view($id = 0)
  {
    $data = array();
    $id and $data['article'] = Model_Article::find($id);
    if(!$data['article']) {
      Response::redirect('article');
    }

    $comment = Model_Comment::forge();
    $comment->user_id = Arr::get(Auth::get_user_id(),1);
    $comment->article_id = $id;

    $fieldset = Fieldset::forge()->add_model('Model_Comment');
    $fieldset->populate($comment,true);
    $fieldset->add('submit','',array('type'=>'submit','value'=>'コメントする','class'=>'btn medium primary'));
    $fieldset->form()->add_csrf();

    if ($fieldset->validation()->run()){
      $fields = $fieldset->validated();

      $comment->body = $fields['body'];
      $comment->user_id = $fields['user_id'];
      $comment->article_id = $fields['article_id'];

      if ($comment->save()){
        Response::redirect('article/view/'.$id);
      }
    }

    if(Auth::check()) {
      $form = $fieldset->build();
    } else {
      $form ='';
    }

    $this->template->title = $data['article']->title;
    $view = View::forge('article/view',$data);
    $view->set_safe('form',$form);
    $this->template->content = $view;
  }

  public function action_create()
  {
    $article = Model_Article::forge();
    $article->user_id = Arr::get(Auth::get_user_id(),1);

    $categories = Model_Category::find('all');
    $category_options = array();

    foreach($categories as $category) {
      $category_options[$category->id] = $category->name;
    }

    $fieldset = Fieldset::forge()->add_model('Model_Article');

    $fieldset->add_before('category_id','カテゴリ',array('type'=>'checkbox','options'=>$category_options),array(),'title')
      ->add_after('submit','',array('type'=>'submit','value'=>'投稿'),array(),'body');
    $fieldset->populate($article,true);

    if($fieldset->validation()->run()) {
      $fields = $fieldset->validated();
      $article = Model_Article::forge();

      $article->title = $fields['title'];
      $article->body = $fields['body'];
      $article->user_id = $fields['user_id'];

      if($fields['category_id']) {
        foreach ($fields['category_id'] as $category_id) {
          $category = Model_Category::find($category_id);
          if ($category) {
            $article->categories[] = $category;
          }
        }
      }

      if ($article->save()) {
        Response::redirect('article/view/'.$article->id);
      }
    }
    $fieldset->form()->add_csrf();
    $this->template->title = "新規作成";
    $this->template->set('content',$fieldset->build(),false);
  }

  public function action_edit($id = 0)
  {
    if($id) {
      $article = Model_Article::find($id);
      if (!$article or $article->user_id != Arr::get(Auth::get_user_id(),1)) {
        Response::redirect('articles');
      }
    }

    $fieldset = Fieldset::forge()->add_model('Model_Article');

    $fieldset->add_after('submit', '', array('type' => 'submit', 'value' => '更新'), array(), 'body');

    $fieldset->populate($article, true);

    if ($fieldset->validation()->run()) {
      $fields = $fieldset->validated();

      $article->title = $fields['title'];
      $article->body = $fields['body'];
      $article->user_id = $fields['user_id'];

      if ($article->save()) {
        Response::redirect('article/view/'.$article->id);
      }
    }
    $fieldset->form()->add_csrf();
    $this->template->title = '投稿更新';
    $this->template->set('content',$fieldset->build(),false);
  }

  public function action_login()
  {
    Auth::check() and Response::redirect('article');

    $data = array();

    $auth = Auth::instance();

    if (Input::post('username') and Input::post('password')) {
      $username = Input::post('username');
      $password = Input::post('password');
      $auth = Auth::instance();

      if ($auth->login($username, $password)) {
        Response::redirect('article');
      } else {
        $data['error'] = true;

      }
    }

    $this->template->title = 'ログイン';
    $this->template->content = View::forge('article/login');
  }

  public function action_logout()
  {
    $auth = Auth::instance();
    $auth->logout();

    Response::redirect('article');
  }
}
