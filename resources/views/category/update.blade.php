@foreach ($categories as $item )
<div class="modal fade" id="modalUpdate{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Categories</h1>
            </div>

            <!-- form post category -->
            <div class="modal-body">
                <form
                    action="{{ Auth::user()->level == 'admin' ? route('admin.categories.update', $item->id) : route('pengelola.categories.update', $item->id) }}"
                    method="post">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $item->title) }}">

                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="active">Active</label>
                        <select name="active" id="active" class="form-control @error('active') is-invalid @enderror">
                            <option value="Yes" {{ $item->active == 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ $item->active == 'No' ? 'selected' : '' }}>No</option>
                        </select>

                        @error('active')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endforeach