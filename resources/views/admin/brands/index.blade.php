<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--    {{ __('Dashboard') }} --}}
            Hey... <b>{{ Auth::user()->name }}</b> <strong class="float-end">Total User: <span class="badge bg-danger">
             {{ count($brands) }}
                </span></strong>
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="clearfix">
                <div class="row">
                    <div class="col-9">
                    @if (session('success'))
                            <div class="col-sm-12">
                                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close "data-bs-dismiss="alert"
                                    aria-label="Close">X</button>
                                </div>
                            </div>
                        @else
                        @error('brands_name' )
                            <div class="alert alert-danger alert-dismissible fade show text-red p-3" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close "data-bs-dismiss="alert"
                                    aria-label="Close">X</button>
                            </div>
                        @enderror
                    @endif


                    </div>
                    <div class="col-3">
                        <button type="button" class="btn bg-primary text-white  float-end mb-3 p-2 "
                            data-bs-toggle="modal" data-bs-target="#ModalInsertCategory">
                            Add_brands
                        </button>
                    </div>
                </div>
            </div>
            <div class="  table-responsive">
                <table class="table table-bordered border-gray-300">
                    <thead>
                        <tr class="">
                            <th scope="col ">#</th>
                            <th scope="col  ">User_id</th>
                            <th scope="col  ">branda_name</th>
                            <th scope="col  ">branda_image</th>
                            <th scope="col  ">Create_At</th>
                            <th scope="col  ">Updated_At</th>
                            <th scope="col  ">Action</th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($brands as $brand)
                            <tr>
                                <th scope="row">{{ $i++ }} </th>
                                {{--<td>{{ $category->user_id }}</td> --}}
                                <td>{{ $brand->user_id}} </td>
                                <td>{{ $brand->brands_name }} </td>
                                <td><img src='{{asset($brand->brands_image)}}' height="100px" width="100px" alt="img" /></td>
                                <td>{{ Carbon\Carbon::parse($brand->created_at)->diffforhumans()}} </td>
                                @if ($brand->updated_at == null)
                                    <td class="text-danger">No Data</td>
                                @else
                                <td>{{ Carbon\Carbon::parse($brand->updated_at)->diffforhumans()}} </td>
                                @endif
                                <td class="d-flex">
                                    <a href="{{ url('category/edit/'.$brand->id) }} "
                                        class="btn bg-primary text-white mx-2">Edit </a>
                                    <a href="{{ url('category/soft_delete/' .$brand->id) }}" class="btn bg-danger  text-white" data-bs-toggle="modal"
                                        data-bs-target="#deleteCategorytModal">Dalete </a>
                                </td>
                            </tr>
                             @endforeach
                    </tbody>
                </table>

                </table>

          {{ $brands->links() }}

            </div>
        </div>
    </div>
</x-app-layout>
@include('admin/brands.modelBrand')
