@extends('dashboard.dashboard')

@section('page')


<div class="file-manager-main-content">
    <!-- search area start -->
    <div class="file-manager-content-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="sidebar-toggle d-block d-xl-none float-left align-middle ml-1">
                <i data-feather="menu" class="font-medium-5"></i>
            </div>
            <x-breadcrumb pageText="All Sub Category" />
        </div>
    </div>
    <!-- search area ends here -->

    <div class="file-manager-content-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Sl.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Category ID</th>
                                <th class="text-center">Total Files</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subCategories as $subcategory)
                            <tr>
                                <td class="text-center">{{$subcategory->id}}</td>

                                <td class="text-center">{{$subcategory->name}}</td>

                                <td class="text-center">{{$subcategory->category_id}}</td>

                                <td class="text-center">0</td>

                                <td class="text-center">{{$subcategory->created_at}}</td>

                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{route('subcategory.edit', $subcategory->id)}}"
                                            class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                        <form action="{{route('subcategory.destroy', $subcategory->id)}}"
                                            id="subcategoryDelete-{{$subcategory->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="getElementById('subcategoryDelete-{{$subcategory->id}}').submit()"><i
                                                class="fa fa-trash"></i></button>

                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
