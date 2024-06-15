@extends('admin.app')

@section('title', 'List User - Admin')

@section('admin.content')
<!-- content -->
<main class="content-wrapper px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Users</h1>
    </div>

    <div class="mt-3">
        <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalCreateUser">Create</button>
        @if ($errors->any())
        <div class="my-3">
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
            </div>
        </div>
        @endif

        @if (session('success'))
        <div class="my-3">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->level }}</td>
                        <td>
                            <div class="text-center btn-group" role="group">
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalUpdateUser{{ $item->id }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <a href="#" class="btn btn-danger delete-user-btn" data-id="{{ $item->id }}"><i
                                        class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('user.create')
    @include('user.update')
</main>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endpush