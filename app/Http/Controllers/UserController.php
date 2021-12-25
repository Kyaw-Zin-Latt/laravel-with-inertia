<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index() {
        return Inertia::render('Users',[
            'users' => User::latest("id")->paginate(10)
        ]);
    }
}
