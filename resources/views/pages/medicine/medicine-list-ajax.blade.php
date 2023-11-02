<table class="table">
  <thead>
    <tr>
      <th>{{__('locale.s.no')}}</th>
      <th>{{__('locale.name')}}</th>
      <th>{{__('locale.care_home_code')}}</th>
      <th>{{__('locale.quantity')}}</th>
      <th>{{__('locale.action')}}</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($medicineResult) && !empty($medicineResult->items()))
    @foreach($medicineResult as $user_key => $user_value)
    <tr>
    <td>{{$user_key+1}}</td>
    <td>{{$user_value->medicine_name}}</td>
    @if(isset($user_value->comp->company_name) && $user_value->comp->company_name!='')
    <td>{{$user_value->comp->company_name}}</td>
    @endif
    <td>{{$user_value->quantity}}</td>
    
    
    
    <td>
      @if($editUrl=='medicine-edit')
        
      <a href="{{route($editUrl,$user_value->id)}}"><i class="material-icons">edit</i></a>
      @endif
      @if($deleteUrl=='medicine-delete')
      <a href="{{route($deleteUrl,$user_value->id)}}" onclick="return confirm('Are you sure you want to delete this item')"><i class="material-icons">delete</i></a>
      @endif
    </td>      
    </tr>
    @endforeach
    @else
    
    <tr>
    <td colspan="10"><p class="center">{{__('locale.no_record_found')}}</p></td>
    </tr>
    @endif
  </tbody>
</table>
@if(isset($medicineResult) && !empty($medicineResult))
{!! $medicineResult->links('panels.paginationCustom') !!}
@endif