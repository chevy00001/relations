<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersEloquent = User::with('department', 'position')->get();
        // $department = Department::with('user')->get();


        $department = Department::all();
        $users = User::all();
        $position = Position::all();
        $user = User::where('id', 2)->first();

        //convert json data to array
        $userData = json_decode($users, true);
        $departmentData = json_decode($department, true);
        $positionData = json_decode($position, true);

        // Loop through user data and replace department id with department name
        foreach ($userData as &$user) {
            foreach ($departmentData as $department) {
                if ($user['department_id'] == $department['id']) {
                    // $user['department_id'] = $department['name'];
                    $user['department_name'] = $department['name'];
                }
            }
            foreach ($positionData as $position) {
                if ($user['position_id'] == $position['id']) {
                    //$user['position_id'] = $position['name'];
                    $user['position_name'] = $position['name'];
                }
            }
        }



        return $userData;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
