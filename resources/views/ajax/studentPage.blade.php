    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="student-info">
            <tr>
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
            </tr>
        </tbody>
    </table>
    {{ $students->render() }}