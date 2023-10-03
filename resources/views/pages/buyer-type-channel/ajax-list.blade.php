<table class="table">
   <thead>
     <tr>
        <th data-field="s.no">{{__('locale.S.no')}}</th>
        <th data-field="name">{{__('locale.name')}}</th>
        <th data-field="company_name">{{__('locale.company_name')}}</th>

        <th data-field="action">{{__('locale.action')}}</th>
     </tr>
   </thead>
   <tbody>
        @if(isset($buyer_typechannel_List) && !empty($buyer_typechannel_List))
        @foreach($buyer_typechannel_List as $key => $buyer_typechannel_data)

        <tr>
            <td>{{$key+1}}</td>
            <td>{{$buyer_typechannel_data->name}}</td> <!-- Handle empty data -->
            <td>{{$buyer_typechannel_data->companyname->company_name}}</td>

            <td>
              
              @if($editUrl=='buyer-type-channel.edit')
                  @if(in_array('update',Helper::getUserPermissionsModule('buyer_type_channel')))
                  <a href="{{route($editUrl,$buyer_typechannel_data->id)}}"><i class="material-icons">edit</i></a>
                  @endif
              @else
              <a href="{{route($editUrl,$buyer_typechannel_data->id)}}"><i class="material-icons">edit</i></a>
              @endif
              @if($deleteUrl=='buyer-type-channel.delete')
                  @if(in_array('delete',Helper::getUserPermissionsModule('buyer_type_channel')))
                  <a href="{{route($deleteUrl,$buyer_typechannel_data->id)}}" onclick="return confirm('Are you sure?')"><i class="material-icons">delete</i></a>
                  @endif
              @else
              <a href="{{route($deleteUrl,$buyer_typechannel_data->id)}}" onclick="return confirm('Are you sure?')"><i class="material-icons">delete</i></a>
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

@if(isset($buyer_typechannel_List) && !empty($buyer_typechannel_List))
{!! $buyer_typechannel_List->links('panels.paginationCustom') !!}
@endif