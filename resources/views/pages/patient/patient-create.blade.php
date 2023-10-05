{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@include('panels.page-title')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

{{-- page content --}}
@section('content')
<!-- users edit start -->
<div class="section users-edit">
  <div class="card">
    <div class="card-content">
      <!-- <div class="card-body"> -->
      
      <div class="row">
        <div class="col s12" id="account">
          
          <!-- users edit media object ends -->
          <!-- users edit account form start -->
          @include('panels.flashMessages')
          @if(isset($user_result->id))
          <?php //$formUrl = (isset($formUrl) && $formUrl!='') ? $formUrl : 'company-admin-update'; ?>
            <form class="formValidate" action="{{route($formUrl,$user_result->id)}}" id="formValidateCompany" method="post">
            {!! method_field('post') !!}
            @else
            <?php //$formUrl = (isset($formUrl) && $formUrl!='') ? $formUrl : 'company-admin-create'; ?>
          <form id="accountForm"  method="post">
            @endif
            @csrf()
            <div class="row">
            <div class="input-field col s12">

                <select name="patient_id" id="" required>
                <option value="Select" disabled selected>{{__('locale.Select patient id')}} *</option>
                @if(isset($patient) && !empty($patient))
                @foreach($patient as $patient_val)
                
                <option value="{{ $patient_val->id }}" <?php echo(isset($patient_val->id)) ? 'selected="selected"' : '';?>>{{ $patient_val->name }}</option>
                @endforeach
                @endif
                </select>
                @error('company_id')
                <div style="color:red">{{$message}}</div>
                @enderror
            </div> 

                <div class="input-field col m6 s12">
                  <label for="name">{{__('locale.date')}}</label>
                  <input id="name" class="validate" name="date" type="date" data-error=".errorTxt1" value="{{(isset($result->name)) ? $result->name : old('name')}}">
                  <small class="errorTxt1"></small>
                </div>

                <div class="input-field col m6 s12">
                  <label for="name">{{__('locale.time')}}</label>
                  <input id="name" class="validate" name="time" type="time" data-error=".errorTxt1" value="{{(isset($result->name)) ? $result->name : old('name')}}">
                  <small class="errorTxt1"></small>
                </div>

                <div class="input-field col m6 s12">

                <select name="carer_code" id="" required>
                <option value="Select" disabled selected>{{__('locale.Select carer id')}} *</option>
                @if(isset($carer) && !empty($carer))
                @foreach($carer as $carer_val)
                
                <option value="{{ $carer_val->id }}" <?php echo(isset($carer_val->id)) ? 'selected="selected"' : '';?>>{{ $carer_val->name }}</option>
                @endforeach
                @endif
                </select>
                @error('company_id')
                <div style="color:red">{{$message}}</div>
                @enderror
            </div> 

                <div class="input-field col m6 s12">
                  <label for="name">{{__('locale.assign')}}</label>
                  <select name="carer_assigned_by" id="myselect">
                  <!-- <input id="name" class="validate" name="carer_assigned_by" type="text" data-error=".errorTxt1" value="{{auth()->user()->id}}"> -->
                  <?php 
                      foreach ($roles as $role) {
                        
                        ?>
                        <option value="<?php echo $role['id']; ?>">
                          <?php echo $role['name']; ?>
                        </option>
                        <?php 
                      }
                      ?>
                      </select>
                  <small class="errorTxt1"></small>
                </div>

                <div class="input-field col s12">

                <select name="alternate_carer_code" id="" required>
                <option value="Select" disabled selected>{{__('locale.Select alternate carer id')}} *</option>
                @if(isset($carer) && !empty($carer))
                @foreach($carer as $carer_val)
                
                <option value="{{ $carer_val->id }}" <?php echo(isset($carer_val->id)) ? 'selected="selected"' : '';?>>{{ $carer_val->name }}</option>
                @endforeach
                @endif
                </select>
                @error('company_id')
                <div style="color:red">{{$message}}</div>
                @enderror
            </div> 
                




                <!-- <div class="input-field col m12 s12">
                    <select name="Option">
                    <option value="1" disabled selected>{{__('locale.yes')}}</option>
                    <option value="0">{{__('locale.no')}}</option>
                    </select>
                    <label>{{__('locale.Option')}}</label>
                </div> -->
                
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light right submit" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
          </form>
          <!-- users edit account form ends -->
        </div>
      </div>
      <!-- </div> -->
    </div>
  </div>
</div>
<!-- users edit ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
<script src="{{asset('js/scripts/form-validation.js')}}"></script>
<script>
  window.onload=function(){
    var country_value = "{{(isset($user_result->country) && $user_result->country!='NULL') ? $user_result->country : old('country')}}";
    var country_value_edit = "{{(isset($user_result->country) && $user_result->country!='NULL') ? $user_result->country : ''}}";
    var state_value = "{{(isset($user_result->state) && $user_result->state!='NULL') ? $user_result->state : old('state')}}";
    var city_value = "{{(isset($user_result->city) && $user_result->city!='NULL') ? $user_result->city : old('state')}}";
    var company_value = "{{(isset($user_result->company[0]->id) && $user_result->company[0]->id!='NULL') ? $user_result->company[0]->id : old('company')}}";
    console.log(state_value);
    $('#country').val(country_value);
    $('#country').formSelect();
    $('#state').val(state_value);
    $('#state').formSelect();
    $('#city').val(city_value);
    $('#city').formSelect();
    $('#company').val(company_value);
    if(country_value_edit && country_value_edit!=''){
      $('#company').attr('disabled',true);
    }
    $('#company').formSelect();
  }
    $(document).ready(function () {
      

        $('#country').on('change', function () {
            var idCountry = this.value;
            console.log(idCountry);
            $("#state").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        $("#state").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#state').formSelect();
                    $('#city').html('<option value="">Select City</option>');
                }
            });
        });
        $('#state').on('change', function () {
            var idState = this.value;
            $("#city").html('');
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city').html('<option value="">Select City</option>');
                    $.each(res.cities, function (key, value) {
                        $("#city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city').formSelect();
                }
            });
        });
    });
</script>
@endsection