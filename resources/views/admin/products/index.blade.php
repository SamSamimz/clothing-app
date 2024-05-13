<x-admin-layout>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <h4 class="card-title">Product list</h4>
                  <a href="{{route('products.create')}}" class="btn btn-primary">Add Product</a>
                </div>
                </p>
                <div class="table-responsive">
                  @if ($products->count() > 0)
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> {{__('Title')}} </th>
                        <th> {{__('Description')}} </th>
                        <th> {{__('Price')}} </th>
                        <th> {{__('Quantity')}} </th>
                        <th> {{__('Category')}} </th>
                        <th> {{__('Image')}} </th>
                        <th> {{__('Status')}} </th>
                        <th> {{__('Action')}} </th>
                      </tr>
                    </thead>
                    <tbody>  
                      @foreach ($products as $index => $pro)
                      <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $pro->title }}</td>
                        <td>{{ $pro->description }}</td>
                        <td>{{  $pro->price  }}</td>
                        <td>{{ $pro->quantity }}</td>
                        <td>{{ $pro->category }}</td>
                        <td>
                          <img src="{{ asset('storage/'.$pro->image) }}" alt="{{$pro->title}}">
                        </td>
                        <td><div class="badge badge-{{$pro->status == 'available' ? 'success' : 'danger'}}">{{ $pro->status }}</div></td>
                        <td class="d-flex">
                          <a href="{{route('products.edit',$pro)}}" class="btn btn-info">Edit</a>
                          <form action="{{route('products.destroy',$pro)}}" method="POST">
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
                  <div class="text-secondary text-center">No Products added yet.</div>
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