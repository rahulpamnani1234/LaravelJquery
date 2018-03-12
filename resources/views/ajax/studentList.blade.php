@foreach($students as $value)
        <tr id="{{$value->id}}">
        	<td>{{ $value->id }}</td>
        	<td>{{ $value->first_name }}</td>
        	<td>{{ $value->last_name }}</td>
        	<td>{{ $value->full_name }}</td>
        	<td>{{ $value->sex }}</td>
        	<td>
        		 <a href="#" class="btn btn-info btn-xs" id="view" data-id="{{ $value->id }}">View</a>
        		 <a href="#" class="btn btn-success btn-xs" id="edit" data-id="{{ $value->id }}">Edit</a>
        		 <a href="#" class="btn btn-danger btn-xs" id="dele" data-id="{{ $value->id }}">Delete</a>
        	</td>
        </tr>
@endforeach