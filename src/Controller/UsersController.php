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
				$user = $this->Users->newEntity( $this->request->data() );
	
				if( $user->errors() ){
					$this->Flash->error( __('Form data has invalid content.') );
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
		}
	}
?>