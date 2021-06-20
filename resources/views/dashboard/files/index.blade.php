@extends('dashboard.dashboard')

@section('page')


<div class="file-manager-main-content">
    <!-- search area start -->
    <div class="file-manager-content-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="sidebar-toggle d-block d-xl-none float-left align-middle ml-1">
                <i data-feather="menu" class="font-medium-5"></i>
            </div>
            <x-breadcrumb pageText="All Category" />
        </div>
    </div>
    <!-- search area ends here -->

    <div class="file-manager-content-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-2">
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
