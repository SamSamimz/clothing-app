<div class="happy-clients">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Happy Partners</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-clients owl-carousel">
            @foreach ($partners as $partner)
            <div class="client-item">
              <a target="_blank" href="{{$partner->url}}">
                <img width="20" src="{{asset('storage/'.$partner->logo)}}" alt="1">
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
