<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
     public $components = array(
         'DebugKit.Toolbar', 'Session',
        //  'Auth' => array(
        //     //  'loginAction' => array(
        //     //      'controller' => 'Users',
        //     //      'action' => 'login'),
        //     'authError' => 'Ban can phai dang nhap de tiep tuc',
        //     'flash' => array(
        //         'element' => 'default',
        //         'key' => 'auth',
        //         'params' => array('class' => 'alert alert-danger'),
        //     ),
        //     'loginRedirect' => 'index'
        //  )
          'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'Users',
                'action' => 'index'
                ),
            'loginAction' => array(
                'controller' => 'Users',
                'action' => 'login'),
        )
         );
        public function beforeFilter(){
		// cho phép tất cả các action nào trong mảng này đều có thể truy cập bởi các controller nào mà
		// không càn phải đăng nhâp
		$this->Auth->allow('register');
	}
}
