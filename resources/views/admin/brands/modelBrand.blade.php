<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="ModalInsertCategory" tabindex="-1" aria-labelledby="studentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action={{ route('store.brands') }} enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputPassword3" class=" col-form-label">Brand</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control rounded " id="brands_name"
                                aria-describedby="inputGroupPrepend" name="brands_name" placeholder=" please input brand Name">

                        </div>
                        <div class="col-sm-12 pt-4">
                            <input type="file" class="form-control rounded border border-secondary m-0 p-2" id="brands_image"
                                aria-describedby="inputGroupPrepend" name="brands_image" required >

                        </div>
                    </div>
                    <button type="submit" class="btn bg-primary  text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
