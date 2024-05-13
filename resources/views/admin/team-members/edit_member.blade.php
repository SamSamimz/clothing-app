<x-admin-layout>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
          <div class="card-body">
            <div class="pb-3 d-flex align-items-center justify-content-between">
                <h4 class="card-title">Update Member</h4>
                <a href="{{route('team-members.index')}}" class="btn btn-primary">Cancel</a>
              </div>
              <form action="{{route('team-members.update',$team_member)}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control text-white" id="name" placeholder="Name" value="{{$team_member->name}}">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control text-white" id="title" placeholder="title" value="{{$team_member->title}}">
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
              <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" name="description" class="form-control text-white" id="description" placeholder="description" value="{{$team_member->description}}">
                  @error('description')
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

            <div class="form-group">
              <label for="name">Facebook</label>
              <input type="text" name="facebook" class="form-control text-white" id="facebook" value="{{$team_member->facebook ? $team_member->facebook : 'https://facebook.com/'}}">
              @error('facebook')
              <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="twitter">Twitter</label>
              <input type="text" name="twitter" class="form-control text-white" id="twitter" value="{{$team_member->twitter ? $team_member->twitter : 'https://twitter.com/'}}">
              @error('twitter')
              <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="twitter">Linkedin</label>
              <input type="text" name="linkedin" class="form-control text-white" id="linkedin" value="{{$team_member->linkedin ? $team_member->linkedin : 'https://www.linkedin.com/in/'}}" >
              @error('linkedin')
              <p class="text-danger">{{$message}}</p>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="{{route('team-members.index')}}" class="btn btn-dark">Cancel</a>
        </form>
          </div>
        </div>
    </div>
</div>
    
</x-admin-layout>