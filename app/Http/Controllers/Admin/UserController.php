<?php

namespace App\Http\Controllers\Admin;

use App\Adoption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.modul-user.user-table',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $adoption = Adoption::all();
        return view('admin.modul-user.user-create',compact('user','adoption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file =  $request->file('image');
        $fileNameArr = explode('.',$file->getClientOriginalName());
        $fileName = $fileNameArr[0] . '-' . time() . '.' . $fileNameArr[1];
        $file->move('userimage', $fileName);

        $data = $request->all();
        unset($data['token']);
        $data['image'] = $fileName;

        $save = User::create($data);

        if(!$save){
            File::delete('userimage/'.$fileName);
        } else{
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.modul-user.user-detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adoption = Adoption::all();
        $editUser = User::findOrFail($id);
        return view('admin.modul-user.user-edit',compact('editUser','adoption'));
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
        $update = $request->all();
        unset($update['_token']);
        unset($update['_method']);

        $file =  $request->file('image');
        if ($file != null){

            $fileNameArr = explode('.',$file->getClientOriginalName());
            $fileName = $fileNameArr[0] . '-' . time() . '.' . $fileNameArr[1];
            $file->move('userimage', $fileName);

            $update['image'] = $fileName;

            $gambar = User::find($id)->image;
            // dd($gambar);
            // exit();
            File::delete('userimage/' . $gambar);
        }

       

        $update_action = User::where('id',$id)->update($update);
        if ($update_action){
            return redirect()->route('event.index');
        }else{
            echo "Gagal Update";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = User::find($id)->image;
        // dd($gambar);
        // exit();
        File::delete('userimage/' . $gambar);
        $delete_action = User::where('id',$id)->delete();
        if ($delete_action){
            return redirect()->route('user.index');
        }else{
            echo "Gagal Delete";
        }
    }
}
