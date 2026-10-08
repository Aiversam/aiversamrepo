<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('user_id')) {
            return redirect()->to(site_url('customers'));
        }

        return view('auth/login', ['error' => session()->getFlashdata('error')]);
    }

    public function attempt()
    {
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');
        $user = (new UserModel())->where('username', $username)->first();

        if ($user === null || empty($user['password']) || ! password_verify($password, $user['password'])) {
            return redirect()->to(site_url('login'))
                ->withInput()
                ->with('error', 'The username or password is incorrect.');
        }

        $session = session();
        $session->regenerate(true);
        $session->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'full_name' => $user['full_name'],
        ]);

        return redirect()->to(site_url('customers'));
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'));
    }
}
