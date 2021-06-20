@extends('dashboard.dashboard')

@section('page')


<div class="file-manager-main-content">
    <!-- search area start -->
    <div class="file-manager-content-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="sidebar-toggle d-block d-xl-none float-left align-middle ml-1">
                <i data-feather="menu" class="font-medium-5"></i>
            </div>
            <x-breadcrumb pageText="File View" />
        </div>
    </div>
    <!-- search area ends here -->

    <div class="file-manager-content-body">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card p-2">
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

                        <form action="{{route('files.destroy', $file->id)}}" id="fileDelete-{{$file->id}}"
                            method="POST">
                            @csrf
                            @method('delete')
                        </form>

                        <div class="btn-group">
                            <a href="{{route('files.edit',$file->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <button type="button" onclick="getElementById('fileDelete-{{$file->id}}').submit()"
                                class="btn btn-sm btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection