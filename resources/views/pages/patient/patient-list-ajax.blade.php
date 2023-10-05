<table class="table">
  <thead>
    <tr>
      
      <th>{{__('locale.patient_name')}}</th>
      <th>{{__('locale.date')}}</th>
      <th>{{__('locale.time')}}</th>
      <th>{{__('locale.carer_name')}}</th>
      <th>{{__('locale.carer_assigned_by')}}</th>
      <th>{{__('locale.alternate_carer_name')}}</th>
      <th>{{__('locale.action')}}</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($patientscheduleResult))
    @foreach($patientscheduleResult as $user_key => $user_value)
    <tr>
    
    <td>{{$user_value->patientname->name}}</td>
    <td>{{$user_value->date}}</td>
    <td>{{$user_value->time}}</td>
    <td>{{$user_value->carername->name}}</td>
    <td>{{$user_value->role->name}}</td>
    <td>{{$user_value->alternatecarername->name}}</td>
    <!-- <td>
      
      {{ isset($user_value->company[0]->company_name) ? $user_value->company[0]->company_name : '' }}
      
    </td>
    <td>{{($user_value->blocked==1) ? 'Blocked' : 'Un-blocked'}}</td> -->
    
    <!--td>
      @if($editUrl=='company-user-edit')
        @if(in_array('update',Helper::getUserPermissionsModule('company_user')))
        <a href="{{route($editUrl,$user_value->id)}}"><i class="material-icons">edit</i></a>
        @endif
      @else
      <a href="{{route($editUrl,$user_value->id)}}"><i class="material-icons">edit</i></a>
      @endif
      @if($deleteUrl=='company-user-delete')
        @if(in_array('delete',Helper::getUserPermissionsModule('company_user')))
        <a href="{{route($deleteUrl,$user_value->id)}}" onclick="return confirm('Are you sure you want to delete this item')"><i class="material-icons">delete</i></a>
        @endif
      @else
        <a href="{{route($deleteUrl,$user_value->id)}}" onclick="return confirm('Are you sure you want to delete this item')"><i class="material-icons">delete</i></a>
      @endif
    </td-->      
    </tr>
    @endforeach
    @else
    
    <tr>
    <td colspan="10"><p class="center">{{__('locale.no_record_found')}}</p></td>
    </tr>
    @endif
  </tbody>
</table>
@if(isset($patientscheduleResult) && !empty($patientscheduleResult))
{!! $patientscheduleResult->links('panels.paginationCustom') !!}
@endif
