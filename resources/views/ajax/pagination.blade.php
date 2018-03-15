@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pagination</div>
                <div class="panel-body">
                    @include('ajax.studentPage')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
      $(document).on('click','.pagination a',function(e){
         e.preventDefault();
         var page = $(this).attr('href').split('page=')[1];
         readPage(page);
      })

      function readPage(page)
      {
        $.ajax({
            url : '/students/page/ajax?page='+page
        }).done(function(data){
            $('.panel-body').html(data)
            location.hash=page;
        })
      }
    </script>
@endsection