<header class="app-header app-header-dark">
    <div class="top-bar">
        <div class="top-bar-brand">
            <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
            <a href="#">
              <!--img src="{{asset('images/logo/symbol.svg')}}" style="height: 28px"-->
              <img src="{{asset('images/logo/letters.svg')}}" style="height: 28px">
            </a>
        </div>
        <div class="top-bar-list">
            <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
            </div>

            <div class="top-bar-item top-bar-item-full">
              <form class="top-bar-search">
                  <div class="input-group input-group-search dropdown">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                      </div><input id="search-input" type="text" class="form-control" data-toggle="dropdown" aria-label="Procurar" placeholder="Procurar">
                      <div class="dropdown-menu dropdown-menu-rich dropdown-menu-xl ml-n4">
                          <div class="dropdown-arrow ml-3"></div>
                          <div class="dropdown-scroll perfect-scrollbar h-auto" style="max-height: 360px">
                              <div class="list-group list-group-flush list-group-reflow mb-2">
                                  <h6 class="list-group-header d-flex justify-content-between">
                                      <span>Casos</span>
                                  </h6>
                                  <div id="object-list"></div>
                              </div>

                              <div class="list-group list-group-flush list-group-reflow mb-2">
                                  <h6 class="list-group-header d-flex justify-content-between">
                                      <span>Decisões</span>
                                  </h6>
                                  <div id="object-group-list">
                                  </div>
                              </div>

                              <div class="list-group list-group-flush list-group-reflow mb-2">
                                  <h6 class="list-group-header d-flex justify-content-between">
                                      <span>Processos</span>
                                  </h6>
                                  <div id='user-group-list'>
                                  </div>
                                  
                              </div>
                          </div>
                          <!--a href="#" class="dropdown-footer">{{trans('general.show_all_results')}}</a-->
                      </div>
                  </div>
              </form>
          </div>

            <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                

                <div class="dropdown d-flex">
                    <button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="user-avatar user-avatar-md">
                        <img src="{{ asset('images/avatars/profile.jpg') }}" alt="">
                      </span>
                      <span class="account-summary pr-lg-4 d-none d-lg-block">
                        <span class="account-name">John Doe</span>
                        <span class="account-description">Advogado</span>
                      </span>
                    </button>
                    <!-- .dropdown-menu -->
                    <div class="dropdown-menu">
                      <div class="dropdown-arrow ml-3"></div>
                      <h6 class="dropdown-header d-none d-md-block d-lg-none">John Doe</h6>
                      <a class="dropdown-item" href="#"><span class="dropdown-icon fa-solid fa-user"></span> Profile</a>
                      <a class="dropdown-item" href="#"><span class="dropdown-icon fa-solid fa-arrow-right-from-bracket"></span> Logout</a>
                    </div>
                    <!-- /.dropdown-menu -->
                  </div>

                
            </div>
        </div>
    </div>
</header>
