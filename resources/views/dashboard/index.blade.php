@extends('dashboard.dashboard')

@section('page')


<div class="file-manager-main-content">
    <!-- search area start -->
    <div class="file-manager-content-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="sidebar-toggle d-block d-xl-none float-left align-middle ml-1">
                <i data-feather="menu" class="font-medium-5"></i>
            </div>
            <div class="input-group input-group-merge shadow-none m-0 flex-grow-1">
                <div class="input-group-prepend">
                    <span class="input-group-text border-0">
                        <i data-feather="search"></i>
                    </span>
                </div>
                <input type="text" class="form-control files-filter border-0 bg-transparent" placeholder="Search" />
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="file-actions">
                <i data-feather="arrow-down-circle"
                    class="font-medium-2 cursor-pointer d-sm-inline-block d-none mr-50"></i>
                <i data-feather="trash" class="font-medium-2 cursor-pointer d-sm-inline-block d-none mr-50"></i>
                <i data-feather="alert-circle" class="font-medium-2 cursor-pointer d-sm-inline-block d-none"
                    data-toggle="modal" data-target="#app-file-manager-info-sidebar"></i>
                <div class="dropdown d-inline-block">
                    <i class="font-medium-2 cursor-pointer" data-feather="more-vertical" role="button" id="fileActions"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </i>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="fileActions">
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="move" class="cursor-pointer mr-50"></i>
                            <span class="align-middle">Open with</span>
                        </a>
                        <a class="dropdown-item d-sm-none d-block" href="javascript:void(0);" data-toggle="modal"
                            data-target="#app-file-manager-info-sidebar">
                            <i data-feather="alert-circle" class="cursor-pointer mr-50"></i>
                            <span class="align-middle">More Options</span>
                        </a>
                        <a class="dropdown-item d-sm-none d-block" href="javascript:void(0);">
                            <i data-feather="trash" class="cursor-pointer mr-50"></i>
                            <span class="align-middle">Delete</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="plus" class="cursor-pointer mr-50"></i>
                            <span class="align-middle">Add shortcut</span>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="folder-plus" class="cursor-pointer mr-50"></i>
                            <span class="align-middle">Move to</span>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="star" class="cursor-pointer mr-50"></i>
                            <span class="align-middle">Add to starred</span>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="droplet" class="cursor-pointer mr-50"></i>
                            <span class="align-middle">Change color</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="download" class="cursor-pointer mr-50"></i>
                            <span class="align-middle">Download</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="btn-group btn-group-toggle view-toggle ml-50" data-toggle="buttons">
                <label class="btn btn-outline-primary p-50 btn-sm active">
                    <input type="radio" name="view-btn-radio" data-view="grid" checked />
                    <i data-feather="grid"></i>
                </label>
                <label class="btn btn-outline-primary p-50 btn-sm">
                    <input type="radio" name="view-btn-radio" data-view="list" />
                    <i data-feather="list"></i>
                </label>
            </div>
        </div>
    </div>
    <!-- search area ends here -->

    <div class="file-manager-content-body">

        <!-- Files Container Starts -->
        <div class="view-container">
            <h6 class="files-section-title mt-2 mb-75">Files</h6>

            @if (count($files)> 0)
            @foreach ($files as $file)
            <div class="card file-manager-item file">
                <a href="{{route('files.show',$file->id)}}">
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
                            <p class="card-text file-name mb-0">{{$file->name}}</p>
                            <p class="card-text file-date">{{date('d-M-Y',strtotime($file->created_at))}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <div class="d-none flex-grow-1 align-items-center no-result mb-3">
                <i data-feather="alert-circle" class="mr-50"></i> No Results
            </div>
            @endif
        </div>
        <!-- /Files Container Ends -->
    </div>
</div>

@endsection