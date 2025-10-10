@extends('layouts.admin')

@section('body-class')
    navbar-vertical-aside-mini-mode
@endsection
@section('new')
    HSCore.components.HSQuill.init('.js-quill')
    HSCore.components.HSDropzone.init('.js-dropzone')

@endsection
@section('content-main')

    @include('components.my.admin.add_teacher_modal')






    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Админ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Учителя</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Учителя</h1>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#add_teacher_modal">
                        <i class="bi-plus me-1"></i> Добавить
                    </a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->


        </div>
        <!-- End Page Header -->


@include('components.my.admin.teacher_table')
    </div>
@endsection


@section('script')

    <script>
        (function() {
            // INITIALIZATION OF SELECT
            // =======================================================
            HSCore.components.HSTomSelect.init('.js-select')
        })();
    </script>
@endsection
