<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalExample" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalExample">Create a new category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="category-add-form" class="row" method="POST" action="{{ route('super-admin.category.create') }}">
                    @csrf
                    {{-- First Name --}}
                    <div class="col-md-12 mb-3">
                        <label>Category Title <span style="color:red;">*</span></label>
                        <input type="text" class="form-control form-control-user @error('title') is-invalid @enderror" id="exampleFirstName" placeholder="Enter your category title" name="title" value="{{ old('title') }}">

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" id="editor" rows="5" class="form-control" autofocus>{{ old('description') }}</textarea>
                        </div>
                    </div>
                    {{-- Image --}}
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <input type="hidden" id="cat_image_baseImage" name="cat_image_baseImage" value="" />
                            <input type="file" name="cat_image" onchange="fileDetailsCrop(this)" data-size="600x400" data-ratio="16/10.66" id="cat_image-image" class="image pt-1 form-control d-none" accept="image/*">
                            <label class="btn btn-sm btn-primary rounded m-0" for="cat_image-image"><i class="fas fa-image pr-2"></i> Select Image<label>
                        </div>
                        <div class="border rounded d-flex justify-content-center align-items-center" id="cat_image_preview" style="height: 150px; background-color: #ececec;">
                            <label class="rounded m-0" id="noimage">No Image</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success"
                    onclick="event.preventDefault(); document.getElementById('category-add-form').submit();">
                    Create
                </button>
            </div>
        </div>
    </div>
</div>
