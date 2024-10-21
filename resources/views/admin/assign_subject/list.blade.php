@extends('layouts.app')
  
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign Subject List</h1>
          </div>
          <div class="col-sm-6" style="text-align:right">
            <a href="{{ url('admin/assign_subject/add') }}" class="btn btn-primary">Add New Assign Subject</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Assign Subject</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="get" action="">
                <div class="card-body">
                  <div class='row'>
                    <div class="form-group col-md-3">
                        <label>Class Name</label>
                        <input type="text" class="form-control" value="{{ Request::get('class_name') }}" name='class_name'  placeholder="Class Name">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Subject Name</label>
                      <input type="text" class="form-control" name='subject_name' value="{{ Request::get('subject_name') }}"  placeholder="Subject Name">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Date</label>
                      <input type="date" class="form-control" name='date' value="{{ Request::get('date') }}" >
                    </div>
                    <div class="form-group col-md-3">
                      <button class='btn btn-primary' type='submit' style='margin-top:30px;'>Search</button>
                      <a href="{{ url('admin/assign_subject/list') }}" class='btn btn-success' type='submit' style='margin-top:30px;'>Clear</a>
                    </div>
                </div>
                </div>

              </form>
            </div>
         

          </div>
          <!--/.col (left) -->
          <!--/.col (right) -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">
            {{-- @include('_message') --}}
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Assign Subject List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Class Name</th>
                      <th>Subject Name</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($getRecord as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->class_name }}</td>
                                <td>{{ $value->subject_name }}</td>
                                <td>
                                
                                      @if ($value->status=='0')
                                        Active
                                      @else
                                        Inactive
                                      @endif
                               
                                </td>
                                <td>{{ $value->created_by_name }}</td>
                                <td>{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                                <td>
                                  <a href="{{ url('admin/assign_subject/edit/'.$value->id) }}" class='btn btn-primary'>Edit</a>
                                  <a href="{{ url('admin/assign_subject/edit_single/'.$value->id) }}" class='btn btn-primary'>Edit Single</a>
                                  <a href="{{ url('admin/assign_subject/delete/'.$value->id) }}" class='btn btn-danger delete-link'>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px;float: right">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
                
               

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-link').forEach(function(deleteLink) {
        deleteLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link action
            const url = deleteLink.getAttribute('href');
            
            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, proceed to the delete URL
                    window.location.href = url;
                }
            });
        });
    });
});

</script>
@if(session('success'))
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}"
        });
    });
    </script>
@endif
@if(session('error'))
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        Toast.fire({
            icon: 'error',
            title: "{{ session('error') }}"
        });
    });
    </script>
@endif