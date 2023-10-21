<?php

namespace app\controllers;

use app\core\TemporaryStorage;
use app\models\UserModel;
use app\core\Route;


class UserController extends AbstractController
{
    /**
     * @var UserModel
     */
    protected UserModel $user;

    /**
     * @return void
     * Set object UserModel into $model;
     */
    public function __construct()
    {
        parent::__construct();

        $this->user = new UserModel();
    }

    /**
     * @return void
     * Call render with user_sign-in page, user;
     */
    public function index(): void
    {
        $user = TemporaryStorage::check();
        $this->view->render('user_sign-in', ['user' => $user]);
    }

    /**
     * @return void
     * Call render with user_sign-up page, user;
     */
    public function registration(): void
    {
        $user = TemporaryStorage::check();
        $this->view->render('user_sign-up', ['user' => $user]);
    }

    /**
     * @return void
     * Check input data, redirect
     */
    public function auth()
    {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if ($email !== 'admin') {
            $user = $this->user->find($email);
            if ($user && password_verify($password, $user['password'])) {
                TemporaryStorage::add($user);
                $currentUser = $user;
                Route::redirect('/index/serchIndex', [
                    'user' => $currentUser ?? false
                ]);
            }
        }
        $user = $email;
        TemporaryStorage::add($user);
        $this->authUser($email);
        Route::redirect('/index/serchIndex', [
            'user' => $currentUser ?? false,
            'email' => $user
        ]);
    }

    /**
     * @return void
     * According to e-mail, check user exists in database, if not create new user
     */
    public function create()
    {
        $email = filter_input(INPUT_POST, 'email');
        $user = $email;
        $user = $this->user->find($email);
        if (!$user) {
            $login = filter_input(INPUT_POST, 'login');
            $pass = filter_input(INPUT_POST, 'password');
            $passConf = filter_input(INPUT_POST, 'password_conf');
            if ($pass == $passConf) {
                $user['login'] = $login;
                $user['email'] = $email;
                $user['password'] = password_hash($pass, PASSWORD_DEFAULT);
                $this->user->add($user);
            }
        }
        Route::redirect('/index/index');
    }

    /**
     * Authenticate a user based on email and password.
     *
     * @return string A message indicating the result of the authentication.
     * admin authorization to complete technical specifications
     * 
     */
    public function authUser()
    {
        $user = [];
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $message = '';
        if ($email && $password) {
            if ($email === 'admin' && $password === 'admin') {
                $user['email'] = $email;
                TemporaryStorage::add($user);
                $message = 'Ви успішно увійшли';
                Route::redirect('/index/serchIndex');
            } else {
                $message = 'Логін або пароль невірні';
            }
        } else {

            $message = 'Некорректные входные данные';
        }
        TemporaryStorage::add($user);
        Route::redirect('/index/serchIndex');
        return $message;
    }


    /**
     * @return void
     * delete data from session, redirect
     */
    public function exit(): void
    {
        TemporaryStorage::dell();
        Route::redirect('/index/serchIndex');
    }
}
