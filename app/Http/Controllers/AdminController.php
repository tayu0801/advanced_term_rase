<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        return view('/admin');
	}

    public function manager(Request $request)
    {
        $areas=Area::all();
        $genres=Genre::all();
        $id=Auth::id();
        $managements=Shop::all();
        $reservations=Reservation::all();
        $param=[
            'areas'=>$areas,
            'genres'=>$genres,
            'id'=>$id,
            'reservations'=>$reservations,
            'managements'=> $managements
        ];
        return view('/manager', $param);
	}

    public function create(LoginRequest $request)
    {
        $name = $request ->name;
        $email = $request->email;
        $password = $request->password;
        $manager = $request->manager;
        $param = [
            'name'=> $name,
            'email' => $email,
            'password' => bcrypt($password),
            'authority' => 2,
            'manager' => $manager
            ];
        User::create($param);
        return view('/registered', $param);
	}


}
