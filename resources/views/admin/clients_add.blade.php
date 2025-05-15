@extends('layouts.admin.admin_layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .pl{
        margin-right: 30px;
    }
</style>
@section('title', 'Clients')
@section('content')
    <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Clients Add</h4>
                  <form class="forms-sample" method="post" action="{{ route('store_clients') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"  placeholder="Enter Title">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Subtitle</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{old('subtitle')}}"  placeholder="Enter Sub Title">
                        @error('subtitle')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Logo</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" name="image" >
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                            <img id="imagePreview" src="#" alt="Image Preview" style="margin-top:10px; max-width: 300px; display: none;" />

                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('clients-list') }}" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>         
        </div>
    </div>
@endsection
@section('js')
<script>
  document.getElementById('image').addEventListener('change', function(event){
    const [file] = this.files;
    const preview = document.getElementById('imagePreview');

    if (file) {
      preview.src = URL.createObjectURL(file);
      preview.style.display = 'block';
    } else {
      preview.src = '#';
      preview.style.display = 'none';
    }
  });
</script>
@endsection      