@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@include('panels.page-title')

{{-- vendor style --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div class="section">
  <div class="card">
    
  </div>

  <!-- HTML VALIDATION  -->


  <div class="row">
    <div class="col s12">
    @include('panels.flashMessages')

      <div id="validations" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                
              </div>
            </div>
          </div>
          <div id="view-validations">
         
          <form class="formValidate" method="post" action="{{ isset($mappingResult) ? route($formUrl,$mappingResult[0]->id) : route($formUrl) }}">

            @csrf

              @if(isset($mappingResult[0]))
                  @method('PUT') <!-- Use PUT for updating -->
              @endif

            

              <div class="input-field col s12">

                 <select name="decease_id" id="" required>
                  <option value="Select" disabled selected>{{__('locale.Select disease')}} *</option>
                  @if(isset($deceaseResult) && !empty($deceaseResult))
                  @foreach($deceaseResult as $decease_val)
                  
                  <option value="{{ $decease_val->id }}" <?php echo(isset($decease_val->id)) ? 'selected="selected"' : '';?>>{{ $decease_val->code }}</option>
                    @endforeach
                  @endif
                </select>
                @error('company_id')
                <div style="color:red">{{$message}}</div>
                @enderror
             </div>             
              <?php //echo '<pre>';print_r($productIds); exit(); ?>

              <div class="input-field col s12">

                 <select name="inventory_id" id="" required>
                  <option value="Select" disabled selected>{{__('locale.Select inventory')}} *</option>
                  @if(isset($inventoryResult) && !empty($inventoryResult))
                  @foreach($inventoryResult as $inventory_val)
                  
                  <option value="{{ $inventory_val->id }}" <?php echo(isset($inventory_val->id)) ? 'selected="selected"' : '';?>>{{ $inventory_val->code }}</option>
                    @endforeach
                  @endif
                </select>
                @error('company_id')
                <div style="color:red">{{$message}}</div>
                @enderror
             </div>  
           
                          
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light right submit" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>

             


            </form>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('page-script')
<script>
window.onload=function(){
    var company_value = "{{(isset($mappingResult[0]->company_id) && $mappingResult[0]->company_id!='NULL') ? $mappingResult[0]->company_id : old('company_id')}}";
    console.log('company_value',company_value);
    $('#company').val(company_value);
    $('#company').formSelect();
  }
  </script>
@endsection

