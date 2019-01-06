<?php

class Controller_Member extends Controller_Template
{
  public $template = 'member/template';

  public $is_admin = false;

  public function before()
  {
    parent::before();

    if(!Auth::check() and Request::active()->action != 'login') {
      Response::redirect('member/login');
    }

    if (Auth::member(100)){
      $this->is_admin = true;
    }

    View::set_global('is_admin',$this->is_admin);
  }

  public function action_index()
  {
    $this->template->title = 'ようこそ'.Auth::get_screen_name().'さん';
    $this->template->content = View::forge('member/index');
  }

  public function action_login()
  {
    Auth::check() and Response::redirect('member');

    if(Input::post('username') and Input::post('password')) {
      $username = Input::post('username');
      $password = Input::post('password');
      $auth = Auth::instance();

      if ($auth->login($username,$password)) {
        Response::redirect('member');
      }
    }

    $this->template->title = '会員専用ページ';
    $this->template->content = View::forge('member/form');
  }

  public function action_logout()
  {
    $auth = Auth::instance();
    $auth->logout();

    Response::redirect('member');
  }
}
