@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard <p style="float:right;"><a href="{{ URL::to('students/insert') }}">+ Add Student</a></p></div>
                

                <div class="panel-body">
                    <table id="table_id">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $stu)
                            <tr>
                                <td>{{ $stu->id }}</td>
                                <td>{{ $stu->first_name }}</td>
                                <td>{{ $stu->last_name }}</td>
                                <td>{{ $stu->full_name }}</td>
                                <td>{{ $stu->sex }}</td>
                                <td><a href="{{ URL::to('students/edit',$stu->id) }}">Edit</a> | <a href="{{ URL::to('students/delete',$stu->id) }}" onclick="return confirm('Are You Sure To Delete?')">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
@endsection
