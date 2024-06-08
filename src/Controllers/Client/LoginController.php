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
        $this->renderViewClient('login');
    }
    public function login()
    {
        try {
            //code...
            $user = $this->user->findByEmail($_POST['email']);

            if(empty($user)){
                throw new \Exception("khong ton tai email". $_POST['email']);
                
            }

            $flag = password_verify($_POST['password'], $user['password']);
            if ($flag) {
                header('Location: '.url('admin/'));
                exit();
            }
            throw new \Exception("passwork khong dung   ");

        } catch (\Throwable $th) {
            //throw $th;
            // Helper::debug($th->getMessage());
            $_SESSION['error']=$th->getMessage();
            header('Location: '.url('login'));
            exit();
        }
    }
}
