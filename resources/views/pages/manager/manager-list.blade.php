{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@include('panels.page-title')

{{-- vendors styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

{{-- page content --}}
@section('content')
<!-- users list start -->
<section class="users-list-wrapper section">
  
  
  <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <!-- datatable start -->
          <div class="col s12 m6 l3">
            <div class="input-field">
              <label for="serach">{{__('locale.Search')}}</label>
              <input id="serach" type="text" name="serach" data-error=".errorTxt12">
            </div>
          </div>
          <div class="col s12 m6 l6 add-btn" style="text-align:end;margin-left:232px;">
                  <div class="btn">
                    <a href="{{route('admin-manager-create')}}">
                    <i class="material-icons">add</i>
                    <span>Add New</span>
                    </a>
                  </div>
                </div>
          <!-- <a class="btn waves-effect waves-light right" href="{{route('company-user-export',[$userType])}}">{{__('locale.export_users')}}
                <i class="material-icons right"></i>
            </a> -->
        <div class="responsive-table table-result">
          @include('pages.manager.manager-list-ajax')
          
        </div>
        <input type="hidden" name="hidden_page" id="hidden_page" value="{{(isset($currentPage) && $currentPage>0) ? $currentPage : 1}}" />
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
<script>
  $(document).ready(function(){
    var paginationUrl = '{{(isset($paginationUrl) && $paginationUrl!='') ? route($paginationUrl) : route("admin.manager-list") }}';
    const fetch_data = (page, status, seach_term) => {
        if(status === undefined){
            status = "";
        }
        if(seach_term === undefined){
            seach_term = "";
        }
        $.ajax({ 
            url: paginationUrl+"?page="+page+"&status="+status+"&seach_term="+seach_term,
            success:function(data){
              console.log(data);
                $('.table-result').html('');
                $('.table-result').html(data);
            }
        })
    }

    $('body').on('keyup', '#serach', function(){
        var status = $('#status').val();
        var seach_term = $('#serach').val();
        var page = $('#hidden_page').val();
        fetch_data(page, status, seach_term);
    });

    $('body').on('change', '#users-list-status', function(){
        var status = $('#users-list-status').val();
        var seach_term = $('#serach').val();
        var page = $('#hidden_page').val();
        fetch_data(page, status, seach_term);
    });

    $('body').on('click', '.pager a', function(event){
        console.log('ssss');
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var serach = $('#serach').val();
        var seach_term = $('#status').val();
        fetch_data(page,status, seach_term);
    });
});
</script>
@endsection