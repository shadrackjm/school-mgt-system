@extends('layout/parent-layout')
@section('main-part')
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/parent/home">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2 class="text-uppercase">{{ $parent_data->fname}} {{$parent_data->mname}} {{$parent_data->lname}}</h2>
              <h3>Parent</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">My Student(s)</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8 text-capitalize">{{$parent_data->fname}} {{$parent_data->mname}} {{$parent_data->lname}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">+255 {{$parent_data->phone_number}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$parent_data->email}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profile-img.jpg" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fname" type="text" class="form-control" id="fullName" value="{{$parent_data->fname}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="mname" type="text" class="form-control" id="fullName" value="{{$parent_data->mname}}">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="lname" type="text" class="form-control" id="fullName" value="{{$parent_data->lname}}">
                        </div>
                      </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="{{$parent_data->phone_number}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{$parent_data->email}}">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- student Details -->
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">Student Details</h5>
                    @foreach ($student_data as $item)
                        <hr>
                    <div class="row">
                      <div class="col-lg-3 col-md-5 label text-nowrap">Full Name</div>
                      <div class="col-lg-9 col-md-7 text-capitalize text-nowrap">{{$item->firstname}} {{$item->middlename}} {{$item->lastname}}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-5 label text-nowrap">Registration Number</div>
                      <div class="col-lg-9 col-md-7"> {{$item->registration_number}}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-5 label text-nowrap">Form</div>
                      <div class="col-lg-9 col-md-7">{{$item->form}}</div>
                    </div>
  
                    <div class="row">
                        <div class="col-lg-3 col-md-5 label text-nowrap">Stream</div>
                        <div class="col-lg-9 col-md-7">{{$item->stream}}</div>
                      </div>
                      
                      <div class="row">
                        <div class="col-lg-3 col-md-5 label text-nowrap">Category</div>
                        <div class="col-lg-9 col-md-7">{{$item->category ?? '-'}}</div>
                      </div>
                      @endforeach
    
                  </div>
                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection