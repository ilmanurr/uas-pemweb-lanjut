<!-- Modal -->
<div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Category</h1>
            </div>

            <!-- form post category -->
            <div class="modal-body">
                <form
                    action="{{ Auth::user()->level == 'admin' ? route('admin.categories.store') : route('pengelola.categories.store') }}"
                    method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">

                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="active">Active</label>
                        <select name="active" id="active" class="form-control @error('active') is-invalid @enderror">
                            <option value="Yes" {{ old('active') == 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ old('active') == 'No' ? 'selected' : '' }}>No</option>
                        </select>

                        @error('active')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>