<div class="page-sidebar">
    <!-- .sidebar-header -->
    <header class="sidebar-header d-sm-none">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">
            <a href="#" onclick="Looper.toggleSidebar()">
              <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back
            </a>
          </li>
        </ol>
      </nav>
    </header>
    <!-- /.sidebar-header -->

    <!-- .sidebar-section -->
    <div class="sidebar-section">
      <button type="button" class="close mt-n1 d-none d-xl-none d-sm-block" onclick="Looper.toggleSidebar()" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
        <h4>{{$court->name}} <span class="badge badge-subtle badge-info">{{ ucfirst($court->type) }}</span></h4>
              


      <div class="list-group list-group-bordered list-group-reflow">
        <div class="list-group-item justify-content-between align-items-center">
          <span>Data</span> <span class="text-muted">{{$decision->date}}</span>
        </div>

        <div class="list-group-item justify-content-between align-items-center">
          <span>Processo nº</span> <span class="text-muted">{{$decision->process_number}}</span>
        </div>

        <div class="list-group-item justify-content-between align-items-center">
          <span>Fonte</span> <span class="text-muted"><a href="{{$decision->source}}">{{parse_url($decision->source)['host']}}</a></span>
        </div>

        <div class="list-group-item justify-content-between align-items-center">
          <span>Redator</span> <span class="text-muted">{{$decision->redactor}}</span>
        </div>

      </div>

      <br>
      <div class="alert alert-info alert-dismissible fade show">
      {{$decision->decision}}  
      </div>


    </div>
    <!-- /.sidebar-section -->
  </div>