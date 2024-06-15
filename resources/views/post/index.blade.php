@extends('admin.app')

@php
$title = Auth::user()->level == 'admin' ? 'List Post - Admin' : 'List Post - Pengelola';
@endphp

@section('title', $title)

@section('admin.content')
<!-- content -->
<main class="content-wrapper px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post</h1>
    </div>

    <div class="mt-3">
        <a href="{{ url('admin/post/create') }}" class="btn btn-success mb-2">Create</a>
        @if ($errors->any())
        <div class="my-3">
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
            </div>
        </div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Seotitle</th>
                    <th>Kategori</th>
                    <th>Content</th>
                    <th>Hits</th>
                    <th>Active</th>
                    <th>Status</th>
                    <th>Publish Date</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($post as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->seotitle }}</td>
                    <td>
                        @foreach ($item->categories as $category)
                        {{ $category->title }}
                        @if (!$loop->last)
                        ,
                        @endif
                        @endforeach
                    </td>
                    <td>{{ Str::limit($item->content, 100) }}</td>
                    <td>{{ $item->hits }}</td>
                    <td>{{ $item->active }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="text-center btn-group">
                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#modalDetail{{ $item->id }}"><i class="fas fa-search"></i></button>
                            <a href="{{ route('admin.post.edit', $item->id) }}" class="btn btn-warning"><i
                                    class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger delete-post-btn" data-id="{{ $item->id }}"><i
                                    class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

<!-- Modal Detail -->
@foreach ($post as $item)
<div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Post</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ Storage::url('public/img/' . $item->image) }}" alt="item Image"
                                class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h2>{{ $item->title }}</h2>
                            <p><strong>Seotitle:</strong> {{ $item->seotitle }}</p>
                            <p><strong>Kategori:</strong>
                                @foreach ($item->categories as $category)
                                {{ $category->title }}
                                @if (!$loop->last)
                                ,
                                @endif
                                @endforeach
                            </p>
                            <p><strong>Content:</strong> {{ $item->content }}</p>
                            <p><strong>Hits:</strong> {{ $item->hits }}</p>
                            <p><strong>Active:</strong> {{ $item->active }}</p>
                            <p><strong>Status:</strong> {{ $item->status }}</p>
                            <p><strong>Publish Date:</strong> {{ $item->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush