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
			return $validator->notEmpty('username',__('Username is empty.') )
							 ->notEmpty('password',__('Password is empty.') )
							 ->add( 'username',  
									[
										'length'=> [
											'rule' => [ 'lengthBetween', 4, 16 ],
											'message' => __('Username have to be between 4 and 16 characters.')
										]
									] )
							 ->add( 'password', 
									[
										'length' => [
											 'rule' => [ 'minLength', 8 ], 
											 'message' => __('Password have to be over 8 characters.')
										]
									] )
							 ->add( 'username', 'custom',
							 		[
							 			'rule' => [ $this, 'isAlphaNumericUnderbar' ],
							 			'message' => __('Username can only contain letters, numbers or underscore(_).')
							 		]
							 	)
							 ->add( 'password', 'custom',
							 		[
							 			'rule' => [ $this, 'isAlphaNumericUnderbar' ],
							 			'message' => __('Password can only contain letters, numbers or underscore(_).')
							 		]
							 	)
				;
		}

		protected function _execute(array $data){
			return true;
		}
	}
?>