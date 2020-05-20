<?php

namespace App\Http\Controllers;

use App\Models\Coordinate;
use App\Models\RegistrationGroup;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = [];
        $user = Auth::user();
        $data = $user->registration_id ? User::with('registration')->where('registration_id', '=', $user->registration_id)->orderBy('start_time')->get() : null;
        $driver_id = $data != null ? json_decode($data)[0]->registration->driver_id : '';
        $dData = $data != null? json_decode($data, true) : '';
        if ($data != null) {
            foreach ($data as $dt) {
                array_push($id, $dt->id);
            }
        }
        $coordinate = Coordinate::with('user')->whereIn('id', $id)->get();
        return view('home', ['data'=>$data, 'coordinate'=>$coordinate, 'driver'=>$driver_id, 'dData'=>$dData]);
    }
}
