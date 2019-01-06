<?php

class Controller_Contact extends Controller_Template
{

	private $fields = array('name','email','tel','body');

	public function action_index()
	{
		if (Input::post('submit')) {
			foreach($this->fields as $field) {
				Session::set_flash($field,Input::post($field));
			}
		}

		$val = Validation::forge();

		$val->add('name','お名前')->add_rule('required');
		$val->add('tel','お電話番号')->add_rule('valid_string',array('numeric','dashes'));
		$val->add('email','Emailアドレス')->add_rule('required')->add_rule('valie_email');
		$val->add('body','お問合わせ内容')->add_rule('required');

		if ($val->run() and Security::check_token()) {
			Response::redirect('contact/confirm');
		}

		$data = array();
		$data["val"] = $val;

		$this->template->title = 'お問合わせ';
		$this->template->content = View::forge('contact/index', $data);
	}

	public function action_confirm()
	{
		$data = array();

		foreach($this->fields as $field) {
			$data[$field] = Session::get_flash($field);

			Session::keep_flash($field);
		}

		$this->template->title = 'お問合わせ';
		$this->template->content = View::forge('contact/confirm', $data);
	}

	public function action_send()
	{
		if (Input::post('back')) {
			foreach($this->fields as $field) {
				Session::keep_flash($field);
			}
			Response::redirect('contact');
		}

		if (!Security::check_token()) {
			$this->template->title = 'お問合わせ';
			$this->template->content = View::forge('contact/send',array('message' => 'ページ遷移が正しくありません'));
			return;
		}

		if (Session::get_flash('email')) {
			$mail = array();

			foreach($this->fields as $field) {
				$mail[$field] = Session::get_flash($field);
			}

			$body = View::forge('contact/contact_mail',$mail);
			\Package::load('email');
			$email = Email::forge();

			$email->from(Session::get_flash('email'),Session::get_flash('name'));

			$email->to(Config::get('contact_to'));

			$email->subject('お問合わせがありました');

			$email->body(mb_convert_encoding($body,'jis'));

			try {
				$email->send();
			} catch (\EmailValidationFailedException $e) {
				$message = '送信に失敗しました。\n送信先のメールアドレスが正しくありません。';
			} catch (\EmailSendingFailedException $e) {
				$message = "送信に失敗しました。";
			}

			$message = '送信しました。';
		} else {
			$message = "お問合わせフォームが正しく送信されていません。\nフォームに戻ってください。";
		}
		$data["message"] = $message;
		$this->template->title = 'お問合わせ';
		$this->template->content = View::forge('contact/send', $data);
	}

}
