@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Coaches</h2>
    <br>
    <table id="example" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>

    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $('#example').DataTable( {
            serverSide: true,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/data_coaches',
                dataType : 'json',
                type: 'get',
            },
            columns: [
                { data: 'id' },
                { data: 'name' },
                {
                    mRender: function (data, type, row) {
                        return '<a href="/coaches/'+row.id+'/edit" class=" btn btn-success" data-id="' + row.id + '" style="margin-left:10px;"><i class="fa fa-edit"></i><span>Edit</span></a> <form style="display:inline" method="POST" action="coaches/'+row.id+'">@csrf   {{ method_field('DELETE')}}<button type="submit" onclick="return myFunction();" class="btn btn-xs btn-danger"><i class="fa fa-times"></i>Delete</button></form>'
                    }
                },
              
            ],
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
        } );
        /*------------------------------------------------------*/

//confirm deleting 
function myFunction(){
    var agree = confirm("Are you sure you want to delete this Coach?");
    if(agree == true){
      return true
    } else {
      return false;
     }
  }

    </script>
  
    <a class="btn btn-info" href="{{route('coaches.create')}}"><i class="fa fa-plus"></i><span>Add New Coach</span></a>

</div>

@endsection
