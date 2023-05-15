<?php
namespace App\Http\Service;

use App\Models\PenulisModel;

class PenulisService extends Service{
    protected $penulis;

    public function __construct() {
        $this->penulis = new PenulisModel();
    }

    public function create($username, $password)
    {
        return $this->penulis->create([
            'username'=>$username,
            'password'=>$password
        ]);
    }

    public function findAll()
    {
        return $this->penulis->get();
    }

    public function findByUsername($username)
    {
        return $this->penulis->where('username',$username)->first();
    }

    public function update($id, $username, $password)
    {
        return $this->penulis->find($id)->update([
            'username'=>$username,
            'password'=>$password
        ]);
    }

    public function delete($id)
    {
        return $this->penulis->find($id)->delete();
    }

    function findById($id)
    {
        return $this->penulis->find($id);
    }
}