@extends('layouts.app')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/core/menu/menu-types/horizontal-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/plugins/extensions/ext-component-tree.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/pages/app-file-manager.css')}}">
@endpush
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content file-manager-application" style="padding: calc(2rem + 4.45rem + 1.3rem) 2rem 0; };">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-area-wrapper">
        <div class="sidebar-left">
            <div class="sidebar">
                <div class="sidebar-file-manager">
                    <div class="sidebar-inner">
                        <!-- sidebar menu links starts -->
                        <!-- add file button -->
                        <div class="dropdown dropdown-actions">
                            <button class="btn btn-primary add-file-btn text-center btn-block" type="button"
                                id="addNewFile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="align-middle">Add New</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="addNewFile">
                                <div class="dropdown-item" data-toggle="modal" data-target="#new-folder-modal">
                                    <div class="mb-0">
                                        <i data-feather="folder" class="mr-25"></i>
                                        <span class="align-middle">Folder</span>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="mb-0" for="file-upload">
                                        <i data-feather="upload-cloud" class="mr-25"></i>
                                        <span class="align-middle">File Upload</span>
                                        <input type="file" id="file-upload" hidden />
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div for="folder-upload" class="mb-0">
                                        <i data-feather="upload-cloud" class="mr-25"></i>
                                        <span class="align-middle">Folder Upload</span>
                                        <input type="file" id="folder-upload" webkitdirectory mozdirectory hidden />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- add file button ends -->

                        <!-- sidebar list items starts  -->
                        <div class="sidebar-list">
                            <!-- links for file manager sidebar -->
                            <div class="list-group">
                                {{-- <div class="my-drive"></div> --}}
                                <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                    <i data-feather="clock" class="mr-50 font-medium-3"></i>
                                    <span class="align-middle">Recents</span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                    <i data-feather="trash" class="mr-50 font-medium-3"></i>
                                    <span class="align-middle">Deleted Files</span>
                                </a>
                            </div>
                            <div class="list-group list-group-labels">
                                <h6 class="section-label px-2 mb-1">Categories <a href="{{route('category.index')}}"
                                        class="badge-info badge-sm rounded px-1 text-capitalize"> View All</a>
                                </h6>
                                @php
                                $categories = \App\Models\Category::orderBy('id','asc')->limit(10)->get();
                                @endphp
                                @foreach ($categories as $category)
                                <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                    <i data-feather="layers" class="mr-50 font-medium-3"></i>
                                    <span class="align-middle">{{$category->name}}</span>
                                </a>
                                @endforeach
                                <a href="{{route('category.create')}}"
                                    class="list-group-item list-group-item-action text-primary">
                                    <i data-feather="plus" class="mr-50 font-medium-3"></i>
                                    <span class="align-middle">Create New</span>
                                </a>
                            </div>

                        </div>
                        <!-- side bar list items ends  -->
                        <!-- sidebar menu links ends -->
                    </div>
                </div>

            </div>
        </div>

        <div class="content-right">
            <div class="content-wrapper">
                <div class="content-body">
                    <!-- file manager app content starts -->
                    @yield('page')
                    <!-- File Info Sidebar Starts-->
                    <div class="modal modal-slide-in fade show" id="app-file-manager-info-sidebar">
                        <div class="modal-dialog sidebar-lg">
                            <div class="modal-content p-0">
                                <div class="modal-header d-flex align-items-center justify-content-between mb-1 p-2">
                                    <h5 class="modal-title">menu.js</h5>
                                    <div>
                                        <i data-feather="trash" class="cursor-pointer mr-50" data-dismiss="modal"></i>
                                        <i data-feather="x" class="cursor-pointer" data-dismiss="modal"></i>
                                    </div>
                                </div>
                                <div class="modal-body flex-grow-1 pb-sm-0 pb-1">
                                    <ul class="nav nav-tabs tabs-line" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#details-tab" role="tab"
                                                aria-controls="details-tab" aria-selected="true">
                                                <i data-feather="file"></i>
                                                <span class="align-middle ml-25">Details</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#activity-tab" role="tab"
                                                aria-controls="activity-tab" aria-selected="true">
                                                <i data-feather="activity"></i>
                                                <span class="align-middle ml-25">Activity</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="details-tab" role="tabpanel"
                                            aria-labelledby="details-tab">
                                            <div
                                                class="d-flex flex-column justify-content-center align-items-center py-5">
                                                <img src="../../../theme/images/icons/js.png" alt="file-icon"
                                                    height="64" />
                                                <p class="mb-0 mt-1">54kb</p>
                                            </div>
                                            <h6 class="file-manager-title my-2">Settings</h6>
                                            <ul class="list-unstyled">
                                                <li class="d-flex justify-content-between align-items-center mb-1">
                                                    <span>File Sharing</span>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="sharing" />
                                                        <label class="custom-control-label" for="sharing"></label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center mb-1">
                                                    <span>Synchronization</span>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" checked
                                                            id="sync" />
                                                        <label class="custom-control-label" for="sync"></label>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center mb-1">
                                                    <span>Backup</span>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="backup" />
                                                        <label class="custom-control-label" for="backup"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <hr class="my-2" />
                                            <h6 class="file-manager-title my-2">Info</h6>
                                            <ul class="list-unstyled">
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <p>Type</p>
                                                    <p class="font-weight-bold">JS</p>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <p>Size</p>
                                                    <p class="font-weight-bold">54kb</p>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <p>Location</p>
                                                    <p class="font-weight-bold">Files > Documents</p>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <p>Owner</p>
                                                    <p class="font-weight-bold">Sheldon Cooper</p>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <p>Modified</p>
                                                    <p class="font-weight-bold">12th Aug, 2020</p>
                                                </li>

                                                <li class="d-flex justify-content-between align-items-center">
                                                    <p>Created</p>
                                                    <p class="font-weight-bold">01 Oct, 2019</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="activity-tab" role="tabpanel"
                                            aria-labelledby="activity-tab">
                                            <h6 class="file-manager-title my-2">Today</h6>
                                            <div class="media align-items-center mb-2">
                                                <div class="avatar avatar-sm mr-50">
                                                    <img src="../../../theme/images/avatars/5-small.png" alt="avatar"
                                                        width="28" />
                                                </div>
                                                <div class="media-body">
                                                    <p class="mb-0">
                                                        <span class="font-weight-bold">Mae</span> shared the file
                                                        with
                                                        <span class="font-weight-bold">Howard</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-sm bg-light-primary mr-50">
                                                    <span class="avatar-content">SC</span>
                                                </div>
                                                <div class="media-body">
                                                    <p class="mb-0">
                                                        <span class="font-weight-bold">Sheldon</span> updated the
                                                        file
                                                    </p>
                                                </div>
                                            </div>
                                            <h6 class="file-manager-title mt-3 mb-2">Yesterday</h6>
                                            <div class="media align-items-center mb-2">
                                                <div class="avatar avatar-sm bg-light-success mr-50">
                                                    <span class="avatar-content">LH</span>
                                                </div>
                                                <div class="media-body">
                                                    <p class="mb-0">
                                                        <span class="font-weight-bold">Leonard</span> renamed this
                                                        file to
                                                        <span class="font-weight-bold">menu.js</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-sm mr-50">
                                                    <img src="../../../theme/images/portrait/small/avatar-s-1.jpg"
                                                        alt="Avatar" width="28" />
                                                </div>
                                                <div class="media-body">
                                                    <p class="mb-0">
                                                        <span class="font-weight-bold">You</span> shared this file
                                                        with Leonard
                                                    </p>
                                                </div>
                                            </div>
                                            <h6 class="file-manager-title mt-3 mb-2">3 days ago</h6>
                                            <div class="media">
                                                <div class="avatar avatar-sm mr-50">
                                                    <img src="../../../theme/images/portrait/small/avatar-s-1.jpg"
                                                        alt="Avatar" width="28" />
                                                </div>
                                                <div class="media-body">
                                                    <p class="mb-50">
                                                        <span class="font-weight-bold">You</span> uploaded this file
                                                    </p>
                                                    <img src="../../../theme/images/icons/js.png" alt="Avatar"
                                                        class="mr-50" height="24" />
                                                    <span class="font-weight-bold">app.js</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- File Info Sidebar Ends -->

                    <!-- File Dropdown Starts-->
                    <div class="dropdown-menu dropdown-menu-right file-dropdown">
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="eye" class="align-middle mr-50"></i>
                            <span class="align-middle">Preview</span>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="user-plus" class="align-middle mr-50"></i>
                            <span class="align-middle">Share</span>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="copy" class="align-middle mr-50"></i>
                            <span class="align-middle">Make a copy</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="edit" class="align-middle mr-50"></i>
                            <span class="align-middle">Rename</span>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                            data-target="#app-file-manager-info-sidebar">
                            <i data-feather="info" class="align-middle mr-50"></i>
                            <span class="align-middle">Info</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="trash" class="align-middle mr-50"></i>
                            <span class="align-middle">Delete</span>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i data-feather="alert-circle" class="align-middle mr-50"></i>
                            <span class="align-middle">Report</span>
                        </a>
                    </div>
                    <!-- /File Dropdown Ends -->

                    <!-- Create New Folder Modal Starts-->
                    <div class="modal fade" id="new-folder-modal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">New Folder</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" value="New folder"
                                        placeholder="Untitled folder" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary mr-1"
                                        data-dismiss="modal">Create</button>
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Create New Folder Modal Ends -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@push('scripts')
<script src="{{asset('theme/js/scripts/pages/app-file-manager.js')}}"></script>
@endpush