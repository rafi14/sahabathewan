@extends('layouts.master')

@section('content')
        <form class="form-horizontal" method="post" action="{{route('event.store')}}" enctype="multipart/form-data">
        @csrf
        <fieldset>

        <!-- Form Name -->
        <legend>Form Create Admin</legend>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Image</label>  
            <div class="col-md-4">
                <input id="textinput" name="image" type="file" placeholder="Image" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Nama Event</label>  
            <div class="col-md-4">
                <input id="textinput" name="name" type="text" placeholder="Nama Event" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Alamat</label>  
            <div class="col-md-4">
                <input id="textinput" name="location" type="text" placeholder="Alamat" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Time</label>  
            <div class="col-md-4">
                <input id="textinput" name="rating" type="time" placeholder="Time" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Requirement</label>  
            <div class="col-md-4">
                <textarea name="requirement" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Description</label>  
            <div class="col-md-4">
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">price</label>  
            <div class="col-md-4">
                <input id="textinput" name="price" type="text" placeholder="Jumlah Kasus" class="form-control input-md">
            </div>
        </div>
        
        <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Wilayah</label>  
            <div class="col-md-4">
                <select name="id_jakartatype" id="" class="form-control">
               @foreach($wilayah as $wilayahku)
                    <option value="{{$wilayahku->id}}">{{$wilayahku->name}}</option>
               @endforeach     
               
                </select>
            </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Jenis Hewan</label>  
            <div class="col-md-4">
                <select name="id_animaltype" id="" class="form-control">
               @foreach($animal as $animals)
                    <option value="{{$animals->id}}">{{$animals->name}}</option>
               @endforeach     
               
                </select>
            </div>
        </div>

        <!-- Text input-->
       <br>
        

        <!-- Text input-->

        <div class="form-group text-center">
                  <button class="btn btn-primary" type="submit">Simpan</button>
        </div>

        </fieldset>
        </form>
@endsection        
