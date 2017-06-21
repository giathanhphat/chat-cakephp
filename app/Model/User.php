<?php 
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel{
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'nonEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'A username is required',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between', 1, 15), 
                'required' => true, 
                'message' => 'Usernames must be between 5 to 15 characters'
            ),
        ),
        'password' => array(
            'rule' => 'notBlank',
            'message' => 'Password khong duoc rong',
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