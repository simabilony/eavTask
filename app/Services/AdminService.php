<?php
namespace App\Services;
use App\Models\Admin;
class AdminService
{
    public function updateAdmin($data, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        if (!empty($data['password'])) {
            $admin->password = bcrypt($data['password']);
        }
        $admin->save();
        return $admin;
    }
    public function createAdmin($data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
