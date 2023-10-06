<table class="table">
  <thead>
    <tr>
      
      <th>{{__('locale.doc_number')}}</th>
      <th>{{__('locale.date')}}</th>
      <th>{{__('locale.supplier_code')}}</th>
      <th>{{__('locale.inventory_name')}}</th>
      <th>{{__('locale.quantity')}}</th>
      <th>{{__('locale.rate')}}</th>
      <th>{{__('locale.stock_in_by')}}</th>
      <th>{{__('locale.supplier_doc_no')}}</th>
      <th>{{__('locale.action')}}</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($stockResult))
    @foreach($stockResult as $stock_key => $stock_value)
    <tr>
    
    <td>{{$stock_value->doc_no}}</td>
    <td>{{$stock_value->date}}</td>
    <td>{{$stock_value->supplier_code}}</td>
    <td>{{$stock_value->inventoryname->name}}</td>
    <td>{{$stock_value->quantity}}</td>
    <td>{{$stock_value->rate}}</td>
    <td>{{$stock_value->stock_in_by}}</td>
    <td>{{$stock_value->supplier_doc_no}}</td>
    
    
    <td>
      @if($editUrl=='stockin-edit')
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

