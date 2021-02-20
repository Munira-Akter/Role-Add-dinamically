<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = Role::where('status', 'Published') -> get();
        return view('auth.user.index', [
            'roles'         => $roles
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name'          => $request -> fname,
            'role_id'       => $request -> role_id,
            'email'         => $request -> email,
            'cell'          => $request -> cell,
            'uname'         => $request -> uname,
            'gender'        => $request -> gender,
            'edu'           => $request -> edu,
            'password'      => password_hash('abc123', PASSWORD_DEFAULT),
        ]);

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_data = User::find($id);


        $gender = '
             <label for="" class="d-block">Gender</label>
            <input name="gender" class="" '. ($user_data -> gender == "Male" ? 'checked' :  '') .' value="Male" type="radio" id="MaleEdit"> <label for="MaleEdit">Male</label>
            <input name="gender" class="" '. ($user_data -> gender == "Female" ? 'checked' :  '') .' value="Female" type="radio" id="FemaleEdit"> <label for="FemaleEdit">Female</label>
        ';



        $edu = '
            <option '. ($user_data -> edu == '' ? 'selected' : '' ) .' value="">-select-</option>
            <option ' .  ($user_data -> edu == 'JSC' ? 'selected' : '' )  . ' value="JSC">JSC</option>
            <option ' .  ($user_data -> edu == 'SSC' ? 'selected' : '' )  . ' value="SSC">SSC</option>
            <option ' . ($user_data -> edu == 'HSC' ? 'selected' : '' ) . ' value="HSC">HSC</option>
            <option ' . ($user_data -> edu == 'Auto' ? 'selected' : '' ) . ' value="Auto">Auto</option>
        ';

        return [
            'name'      => $user_data -> name,
            'email'      => $user_data -> email,
            'cell'      => $user_data -> cell,
            'uname'     => $user_data -> uname,
            'gender'    => $gender,
            'edu'       => $edu
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function allUsers(){

        $all_data =  User::all();

        $user_data = '';
        $init = 1;
        foreach( $all_data  as $data ){

            $user_data .= '<tr>';
            $user_data .= '<td> '. $init++  .' </td>';
            $user_data .= '<td> '. $data -> name .' </td>';
            $user_data .= '<td> '. $data -> role_id .' </td>';
            $user_data .= '<td> '. $data -> email .' </td>';
            $user_data .= '<td> '. $data -> cell .' </td>';
            $user_data .= '<td> '. $data -> uname .' </td>';
            $user_data .= '<td> '. $data -> gender .' </td>';
            $user_data .= '<td> '. $data -> edu .' </td>';
            $user_data .= '<td> <img width="60" src="backend/assets/img/'. $data -> photo .'"> </td>';
            $user_data .= '<td><a href="#" id="edit_user_btn" edit_id="'. $data -> id .'" class="btn btn-sm btn-warning">Edit</a> <a id="delete_role_btn" href="#" delete_id="'. $data -> id .'" class="btn btn-sm btn-danger">Delete</a></td>';
            $user_data .= '</tr>';


        }

        return $user_data;

    }
}
