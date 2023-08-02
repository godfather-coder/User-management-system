@extends('layout', [
    'pageTitle' => 'Users',
])

@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="btn-parent">
            <a href="{{ route('users.create') }}" class="btn btn-info">
                Create User
            </a>
        </div>
        <div class="card-header">
          <h3 class="card-title">Users Table</h3>

          <div class="card-tools">
             <form action="" method="GET" class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="keyword" class="form-control float-right" placeholder="Search" value="{{ request()->get('keyword') }}">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
             </form>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Position</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td><a href="{{ route('users.show', ['user' => $user]) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->position }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div>
        {{ $users->links() }}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('style')
<style>
    .btn-parent{
        padding: 10px;
        display: flex;
        justify-content: flex-end
    }
</style>
@endsection
