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
        $driver = User::with('registration')->where('id', '=', $driver_id)->get();
        $list = User::with('registration')->where('id', '<>', $driver_id)->where('registration_id', '=', $user->registration_id)->orderBy('start_time')->get();
        $dData = $driver_id != null ? json_decode($driver->merge($list), true) : '';
        if ($data != null) {
            foreach ($data as $dt) {
                array_push($id, $dt->id);
            }
        }
        $coordinate = Coordinate::with('user')->whereIn('user_id', $id)->get();
        return view('home', ['data' => $data, 'coordinate' => $coordinate, 'driver' => $driver_id, 'dData' => $dData]);
    }

    public function convertTime($time) {
        return explode(':', $time)[0] . ':' . explode(':', $time)[1];
    }
}
