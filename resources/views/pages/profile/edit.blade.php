@extends('layout', [
    'pageTitle' => 'Profile',
])

@section('main')
    <div class="row">
        <!-- left column -->
        <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">User Info Edit</h3>
                </div>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @include('components.form.input', [
                            'title' => 'Name',
                            'name' => 'name',
                            'value' => $user->name,
                        ])
                        @include('components.form.input', [
                            'title' => 'Email',
                            'name' => 'email',
                            'type' => 'email',
                            'value' => $user->email,
                        ])
                        @include('components.form.input', [
                            'title' => 'Phone',
                            'name' => 'phone_number',
                            'value' => $user->phone_number,
                        ])
                        @include('components.form.input', [
                            'title' => 'Position',
                            'name' => 'position',
                            'value' => $user->position,
                        ])
                        @include('components.form.input', [
                            'title' => 'Address',
                            'name' => 'address',
                            'value' => $user->address,
                        ])

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">User Password Edit</h3>
                </div>
                <form action="{{ route('profile.updatepassword') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @include('components.form.input', [
                            'title' => 'Current Password',
                            'name' => 'old_password',
                            'type' => 'password',
                        ])
                        @include('components.form.input', [
                            'title' => 'New Password',
                            'name' => 'password',
                            'type' => 'password',
                        ])
                        @include('components.form.input', [
                            'title' => 'New Password Confirmation',
                            'name' => 'password_confirmation',
                            'type' => 'password',
                        ])

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
