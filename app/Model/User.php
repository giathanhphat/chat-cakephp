<?php 
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel{
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required',
                'allowEmpty' => false
            ),
            'limitCharacter' => array( 
                'rule' => array('between', 5, 15), 
                'message' => 'Usernames must be between 5 to 15 characters'
            ),
        ),
        'password' => array(
            'lengthPassword' => array(
                'rule' => array('minLength', 6),
                'message' => 'Min Length of password is 6'
            ),
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required',
                'allowEmpty' => false
        )
        ),
    );
     function beforeSave($option = array()){
    	// hash password
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;    	        
    }
}
?>