<?php 
class UsersController extends AppController{
	public $name = 'Users';

	public function beforeFilter(){
		// gọi đến phương thức beforefFilter() của AppController.php
		parent::beforeFilter();
		$this->Auth->allow('login');
	}

	public function index()
	{
		$this->paginate = array(
			'limit' => 2,
            'ParamType' => 'querystring',
			);
		$users = $this->paginate('User');
		$this->set('users', $users);
	}
	public function register()
	{
		if($this->request->is('post'))
		{
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$this->User->create();
			$this->User->data['created'] = date('d-m-Y');
			//$this->User->data = $this->request->data;
			
				if($this->User->save($this->request->data))
				{
					$this->Session->setFlash('Đã lưu thành công');
					$this->redirect('index');
				}
				else{
					$this->Session->setFlash('Xảy ra lỗi');
					$this->redirect('index');
				}
			
		}
	}
	public function login()
	{
		// kiem tra xem Session đã tồn tại hay chua, nếu chưa thi redirect den index
	 	if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));
        }			
		// Nếu mà chưa login thì cần login và lưu Session
		if ($this->request->is('post')) {
			debug($this->request->data);
            if ($this->Auth->login($this->request->data)) { // Sau khi login thì lưu Session
                //$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
                return $this->redirect($this->Auth->redirectUrl());
            }
            
            $this->Session->setFlash(__('Invalid username or password'));            
        }
	}


	public function logout(){
		// tự động chuyển đến URL mà đã đăng kí trong AppController.php
		// tự động xóa Session đi (trong $this->Auth->logout() đã có xóa Session)
		return $this->redirect($this->Auth->logout());
	}
}
 ?>