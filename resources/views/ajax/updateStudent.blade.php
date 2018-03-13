<style type="text/css">
   
    .modal-body {
     height: 267px !important;
     }  
 </style>
 <!-- Modal -->
   <div class="modal fade" id="student-update" role="dialog">
     <div class="modal-dialog">
     
       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">New Student</h4>
         </div>
 
         <form action="{{ URL::to('students/update') }}" method="POST" id="frm-update" accept-charset="utf-8">
         <div class="modal-body">
           
          <div class="col-md-12">
             <div class="form-group">
               <label>First Name</label>
               <input class="form-control" type="hidden" name="id" id="id">
               <input class="form-control" type="text" name="first_name" id="first_name">
             </div>
           </div>
 
           <div class="col-md-12">
             <div class="form-group">
               <label>Last Name</label>
               <input class="form-control" type="text" name="last_name" id="last_name">
             </div>
           </div>
 
           <div class="col-md-12">
             <div class="form-group">
               <label>Gender</label>
               <select class="form-control" id="sex_id" name="sex_id">
 
                 <option value="">---------------</option>
                 @foreach($sexes as $key => $sex)
                     <option value="{{ $key }}">{{ $sex }}</option>
                 @endforeach
               </select>
             </div>
           </div>
 
         </div>
         <div class="modal-footer">
           <input type="submit" class="btn btn-success pull-left" value="Update">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </form>
         </div>
       </div>
       </div>
       
     </div>