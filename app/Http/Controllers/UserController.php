<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // إنشاء مستخدم جديد
        $user = User::create($request->all());

        // تعيين دور "admin"
        $user->assignRole('admin');

        return response()->json(['message' => 'User created and role assigned successfully']);
    }
}
