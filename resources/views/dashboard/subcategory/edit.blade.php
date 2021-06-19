@extends('dashboard.dashboard')

@section('page')


<div class="file-manager-main-content">
    <!-- search area start -->
    <div class="file-manager-content-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="sidebar-toggle d-block d-xl-none float-left align-middle ml-1">
                <i data-feather="menu" class="font-medium-5"></i>
            </div>

            <x-breadcrumb pageText="Edit Sub Category" />
        </div>
    </div>
    <!-- search area ends here -->

    <div class="file-manager-content-body">
        <!-- drives area starts-->
        <div class="drives">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card p-3">

                        <form action="{{route('subcategory.update', $subcategory->id)}}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="category_id" class="form-label">Belongs Category</label>
                                <input type="text" class="form-control" disabled value="{{$subcategory->category_id}}" id="category_id"
                                       name="category_id" />

                                @error('category_id')
                                <span class="badge-warnning">{{$message}}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label">Sub Category Name</label>
                                <input type="text" class="form-control" value="{{$subcategory->name}}" id="name"
                                    name="name" placeholder="Story" autofocus />

                                @error('name')
                                <span class="badge-warnning">{{$message}}</span>
                                @enderror

                            </div>

                            <button class="btn btn-primary btn-block" tabindex="4">
                                <i class="fa fa-plus"></i> Update Sub Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
