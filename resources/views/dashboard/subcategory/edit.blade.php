@extends('dashboard.dashboard')

@section('page')


<div class="file-manager-main-content">
    <!-- search area start -->
    <div class="file-manager-content-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="sidebar-toggle d-block d-xl-none float-left align-middle ml-1">
                <i data-feather="menu" class="font-medium-5"></i>
            </div>

            <x-breadcrumb pageText="Edit category" />
        </div>
    </div>
    <!-- search area ends here -->

    <div class="file-manager-content-body">
        <!-- drives area starts-->
        <div class="drives">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card p-3">

                        <form action="{{route('category.update', $category->id)}}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" value="{{$category->name}}" id="name"
                                    name="name" placeholder="Story" autofocus />

                                @error('name')
                                <span class="badge-warnning">{{$message}}</span>
                                @enderror

                            </div>

                            <button class="btn btn-primary btn-block" tabindex="4">
                                <i class="fa fa-plus"></i> Create category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection