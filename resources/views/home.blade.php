@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Intrebari</h5>
                <div style="overflow-x:auto;">
                <table id="table_id" class="table table-striped table-bordered ">
                        
                    <thead>
                    <tr>
                        <th style="width: 1%">#</th>
                        <th scope="col">Intrebare</th>
                        <th scope="col">Raspuns</th>
                        <th scope="col">Raspuns</th>
                        <th scope="col">Raspuns</th>
                        <th scope="col">Corect</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                  @foreach ($quiz as $q)   
                    <tr>
                        <td>{{$q->ID}}</td>
                        <td>{{$q->Intrebare}}</td>
                        <td>{{$q->Raspuns1}}</td>
                        <td>{{$q->Raspuns2}}</td>
                        <td>{{$q->Raspuns3}}</td>
                        <td>{{$q->Corect}}</td>
                        <td><button class="btn btn-info" data-toggle="modal" data-target=".edit{{$q->ID}}"><i class="fa fa-edit"></i></button>
                            <div class="modal fade edit{{$q->ID}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form action="{{route('edit')}}" method="POST">
                                                @csrf
                                                <center><h2>Editati intrebarea: {{$q->Intrebare}}</h2></center>
                                                <center><p>Completati toate casutele.</p></center>
                                                <hr>
                                                <input type="hidden" name="id" value="{{$q->ID}}">
                                                <label for="name"><b>Intrebare</b></label>
                                                <input type="text"  class="form-control" placeholder="Introduceti Intrebarea" value="{{$q->Intrebare}}" name="intrebare" required>
        
                                            
                                                <label for="r1"><b>Raspuns</b></label>
                                                <input type="text"  class="form-control" placeholder="Introduceti Raspuns-ul" value="{{$q->Raspuns1}}" name="r1" required>
        
        
                                                <label for="r3"><b>Raspuns</b></label>
                                                <input type="text"  class="form-control" placeholder="Introduceti Raspuns-ul" value="{{$q->Raspuns2}}" name="r2" required>
        
                                                 <label for="r3"><b>Raspuns</b></label>
                                                <input type="text"  class="form-control" placeholder="Introduceti Raspuns-ul" value="{{$q->Raspuns3}}" name="r3" required>

                                                <label for="cor"><b>Corect</b></label>
                                                <input type="text"  class="form-control" placeholder="Introduceti Raspuns-ul" value="{{$q->Corect}}" name="cor" required>

                                                <br>
                                                <center><button type="submit" class="btn btn-success">Edit</button></center>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div></td>
                    </tr>
                 @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th scope="col">Intrebare</th>
                            <th scope="col">Raspuns</th>
                            <th scope="col">Raspuns</th>
                            <th scope="col">Raspuns</th>
                            <th scope="col">Corect</th>
                            <th style="width: 1%">Edit</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
                </div>
            </div>
        </div>
</div>
<script>           
$(document).ready(function(){
$('#table_id tfoot th').each(function (){
    var title = $(this).text();
    if(title=="#")
    {
  
    }else if (title=="Edit")
    {

    }
    else
    {
        $(this).html('<input type="text" placeholder="'+title+'" />');
    }
});
var table =$('#table_id').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    
                    className: 'btn btn-info',
                            exportOptions: {
                        columns: [ 0, 1, 2,3,4,5]
                }   
                },
                {
                    extend: 'csvHtml5',
                    className: 'btn btn-info',
                            exportOptions: {
                                columns: [ 0, 1, 2,3,4,5]
                }   
                },
                {
                    extend: 'pdfHtml5',
                    messageTop: 'All customer from database.',
                    className: 'btn btn-info',
                            exportOptions: {
                                columns: [ 0, 1, 2,3,4,5]
                }   
                },
                {
                    extend: 'print',
                    className: 'btn btn-info',
                            exportOptions: {
                                columns: [ 0, 1, 2,3,4,5]
                }   
                }
            ],
            "paging":   true,
            "ordering": true,
            "info":     true,
        });
    table.columns().every( function () {
    var that = this;
    $('input',this.footer() ).on('keyup change', function () {
        if ( that.search() !== this.value ){
            that
                .search(this.value)
                .draw();
        }
    });
} );
});
</script>
</div>
@endsection
