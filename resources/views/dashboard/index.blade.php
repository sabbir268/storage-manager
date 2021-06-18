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
        <!-- drives area starts-->
        <div class="drives">
            <div class="row">
                <div class="col-12">
                    <h6 class="files-section-title mb-75">Drives</h6>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card shadow-none border cursor-pointer">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <img src="../../../theme/images/icons/drive.png" alt="google drive" height="38" />
                                <div class="dropdown-items-wrapper">
                                    <i data-feather="more-vertical" id="dropdownMenuLink1" role="button"
                                        data-toggle="dropdown" aria-expanded="false"></i>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink1">
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="refresh-cw" class="mr-25"></i>
                                            <span class="align-middle">Refresh</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="settings" class="mr-25"></i>
                                            <span class="align-middle">Manage</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="trash" class="mr-25"></i>
                                            <span class="align-middle">Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="my-1">
                                <h5>Google drive</h5>
                            </div>
                            <div class="d-flex justify-content-between mb-50">
                                <span class="text-truncate">35GB Used</span>
                                <small class="text-muted">50GB</small>
                            </div>
                            <div class="progress progress-bar-warning progress-md mb-0" style="height: 10px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="70"
                                    aria-valuemax="100" style="width: 70%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card shadow-none border cursor-pointer">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <img src="../../../theme/images/icons/dropbox.png" alt="dropbox" height="38" />
                                <div class="dropdown-items-wrapper">
                                    <i data-feather="more-vertical" id="dropdownMenuLink2" role="button"
                                        data-toggle="dropdown" aria-expanded="false"></i>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink2">
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="refresh-cw" class="mr-25"></i>
                                            <span class="align-middle">Refresh</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="settings" class="mr-25"></i>
                                            <span class="align-middle">Manage</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="trash" class="mr-25"></i>
                                            <span class="align-middle">Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="my-1">
                                <h5>Dropbox</h5>
                            </div>
                            <div class="d-flex justify-content-between mb-50">
                                <span class="text-truncate">1.2GB Used</span>
                                <small class="text-muted">2GB</small>
                            </div>
                            <div class="progress progress-bar-success progress-md mb-0" style="height: 10px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="70"
                                    aria-valuemax="100" style="width: 68%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card shadow-none border cursor-pointer">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <img src="../../../theme/images/icons/onedrivenew.png" alt="icloud" height="38"
                                    class="p-25" />
                                <div class="dropdown-items-wrapper">
                                    <i data-feather="more-vertical" id="dropdownMenuLink3" role="button"
                                        data-toggle="dropdown" aria-expanded="false"></i>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink3">
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="refresh-cw" class="mr-25"></i>
                                            <span class="align-middle">Refresh</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="settings" class="mr-25"></i>
                                            <span class="align-middle">Manage</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="trash" class="mr-25"></i>
                                            <span class="align-middle">Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="my-1">
                                <h5>OneDrive</h5>
                            </div>
                            <div class="d-flex justify-content-between mb-50">
                                <span class="text-truncate">1.6GB Used</span>
                                <small class="text-muted">2GB</small>
                            </div>
                            <div class="progress progress-bar-primary progress-md mb-0" style="height: 10px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="70"
                                    aria-valuemax="100" style="width: 80%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card shadow-none border cursor-pointer">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <img src="../../../theme/images/icons/icloud-1.png" alt="icloud" height="38"
                                    class="p-25" />
                                <div class="dropdown-items-wrapper">
                                    <span data-feather="more-vertical" id="dropdownMenuLink4" role="button"
                                        data-toggle="dropdown" aria-expanded="false"></span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink4">
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="refresh-cw" class="mr-25"></i>
                                            <span class="align-middle">Refresh</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="settings" class="mr-25"></i>
                                            <span class="align-middle">Manage</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i data-feather="trash" class="mr-25"></i>
                                            <span class="align-middle">Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="my-1">
                                <h5>iCloud</h5>
                            </div>
                            <div class="d-flex justify-content-between mb-50">
                                <span class="text-truncate">1.8GB Used</span>
                                <small class="text-muted">3GB</small>
                            </div>
                            <div class="progress progress-bar-info progress-md mb-0" style="height: 10px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="70"
                                    aria-valuemax="100" style="width: 60%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- drives area ends-->

        <!-- Folders Container Starts -->
        <div class="view-container">
            <h6 class="files-section-title mt-25 mb-75">Folders</h6>
            <div class="files-header">
                <h6 class="font-weight-bold mb-0">Filename</h6>
                <div>
                    <h6 class="font-weight-bold file-item-size d-inline-block mb-0">Size</h6>
                    <h6 class="font-weight-bold file-last-modified d-inline-block mb-0">Last
                        modified</h6>
                    <h6 class="font-weight-bold d-inline-block mr-1 mb-0">Actions</h6>
                </div>
            </div>
            <div class="card file-manager-item folder level-up">
                <div class="card-img-top file-logo-wrapper">
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <i data-feather="arrow-up"></i>
                    </div>
                </div>
                <div class="card-body pl-2 pt-0 pb-1">
                    <div class="content-wrapper">
                        <p class="card-text file-name mb-0">...</p>
                    </div>
                </div>
            </div>
            <div class="card file-manager-item folder">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" />
                    <label class="custom-control-label" for="customCheck1"></label>
                </div>
                <div class="card-img-top file-logo-wrapper">
                    <div class="dropdown float-right">
                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <i data-feather="folder"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-wrapper">
                        <p class="card-text file-name mb-0">Projects</p>
                        <p class="card-text file-size mb-0">2gb</p>
                        <p class="card-text file-date">01 may 2019</p>
                    </div>
                    <small class="file-accessed text-muted">Last accessed: 21 hours ago</small>
                </div>
            </div>
            <div class="card file-manager-item folder">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" />
                    <label class="custom-control-label" for="customCheck2"></label>
                </div>
                <div class="card-img-top file-logo-wrapper">
                    <div class="dropdown float-right">
                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <i data-feather="folder"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-wrapper">
                        <p class="card-text file-name mb-0">Design</p>
                        <p class="card-text file-size mb-0">500mb</p>
                        <p class="card-text file-date">05 may 2019</p>
                    </div>
                    <small class="file-accessed text-muted">Last accessed: 18 hours ago</small>
                </div>
            </div>
            <div class="card file-manager-item folder">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck3" />
                    <label class="custom-control-label" for="customCheck3"></label>
                </div>
                <div class="card-img-top file-logo-wrapper">
                    <div class="dropdown float-right">
                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <i data-feather="folder"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-wrapper">
                        <p class="card-text file-name mb-0">UI Kit</p>
                        <p class="card-text file-size mb-0">200mb</p>
                        <p class="card-text file-date">01 may 2019</p>
                    </div>
                    <small class="file-accessed text-muted">Last accessed: 2 days ago</small>
                </div>
            </div>
            <div class="card file-manager-item folder">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck4" />
                    <label class="custom-control-label" for="customCheck4"></label>
                </div>
                <div class="card-img-top file-logo-wrapper">
                    <div class="dropdown float-right">
                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <i data-feather="folder"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-wrapper">
                        <p class="card-text file-name mb-0">Documents</p>
                        <p class="card-text file-size mb-0">50.3mb</p>
                        <p class="card-text file-date">10 may 2019</p>
                    </div>
                    <small class="file-accessed text-muted">Last accessed: 6 days ago</small>
                </div>
            </div>
            <div class="card file-manager-item folder">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck5" />
                    <label class="custom-control-label" for="customCheck5"></label>
                </div>
                <div class="card-img-top file-logo-wrapper">
                    <div class="dropdown float-right">
                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <i data-feather="folder"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-wrapper">
                        <p class="card-text file-name mb-0">Videos</p>
                        <p class="card-text file-size mb-0">354mb</p>
                        <p class="card-text file-date">08 may 2019</p>
                    </div>
                    <small class="file-accessed text-muted">Last accessed: 8 days ago</small>
                </div>
            </div>
            <div class="card file-manager-item folder">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck6" />
                    <label class="custom-control-label" for="customCheck6"></label>
                </div>
                <div class="card-img-top file-logo-wrapper">
                    <div class="dropdown float-right">
                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <i data-feather="folder"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-wrapper">
                        <p class="card-text file-name mb-0">Styles</p>
                        <p class="card-text file-size mb-0">32.2mb</p>
                        <p class="card-text file-date">05 may 2019</p>
                    </div>
                    <small class="file-accessed text-muted">Last accessed: 2 months ago</small>
                </div>
            </div>
            <div class="d-none flex-grow-1 align-items-center no-result mb-3">
                <i data-feather="alert-circle" class="mr-50"></i> No Results
            </div>
        </div>
        <!-- /Folders Container Ends -->

        <!-- Files Container Starts -->
        <div class="view-container">
            <h6 class="files-section-title mt-2 mb-75">Files</h6>
            <div class="card file-manager-item file">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck7" />
                    <label class="custom-control-label" for="customCheck7"></label>
                </div>
                <div class="card-img-top file-logo-wrapper">
                    <div class="dropdown float-right">
                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <img src="../../../theme/images/icons/jpg.png" alt="file-icon" height="35" />
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-wrapper">
                        <p class="card-text file-name mb-0">Profile.jpg</p>
                        <p class="card-text file-size mb-0">12.6mb</p>
                        <p class="card-text file-date">23 may 2019</p>
                    </div>
                    <small class="file-accessed text-muted">Last accessed: 3 hours ago</small>
                </div>
            </div>
            <div class="card file-manager-item file">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck8" />
                    <label class="custom-control-label" for="customCheck8"></label>
                </div>
                <div class="card-img-top file-logo-wrapper">
                    <div class="dropdown float-right">
                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <img src="../../../theme/images/icons/doc.png" alt="file-icon" height="35" />
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-wrapper">
                        <p class="card-text file-name mb-0">account.doc</p>
                        <p class="card-text file-size mb-0">82kb</p>
                        <p class="card-text file-date">25 may 2019</p>
                    </div>
                    <small class="file-accessed text-muted">Last accessed: 23 minutes
                        ago</small>
                </div>
            </div>
            <div class="card file-manager-item file">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck9" />
                    <label class="custom-control-label" for="customCheck9"></label>
                </div>
                <div class="card-img-top file-logo-wrapper">
                    <div class="dropdown float-right">
                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <img src="../../../theme/images/icons/txt.png" alt="file-icon" height="35" />
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-wrapper">
                        <p class="card-text file-name mb-0">notes.txt</p>
                        <p class="card-text file-size mb-0">54kb</p>
                        <p class="card-text file-date">01 may 2019</p>
                    </div>
                    <small class="file-accessed text-muted">Last accessed: 43 minutes
                        ago</small>
                </div>
            </div>
            <div class="card file-manager-item file">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck10" />
                    <label class="custom-control-label" for="customCheck10"></label>
                </div>
                <div class="card-img-top file-logo-wrapper">
                    <div class="dropdown float-right">
                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <img src="../../../theme/images/icons/json.png" alt="file-icon" height="35" />
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-wrapper">
                        <p class="card-text file-name mb-0">users.json</p>
                        <p class="card-text file-size mb-0">200kb</p>
                        <p class="card-text file-date">12 may 2019</p>
                    </div>
                    <small class="file-accessed text-muted">Last accessed: 1 hour ago</small>
                </div>
            </div>
            <div class="d-none flex-grow-1 align-items-center no-result mb-3">
                <i data-feather="alert-circle" class="mr-50"></i> No Results
            </div>
        </div>
        <!-- /Files Container Ends -->
    </div>
</div>

@endsection