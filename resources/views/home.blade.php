<x-main-layout>
    <!-- Page Content -->

    <!-- Banner Starts Here -->
    @include('user.parts.banner')

    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="{{route('products')}}">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          @foreach ($products as $pro)
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="{{asset('storage/'.$pro->image)}}" alt="{{$pro->title}}"></a>
              <div class="down-content">
                <a href="#"><h4>{{$pro->title}}</h4></a>
                <h6>${{$pro->price}}</h6>
                <p>{{$pro->description}}</p>
                <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Reviews ({{$pro->reviews->count()}})</span>
              </div>
              <form action="{{route('add-cart',$pro)}}" method="POST">
                @csrf
                <button type="submit" class="col-12">Add to cart</button>
              </form>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    @include('user.parts.features')
</x-main-layout>