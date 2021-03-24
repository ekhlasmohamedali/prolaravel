@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title pt-2"> Managers : {{ $count }} </h3>

        @if (auth()->user()->hasRole('admin'))
        <div class="card-tools">
            <a href="{{ route('dashboard.admins.create') }}" type="button" class="btn btn-default bg-primary">
                <i class="fa fa-plus"></i> Create New Manger
            </a>
        </div>
        @endif
    </div>

    <form method="get" action="{{ route('dashboard.admins.index') }}">
        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-sm-1">
                <!-- select -->
                <div class="form-group">
                    <select class="custom-select" name="column">
                        <option value="id" {{ request()->column == 'id' ? 'selected' : '' }}>ID</option>
                        <option value="name" {{ request()->column == 'name' ? 'selected' : '' }}>Name</option>
                        <option value="email" {{ request()->column == 'email' ? 'selected' : '' }}>Email</option>
                        <option value="phone" {{ request()->column == 'phone'  ? 'selected' : '' }}>Phone</option>
                    </select>
                </div>
            </div>

            <div class="col-md-5">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request()->search }}">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admins as $admin)
                <tr>
                    <td> {{ $admin->id }} </td>
                    <td> <img class="img-fluid" src="{{ $admin->image_path }}" width="70">
                    </td>
                    <td> {{ $admin->name }} </td>
                    <td> {{ $admin->email }} </td>
                    <td> {{ $admin->phone }} </td>
                    <td> {{ $admin->admin->name }} </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder"> </i> View
                        </a>
                        <a href="{{ route('dashboard.admins.edit', $admin) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-pencil-alt"> </i> Edit
                        </a>

                        <form action="{{ route('dashboard.admins.destroy', $admin) }}" method="post"
                            style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>
                                Delete</button>
                        </form><!-- end of form -->
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6"> No Records </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $admins->appends(request()->query())->links() }}
    </div>

    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection
