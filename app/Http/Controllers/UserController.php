<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('cek_login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['count'] = User::where('level', '=', 'customer')->count();

        // if($limit == NULL && $offset == NULL){
            $data["user"] = User::where('level', '=', 'customer')->get();
        // } else {
        //     $data["user"] = User::where('level', '=', 'admin')->take($limit)->skip($offset)->get();
        // }

        return view('user', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:50',
            'telp' => 'required|string|min:10',
            'email' => 'required|string|max:30|unique:Users',
            'password' => 'required|string|min:6',
        ]);

        // if($validator->fails()){
        //     return $this->response->errorResponse($validator->errors());
        // }

        $user = new User();
        $user->nama = $request->nama;
        $user->telp = $request->telp;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->level = 'customer';
        $user->save();

        return redirect('/log in')->with('alert_message', 'Data anda telah disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data["user"] = User::where('id', $id)->get();

        return view('user', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["user"] = User::where('id', $id)->get();

        return view('user_update', compact('data'));
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:50',
            'telp' => 'required|string|min:10',
        ]);

        if($validator->fails()){
            return $this->response->errorResponse($validator->errors());
        }

        $user = User::where('id', $id)->first();
        $user->nama = $request->nama;
        $user->telp = $request->telp;
        $user->save();

        return redirect->route('UserController.index')->with('alert_message', 'Data anda telah disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::where('id', $id)->first();

        if($data != null){
            $data->delete();

            return redirect('/user')->with('alert_message', 'Berhasil menghapus data!');
        }

        return redirect('/user')->with('alert_message', 'ID tidak ditemukan!');
    }
}
