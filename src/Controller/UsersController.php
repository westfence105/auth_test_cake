<?php
	namespace App\Controller;

	use App\Controller\AppController;

	use App\Form\RegisterForm;

	class UsersController extends AppController {
		public function initialize(){
			parent::initialize();
			$this->loadComponent('Csrf');
			$this->loadComponent('Auth', 
				[ 'authenticate' => 'Form' , 
				  'loginRedirect' => [ 'controller' => 'Users', 'action' => 'index' ]
				]);
			$this->Auth->allow('register');
		}

		public function index(){

		}

		public function login(){
			if( $this->request->is('post') ){
				$user = $this->Auth->Identify();
				if( $user ){
					$this->Auth->setUser($user);
					$this->redirect($this->Auth->redirectUrl());
				}
				else {
					$this->Flash->error(__('Username or password is incorrect.'));
				}
			}
		}

		public function register(){
			if ($this->request->is('post') ){
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

				$this->set('errors',$user->errors());
			}
		}
	}
?>