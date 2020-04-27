@extends('layouts.app');

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
    <form role="form" action="{{route('carrusel.store')}}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="Titulo">Titulo</label>
            <input type="text" class="form-control" id="Titulo" placeholder="Titulo" name="titulo">
          </div>
          <div class="form-group">
            <label for="Texto">Texto</label>
            <input type="text" class="form-control" id="Texto" placeholder="Texto" name="texto">
          </div>
          <div class="form-group">
            <label for="imagen">Imagen</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="imagen" name="imagen">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->

</div>
@endsection