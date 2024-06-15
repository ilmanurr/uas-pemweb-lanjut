@extends('admin.app')

@section('title', 'Edit Post - Admin')

@section('admin.content')
<!-- content -->
<main class="content-wrapper px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>

    <div class="mt-3">
        @if ($errors->any())
        <div class="my-3">
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
            </div>
        </div>
        @endif

        <form action="{{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title', $post->title) }}">
                    </div>
                </div>

                <div class="col-6">
                    <label for="category_id">Kategori</label>
                    <select name="category_id[]" id="category_id" class="form-control">
                        <option value="" hidden>-- pilih disini --</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}"
                            {{ in_array($item->id, $post->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $item->title }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="content">Content</label>
                <textarea name="content" id="editor" cols="30" rows="10"
                    class="form-control">{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image">Image (Max 2MB)</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($post->image)
                <img src="{{ Storage::url('public/img/' . $post->image) }}" alt="Current Image" class="img-fluid mt-2"
                    style="max-width: 200px;">
                @endif
                <input type="hidden" name="oldImg" value="{{ $post->image }}">
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" hidden>-- choose here --</option>
                            <option value="publish" {{ old('status', $post->status) == 'publish' ? 'selected' : '' }}>
                                Publish</option>
                            <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Hidden input for active -->
            <input type="hidden" name="active" id="active" value="{{ old('active', $post->active) }}">

            <div class="float-end">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</main>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=File&_token=',
    clipboard_handleImages: false
}
CKEDITOR.replace('editor', options);

$(document).ready(function() {
    $('#status').change(function() {
        var status = $(this).val();
        if (status === 'publish') {
            $('#active').val('Yes');
        } else if (status === 'draft') {
            $('#active').val('No');
        }
    });

    // Trigger change event on page load to set initial value
    $('#status').trigger('change');
});
</script>
@endpush