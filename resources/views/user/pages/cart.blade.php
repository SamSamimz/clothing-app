<x-main-layout>
 <div class="page-heading">
     <div class="col-12 mx-auto">
         <div class="container">
             <div class="row">
                 <div class="bg-light rounded p-3">
                     <h3>Cart Items</h3>
                     <hr>
                        <div>
                            @if ($cartItems->count() > 0)
                            <table class="table table-borderless">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cartItems as $index => $item)
                                    <tr>
                                        @php
                                        $sub_total = $item->quantity * $item->product->price
                                        @endphp
                                        <th scope="row">{{++$index}}</th>
                                        <td>
                                            <div class="col-6 mx-auto d-flex justify-content-between">
                                                <a href="#">
                                                    <img width="150" src="{{asset('storage/'.$item->product->image)}}" alt="">
                                                </a>
                                                <div class="">
                                                    <div><a href="#" class="text-black">{{$item->product->title}}</a></div>
                                                    <p>{{$item->product->description}}</p>
                                                    <div class="text-danger">${{number_format($item->product->price,2)}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-flex">
                                        <form action="{{route('carts.update',$item->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input style="width: 60px;" class="form-control mb-2" max="9" min="1" type="number" value="{{$item->quantity}}" name="quantity">
                                            <button class="btn btn-warning" type="submit">Update</button>
                                        </form>
                                        </td>
                                        <td>{{number_format($sub_total,2)}}</td>
                                        @php
                                            $total = $total + $sub_total;
                                            @endphp
                                        <td>
                                            <form action="{{route('carts.destroy',$item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-danger">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="text-secondary">No product added yet.</div>
                            @endif
                        </div>

                    @if ($cartItems->count() > 0)
                    <div class="row px-3">
                        <div class="card" style="width: 28rem;">
                            <div class="card-body">
                              <h5 class="card-title">Order Summery</h5>
                              <h6 class="card-subtitle mb-2 text-body-secondary">{{$cartItems->count()}} Product</h6>
                              <div>Regular Price: <span class="text-danger">  ${{number_format($total,2)}}</span></div>
                              @if ($total > 1000)
                              <div>Ramadan Discount: <span class="text-danger">5%</span></div>
                              @else
                              <del>Ramadan Discount: </del>
                              @endif
                              @php
                                if($total > 1000) {
                                    $dtotal = $total * 0.10;
                                    $total = $total - $dtotal;
                                }
                             @endphp
                              <div>Total :  <span class="text-danger">  ${{number_format($total,2)}}</span></div>
                              <a href="#" class="col-12 btn btn-primary">Place Order</a>
                            </div>
                          </div>
                    </div>
                    @endif

                       </div>
                   </div>
               </div>
           </div>
       </div>
</x-main-layout>
