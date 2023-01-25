<!-- update Modal -->
<div wire:ignore.self class="modal fade" id="EditCategoryModal" tabindex="-1" aria-labelledby="EditCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditCategoryModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action={{ route('store.category') }}>
                    @csrf
                    <div class="row mb-3">
                        <label for="inputPassword3" class=" col-form-label">Category</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control rounded " id="category_name"
                                aria-describedby="inputGroupPrepend" name="category_name">
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn bg-primary  text-white">update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Student Modal -->
<div wire:ignore.self class="modal fade" id="deleteCategorytModal" tabindex="-1"
    aria-labelledby="deleteCategorytModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered p-3">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title fs-5" id="deleteCategorytModalLabel">Delete Student </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyStudent" {{-- method="POST" action={{ url('category/delete/' .$category->id)}} --}}>
            {{--     @method('DELETE')
                @csrf --}}
                <div class="modal-body">
                    <h4>Are you sure you want to delete this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-secondary text-white" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                 {{--    <form action="{{ url('category/delete/' . $category->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn bg-primary text-white">Yes! Delete </button>
                    </form> --}}

                    <button class="btn bg-primary text-white">Yes! Delete </button>
                </div>
            </form>
        </div>
    </div>
</div>
