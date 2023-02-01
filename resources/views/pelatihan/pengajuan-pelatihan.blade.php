@extends('layouts.app')
@section('title', 'Pelatihan')
@section('content')


<div class="container">

    <h1>Pelatihan</h1>
    <div class="card">
        <div class="card-body">
            <form action="/pelatihan" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Judul Pelatihan</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan judul pelatihan" name="judul_pelatihan" required>
                </div>

                <div class="form-group"> <!-- Date input -->
                    <label class="control-label" for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                    <input class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" placeholder="MM/DD/YYY" type="text" required />
                </div>
                <div class="form-group"> <!-- Date input -->
                    <label class="control-label" for="tanggal_selesai">Tanggal Selesai</label>
                    <input class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="MM/DD/YYY" type="text" required />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Brosur</label>
                    <input type="file" name="filename" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>


                <button type="submit" class="btn btn-primary"> Ajukan </button>
            </form>

        </div>
    </div>

</div>



@endsection

@section('jsCustom')

<script>
     $(document).ready(function(){
        var date_input=$('input[name="tanggal_pelaksanaan"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
        var date_input=$('input[name="tanggal_selesai"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
    
@endsection