@extends('layout', [
    'pageTitle' => 'Users',
])

@section('main')
    <div class="row">
        <!-- left column -->
        <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">User Create</h3>
                </div>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @include('components.form.input', [
                            'title' => 'Name',
                            'name' => 'name'
                        ])
                        @include('components.form.input', [
                            'title' => 'Email',
                            'name' => 'email',
                            'type' => 'email'
                        ])

                        @include('components.form.select', [
                            'title' => 'Role',
                            'name' => 'role_id',
                            'options' => $roles
                        ])
                        @include('components.form.input', [
                            'title' => 'Phone',
                            'name' => 'phone_number'
                        ])
                        @include('components.form.input', [
                            'title' => 'Position',
                            'name' => 'position'
                        ])
                        @include('components.form.input', [
                            'title' => 'Address',
                            'name' => 'address'
                        ])

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

