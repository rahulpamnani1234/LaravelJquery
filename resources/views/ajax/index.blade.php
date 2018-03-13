@extends('layouts.app')

@section('content')
@include('ajax.addStudent')
@include('ajax.updateStudent')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                 
                 <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">+ Add Student</button>

                <button id="read-data" class="btn btn-info pull-right btn-xs">Load Data By Ajax</button>
                </div>

                <div class="panel-body">
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
                        
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script type="text/javascript" charset="utf-8">

     $.ajaxSetup({
          headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

     //---------------------------------------------------------
       $('#read-data').on('click', function(){

         $.get("{{ URL::to('students/read-data') }}",function(data){ 

       $('#student-info').empty().html(data);
       
      })
})
//---------------------------------------------------------

   $('#frm-insert').on('submit',function(e){
       
       e.preventDefault();

       var data = $(this).serialize();
       var url = $(this).attr('action');
       var post = $(this).attr('method');
       $.ajax({
       
        type : post,
        url : url,
        data : data,
        dataTy : 'json',
        success:function(data)
        {
                 var tr = $('<tr/>',{
                     id:data.id
                 });
                 tr.append($("<td/>",{
                  text: data.id
                 })).append($("<td/>",{
                  text: data.first_name
                 })).append($("<td/>",{
                  text: data.last_name
                 })).append($("<td/>",{
                  text: data.full_name
                 })).append($("<td/>",{
                  text: data.sex
                 })).append($("<td/>",{
                  
                    html : '<a href="#" class="btn btn-info btn-xs" id="view" data-id="'+ data.id +'">View</a> ' + '<a href="#" class="btn btn-success btn-xs" id="edit" data-id="'+ data.id +'">Edit</a> ' + '<a href="#" class="btn btn-danger btn-xs" id="dele" data-id="'+ data.id +'">Delete</a>'

                 }))

                 $('#student-info').append(tr);
        }
     })
   })

   $('body').delegate('#student-info #dele','click',function(e){
           var id = $(this).data('id');
           $.post('{{ URL::to("students/destroy") }}',{id:id},function(data){
               $('tr#'+id).remove();
           })
   })

   //------------------------Edit Student----------------------------

   $('body').delegate('#student-info #edit','click',function(e){
        var id = $(this).data('id');
        $.get('{{ URL::to("students/edit") }}',{id:id},function(data){
            $('#frm-update').find('#first_name').val(data.first_name);
            $('#frm-update').find('#last_name').val(data.last_name);
            $('#frm-update').find('#sex_id').val(data.sex_id);
            $('#frm-update').find('#id').val(data.id);
            $('#student-update').modal('show');
        })
   })

   //------------------------Update Student------------------------------

   $('#frm-update').on('submit',function(e){
       e.preventDefault();
       var data = $(this).serialize();
       var url = $(this).attr('action');
       $.post(url,data,function(data){
        $('#frm-update').trigger('reset');

        var tr = $('<tr/>',{
            id:data.id
        });
        tr.append($("<td/>",{
         text: data.id
        })).append($("<td/>",{
         text: data.first_name
        })).append($("<td/>",{
         text: data.last_name
        })).append($("<td/>",{
         text: data.full_name
        })).append($("<td/>",{
         text: data.sex
        })).append($("<td/>",{
         
           html : '<a href="#" class="btn btn-info btn-xs" id="view" data-id="'+ data.id +'">View</a> ' + '<a href="#" class="btn btn-success btn-xs" id="edit" data-id="'+ data.id +'">Edit</a> ' + '<a href="#" class="btn btn-danger btn-xs" id="dele" data-id="'+ data.id +'">Delete</a>'

        }))

        $('#student-info tr#'+data.id).replaceWith(tr);

       })
   })
</script>


@endsection
