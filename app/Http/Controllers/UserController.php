<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils\Res;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAll()
    {
        $usuarios = User::all();
        return Res::withData($usuarios, "Usuarios", 200);
    }
}
