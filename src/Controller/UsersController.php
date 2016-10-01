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
			$form = new RegisterForm();
			if($this->request->is('post')){
				if( $form->execute($this->request->data) ){
					$this->Flash->success('Success');
				}
				else{
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