<?php

namespace App\Http\Controllers;

use App\Models\CarDetail;
use App\Models\Coordinate;
use App\User;
use Geocoder\Laravel\Facades\Geocoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Yaf\Request\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $uData = User::with('group')->where('id', '<>', Auth::id())->orderBy('group_id', 'asc')->paginate(10);
        if ($user->can('viewAny', User::class)) {
            return view('admin.user', ['uData' => $uData]);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = new User;
            $coord = new Coordinate;
            $car = new CarDetail;

            if ($request->role == 1) {
                $car->license = $request->license;
                $car->seat = $request->seat;
                $car->color = $request->color;
                $car->branch = $request->branch;
            }

            $data = $request->only($user->getFillable());
            $address = $data['home_address'];
            $location = \Illuminate\Support\Facades\Http::get('https://maps.googleapis.com/maps/api/geocode/json', ['address' => $address, 'key' => 'AIzaSyDZ7vhGB3q3ZC0LXzgSyKutwVmzhtaVANc']);
            $rsl = json_decode($location->body(), true);
            $coord->latH = $rsl['results'][0]['geometry']['location']['lat'];
            $coord->lngH = $rsl['results'][0]['geometry']['location']['lng'];
            $data['password'] = Hash::make($data['password']);
            $user->fill($data);
            $user->save();
            if (json_decode($car) != []) {
                $user->carDetail()->save($car);
            }
            $coord->user()->associate($user);
            $coord->save();
            DB::commit();
            return redirect('/login')->with('message', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'server_error'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
