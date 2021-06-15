<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends Controller {

    public function index() {

        $model = new UserModel();
        $data['users_detail'] = $model->findAll();
        return view('list', $data);
    }

    public function create() {

        return view('add');
    }

    public function userCreate() {

        helper(['form', 'url']);

        $input = $this->validate([
            'first_name' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Please enter first name.'
                ]
            ],
            'last_name' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Please enter last name.'
                ]
            ],
            'birth_date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter birth date.'
                ]
            ],
            'email' => 'required|valid_email',
            'password' => 'required',
            'gender' => 'required',
            'address' => 'required'
        ]);

        $model = new UserModel();

        if (!$input) {
            return redirect()->route('createuser')->withInput()->with('validation', $this->validator);
        } else {
            $data = [
                'first_name' => $this->request->getVar('first_name'),
                'last_name' => $this->request->getVar('last_name'),
                'birth_date' => date("Y-m-d", strtotime(str_replace("/", "-", $this->request->getVar('birth_date')))),
                'email' => $this->request->getVar('email'),
                'password' => md5($this->request->getVar('password')),
                'gender' => $this->request->getVar('gender'),
                'address' => $this->request->getVar('address'),
            ];

            $save = $model->insert($data);
            session()->setFlashdata('message', 'Added Successfully!');
            session()->setFlashdata('alert-class', 'alert-success');
            return redirect()->to(base_url('User'));
        }
    }

    public function edit($id = null) {
        $model = new UserModel();
        $data['user'] = $model->where('id', $id)->first();
        return view('edit', $data);
    }

    public function userUpdate() {

        helper(['form', 'url']);

        $input = $this->validate([
            'first_name' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Please enter first name.'
                ]
            ],
            'last_name' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Please enter last name.'
                ]
            ],
            'birth_date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter birth date.'
                ]
            ],
            'email' => 'required|valid_email',
            'password' => 'required',
            'gender' => 'required',
            'address' => 'required'
        ]);

        $model = new UserModel();
        $id = $this->request->getVar('id');
        if (!$input) {
            //return redirect()->route("edituser/{$id}")->with('validation', $this->validator);
            $data['user'] = $model->where('id', $id)->first();
            echo view('edit', $data, [
                'validation' => $this->validator
            ]);
        } else {
            $data = [
                'first_name' => $this->request->getVar('first_name'),
                'last_name' => $this->request->getVar('last_name'),
                'birth_date' => date("Y-m-d", strtotime(str_replace("/", "-", $this->request->getVar('birth_date')))),
                'email' => $this->request->getVar('email'),
                'password' => md5($this->request->getVar('password')),
                'gender' => $this->request->getVar('gender'),
                'address' => $this->request->getVar('address'),
            ];
            $save = $model->update($id, $data);
            session()->setFlashdata('message', 'Updated Successfully!');
            session()->setFlashdata('alert-class', 'alert-success');
            return redirect()->to(base_url('User'));
        }
    }

    public function delete($id = null) {

        $model = new UserModel();
        $data['user'] = $model->where('id', $id)->delete();
        session()->setFlashdata('message', 'Deleted Successfully!');
        session()->setFlashdata('alert-class', 'alert-success');
        return redirect()->to(base_url('/'));
    }

}
