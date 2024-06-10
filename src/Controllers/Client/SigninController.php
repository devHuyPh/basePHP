<?php

namespace Admin\Base\Controllers\Client;

use Admin\Base\Commons\Controller;
use Admin\Base\Commons\Helper;
use Admin\Base\Models\User;
use Rakit\Validation\Validator;

class SigninController extends Controller
{

    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }
    public function showFormSignin()
    {
        $this->renderViewClient('signin');
    }


    public function signin()
    {

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
            'confirm_password'      => 'required|same:password',
            'avatar'                => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('signin'));
            exit;
        } else {
            $data = [
                'name'      => $_POST['name'],
                'email'     => $_POST['email'],
                'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];

            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['avatar'] = $to;
                } else {
                    $_SESSION['errors']['avatar'] = 'Upload Không thành công';

                    header('Location: ' . url('login'));
                    exit;
                }
            }

            $this->user->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('/'));
            exit;
        }
    }
}
