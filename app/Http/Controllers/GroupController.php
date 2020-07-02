<?php

namespace App\Http\Controllers;

use App\Models\CarDetail;
use App\Models\RegistrationGroup;
use App\User;
use Carbon\Carbon;
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
        $user = Auth::user();
        $gData = RegistrationGroup::with('user')->get();
        if ($user->can('viewAny', RegistrationGroup::class)) {
            return view('admin.group', ['gData' => $gData]);
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
        echo shell_exec('python E:\clustering\clustering.py ' . $user_id);
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
            if ($request->roleF == 1) {
                $car->license = $request->license;
                $car->seat = $request->seat;
                $car->color = $request->color;
                $car->branch = $request->branch;
                $car->user_id = Auth::id();
            }
            $user = Auth::user();
            $user_group = DB::table("users")->select('*')->where('group_id', '=', $user['group_id'])->get();
            foreach (json_decode($user_group, true) as $i) {
                array_push($arr, $i['id']);
            }
            $query = DB::table('users')->whereIn('id', $arr)->where('id', '<>', Auth::id())->where('registration_id', null)->where('group_id', '<>', null);
            $q_role = DB::table('users')->whereIn('id', $arr)->where('gender', $request->genderF)->where('smoking', '<>', 1)->where('id', '<>', Auth::id())->where('registration_id', null)->where('group_id', '<>', null)->where('role', '=', 1)->get();
            $this->filter($request, $query);

            if ($request->roleF == 1) {
                $q = $query->limit($request->seat - 1)->get();
                $excep = DB::table('users')->inRandomOrder()->where('gender', $request->genderF)->where('smoking', '<>', 1)->where('id', '<>', Auth::id())->where('registration_id', null)->where('group_id', '<>', null)->limit($request->seat - 1)->get();
            } else {
                $ex_driver = DB::table('users')->inRandomOrder()->where('gender', $request->genderF)->where('smoking', '<>', 1)->where('id', '<>', Auth::id())->where('registration_id', null)->where('group_id', '<>', null)->where('role', '=', 1)->where('end_time', '<=', $request->endTimeF)->limit(2);
                $ex_pass = DB::table('users')->inRandomOrder()->where('gender', $request->genderF)->where('smoking', '<>', 1)->where('id', '<>', Auth::id())->where('registration_id', null)->where('group_id', '<>', null)->where('role', '<>', 1)->limit(3);
                $excep = $ex_driver->get()->merge($ex_pass->get());
                $q_driver = json_decode($q_role) == [] ? $ex_driver->get() : null;
                $q = $query->limit(4)->get()->merge($q_driver);
            }
            $results = json_decode($query->get(), true) != [] ? $q : $excep;
//            dd($results);
            if (json_decode($results) == []) {
                return redirect('/home')->with('error', 'Không tìm được nhóm theo yêu cầu! Bạn có thể chỉnh lại yêu cầu và thử lại');
            }
            $start = explode(' -', $request->dayNum)[0];
            $end = explode('- ', $request->dayNum)[1];
            $reg->start_day = Carbon::createFromFormat('d/m/Y',$start)->format('Y-m-d');
            $reg->end_day = Carbon::createFromFormat('d/m/Y',$end)->format('Y-m-d');
            if ($request->roleF == 1) {
                $driver_id = Auth::id();
            } else {
                foreach (json_decode($results, true) as $rlt) {
                    if ($rlt['role'] == 1) {
                        array_push($driver, [$rlt['id'], $rlt['start_time']]);
                    }
                }
                usort($driver, function ($a, $b) {
                    return $b[0] <=> $a[0];
                });
                $driver_id = $driver[0][0];
            }
//            dd($driver_id);
            $reg->driver_id = $driver_id;
            $reg->save();
            foreach (json_decode($results, true) as $rlt) {
                array_push($id, $rlt['id']);
            }
            array_push($id, Auth::id());
            User::with('registration')->where('id', Auth::id())->update(['role' => $request->roleF, 'start_time' => $request->startTimeF, 'end_time' => $request->endTimeF]);
            User::with('registration')->whereIn('id', $id)->update(['registration_id' => $reg->id]);
            $dCar = json_decode($car, true);
            if ($dCar != []) {
                $check = CarDetail::where('user_id', $dCar['user_id'])->get();
                if (json_decode($check) != []) {
                    CarDetail::where('user_id', $dCar['user_id'])->update($dCar);
                } else {
                    $car->save();
                }
            }
            DB::commit();
            return redirect('/home')->with('message', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function filter(Request $request, $query)
    {
//        if ($request->get('roleF') != 1) {
//            $query->where('role', 1);
//        }
        if ($request->get('genderF')) {
            $query->where('gender', $request->get('genderF'));
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

    public function leave()
    {
        try {
            DB::beginTransaction();
            $arr = [];
            $reg_id = Auth::user()->registration_id;
            $user_group = User::select('id')->where('registration_id', $reg_id)->where('id', '<>', Auth::id())->get();
            foreach ($user_group as $u) {
                array_push($arr, $u['id']);
            }
            User::with('registration')->where('id', Auth::id())->update(['registration_id' => null]);
            $new_driver = User::with('registration')->where('registration_id', $reg_id)->where('role', '=', 1)->orderBy('start_time')->first();
            if ($new_driver != '') {
                RegistrationGroup::with('user')->where('id', $reg_id)->update(['driver_id' => $new_driver['id']]);
            } else {
                User::with('registration')->whereIn('id', $arr)->update(['registration_id' => null]);
                $reg = RegistrationGroup::findOrFail($reg_id);
                $reg->delete();
            }
            DB::commit();
            return response()->json('success');
        } catch (\Exception $e) {
            return $e;
        }
    }

}
