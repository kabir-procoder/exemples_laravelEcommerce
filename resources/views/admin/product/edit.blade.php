@extends('admin.layouts.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 style="font-weight: bolder;">Edit Product</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Title<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" required value="{{ old('title', $product->title) }}" name="title" placeholder="Title">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label>SKU<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" required value="{{ old('sku', $product->sku) }}" name="sku" placeholder="SKU">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Category<span style="color: red;">*</span></label>
                        <select class="form-control" id="ChangeCategory" name="category_id">
                          <option value="">Select</option>
                          @foreach($getCategory as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Sub Category<span style="color: red;">*</span></label>
                        <select class="form-control" id="getSubCategory" name="sub_category_id">
                          <option value="">Select</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Brand<span style="color: red;">*</span></label>
                        <select class="form-control" name="brand_id">
                          <option value="">Select</option>
                          @foreach($getBrand as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Color<span style="color: red;">*</span></label>
                        @foreach($getColor as $color)
                            <div>
                                <label><input type="checkbox" name="color_id[]" value="{{ $color->id }}"> {{ $color->name }} </label>
                            </div>
                          @endforeach
                      </div>
                    </div>
                  </div>
                </div>

                <hr>

                <div class="row">
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Price ($)<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" required value="" name="price" placeholder="Price">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Old Price ($)<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" required value="" name="old_price" placeholder="Old Price">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Size<span style="color: red;">*</span></label>
                        <div>
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="AppendSize">
                              <tr>
                                <td>
                                  <input type="text" name="" placeholder="Name" class="form-control">
                                </td>
                                <td>
                                  <input type="text" name="" placeholder="Price" class="form-control">
                                </td>
                                <td style="width: 100px;">
                                  <button type="button" class="btn btn-primary AddSize">Add</button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <div class="form-group" style="width: 100%!important;">
                        <label>Short Description<span style="color: red;">*</span></label>
                        <textarea name="short_description" class="form-control editor" placeholder="Short Description"></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Description<span style="color: red;">*</span></label>
                        <textarea style="width: 100%!important;" name="description" class="form-control editor" placeholder="Description"></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Additional Information<span style="color: red;">*</span></label>
                        <textarea name="additional_information" class="form-control editor" placeholder="Additional Information"></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Shipping Returns<span style="color: red;">*</span></label>
                        <textarea name="shipping_returns" class="form-control editor" placeholder="Shipping Returns"></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                     <div class="form-group">
                        <label>Status <span style="color: red;">*</span></label>
                        <select class="form-control" name="status" required>
                          <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                          <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                        </select>
                     </div>
                   </div>
                  </div>
                </div>

                

                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection

@section('script')

<script src="{{ url('public/tinymce/tinymce-jquery.min.js') }}"></script>

<script type="text/javascript">

  // TinyMCE JQuery script
  $('.editor').tinymce({
        height: 400,
        menubar: true,
        plugins: [
          'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
          'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
          'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist outdent indent | removeformat | help'
      });


  // Add Size
  var i = 1000;
  $('body').delegate('.AddSize', 'click', function(){
    var html = '<tr id="DeleteSize'+i+'">\n\
                  <td>\n\
                    <input type="text" name="" placeholder="Name" class="form-control">\n\
                  </td>\n\
                  <td>\n\
                    <input type="text" name="" placeholder="Price" class="form-control">\n\
                  </td>\n\
                  <td>\n\
                    <button type="button" id="'+i+'" class="btn btn-danger DeleteSize">Delete</button>\n\
                  </td>\n\
                </tr>';
    i++;
    $('#AppendSize').append(html);
  });

  $('body').delegate('.DeleteSize', 'click', function(){
    var id = $(this).attr('id');
    $('#DeleteSize'+id).remove();
  });


  //Change SubCategory
  $('body').delegate('#ChangeCategory', 'change', function(e){
    var id = $(this).val();

    $.ajax({
      type : "POST",
      url : "{{ url('admin/get_sub_category') }}",
      data : {
          "id" : id,
          "_token": "{{ csrf_token() }}"
      },
      dataType : "json",
      success: function(data) {
            $('#getSubCategory').html(data.html);
      },
      error: function(data) {

      }

    });
  });
</script>
@endsection