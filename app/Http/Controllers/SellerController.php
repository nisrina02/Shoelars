<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data["count"] = User::where('level', '=', 'seller')->count();

        $data = User::where('level', '=', 'seller')->get();

        return view('Seller.seller', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Seller.seller_create');
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
            'level' => 'required|string',
        ]);

        if($validator->fails()){
            return $this->response->errorResponse($validator->errors());
        }

        $user = new User();
        $user->nama = $request->nama;
        $user->telp = $request->telp;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->level = $request->level;
        $user->save();

        return redirect('/seller')->with('alert_pesan', 'Data telah disimpan');
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

        return view('Seller.seller', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', $id)->get();

        return view('Seller.seller_update', compact('data'));
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

        return redirect('/seller')->with('alert_pesan', 'Data anda telah disimpan');
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

            return redirect()->route('SellerController.index')->with('alert_message', 'Berhasil menghapus data!');
        }

        return redirect()->route('SellerController.index')->with('alert_message', 'ID tidak ditemukan!');
    }
}
