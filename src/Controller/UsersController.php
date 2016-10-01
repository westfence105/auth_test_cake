<?php
	namespace App\Controller;

	use App\Controller\AppController;

	class UsersController extends AppController {
		public function initialize(){
			parent::initialize();
			$this->loadComponent('Csrf');
		}
		
		public function login(){
			
		}

		public function register(){

		}
	}
?>