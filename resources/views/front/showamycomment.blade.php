@extends('layouts.front')

@section('title')

     My Post
@endsection



@section('contentheader')
    My Post
@endsection

@section('contentheaderlink')

<a href="{{route('front.dashboard')}}">Home </a>
@endsection


@section('contentheaderactive')
    My Post
@endsection



@section('contentheader')

@endsection


@section('content')

@section('content')

<div class="row">
  <div class="col-12">


      <div class="card">
          <div class="card-header">
              <h3 class="card-title">DataTable My Comment</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
               
                  <div class="row">
                      <div class="col-sm-12">
                          <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                              aria-describedby="example1_info">
                              <thead>
                                  <tr role="row">
                                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                          colspan="1" aria-sort="ascending"
                                          aria-label="Rendering engine: activate to sort column descending"
                                          style="width: 87.4531px;">Username</th>
                                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                          colspan="1" aria-label="Browser: activate to sort column ascending"
                                          style="width: 89.3906px;">Body</th>
                                      
                                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                          colspan="1"
                                          aria-label="Engine version: activate to sort column ascending"
                                          style="width: 66.875px;">created_at</th>
                                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                          colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                          style="width: 48.75px;">Updated_at</th>
                                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                          colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                          style="width: 48.75px;">Show</th>


                              </thead>
              <tbody>
                @if (isset($comments) && $comments->count() > 0)
                @foreach ($comments as $item)
                    <tr>
                        <td>{{ $item->user->username }}</td>
                        
                        <td>
                            {{ $item->comment }}
                            
                        </td>
                        
                        <td>{{ $item->created_at }}</td>
                        @if (isset($item->updated_at ) && $item->updated_at  !== null)
                        <td>{{ $item->updated_at }}</td>
                        @else
                        <td>no update yet </td>
                        @endif
                        <td><a href="{{ route('front.showsingelpost', $item->post_id) }}" class="ml-2">
                            <i class="fas fa-eye"></i> 
                        </a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">No Comments found.</td>
                </tr>
            @endif
            

                    
              
              </tbody>
            
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

       
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->



@endsection

@section('script')
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>

<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('assets/admin/dist/js/demo.js')}}"></script>

@endsection