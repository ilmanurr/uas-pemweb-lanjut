@extends('pengelola.app')

@php
$title = Auth::user()->level == 'admin' ? 'List Category - Admin' : 'List Category - Pengelola';
@endphp

@section('title', $title)

@section('pengelola.content')
<!-- content -->
<main class="content-wrapper px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
    </div>

    <div class="mt-3">
        <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Create</button>
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
            <table class="table table-striped table-bordered w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Seotitle</th>
                        <th>Active</th>
                        <th>Created At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->seotitle }}</td>
                        <td>{{ $item->active }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <div class="text-center btn-group" role="group">
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalUpdate{{ $item->id }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <a href="#" class="btn btn-danger delete-category-btn" data-id="{{ $item->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('category.create')
    @include('category.update')

</main>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endpush