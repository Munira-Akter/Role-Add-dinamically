<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Role::all();
        return view('auth.user.role.index', [
            'all_data'  => $data
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $per = json_encode($request -> per);

        Role::create([
            'name'              => $request -> name,
            'slug'              => Str::slug($request -> name),
            'permission'        => $per,
        ]);

        return redirect() -> route('role.index') -> with('success', 'Role added successful');
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
        //
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



    // all roles data
    public function allRoles(){

        $all_data = Role::all();

        $i = 1;
        $output = '';
        foreach( $all_data as $data ){

            // Permission
            $permission = json_decode($data -> permission );

            // Status manage
            if($data -> status == 'Published'){
                $status = '<span class="badge badge-success">Published</span>';
            }else{
                $status = '<span class="badge badge-danger">Unpublished</span>';
            }


            // Status btn
            if($data -> status == 'Published'){
                $status_btn = '<a class="btn btn-sm btn-danger" id="role_status_btn" status_id="'. $data -> id .'" href="#"><i class="fa fa-eye-slash"></i></a>';
            }else{
                $status_btn = '<a class="btn btn-sm btn-success" id="role_status_btn" status_id="'. $data -> id .'" href="#"><i class="fa fa-eye"></i></a>';
            }


            $output .= '<tr>';
            $output .= '<td>'. $i .'</td>';
            $output .= '<td>'. $data -> name .'</td>';
            $output .= '<td>'. $data -> slug .'</td>';
            $output .= '<td>'. implode(' | ',  $permission ) .'</td>';
            $output .= '<td>'. date('F d, Y', strtotime($data -> created_at)) .'</td>';
            $output .= '<td>'. $status .'</td>';
            $output .= '<td> '. $status_btn .' <a href="#" id="edit_role_btn" edit_id="'. $data -> id .'" class="btn btn-sm btn-warning">Edit</a> <a id="delete_role_btn" href="#" delete_id="'. $data -> id .'" class="btn btn-sm btn-danger">Delete</a></td>';
            $output .= '</tr>';

            $i++;
        }

        return $output;


    }

    public function roleStatus($id){

        $data = Role::find($id);

        if( $data -> status == 'Published' ){
            $data -> status = 'Unpublished';
            $data -> update();
        }else if( $data -> status == 'Unpublished'  ){
            $data -> status = 'Published';
            $data -> update();
        }



    }


    public function roleEditData($id){

        $role_data = Role::find($id);

        $per_arr =  json_decode($role_data -> permission);




        $box = '
            <input name="per[]" value="Teacher" '. (in_array('Teacher', $per_arr) ? 'checked' : '') .' type="checkbox" id="TeacherEdit"> <label for="TeacherEdit">Teacher</label> <br>
            <input name="per[]" value="Student" '. (in_array('Student', $per_arr) ? 'checked' : '') .' type="checkbox" id="StudentEdit"> <label for="StudentEdit">Student</label> <br>
            <input name="per[]" value="Slider" '. (in_array('Slider', $per_arr) ? 'checked' : '') .' type="checkbox" id="SliderEdit"> <label for="SliderEdit">Slider</label> <br>
            <input name="per[]" value="Users" '. (in_array('Users', $per_arr) ? 'checked' : '') .' type="checkbox" id="UsersEdit"> <label for="UsersEdit">Users</label><br>
            <input name="per[]" value="Accounts" '. (in_array('Accounts', $per_arr) ? 'checked' : '') .' type="checkbox" id="AccountsEdit"> <label for="AccountsEdit">Accounts</label><br>
            <input name="per[]" value="Settings" '. (in_array('Settings', $per_arr) ? 'checked' : '') .' type="checkbox" id="SettingsEdit"> <label for="SettingsEdit">Settings</label> <br>
        ';

        return [
            'id'          => $role_data -> id,
            'name'          => $role_data -> name,
            'permission'    => $box,
        ];

    }


    public function roleUpdateData(Request $request){

        $id = $request -> update_id;

        $update_data = Role::find($id);
        $update_data -> name = $request -> name;
        $update_data -> permission = json_encode($request -> per);
        $update_data -> update();

        return true;




    }


    public function roleDeleteData($id) {
        $delete_data = Role::find($id);
        $delete_data -> delete();
        return true;
    }


}
