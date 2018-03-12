<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student List</title>
	<style type="text/css" media="screen">
	table
	{
		width: 100%;
		border-collapse: collapse;
		text-align: left;
	}	
	table td,th
	{
		border: 2px solid;
	}
	</style>
</head>
<body>
   <h1>Student List</h1>
   <hr>
   <table>
   	<thead>
   		<tr>
   			<th>ID</th>
   			<th>First Name</th>
   			<th>Last Name</th>
   			<th>Full Name</th>
   			<th>Gender</th>
   			<th><a href="{{ URL::to('students/insert') }}">+ Add Student</a></th>
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
</body>
</html> 