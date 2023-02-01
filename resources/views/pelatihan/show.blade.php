@extends('layouts.app')
@section('title', 'Pelatihan')
@section('content')


<div class="container">

    <h1> </h1>
    <div class="card">
        <dic class="card-body">

            <form action="/approval-pelatihan" method="POST" >
                @csrf

                <div class="col-md">
                    <label for="exampleForm2" class="mt-2">Nama Karyawan</label>
                    <input type="text" id="exampleForm2" class="form-control mt-1" value="{{ $pelatihan->karyawan->nik }} - {{ $pelatihan->karyawan->first_name }} {{ $pelatihan->karyawan->last_name}}" disabled="">
                </div>
                <div class="col-md">
                    <label for="exampleForm2" class="mt-2">Judul Pelatihan</label>
                    <input type="text" id="exampleForm2" class="form-control mt-1" value="{{ $pelatihan->judul_pelatihan }}" disabled="">
                </div>
                <div class="col-md">
                    <label for="exampleForm2" class="mt-2">Tanggal Pelaksanaan</label>
                    <input type="text" id="exampleForm2" class="form-control mt-1" value="{{ $pelatihan->tanggal_pelaksanaan }}" disabled="">
                </div>
                <div class="col-md">
                    <label for="exampleForm2" class="mt-2">Tanggal Selesai</label>
                    <input type="text" id="exampleForm2" class="form-control mt-1" value="{{ $pelatihan->tanggal_selesai }}" disabled="">
                </div>
                <div class="col-md">
                    <label for="exampleForm2" class="mt-2">Brosur</label>
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('uploads/pelatihan/'.$pelatihan->brosur)  }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-md">
                    <label for="exampleForm2" class="mt-2">Deskripsi</label>
                    <div class="">
                        {{ $pelatihan->deskripsi }}
                    </div>
                </div>

                <input type="hidden" name="id_notif" value="{{$id_notif}}">
                <input type="hidden" name="id_pelatihan" value="{{$pelatihan->id}}">

                <div class="col-md mt-3">
                    <button type="submit" name="approve" value="approve" class="btn btn-primary"> Approve</button>
                    <button type="submit" name="reject" value="reject" class="btn btn-danger"> Reject</button>
                </div>
            </form>


        </dic>
    </div>



</div>


@endsection