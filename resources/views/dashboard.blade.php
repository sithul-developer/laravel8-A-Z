<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{--    {{ __('Dashboard') }} --}}
            Hey... <b>{{Auth::user()->name}}</b> <strong class="float-end">Total User: <span class="badge bg-danger"> {{count($users)}} </span></strong>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Create At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $i++ }} </th>
                                <td>{{ $user->name }} </td>
                                <td>{{ $user->email }} </td>
                                <td>{{  Carbon\Carbon::parse($user->created_at)->diffforhumans()}} </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
