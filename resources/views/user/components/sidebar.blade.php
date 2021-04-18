<div class="side-bar">

              <!-- widget -->
              <div class="widget">
                <div class="recent-comments">
                  <h2>{{ Auth::User()->name ?? 'Queens Qommunity' }}</h2>
                  <hr class="widget-separator no-margin">
                  
                  <a href="{{ route('user.dashboard') }}">
                    <div class="p-3 @routeis('user.dashboard') active @endrouteis">
                      <h3><i class="fas fa-home"></i> Dashboard</h3>
                    </div>
                  </a>

                  <a href="{{ route('user.index.questions') }}">
                    <div class="p-3 @routeis('user.index.questions') active @endrouteis">
                      <h3><i class="fas fa-info-circle"></i> Questions</h3>
                    </div>
                  </a>

                  <a href="{{ route('user.index.pool') }}">
                    <div class="p-3 @routeis('user.index.pool') active @endrouteis">
                      <h3><i class="fas fa-chart-bar"></i> Pools</h3>
                    </div>
                  </a>
                  
                  <a href="{{ route('user.profile') }}">
                    <div class="p-3 @routeis('user.profile') active @endrouteis">
                      <h3><i class="fas fa-user pr-2"></i> Profile</h3>
                    </div>
                  </a>  
                  
                  <a href="{{ route('logout') }}">
                    <div class="p-3">
                      <h3><i class="fas fa-sign-out-alt"></i> Logout</h3>
                    </div>
                  </a>
                </div>
              </div>