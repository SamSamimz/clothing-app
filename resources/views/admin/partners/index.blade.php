<x-admin-layout>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <h4 class="card-title">Partners list</h4>
                  <a href="{{route('partners.create')}}" class="btn btn-primary">Add Partners</a>
                </div>
                </p>
                <div class="table-responsive">
                  @if ($partners->count() > 0)
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> {{__('Name')}} </th>
                        <th> {{__('Image')}} </th>
                        <th> {{__('URL')}} </th>
                        <th> {{__('Action')}} </th>
                      </tr>
                    </thead>
                    <tbody>  
                      @foreach ($partners as $index => $partner)
                      <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $partner->name }}</td>
                        <td>
                          <img src="{{asset('storage/'.$partner->logo)}}" alt="{{ $partner->name }}">
                        </td>
                        <td><a href="{{ $partner->url }}">Visit</a></td>
                        <td class="d-flex">
                          <a href="{{route('partners.edit',$partner)}}" class="btn btn-info">Edit</a>
                          <form action="{{route('partners.destroy',$partner)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger submit-btn">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                  <div class="text-secondary text-center">No partner added yet.</div>
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