<x-admin-layout>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <h4 class="card-title">Member list</h4>
                  <a href="{{route('team-members.create')}}" class="btn btn-primary">Add Member</a>
                </div>
                </p>
                <div class="table-responsive">
                  @if ($members->count() > 0)
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> {{__('Name')}} </th>
                        <th> {{__('Title')}} </th>
                        <th> {{__('Description')}} </th>
                        <th> {{__('Image')}} </th>
                        <th> {{__('Facebook')}} </th>
                        <th> {{__('Twitter')}} </th>
                        <th> {{__('Linkedin')}} </th>
                        <th> {{__('Action')}} </th>
                      </tr>
                    </thead>
                    <tbody>  
                      @foreach ($members as $index => $member)
                      <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->title }}</td>
                        <td>{{ $member->description }}</td>
                        <td>
                          <img src="{{ asset('storage/'.$member->image) }}" alt="">
                        </td>
                        <td>@if ($member->facebook)
                          <a href="{{$member->facebook}}">Visit</a>
                          @else
                          <span class="text-danger">___</span>
                        @endif</td>
                        <td>@if ($member->twitter)
                          <a href="{{$member->twitter}}">Visit</a>
                          @else
                          <span class="text-danger">___</span>
                        @endif</td>
                        <td>@if ($member->linkedin)
                          <a href="{{$member->linkedin}}">Visit</a>
                          @else
                          <span class="text-danger">___</span>
                        @endif</td>
                        
                        <td class="d-flex">
                          <a href="{{route('team-members.edit',$member)}}" class="btn btn-info">Edit</a>
                          <form id="deleteForm" action="{{route('team-members.destroy',$member)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger submit-btn">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                  <div class="text-secondary text-center">No member added yet.</div>
                  @endif
                </div>
              </div>
            </div>
          </div>
    </div>

    @push('scripts')
    <script>
      $(document).ready(function() {
        $('.submit-btn').on('click', function(e) {
          e.preventDefault();
          var form = $(this).closest('form');
          
          if (confirm('Are you sure you want to submit this form?')) {
            form.submit();
          } else {
          }
        });
      });
    </script>
    @endpush

</x-admin-layout>