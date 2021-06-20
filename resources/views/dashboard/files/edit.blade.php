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

                        <form action="{{route('files.update', $file->id)}}" method="POST">
                            @method('patch')
                            @csrf

                            <div class="card file-manager-item file">
                                <div class="card-img-top file-logo-wrapper">
                                    <div class="dropdown float-right invisible">
                                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center w-100">
                                        <img src="../../../theme/images/icons/doc.png" alt="file-icon" height="35" />
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="content-wrapper">
                                        <p class="card-text text-center file-name mb-0">{{$file->name}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="form-label">Files Name</label>
                                <input type="text" class="form-control" value="{{$file->name}}" id="name" name="name"
                                    placeholder="My File" autofocus />

                                @error('name')
                                <span class="badge-warning">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name" class="form-label">File</label>
                                <input type="file" class="form-control" value="{{$file->name}}" id="file" name="file" />

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
                                            {{$file->id == $category->id ? 'slected' : ''}}>
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
                                            {{$file->sub_category_id == $subcategory->id ? 'slected' : ''}}>
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
                                    class="form-control">{{$file->comment}}</textarea>

                                @error('comment')
                                <span class="badge-warning">{{$message}}</span>
                                @enderror
                            </div>

                            <button class="btn btn-primary btn-block" tabindex="4">
                                <i class="fa fa-plus"></i> Save Files
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection