<?php

class Controller_Member_Admin extends Controller_Member
{
  public $template = 'member/admin/template';

  public function before()
  {
    parent::before();

    if (!$this->is_admin) {
      Response::redirect('member');
    }
  }

  public function action_index()
  {
    $this->template->title = 'ようこそ'.Auth::get_screen_name().'さん';
    $this->template->content = View::forge('member/admin/index');
  }
}
