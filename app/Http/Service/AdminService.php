<?php
namespace App\Http\Service;

use App\Models\Admin;

class AdminService extends Service{


    private Admin $admin;

    public function __construct() {
        $this->admin = new Admin();
    }

    public function create($username,$password)
    {
        return $this->admin->create([
            'username'=>$username,
            'password'=>$password
        ]);

    }

    public function findAll()
    {
        return $this->admin->get();
    }

    public function findById($id)
    {
        return $this->admin->find($id);
    }

    public function update($id,$username, $password)
    {
        $admin = $this->admin->find($id);
        $admin->username = $username;
        $admin->password = $password;

        return $admin->save();
    }

    public function delete($id)
    {
        $delete = $this->admin->find($id);
        return $delete->delete();
    }

    public function findByUsername($username)
    {
        return $this->admin->where('username',$username)->first();
    }

}