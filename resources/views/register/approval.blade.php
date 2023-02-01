@extends('layouts.app')
@section('title', 'Approval Register')
@section('content')


<div class="container">

    <div> <h1>Approval Register</h1>

    <form action="/approval-register" method="POST" >

    @csrf

    <input type="hidden" name="id" value="{{$user->id}}">
    <input type="hidden" name="id_notif" value="{{$id_notif}}">

        
        <div class="row">
            <div class="col-sm-2">
                Nama 
            </div>
            <div class="col-sm-1"> : </div>
            <div class="col-sm text-left">
                
                {{ $user->first_name }} {{ $user->last_name }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                Email 
            </div>
            <div class="col-sm-1"> : </div>
            <div class="col-sm text-left">
                
                {{ $user->email }} 
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                Username 
            </div>
            <div class="col-sm-1"> : </div>
            <div class="col-sm text-left">
                
                {{ $user->username }} 
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Posisi Karyawan</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="id_posisi">
                        
                        @foreach ($posisi as $pos )
                        
                        <option value="{{ $pos->id}}" >{{$pos->nama_posisi}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        
        
        <button type="submit" class="btn btn-primary" value="approve" name="approve"> Approve </button>
        <button type="submit" class="btn btn-danger" value="reject" name="reject" > Reject </button>
    </form>

    </div>
</div>


@endsection