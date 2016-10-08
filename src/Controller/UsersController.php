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
						$this->Flash->error( __('Error while validating data.') );
					}
					else if( $this->Users->save($user) ){
						$this->Flash->success( __x('registration completed','Success') );
					}
					else{
						$this->Flash->error( __('Failed to add to database.') );
					}

					$errors = $user->errors();
					foreach ($errors as $key => $value) {
						foreach ( $value as $cond => $error) {
							$this->Flash->error($error);
						}
					}
				}
				else {
					$this->Flash->error( __('Form data has invalid content.') );
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