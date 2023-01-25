<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--    {{ __('Dashboard') }} --}}
            Hey... <b>{{ Auth::user()->name }}</b> <strong class="float-end">Total User: <span class="badge bg-danger">
                </span></strong>
        </h2>
    </x-slot>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="clearfix">
                <div class="row">
                    <div class="col-5">
                        <form  method="POST" action="{{url('category/update/'. $categories->id )}} " class="border p-4">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                <input type="text" class="form-control rounded "
                                    value="{{ $categories->category_name }}" id="category_name"
                                    aria-describedby="inputGroupPrepend" name="category_name">
                            </div>
                            <button type="submit" class="btn bg-primary text-white">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
@include('admin/category.modelCategory')
@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#studentModal').modal('hide');
            $('#updateStudentModal').modal('hide');
            $('#deleteStudentModal').modal('hide');
        })
    </script>
@endsection
