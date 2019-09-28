<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class FinddoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::all();
        return view('admin.modul-doctor.doctor-table',compact('doctor'));
    }

    public function graphic()
    {
        $doctorAll = Doctor::all();

        $jakut = $doctorAll->filter(function($value, $key){
            return $value->kota == 'jakarta utara';
        });
        $jakbar = $doctorAll->filter(function($value, $key){
            return $value->kota == 'jakarta barat';
        });
        $jaktim = $doctorAll->filter(function($value, $key){
            return $value->kota == 'jakarta timur';
        });
        $jaksel = $doctorAll->filter(function($value, $key){
            return $value->kota == 'jakarta selatan';
        });
        $jakpus = $doctorAll->filter(function($value, $key){
            return $value->kota == 'jakarta pusat';
        });


        if(count($jakut) > 0){
            $wilayah['jakarta selatan'] = count($jakut); 
         }
        if(count($jakbar) > 0){
            $wilayah['jakarta barat'] = count($jakbar); 
         }
        if(count($jaktim) > 0){
            $wilayah['jakarta timur'] = count($jaktim); 
         }
        if(count($jaksel) > 0){
            $wilayah['jakarta selatan'] = count($jaksel); 
         }
        if(count($jakpus) > 0){
            $wilayah['jakarta pusat'] = count($jakpus); 
         }
 
        
        return view('admin.modul-doctor.doctor-grafik',compact('wilayah'));
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modul-doctor.doctor-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'no_tlp' => 'required|max:255',
            'name' => 'required|max:255',
            'kelurahan' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'kota' => 'required|max:255',
            'image' => 'required',
           
            
            ]);

        $file =  $request->file('image');
        $fileNameArr = explode('.',$file->getClientOriginalName());
        $fileName = $fileNameArr[0] . '-' . time() . '.' . $fileNameArr[1];
        $file->move('doctorimage', $fileName);

        $data = $request->all();
        unset($data['token']);
        $data['image'] = $fileName;

        $save = Doctor::create($data);

        if(!$save){
            File::delete('doctorimage/'.$fileName);
        } else{
            return redirect()->route('finddoctor.index');
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
        $detailDoctor = Doctor::findOrFail($id);
        return view('admin.modul-doctor.doctor-detail',compact('detailDoctor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editDoctor = Doctor::findOrFail($id);
        return view('admin.modul-doctor.doctor-edit',compact('editDoctor'));
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
        $request->validate([

            'no_tlp' => 'required|max:255',
            'name' => 'required|max:255',
            'kelurahan' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'kota' => 'required|max:255',
            'image' => 'required',
            'url' => 'required',
            
            ]);


        $update = $request->all();
        unset($update['_token']);
        unset($update['_method']);

        $file =  $request->file('image');
        if ($file != null){

            $fileNameArr = explode('.',$file->getClientOriginalName());
            $fileName = $fileNameArr[0] . '-' . time() . '.' . $fileNameArr[1];
            $file->move('doctorimage', $fileName);

            $update['image'] = $fileName;

            $gambar = Doctor::find($id)->image;
            // dd($gambar);
            // exit();
            File::delete('doctorimage/' . $gambar);
        }

       

        $update_action = Doctor::where('id',$id)->update($update);
        if ($update_action){
            return redirect()->route('finddoctor.index');
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
        $gambar = Doctor::find($id)->image;
        // dd($gambar);
        // exit();
        File::delete('doctorimage/' . $gambar);
        $delete_action = Doctor::where('id',$id)->delete();
        if ($delete_action){
            return redirect()->route('finddoctor.index');
        }else{
            echo "Gagal Delete";
        }
    }
}
