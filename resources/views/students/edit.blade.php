<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Edit</title>
</head>
<body>
   <h1>Edit Student</h1>
   <hr>
   <form action="{{ URL::to('/students/update') }}" method="POST">
   	    {{ csrf_field() }}
   	    <input type="hidden" name="id" value="{{ $id }}">
   	   	<table> 
               <tr>
               	     <td>First Name</td>
                     <td>
                     	<input type="text" name="first_name" value="{{ $student->first_name }}" placeholder="">
                     </td>
               </tr>
               <tr>
               	     <td>Last Name</td>
                     <td>
                     	<input type="text" name="last_name" value="{{ $student->last_name }}" placeholder="">
                     </td>
               </tr>
               <tr>
               	     <td>Gender</td>
                     <td>
                         <select name="sex_id" required>
                         	<option value="">-------------------------</option>
                         	@foreach($sexes as $sex)
                         	   <option value="{{ $sex->id }}" {{ $student->sex_id==$sex->id? 'selected' : null }}>{{ $sex->sex }}</option>
                         	@endforeach
                         </select>
                     </td>
               </tr>
               <tr>
                     <td>
                        <input type="submit" name="" value="Update"> 
                     </td>
               </tr>
   	   	</table>	
   </form>
</body>
</html> 