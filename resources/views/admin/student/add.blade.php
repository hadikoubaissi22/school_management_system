@extends('layouts.app')
  
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Student</h1>
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
              <!-- /.card-headzer -->
              <!-- form start -->
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>First Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name='name' required placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Last Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control" value="{{ old('last_name') }}" name='last_name' required placeholder="Last Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Admission Number<span style="color: red">*</span></label>
                            <input type="text" class="form-control" value="{{ old('admission_number') }}" name='admission_number' required placeholder="Admission number">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Roll Number</label>
                            <input type="text" class="form-control" value="{{ old('roll_number') }}" name='roll_number'  placeholder="Roll number">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Class<span style="color: red">*</span></label>
                            <select class='form-control' name='class_id' required>
                                <option value=''>Select Class</option>
                                @foreach ($getClass as $value)
                                <option value='{{ $value->id }}'>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gender<span style="color: red">*</span></label>
                            <select class='form-control' name='gender' required>
                                <option value=''>Select Gender</option>
                                <option value='Male'>Male</option>
                                <option value='Female'>Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date of birth<span style="color: red">*</span></label>
                            <input type="date" class="form-control" value="{{ old('date_of_birth') }}" name='date_of_birth'>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Cast<span style="color: red">*</span></label>
                            <input type="text" class="form-control" value="{{ old('cast') }}" name='cast' required placeholder="Cast">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Religion<span style="color: red">*</span></label>
                            <input type="text" class="form-control" value="{{ old('religion') }}" name='religion' required placeholder="Religion">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Mobile Number<span style="color: red">*</span></label>
                            <input type="text" class="form-control" value="{{ old('mobile_number') }}" name='mobile_number' required placeholder="Mobile number">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Admission Date<span style="color: red">*</span></label>
                            <input type="date" class="form-control" value="{{ old('admission_date') }}" name='admission_date' required placeholder="Admission Date">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Profile Pic</label>
                          <input type="file" class="form-control" name='profile_pic'>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Blood Group<span style="color: red">*</span></label>
                          <input type="text" class="form-control" value="{{ old('blood_group') }}" name='blood_group'>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Height<span style="color: red">*</span></label>
                          <input type="text" class="form-control" value="{{ old('height') }}" name='height'>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Weight<span style="color: red">*</span></label>
                          <input type="text" class="form-control" value="{{ old('weight') }}" name='weight'>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Status<span style="color: red">*</span></label>
                          <select class='form-control' name='status' required>
                              <option value=''>Select Status</option>
                              <option value='0'>Active</option>
                              <option value='1'>Inactive</option>
                          </select>
                      </div>
                    </div>

                    
                  <hr/>
                  <div class="form-group">
                    <label>Email address<span style="color: red">*</span></label>
                    <input type="email" class="form-control" name='email' value="{{ old('email') }}" required placeholder="Enter email">
                    <div style="color: red;font-weight:bold">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Password<span style="color: red">*</span></label>
                    <input type="password" class="form-control" name='password' required placeholder="Password">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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