<?php

namespace App\Http\Controllers;

use App\Models\CarDetail;
use App\Models\RegistrationGroup;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        echo shell_exec('python E:\documents\clustering\clustering.py ' . $user_id);
        return response()->json(['success' => true]);
    }

    public function makeRegGroup(Request $request)
    {
        try {
            DB::beginTransaction();
            $arr = [];
            $id = [];
            $driver = [];
            $reg = new RegistrationGroup;
            $car = new CarDetail;
            if ($request->license) {
                $car->license = $request->license;
            }
            if ($request->seat) {
                $car->seat = $request->seat;
            }
            if ($request->color) {
                $car->color = $request->color;
            }
            if ($request->branch) {
                $car->branch = $request->branch;
            }
            if ($request->roleF == 1) {
                $car->user_id = Auth::id();
            }
            $user = Auth::user();
            $user_group = DB::table("users")->select('*')->where('group_id', '=', $user['group_id'])->get();
            foreach (json_decode($user_group, true) as $i) {
                array_push($arr, $i['id']);
            }
            $query = DB::table('users')->whereIn('id', $arr)->where('id', '<>', Auth::id())->where('registration_id', null);
            $this->filter($request, $query);

            if ($request->roleF == 1) {
                $exception = DB::table('users')->where('role', '<>', 1)->where('gender', $request->genderF)->where('smoking', '<>', 1)->where('id', '<>', Auth::id())->where('registration_id', null)->where('start_time', '>', $user->start_time)->limit(3)->get();
            } else {
                $ex_driver = DB::table('users')->where('role', '=', 1)->where('gender', $request->genderF)->where('smoking', '<>', 1)->where('id', '<>', Auth::id())->where('registration_id', null)->limit(1)->get();
                $start_time = json_decode($ex_driver, true)[0]['start_time'];
                $ex_pass = DB::table('users')->where('role', '<>', 1)->where('gender', $request->genderF)->where('smoking', '<>', 1)->where('id', '<>', Auth::id())->where('registration_id', null)->where('start_time', '>', $start_time)->limit(3)->get();
                $exception = $ex_driver->merge($ex_pass);
            }

            $results = json_decode($query->get(), true) != [] ? $query->get() : $exception;
            $reg->number_days = $request->dayNum;
            if ($request->roleF == 1) {
                $driver_id = Auth::id();
            } else {
                foreach (json_decode($results, true) as $rlt) {
                    if ($rlt['role'] == 1) {
                        array_push($driver, $rlt['id']);
                    }
                }
                $rand = array_rand($driver, 1);
                $driver_id = $driver[$rand];
            }
            $reg->driver_id = $driver_id;
            $reg->save();
            foreach (json_decode($results, true) as $rlt) {
                array_push($id, $rlt['id']);
            }
            array_push($id, Auth::id());
            User::with('registration')->whereIn('id', $id)->update(['registration_id' => $reg->id]);
            $car->save();
            DB::commit();
            return redirect('/home')->with('message', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'server_error'], 500);
        }
    }

    public function filter(Request $request, $query)
    {
        if ($request->get('roleF') == 1) {
            $query->where('role', '<>', 1);
        } else {
            $query->where('role', 1);
        }
        if ($request->get('genderF') == 0) {
            $query->where('gender', 0);
        } else {
            $query->where('gender', 1);
        }
        if (!$request->get('smokingF')) {
            $query->where('smoking', '<>', 1);
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

}
