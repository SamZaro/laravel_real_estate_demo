<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Ad;
use Illuminate\Foundation\Auth\User;

class FrontendController extends Controller
{
    public function index()
    {
        if(Gate::denies('create-ads')){
            return redirect('home')->with('message',"Access denied!");
        }

        $ads = Ad::count();
        $users = User::count();
        $agents = User::where('role_as', '2')->count();

        return view('admin.dashboard', compact('users', 'ads', 'agents'));
    }
}
