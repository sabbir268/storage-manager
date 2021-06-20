@extends('dashboard.dashboard')

@push('styles')
<style>
    .import-button {
        position: absolute;
        right: 18px;
        top: 66px;
        float: right;
        display: inline-block;
        z-index: 100;
    }

    form {
        height: inherit;
    }
</style>
@endpush

@section('page')

<div class="file-manager-main-content">
    <!-- search area start -->
    <div class="file-manager-content-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="sidebar-toggle d-block d-xl-none float-left align-middle ml-1">
                <i data-feather="menu" class="font-medium-5"></i>
            </div>
            <x-breadcrumb pageText="Your Google Drive Files" />
        </div>
    </div>
    <form action="{{route('drive.import')}}" method="POST">
        @csrf

        <button class="btn btn-success import-button" type="button" data-toggle="modal"
            data-target="#add-file-from-drive">Import
            Selected File</button>
        <!-- search area ends here -->

        <div class="file-manager-content-body">
            <div class="view-container">
                <h6 class="files-section-title mt-25 mb-75">Folders</h6>

                @foreach ($dirs as $dir)
                <div class="card file-manager-item folder">
                    <a href="{{route('drive.contents').'?path='.$dir['basename']}}">
                        <div class="custom-control custom-checkbox">
                            {{-- <input type="checkbox" class="custom-control-input" 
                                id="customCheck-{{$dir['basename']}}" /> --}}
                            {{-- <label class="custom-control-label" for="customCheck-{{$dir['basename']}}"></label>
                            --}}
                        </div>
                        <div class="card-img-top file-logo-wrapper">
                            <div class="dropdown float-right">
                                <i data-feather="more-vertical" class=" mt-n25"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-center w-100">
                                <i data-feather="folder"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="content-wrapper">
                                <p class="card-text file-name mb-0">{{$dir['name']}}</p>
                            </div>
                            <small class="file-accessed text-muted">Created At:
                                {{date('d-M-Y',$dir['timestamp'])}}</small>
                        </div>
                    </a>
                </div>
                @endforeach

                <h6 class="files-section-title mt-2 mb-75">Files</h6>
                @foreach ($files as $file)
                <div class="card file-manager-item file">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input file-to-import"
                            id="customCheck-{{$file['basename']}}" name="toArchive[]" value="{{json_encode($file)}}" />
                        {{-- <input type="hidden" value="{{$file['name']}}" id="archivedName" name="fileName[]"> --}}
                        <label class="custom-control-label" for="customCheck-{{$file['basename']}}"></label>
                    </div>
                    <div class="card-img-top file-logo-wrapper">
                        <div class="dropdown float-right">
                            <i data-feather="more-vertical invisible" class="toggle-dropdown mt-n25"></i>
                        </div>
                        <div class="d-flex align-items-center justify-content-center w-100">
                            <img src="../../../theme/images/icons/doc.png" alt="file-icon" height="35" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="content-wrapper">
                            <p class="card-text file-name mb-0">{{$file['name']}}</p>
                        </div>
                        <small class="file-accessed text-muted">Created At:
                            {{date('d-M-Y',$file['timestamp'])}}</small>
                    </div>
                </div>
                @endforeach

                <div class="d-none flex-grow-1 align-items-center no-result mb-3">
                    <i data-feather="alert-circle" class="mr-50"></i> No Results
                </div>
            </div>
        </div>

        @php
        $categories = \App\Models\Category::all();
        $subcategories = \App\Models\SubCategory::all();
        @endphp
        <div class="modal fade" id="add-file-from-drive">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Files From Drive</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_id" class="form-label">Category Name</label>
                            <select class="custom-select" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="badge-warning">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="form-label">Sub Category Name</label>
                            <select class="custom-select" id="sub_category_id" name="sub_category_id">
                                @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="badge-warning">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-1">Create</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('.file-to-import')
    })
</script>
@endpush