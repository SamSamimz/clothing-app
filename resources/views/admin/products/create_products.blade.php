<x-admin-layout>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
          <div class="card-body">
            <div class="pb-3 d-flex align-items-center justify-content-between">
                <h4 class="card-title">Add New Product</h4>
                <a href="{{route('products.index')}}" class="btn btn-primary">All Product</a>
              </div>
              <form action="{{route('products.store')}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control text-white" id="title" placeholder="title" value="{{old('title')}}">
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
              <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" name="description" class="form-control text-white" id="description" placeholder="description" value="{{old('description')}}">
                  @error('description')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
              <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" name="price" class="form-control text-white" id="price" placeholder="price" value="{{old('price')}}">
                  @error('price')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
              <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" name="quantity" class="form-control text-white" id="price" placeholder="quantity" value="{{old('quantity')}}">
                  @error('quantity')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

              <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control text-white" name="category" id="category">
                    <option value="" selected>Select Category</option>
                    <option value="man">Men</option>
                    <option value="woman">Woman</option>
                    <option value="baby">Baby</option>

                  </select>
                  @error('quantity')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
            
            <div class="form-group">
                <label>File upload</label>
                <input type="file" name="image" class="file-upload-default">
                <div class="input-group col-xs-12">
                    <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
                    @error('image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="{{route('products.index')}}" class="btn btn-dark">Cancel</a>
        </form>
          </div>
        </div>
    </div>
</div>
    
</x-admin-layout>