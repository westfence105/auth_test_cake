<?php
	namespace App\Form;

	use Cake\Form\Form;
	use Cake\Form\Schema;
	use Cake\Validation\Validator;

	class RegisterForm extends Form {
		protected function _buildSchema(Schema $schema){
			return $schema->addField('username','string')
						  ->addField('password',[ 'type' => 'password' ])
				;
		}

		public function isAlphaNumericUnderbar($str){
			return preg_match( '/^[_A-Za-z0-9]*$/', $str ) == 1;
		}

		protected function _buildValidator(Validator $validator){
			return $validator->notEmpty('username','ユーザ名が空白です。')
							 ->notEmpty('password','パスワードが空白です。')
							 ->add( 'username',  
									[
										'length'=> [
											'rule' => [ 'lengthBetween', 4, 16 ],
											'message' => 'ユーザ名は4文字から16文字の間です。'
										]
									] )
							 ->add( 'password', 
									[
										'length' => [
											 'rule' => [ 'minLength', 8 ], 
											 'message' => 'パスワードは8文字以上です。'
										]
									] )
							 ->add( 'username', 'custom',
							 		[
							 			'rule' => [ $this, 'isAlphaNumericUnderbar' ],
							 			'message' => 'ユーザ名に使用できるのは半角英数字と_（アンダーバー）だけです'
							 		]
							 	)
							 ->add( 'password', 'custom',
							 		[
							 			'rule' => [ $this, 'isAlphaNumericUnderbar' ],
							 			'message' => 'パスワードに使用できるのは半角英数字と_（アンダーバー）だけです'
							 		]
							 	)
				;
		}

		protected function _execute(array $data){
			return true;
		}
	}
?>