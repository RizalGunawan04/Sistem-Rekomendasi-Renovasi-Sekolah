<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $data['title'] = 'User';
        $data['q'] = $this->request->getGet('q');
        $user = new UserModel();
        $data['rows'] = $user->like('kode_user', (string) $data['q'])->orLike('nama_user', '' . $data['q'])->findAll();
        load_view('user/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah User';
        load_view('user/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'kode_user' => [
                'rules' => 'required|is_unique[tb_user.kode_user]',
                'errors' => [
                    'required' => 'Kode harus diisi',
                    'is_unique' => 'Kode User sudah ada',
                ],
            ],
            'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ],
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level harus diisi',
                ],
            ],
            'user' => [
                'rules' => 'required|is_unique[tb_user.user]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah ada',
                ],
            ],
            'pass' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        } else {
            $kode_user = $this->request->getPost('kode_user');
            $user = new UserModel();
            $user->insert([
                'kode_user' => $kode_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'level' => $this->request->getPost('level'),
                'user' => $this->request->getPost('user'),
                'pass' => password_hash($this->request->getPost('pass'), PASSWORD_BCRYPT),
            ]);
            return redirect()->to('/user')->with('msg', ['success', 'Data berhasil ditambah!']);
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah User';
        $user = new UserModel();
        $data['row'] = $user->find($id);
        load_view('user/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ],
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bangunan harus diisi',
                ],
            ],
            'user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        } else {
            $user = $this->request->getPost('user');
            if (get_var("SELECT * FROM tb_user WHERE user='$user' AND kode_user<>'$id'"))
                return redirect()->back()->withInput()->with('error', 'Username sudah ada!');

            $user = new UserModel();
            $data = [
                'kode_user' => $id,
                'nama_user' => $this->request->getPost('nama_user'),
                'level' => $this->request->getPost('level'),
                'user' => $this->request->getPost('user'),
            ];
            if ($this->request->getPost('pass'))
                $data['pass'] = password_hash($this->request->getPost('pass'), PASSWORD_BCRYPT);

            $user->save($data);
            return redirect()->to('/user')->with('msg', ['success', 'Data berhasil diubah!']);
        }
    }

    public function destroy($id)
    {
        $user = new UserModel();
        $user->delete($id);
        return redirect()->to('/user')->with('msg', ['success', 'Data berhasil dihapus!']);
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/home');
    }
    public function login()
    {
        $data['title'] = 'Password';
        return view('user/login', $data);
    }

    public function login_action()
    {
        $users = new SekolahModel();
        $user = $users->where('user', $this->request->getPost('user'))->first();
        if ($user) {
            if (password_verify($this->request->getPost('pass'), $user->pass)) {
                session()->set([
                    'ID' => $user->kode_sekolah,
                    'nama' => $user->nama_sekolah,
                    'user' => $user->user,
                    'logged_in' => true,
                    'level' => 'sekolah',
                ]);
                return redirect()->to('home');
            } else {
                session()->setFlashdata('error', 'Salah kombinasi username dan password!');
                return redirect()->back()->withInput();
            }
        } else {
            $users = new UserModel();
            $user = $users->where('user', $this->request->getPost('user'))->first();
            if ($user) {
                if (password_verify($this->request->getPost('pass'), $user->pass)) {
                    session()->set([
                        'ID' => $user->kode_user,
                        'nama' => $user->nama_user,
                        'user' => $user->user,
                        'logged_in' => true,
                        'level' => $user->level,
                    ]);
                    return redirect()->to('home');
                } else {
                    session()->setFlashdata('error', 'Salah kombinasi username dan password!');
                    return redirect()->back()->withInput();
                }
            } else {
                session()->setFlashdata('error', 'Username tidak ditemukan!');
                return redirect()->back();
            }
        }
    }


    public function password()
    {
        $data['title'] = 'Password';
        $data['row'] = session()->get('user');
        load_view('user/password', $data);
    }

    public function password_action()
    {
        if (!$this->validate([
            'pass1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password lama harus diisi',
                ],
            ],
            'pass2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password baru harus diisi',
                ],
            ],
            'pass3' => [
                'rules' => 'required|matches[pass2]',
                'errors' => [
                    'required' => 'Konfirmasi password baru harus diisi',
                    'matches' => 'Password baru dan Konfirmasi password baru harus sama',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        } else {
            $users = new UserModel();
            $user = $users->find(session()->get('ID'));
            if (!password_verify($this->request->getPost('pass1'), $user->pass)) {
                session()->setFlashdata('error', 'Password lama salah!');
                return redirect()->back()->withInput();
            } else {
                $users->update(session()->get('ID'), ['pass' => password_hash($this->request->getPost('pass2'), PASSWORD_BCRYPT)]);


                $user = $users->find(session()->get('ID'));
                session()->set('user', $user);
                return redirect()->back()->with('msg', ['success', 'Password berhasil diubah!']);
            }
            // return redirect()->to('/user')->with('msg', ['success', 'Data berhasil diubah!']);
        }
    }
}
