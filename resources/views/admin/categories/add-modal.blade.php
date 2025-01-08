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
