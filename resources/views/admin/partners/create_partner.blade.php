<x-admin-layout>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
          <div class="card-body">
            <div class="pb-3 d-flex align-items-center justify-content-between">
                <h4 class="card-title">Add New Partner</h4>
                <a href="{{route('partners.index')}}" class="btn btn-primary">All Partners</a>
              </div>
              <form action="{{route('partners.store')}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" name="name" class="form-control text-white" id="name" placeholder="name" value="{{old('name')}}">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>

                <div class="form-group">
                    <label for="url">URL :</label>
                    <input type="text" name="url" class="form-control text-white" id="url" placeholder="url" value="{{old('url')}}">
                    @error('url')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
            
            <div class="form-group">
                <label>Company Logo :</label>
                <input type="file" name="logo" class="file-upload-default">
                <div class="input-group col-xs-12">
                    <input type="file" name="logo" class="form-control file-upload-info" placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
                    @error('logo')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="{{route('partners.index')}}" class="btn btn-dark">Cancel</a>
        </form>
          </div>
        </div>
    </div>
</div>
    
</x-admin-layout>