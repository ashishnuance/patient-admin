<body
  class="{{$configData['mainLayoutTypeClass']}} @if(!empty($configData['bodyCustomClass']) && isset($configData['bodyCustomClass'])) {{$configData['bodyCustomClass']}} @endif @if($configData['isMenuCollapsed'] && isset($configData['isMenuCollapsed'])){{'menu-collapse'}} @endif"
  data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

  <!-- BEGIN: Header-->
  <header class="page-topbar" id="header">
    @include('panels.navbar')
  </header>
  <!-- END: Header-->

  <!-- BEGIN: SideNav-->
  @include('panels.sidebar')
  <!-- END: SideNav-->

  <!-- BEGIN: Page Main-->
  <div id="main">
    <div class="row">
      @if ($configData["navbarLarge"] === true)
        @if(($configData["mainLayoutType"]) === 'vertical-modern-menu')
        {{-- navabar large  --}}
        <div
          class="content-wrapper-before @if(!empty($configData['navbarBgColor'])) {{$configData['navbarBgColor']}} @else {{$configData["navbarLargeColor"]}} @endif">
        </div>
        @else
        {{-- navabar large  --}}
        <div class="content-wrapper-before {{$configData['navbarLargeColor']}}">
        </div>
        @endif
      @endif


      @if($configData["pageHeader"] === true && isset($breadcrumbs))
      {{--  breadcrumb --}}
      @include('panels.breadcrumb')
      @endif
      <div class="col s12">
        <div class="container">
          {{-- main page content --}}
          @yield('content')
          {{-- right sidebar --}}
          @include('pages.sidebar.right-sidebar')
          @if($configData["isFabButton"] === true)
            @include('pages.sidebar.fab-menu')
          @endif
        </div>
        {{-- overlay --}}
        <div class="content-overlay"></div>
      </div>
    </div>
  </div>
  <!-- END: Page Main-->


  @if($configData['isCustomizer'] === true)
  <!-- Theme Customizer -->
  @include('pages.partials.customizer')
  <!--/ Theme Customizer -->
  @endif


  {{-- footer  --}}
  @include('panels.footer')
  {{-- vendor and page scripts --}}
  @include('panels.scripts')
</body>

<!-- Logout-Screen -->


<div id="LogoutModal" class="modal fade admin-modal" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-header" style="display:none;"><h6 class="business-name">Logout</h6>
          <button class="modal-close btn">
                <i class="material-icons">close</i>
        </button></div>
      <div class="modal-content">
          <div class="modal-body">
              <div class="InnerContentLogout">

                  <!-- <i class="material-icons">new_releases</i> -->

                  <div class="text-center textStyle">
                      <h3>Are you leaving? </h2>
                          <p>Are you sure you want to logout</p>
                  </div>
                  <div class="Btns">
                  
                      <a href="javascript:void();" class="modal-close btn">Cancel</a>
                      <a href="{{route('logout')}}" class="btn btn-primary btn-theme">Logout</a>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>

<script>
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>

<!-- Logout-Screen-End -->
