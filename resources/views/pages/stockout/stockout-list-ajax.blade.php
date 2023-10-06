<table class="table">
  <thead>
    <tr>
      
      <th>{{__('locale.doc_number')}}</th>
      <th>{{__('locale.date')}}</th>
      <th>{{__('locale.patient_code')}}</th>
      <th>{{__('locale.carer_code')}}</th>
      <th>{{__('locale.inventory_code')}}</th>
      <th>{{__('locale.quantity')}}</th>
      <th>{{__('locale.stock_out_by')}}</th>
      <th>{{__('locale.action')}}</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($stockoutResult))
    @foreach($stockoutResult as $stock_key => $stock_value)
    <tr>
    
    <td>{{$stock_value->doc_no}}</td>
    <td>{{$stock_value->date}}</td>
    <td>{{$stock_value->patientname->name}}</td>
    <td>{{$stock_value->carername->name}}</td>
    <td>{{$stock_value->inventoryname->name}}</td>
    <td>{{$stock_value->quantity}}</td>
    <td>{{$stock_value->stock_out_by}}</td>
    
    
    
    <td>
      @if($editUrl=='stockout-edit')
      <a href="{{route($editUrl,$stock_value->id)}}"><i class="material-icons">edit</i></a>
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
@if(isset($stockResult) && !empty($stockResult))
{!! $stockResult->links('panels.paginationCustom') !!}
@endif

