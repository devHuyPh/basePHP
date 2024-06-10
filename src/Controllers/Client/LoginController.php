<?php

namespace Admin\Base\Controllers\Client;

use Admin\Base\Commons\Controller;
use Admin\Base\Commons\Helper;
use Admin\Base\Models\User;
use Rakit\Validation\Rules\Email;

class LoginController extends Controller
{

    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }


    public function showFormLogin()
    {
        auth_check();
        $this->renderViewClient('login');
    }
    public function login()
    {
        auth_check();
        try {
            //code...
            $user = $this->user->findByEmail($_POST['email']);

            if(empty($user)){
                throw new \Exception("Email : ". $_POST['email']." chưa được đăng kí!");
                
            }
            $chek=$user['type'];
            // Helper::debug($chek);
            $flag = password_verify($_POST['password'], $user['password']);
            if ($flag && $chek=='admin') {
                $_SESSION['user']=$user;

                // unset($_SESSION('cart'));
                header('Location: '.url('admin/'));
                $_SESSION['user']['type']='admin';
                unset($_SESSION['cart']);
                exit();
            }
            else if($flag && $chek=='member'){
                $_SESSION['user']=$user;
                $_SESSION['user']['type']='member';
                // unset($_SESSION('cart'));

                header('Location: '.url(''));
                unset($_SESSION['cart']);
                exit();
            }
            
            throw new \Exception("Mật khẩu bạn nhập đã sai ");

        } catch (\Throwable $th) {
            //throw $th;
            // Helper::debug($th->getMessage());
            $_SESSION['error']=$th->getMessage();
            // Helper::debug($_SESSION['error']);
            header('Location: '.url('login'));
            exit();
        }
    }


    public function logout(){
        unset($_SESSION['cart' . $_SESSION['user']['id'] ]);

        unset($_SESSION['user']);
        header('Location: '.url(''));
        exit();
    }
    
}
