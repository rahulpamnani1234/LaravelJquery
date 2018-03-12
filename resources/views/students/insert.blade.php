<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Insert</title>
	<style type="text/css">
		html,body
		{
			 width: 700px;
			 margin: 0 auto;
		}
		table
		{
			width: 100%;
		}
	</style>
</head>
<body>
   <h1>New Student</h1>
   <hr>
   <form action="{{ URL::to('/students/save') }}" method="POST">
   	    {{ csrf_field() }}

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif

   	   	<table> 
               <tr>
               	     <td>First Name</td>
                     <td>
                     	<input type="text" name="first_name" placeholder="">
                     </td>
               </tr>
               <tr>
               	     <td>Last Name</td>
                     <td>
                     	<input type="text" name="last_name" placeholder="">
                     </td>
               </tr>
               <tr>
               	     <td>Gender</td>
                     <td>
                         <select name="sex_id">
                         	<option value="">-------------------------</option>
                         	@foreach($sexes as $sex)
                         	   <option value="{{ $sex->id }}">{{ $sex->sex }}</option>
                         	@endforeach
                         </select>
                     </td>
               </tr>
               <tr>
                     <td>
                        <input type="submit" name="" value="Submit"> 
                     </td>
               </tr>
   	   	</table>	
   </form>
</body>
</html>