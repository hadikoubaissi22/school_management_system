@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Admin</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="" id='editUserForm'>
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name='name' value={{ old('name',$getRecord->name)  }} required placeholder="Name">
                    </div>
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name='email' value={{ old('email',$getRecord->email)  }} required placeholder="Enter email">
                    <div style="color: red;font-weight:bold">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name='password'  placeholder="Password">
                    <p>Do you want to change password so please add new password</p>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    // Handle the form submission
    $('#editUserForm_old').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Show the loader
        showLoader();

        // Perform the AJAX request
        $.ajax({
            url: $(this).attr('action'), // The action URL for the form
            method: 'POST', // The HTTP method for the request
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
             
                // Handle the successful response (e.g., redirecting)
                window.location.href = response.redirect_url || '../list';
            },
            error: function(error) {
                // Handle any errors that may have occurred
                console.error('An error occurred:', error);
            },
            complete: function() {
                // Hide the loader when the request completes
                hideLoader();
            }
        });
    });
});

// Functions to show and hide the loader
function showLoader() {
    $('#loader-overlay').show();
}

function hideLoader() {
    $('#loader-overlay').hide();
}

</script>