@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>{{ isset($data) ? 'Ubah' : 'Tambah'  }} File</h1>
            <hr>
            <form action="{{ isset($data) ? route('file.update',$data->id) : route('file.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
				{{ method_field('PUT') }}
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="usr" name="nama" value="{{ isset($data) ? $data->nama : '' }}">
                </div>
				<div class="form-group">
                    <label for="email">File:</label>
                    <input type="file" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection