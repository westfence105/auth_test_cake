<?php
	namespace App\Controller;

	use App\Controller\AppController;

	use App\Form\RegisterForm;

	class UsersController extends AppController {
		public function initialize(){
			parent::initialize();
			$this->loadComponent('Csrf');
		}

		public function login(){
			
		}

		public function register(){
			if($this->request->is('post')){
				$data = $this->request->data();
				$form = new RegisterForm();
				if( $form->execute( $data ) ){
					$user = $this->Users->newEntity( $data );
	
					if( $user->errors() ){
						$this->Flash->error('データの検証過程でエラーが発生しました。');
					}
					else if( $this->Users->save($user) ){
						$this->Flash->success( '登録完了' );
					}
					else{
						$this->Flash->error('データベースへの登録に失敗しました。');
					}

					$errors = $user->errors();
					foreach ($errors as $key => $value) {
						foreach ( $value as $cond => $error) {
							$this->Flash->error($error);
						}
					}
				}
				else {
					$this->Flash->error('フォームの入力内容にエラーがあります。');
					$errors = $form->errors();
					foreach ($errors as $key => $value) {
						foreach ( $value as $cond => $error) {
							$this->Flash->error($error);
						}
					}
				}
			}
		}
	}
?>