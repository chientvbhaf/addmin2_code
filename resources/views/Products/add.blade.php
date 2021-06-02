@extends('layouts.admin')
@section('title')
    <title>Product create</title>
@endsection
@section('css')
<link href="{{ asset('vendo/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header',['title'=>'Product','key'=>'Add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Ten product</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('name') }}" name="name" aria-describedby="emailHelp" placeholder="ten thu muc">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">price</label>
                  <input type="text" class="form-control " id="exampleInputEmail1" name="price" aria-describedby="emailHelp" placeholder="ten thu muc">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">feature image</label>
                  <input type="file" class="form-control-file" id="exampleInputEmail1" name="feature_image_path" aria-describedby="emailHelp" placeholder="ten thu muc">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">mp3</label>
                  <input type="file" class="form-control-file" id="exampleInputEmail1" name="mp3" aria-describedby="emailHelp" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">anh chi tiet</label>
                  <input type="file" class="form-control-file " multiple id="exampleInputEmail1" name="image_path[]" aria-describedby="emailHelp" placeholder="ten thu muc">
                </div>
                <div class="form-group">
                  <label >Category</label>
                    <select class="js-example-placeholder-single js-states form-control " name="category">
                    <option value="0">thu muc cha</option>
                    {{!! $categoryOption !!}}
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">content</label>
                  <textarea class="form-control content-editor" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>tags</label>
                <select class="form-control tags_select2_choose" name="tags[]" multiple="multiple "></select>           
                </div>
                <div class="form-group">
                  <label >Singer</label>
                  <select class="form-control chooseSinger" name="chooseSinger[]" multiple="multiple">
                    @foreach ($dataSinger as $itemSinger)
                    <option value="{{ $itemSinger->id }}">{{ $itemSinger->name }}</option>
                    @endforeach

                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
    
          </div>
      

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@section('js')
<script src="{{ asset('vendo/select2/select2.min.js') }}"></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
  $(function(){
    $(".chooseSinger").select2({
});
$('.chooseSinger').select2({
  placeholder: 'Enter Singer',
  allowClear: true
});
  })
</script>
@endsection






