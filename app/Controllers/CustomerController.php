<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class CustomerController extends BaseController
{
    public function index()
    {
        return view('customers/index', [
            'customers' => (new CustomerModel())->orderBy('full_name', 'ASC')->findAll(),
        ]);
    }

    public function new()
    {
        return view('customers/form', [
            'title' => 'Add customer',
            'action' => site_url('customers/create'),
            'customer' => ['full_name' => '', 'email' => ''],
            'validation' => null,
        ]);
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return view('customers/form', [
                'title' => 'Add customer',
                'action' => site_url('customers/create'),
                'customer' => $this->customerFromPost(),
                'validation' => $this->validator,
            ]);
        }

        (new CustomerModel())->insert($this->customerFromPost());

        return redirect()->to(site_url('customers'))->with('success', 'Customer added successfully.');
    }

    public function edit($id)
    {
        $customer = (new CustomerModel())->find($id);
        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound('Customer not found');
        }

        return view('customers/form', [
            'title' => 'Edit customer',
            'action' => site_url("customers/update/{$id}"),
            'customer' => $customer,
            'validation' => null,
        ]);
    }

    public function update($id)
    {
        $model = new CustomerModel();
        if ($model->find($id) === null) {
            throw PageNotFoundException::forPageNotFound('Customer not found');
        }

        $rules = [
            'full_name' => 'required|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return view('customers/form', [
                'title' => 'Edit customer',
                'action' => site_url("customers/update/{$id}"),
                'customer' => array_merge($this->customerFromPost(), ['id' => $id]),
                'validation' => $this->validator,
            ]);
        }

        $model->update($id, $this->customerFromPost());

        return redirect()->to(site_url('customers'))->with('success', 'Customer updated successfully.');
    }

    private function customerFromPost(): array
    {
        return [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email' => trim((string) $this->request->getPost('email')),
        ];
    }
}
