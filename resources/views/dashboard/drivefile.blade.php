@extends('dashboard.dashboard')

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
    <!-- search area ends here -->

    <div class="file-manager-content-body">
        <div class="view-container">
            <h6 class="files-section-title mt-25 mb-75">Folders</h6>

            @foreach ($dirs as $dir)
            <div class="card file-manager-item folder">
                <a href="{{route('drive.contents').'?path='.$dir['basename']}}">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input file-to-import" name="toArchive[]"
                            id="customCheck-{{$dir['basename']}}" />
                        <label class="custom-control-label" for="customCheck-{{$dir['basename']}}"></label>
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
                        id="customCheck-{{$file['basename']}}" />
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
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('.file-to-import')
    })
</script>
@endpush