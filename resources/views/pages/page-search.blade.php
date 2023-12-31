{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Search Page')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-search.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div id="search-page" class="section">
  <div class="row">
    <div class="col s12">
      <div id="search-wrapper" class="search card z-depth-0 center-align">
        <div class="card-content pb-0 pl-1 pr-1">
          <div class="input-field col s12">
            <h5>Website search results</h5>
            <input placeholder="Search" id="first_name" type="text" class="search-box validate white search-circle">
          </div>
          <div class="row">
            <div class="col m8 s12 pl-0">
              <ul class="tabs tabs-style">
                <li class="tab tab-style col s4"><a class="active" href="#test1"> Website</a></li>
                <li class="tab tab-style col s4"><a href="#test2"> Images</a></li>
                <li class="tab tab-style col s4"><a href="#test3"> Video</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <h6>Related to your search results (3)</h6>
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-1">
            <div class="card-content">
              <p class="mb-2">About 62,00,000 results (0.40 seconds)</p>
              <div class="row">
                <div class="col l8 m12 mb-5">
                  <div class="result">
                    <h6><a href="#">Admin by Paitent Care</a></h6>
                    <p class="teal-text lighten-2">
                      https://themeforest.net/item/materialize-material-design-admin-template</p>
                    <p>Rating: 5 star - 128 reviews - US $24.00 In stak</p>
                    
                  <div class="row mt-3">
                    <div class="col l6 m12">
                      <p>Layout‎: ‎<span class="teal-text lighten-2">Responsive</span></p>
                      <p>ThemeForest Files Included‎: ‎<span class="teal-text lighten-2">HTML Files‎, ‎CSS</span></p>
                      <p>Author:PIXINVENT</p>
                    </div>
                    <div class="col l6 m12">
                      <p>Created‎: ‎<span class="teal-text lighten-2">20 May 15</span></p>
                      <p>Documentation‎: <span class="teal-text lighten-2">‎Well Documented</span></p>
                    </div>
                  </div>
                  <h6 class="mt-3">Videos</h6>
                  <div class="row video">
                    <div class="col l4 m4 s12 p-3">
                      <div class="row">
                        <div class="col s12">
                          <div class="card z-depth-0 grey lighten-4 border-radius-6">
                            <div class="card-image">
                              <img src="{{asset('images/gallery/18.png')}}" class="responsive-img" alt="">
                            </div>
                            <div class="card-content">
                              Materialize is a Material Design Admin Template.
                              <p class="teal-text lighten-2 truncate">www.youtube.com</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col l4 m4 s12">
                      <div class="row">
                        <div class="col s12">
                          <div class="card z-depth-0 grey lighten-4 border-radius-6">
                            <div class="card-image">
                              <img src="{{asset('images/gallery/19.png')}}" class="responsive-img" alt="">
                            </div>
                            <div class="card-content">
                              Materialize admin is super flexible, powerful, clean.
                              <p class="teal-text lighten-2 truncate">www.youtube.com</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col l4 m4 s12">
                      <div class="row">
                        <div class="col s12">
                          <div class="card z-depth-0 grey lighten-4 border-radius-6">
                            <div class="card-image">
                              <img src="{{asset('images/gallery/20.png')}}" class="responsive-img" alt="">
                            </div>
                            <div class="card-content">
                              Materialize admin includes 8 pre-built templates.
                              <p class="teal-text lighten-2 truncate">www.youtube.com</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="result mt-5">
                   
                    <p class="teal-text lighten-2">
                      https://themeforest.net/item/materialize-material-design-admin-template</p>
                    <p>Materialize. #1 Selling & Most Popular Material Design Admin Template of All Time. Join The
                      2,500+ Satisfied Customers Today.</p>
                  </div>
                  <div class="result mt-5">
                    <h6><a href="#">Showcase - Materialize</a></h6>
                    <p class="teal-text lighten-2">https://materializecss.com/showcase.html</p>
                    <p>Material Admin Template Universal Dashboard Capture and archive website.</p>
                  </div>
                  <div class="result mt-5">
                    <h6><a href="#">Materialize Admin Template - PIXINVENT</a></h6>
                    <p class="teal-text lighten-2">pixinvent.com/materialize-v1.0/layout-fullscreen.html</p>
                    <p>My Task. March 26, 2015. Create Mobile App UI. Today Mobile App.</p>
                  </div>
                  <div class="result mt-5">
                    <div class="row">
                      <div class="col s12 m3 l3">
                        <img class="responsive-img mt-4 p-3 border-radius-6" src="{{asset('images/gallery/37.png')}}"
                          alt="">
                      </div>
                      <div class="col s12 m9 l9">
                        <h6><a href="#">Materialize Admin Template - PIXINVENT</a></h6>
                        <p class="teal-text lighten-2">pixinvent.com/materialize-v1.0/layout-fullscreen.html</p>
                        <p>Materialize is a Material Design Admin Template is the excellent responsive google material
                          design inspired multipurpose admin template.</p>
                      </div>
                    </div>
                  </div>
                  <div class="result mt-5">
                    <h6><a href="#">RockOn Materialize css Admin Template Dashboard</a></h6>
                    <p class="teal-text lighten-2">pixinvent.com/materialize-v1.0/layout-fullscreen.html</p>
                    <p>Materialize css, Material Design Admin Template is the excellent responsive.</p>
                  </div>
                </div>
                <div class="col l4 m12 right-content border-radius-6 mb-5">
                  <h5 class="mt-0">Materialize Admin</h5>
                  <p>Material Design Admin Template by PIXINVENT</p>
                  <img class="responsive-img mt-4 p-3 border-radius-6" src="{{asset('images/gallery/34.png')}}" alt="">
                  <p class="mt-2 mb-2">Materialize is a Material Design Admin Template is the excellent responsive
                    google material design inspired multipurpose admin template.</p>
                  <hr>
                  <p class="mt-2"><b class="blue-grey-text text-darken-4">Files Included:</b> HTML Files, CSS Files</p>
                  <p class="mt-2"><b class="blue-grey-text text-darken-4">Layout:</b> Responsive</p>
                  <p class="mt-2"><b class="blue-grey-text text-darken-4">Created:</b> 20 May 15</p>
                  
                  <p class="mt-5"><a href="#">Themeforest - $24</a></p>
                </div>
              </div>
              <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active waves-effect border-radius-5"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection