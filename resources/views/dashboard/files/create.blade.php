@extends('dashboard.dashboard')

@section('page')


<div class="file-manager-main-content">
    <!-- search area start -->
    <div class="file-manager-content-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="sidebar-toggle d-block d-xl-none float-left align-middle ml-1">
                <i data-feather="menu" class="font-medium-5"></i>
            </div>

            <x-breadcrumb pageText="Edit Files" />
        </div>
    </div>
    <!-- search area ends here -->

    <div class="file-manager-content-body">
        <!-- drives area starts-->
        <div class="drives">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card p-3">

                        <form action="{{route('files.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="form-label">File Name</label>
                                <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name"
                                    placeholder="My File" autofocus />

                                @error('name')
                                <span class="badge-warning">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name" class="form-label">File</label>
                                <input type="file" class="form-control" value="{{old('file')}}" id="file" name="file" />

                                @error('file')
                                <span class="badge-warning">{{$message}}</span>
                                @enderror
                            </div>



                            @php
                            $categories = \App\Models\Category::all();
                            $subcategories = \App\Models\SubCategory::all();
                            @endphp

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="category_id" class="form-label">Category Name</label>
                                    <select class="custom-select" id="category_id" name="category_id">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{ old('category_id') == $category->id ? 'slected' : ''}}>
                                            {{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="badge-warning">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="category_id" class="form-label">Sub Category Name</label>
                                    <select class="custom-select" id="sub_category_id" name="sub_category_id">
                                        @foreach ($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}"
                                            {{old('sub_category_id') == $subcategory->id ? 'slected' : ''}}>
                                            {{$subcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <span class="badge-warning">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="name" class="form-label">Comment</label>
                                <textarea name="comment" id="comment" cols="30" rows="2"
                                    class="form-control">{{old('comment')}}</textarea>

                                @error('comment')
                                <span class="badge-warning">{{$message}}</span>
                                @enderror
                            </div>

                            <button class="btn btn-primary btn-block" tabindex="4">
                                <i class="fa fa-plus"></i> Create Files
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection