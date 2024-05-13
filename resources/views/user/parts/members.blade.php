
    
    <div class="team-members">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Our Team Members</h2>
              </div>
            </div>
            @foreach ($members as $member)     
            <div class="col-md-4">
              <div class="team-member">
                <div class="thumb-container">
                  <img src="{{asset('storage/'.$member->image)}}" alt="">
                  <div class="hover-effect">
                    <div class="hover-content">
                      <ul class="social-icons">
                        @if ($member->facebook)
                        <li><a target="_blank" href="{{$member->facebook}}"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if ($member->twitter)
                        <li><a target="_blank" href="{{$member->twitter}}"><i class="fa fa-twitter"></i></a></li>
                        @endif
                        @if ($member->linkedin)
                        <li><a target="_blank" href="{{$member->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="down-content">
                  <h4>{{$member->name}}</h4>
                  <span>{{$member->title}}</span>
                  <p>{{$member->description}}</p>
                </div>
              </div>
            </div>
            @endforeach
            {{-- <div class="col-md-4">
              <div class="team-member">
                <div class="thumb-container">
                  <img src="assets/images/team_02.jpg" alt="">
                  <div class="hover-effect">
                    <div class="hover-content">
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="down-content">
                  <h4>Karry Pitcher</h4>
                  <span>Product Expert</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-member">
                <div class="thumb-container">
                  <img src="assets/images/team_03.jpg" alt="">
                  <div class="hover-effect">
                    <div class="hover-content">
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="down-content">
                  <h4>Michael Soft</h4>
                  <span>Chief Marketing</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-member">
                <div class="thumb-container">
                  <img src="assets/images/team_04.jpg" alt="">
                  <div class="hover-effect">
                    <div class="hover-content">
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="down-content">
                  <h4>Mary Cool</h4>
                  <span>Product Specialist</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-member">
                <div class="thumb-container">
                  <img src="assets/images/team_05.jpg" alt="">
                  <div class="hover-effect">
                    <div class="hover-content">
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="down-content">
                  <h4>George Walker</h4>
                  <span>Product Photographer</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-member">
                <div class="thumb-container">
                  <img src="assets/images/team_06.jpg" alt="">
                  <div class="hover-effect">
                    <div class="hover-content">
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="down-content">
                  <h4>Kate Town</h4>
                  <span>General Manager</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>