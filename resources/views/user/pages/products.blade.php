<x-main-layout>
    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>clothing products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">All Products</li>
                  <li data-filter=".des">Featured</li>
                  <li data-filter=".dev">Flash Deals</li>
                  <li data-filter=".gra">Last Minute</li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">
                  @foreach ($products as $pro)
                  <div class="col-lg-4 col-md-4 all des">
                    <div class="product-item">
                      <a href="{{route('product.show',$pro)}}"><img height="200" src="{{asset('storage/'.$pro->image)}}" alt=""></a>
                      <div class="down-content">
                        <a href="{{route('product.show',$pro)}}"><h4>{{$pro->title}} {{$pro->category ? '('.$pro->category.')' : null}}</h4></a>
                        @if ($pro->status == 'available')
                        <h6>${{$pro->price}}</h6>
                        @else
                        <h6 class="text-warning">{{$pro->status}}</h6>
                        @endif 
                        @if ($pro->quantity > 1)
                        <div class="text-warning">{{$pro->quantity}} Ps</div>    
                        @endif 
                        <p>{{$pro->description}}</p>
                        <ul class="stars">
                          @if ($pro->avgReviews())
                          {{$pro->avgReviews()}}
                          <li><i class="fa fa-star"></i></li>
                          @endif
                        </ul>
                        <span>Reviews ({{$pro->reviews()->count()}})</span>
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
          <div class="col-md-12">
            {{$products->links('pagination::bootstrap-5')}}
          </div>
        </div>
      </div>
    </div>

</x-main-layout>
