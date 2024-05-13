<x-main-layout>
    
<div class="page-heading">
    <div class="col-12 mx-auto">
        <div class="container">
            <div class="row">
                <div class="bg-light">
                    <div>
                        <img class="col-8" src="{{asset('storage/'.$product->image)}}" alt="">
                    </div>
                    <div class="col-8 mx-auto py-3">
                        <div class="py-3">
                            <h4>{{$product->title}} {{$product->category ? '('.$product->category.')' : null}} {{$product->quantity > 1 ? '('.$product->quantity.' ps)' : null}}</h4>
                            <p>{{$product->description}}</p>
                            <div class="text-danger">$ {{number_format($product->price,2)}}</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between px-3">
                            <ul class="d-flex text-warning">
                                @if ($product->avgReviews())
                                {{$product->avgReviews()}}
                                <li><i class="fa fa-star"></i></li>
                                @endif
                            </ul>
                            <a href="#reviewBox">Reviews ({{$product->reviews()->count()}})</a>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="section-heading py-2">Product Reviews</h3>
                </div>
                <div id="reviewBox">
                    <form action="{{route('add_review',$product)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="rating" class="form-label">Please rate our product out of 5.
                            </label>
                            <div class="mb-3">
                            @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" /><label for="star{{ $i }}" class="text-warning">{{ $i }} <i class="fa fa-star"></i></label>
                                @endfor
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea placeholder="Write something ..." class="form-control" name="text" id="text" cols="30" rows="3"></textarea>
                            @error('text')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                 
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>
                <div class="py-3">
                    @foreach ($product->reviews as $review)
                        <div class="d-flex justify-content-between align-items-center bg-light rounded p-2 px-3 m-1" style="text-align: left">
                            <div>
                                <p>{{substr($review->user->email,0,3)}}****@gmail :</p>
                                <div>{{$review->text}}</div>
                            </div>
                            <ul class="d-flex text-warning">
                                @for ($i = 0; $i < $review->rating; $i++)
                                <li><i class="fa fa-star"></i></li>
                                @endfor
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
            
            </div>
        </div>
</div>
</x-main-layout>