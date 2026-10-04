<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Throwable;

class UserController extends BaseController
{
    public function index()
    {
        return view('users/index', [
            'users' => (new UserModel())->orderBy('full_name', 'ASC')->findAll(),
        ]);
    }

    public function new()
    {
        return view('users/form', [
            'title' => 'Add user',
            'action' => site_url('users/create'),
            'user' => ['username' => '', 'full_name' => '', 'email' => '', 'avatar' => null],
            'validation' => null,
            'uploadError' => null,
        ]);
    }

    public function create()
    {
        $rules = [
            'username' => 'required|max_length[100]|is_unique[users.username]',
            'full_name' => 'required|max_length[255]',
            'email' => 'permit_empty|valid_email|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return view('users/form', [
                'title' => 'Add user',
                'action' => site_url('users/create'),
                'user' => array_merge($this->userFromPost(), ['avatar' => null]),
                'validation' => $this->validator,
                'uploadError' => null,
            ]);
        }

        (new UserModel())->insert($this->userFromPost());

        return redirect()->to(site_url('users'))->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        $user = (new UserModel())->find($id);
        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found');
        }

        return view('users/form', [
            'title' => 'Edit user',
            'action' => site_url("users/update/{$id}"),
            'user' => $user,
            'validation' => null,
            'uploadError' => null,
        ]);
    }

    public function update($id)
    {
        $model = new UserModel();
        $existing = $model->find($id);
        if ($existing === null) {
            throw PageNotFoundException::forPageNotFound('User not found');
        }

        $rules = [
            'username' => "required|max_length[100]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|max_length[255]',
            'email' => 'permit_empty|valid_email|max_length[255]',
        ];

        $avatar = $this->request->getFile('avatar');
        $hasUpload = $avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE;
        if ($hasUpload) {
            $rules['avatar'] = 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]';
        }

        if (! $this->validate($rules)) {
            return view('users/form', [
                'title' => 'Edit user',
                'action' => site_url("users/update/{$id}"),
                'user' => array_merge($existing, $this->userFromPost()),
                'validation' => $this->validator,
                'uploadError' => null,
            ]);
        }

        $data = $this->userFromPost();
        $newAvatarName = null;
        if ($hasUpload) {
            $newAvatarName = $avatar->getRandomName();
            $uploadPath = FCPATH . 'uploads';
            if (! is_dir($uploadPath) && ! mkdir($uploadPath, 0755, true) && ! is_dir($uploadPath)) {
                return $this->editWithUploadError($id, $existing, 'Could not create the uploads folder.');
            }

            try {
                service('image')->withFile($avatar->getTempName())
                    ->fit(256, 256, 'center')
                    ->save($uploadPath . DIRECTORY_SEPARATOR . $newAvatarName);
            } catch (Throwable $exception) {
                log_message('error', 'Could not prepare uploaded avatar: {message}', ['message' => $exception->getMessage()]);
                return $this->editWithUploadError($id, $existing, 'The uploaded image could not be prepared. Check that the image service is available.');
            }

            $data['avatar'] = $newAvatarName;
        }

        if (! $model->update($id, $data)) {
            if ($newAvatarName !== null) {
                @unlink(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $newAvatarName);
            }

            return $this->editWithUploadError($id, $existing, 'The user could not be saved. Please check the database schema.');
        }

        if ($newAvatarName !== null && ! empty($existing['avatar'])) {
            $oldPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . basename($existing['avatar']);
            if (is_file($oldPath)) {
                @unlink($oldPath);
            }
        }

        return redirect()->to(site_url('users'))->with('success', 'User updated successfully.');
    }

    private function editWithUploadError(int|string $id, array $existing, string $message)
    {
        return view('users/form', [
            'title' => 'Edit user',
            'action' => site_url("users/update/{$id}"),
            'user' => array_merge($existing, $this->userFromPost()),
            'validation' => $this->validator,
            'uploadError' => $message,
        ]);
    }

    private function userFromPost(): array
    {
        return [
            'username' => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email' => trim((string) $this->request->getPost('email')),
        ];
    }
}
