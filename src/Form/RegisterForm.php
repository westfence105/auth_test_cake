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

		protected function _buildValidator(Validator $validator){
			return $validator->lengthBetween( 'username', [ 4, 16 ] )
							 ->add( 'username', 'custom',
							 		[
							 			'rule' => function($value,$context){
							 				return preg_match( '/^[_A-Za-z0-9]*$/', $value ) == 1;
							 			},
							 			'message' => 'ユーザー名に使用できるのは半角英数字と_（アンダーバー）だけです'
							 		]
							 	)
				;
		}

		protected function _execute(array $data){
			return true;
		}
	}
?>