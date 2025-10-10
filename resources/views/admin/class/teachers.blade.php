@extends('layouts.admin')

@section('body-class')
    navbar-vertical-aside-mini-mode
@endsection
@section('new')
    HSCore.components.HSQuill.init('.js-quill')
    HSCore.components.HSDropzone.init('.js-dropzone')

@endsection
@section('content-main')

    <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.class.create_magazine')}}" method="post">

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="class_id" value="{{$class->id}}">
                        <label class="form-label">Предмет</label>
                        <div class="tom-select-custom">
                            <select class="js-select form-select" autocomplete="off"
                                    name="subject_id"
                                    data-hs-tom-select-options='{
            "placeholder": "Select user..."
          }'>

                                <option value="">Select a person...</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="form-label">Учитель</label>
                        <div class="tom-select-custom">
                            <select class="js-select form-select" autocomplete="off"
                                    name="teacher_id"
                                    data-hs-tom-select-options='{
            "placeholder": "Select user..."
          }'>

                                <option value="">Select a person...</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <br><br>
                        <!-- End Select -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>






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
                    <a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
                        <i class="bi-plus me-1"></i> Добавить
                    </a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

            <!-- Nav -->
            <ul class="nav nav-tabs page-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="projects.html">
                        Projects <span class="badge bg-soft-dark text-dark ms-1">24</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="projects-timeline.html">
                        Timeline
                    </a>
                </li>
            </ul>
            <!-- End Nav -->
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
            <!-- Body -->
            <div class="card-body">
                <div class="d-flex align-items-md-center">
                    <div class="flex-shrink-0">
                        <span class="display-3 text-dark">24</span>
                    </div>

                    <div class="flex-grow-1 ms-3">
                        <div class="row mx-md-n3">
                            <div class="col-md px-md-4">
                                <span class="d-block">Total projects</span>
                                <span class="badge bg-soft-danger text-danger rounded-pill p-1">
                    <i class="bi-graph-down"></i> -2 late in due
                  </span>
                            </div>
                            <!-- End Col -->

                            <div class="col-md-9 col-lg-10 column-md-divider px-md-4">
                                <div class="row justify-content-start mb-2">
                                    <div class="col-auto">
                                        <span class="legend-indicator bg-primary"></span>
                                        In progress (10)
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-auto">
                                        <span class="legend-indicator bg-success"></span>
                                        Completed (8)
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-auto">
                                        <span class="legend-indicator"></span>
                                        To do (6)
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->

                                <!-- Progress -->
                                <div class="progress rounded-pill">
                                    <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!-- End Progress -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
            </div>
            <!-- End Body -->
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header card-header-content-md-between">
                <div class="mb-2 mb-md-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>

                <div class="d-grid d-sm-flex justify-content-md-end align-items-sm-center gap-2">
                    <!-- Datatable Info -->
                    <div id="datatableCounterInfo" style="display: none;">
                        <div class="d-flex align-items-center">
                <span class="fs-5 me-3">
                  <span id="datatableCounter">0</span>
                  Selected
                </span>
                            <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                                <i class="bi-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                    <!-- End Datatable Info -->

                    <!-- Dropdown -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-white btn-sm dropdown-toggle w-100" id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-download me-2"></i> Export
                        </button>

                        <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                            <span class="dropdown-header">Options</span>
                            <a id="export-copy" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/illustrations/copy-icon.svg" alt="Image Description">
                                Copy
                            </a>
                            <a id="export-print" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/illustrations/print-icon.svg" alt="Image Description">
                                Print
                            </a>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-header">Download options</span>
                            <a id="export-excel" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/brands/excel-icon.svg" alt="Image Description">
                                Excel
                            </a>
                            <a id="export-csv" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/components/placeholder-csv-format.svg" alt="Image Description">
                                .CSV
                            </a>
                            <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/brands/pdf-icon.svg" alt="Image Description">
                                PDF
                            </a>
                        </div>
                    </div>
                    <!-- End Dropdown -->

                    <!-- Dropdown -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-white btn-sm w-100" id="usersFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-filter me-1"></i> Filter <span class="badge bg-soft-dark text-dark rounded-circle ms-1">2</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-sm-end dropdown-card card-dropdown-filter-centered" aria-labelledby="usersFilterDropdown" style="min-width: 22rem;">
                            <!-- Card -->
                            <div class="card">
                                <div class="card-header card-header-content-between">
                                    <h5 class="card-header-title">Filter users</h5>

                                    <!-- Toggle Button -->
                                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm ms-2">
                                        <i class="bi-x-lg"></i>
                                    </button>
                                    <!-- End Toggle Button -->
                                </div>

                                <div class="card-body">
                                    <form>
                                        <div class="mb-4">
                                            <small class="text-cap text-body">Role</small>

                                            <div class="row">
                                                <div class="col">
                                                    <!-- Check -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="usersFilterCheckAll" checked="">
                                                        <label class="form-check-label" for="usersFilterCheckAll">
                                                            All
                                                        </label>
                                                    </div>
                                                    <!-- End Check -->
                                                </div>
                                                <!-- End Col -->

                                                <div class="col">
                                                    <!-- Check -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="usersFilterCheckEmployee">
                                                        <label class="form-check-label" for="usersFilterCheckEmployee">
                                                            Employee
                                                        </label>
                                                    </div>
                                                    <!-- End Check -->
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                            <!-- End Row -->
                                        </div>

                                        <div class="row">
                                            <div class="col-sm mb-4">
                                                <small class="text-cap text-body">Position</small>

                                                <!-- Select -->
                                                <div class="tom-select-custom">
                                                    <select class="js-select js-datatable-filter form-select form-select-sm" data-target-column-index="2" data-hs-tom-select-options='{
                                      "placeholder": "Any",
                                      "searchInDropdown": false,
                                      "hideSearch": true,
                                      "dropdownWidth": "10rem"
                                    }'>
                                                        <option value="">Any</option>
                                                        <option value="Accountant">Accountant</option>
                                                        <option value="Co-founder">Co-founder</option>
                                                        <option value="Designer">Designer</option>
                                                        <option value="Developer">Developer</option>
                                                        <option value="Director">Director</option>
                                                    </select>
                                                    <!-- End Select -->
                                                </div>
                                            </div>
                                            <!-- End Col -->

                                            <div class="col-sm mb-4">
                                                <small class="text-cap text-body">Status</small>

                                                <!-- Select -->
                                                <div class="tom-select-custom">
                                                    <select class="js-select js-datatable-filter form-select form-select-sm" data-target-column-index="4" data-hs-tom-select-options='{
                                      "placeholder": "Any status",
                                      "searchInDropdown": false,
                                      "hideSearch": true,
                                      "dropdownWidth": "10rem"
                                    }'>
                                                        <option value="">Any status</option>
                                                        <option value="Completed" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success"></span>Completed</span>'>Completed</option>
                                                        <option value="In progress" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-warning"></span>In progress</span>'>In progress</option>
                                                        <option value="To do" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger"></span>To do</span>'>To do</option>
                                                    </select>
                                                </div>
                                                <!-- End Select -->
                                            </div>
                                            <!-- End Col -->

                                            <div class="col-12 mb-4">
                                                <small class="text-cap text-body">Members</small>

                                                <!-- Select -->
                                                <div class="tom-select-custom">
                                                    <select class="js-select form-select" autocomplete="off" multiple="" data-hs-tom-select-options='{
                                      "singleMultiple": true,
                                      "hideSelected": false,
                                      "placeholder": "Select member"
                                    }'>
                                                        <option label="empty"></option>
                                                        <option value="AH" selected="" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="./assets/img/160x160/img10.jpg" alt="Image Description" /><span class="text-truncate">Amanda Harvey</span></span>'>Amanda Harvey</option>
                                                        <option value="DH" selected="" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="./assets/img/160x160/img3.jpg" alt="Image Description" /><span class="text-truncate">David Harrison</span></span>'>David Harrison</option>
                                                        <option value="SK" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="./assets/img/160x160/img4.jpg" alt="Image Description" /><span class="text-truncate">Sam Kart</span></span>'>Sam Kart</option>
                                                        <option value="FH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="./assets/img/160x160/img5.jpg" alt="Image Description" /><span class="text-truncate">Finch Hoot</span></span>'>Finch Hoot</option>
                                                        <option value="CQ" selected="" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="./assets/img/160x160/img6.jpg" alt="Image Description" /><span class="text-truncate">Costa Quinn</span></span>'>Costa Quinn</option>
                                                    </select>
                                                </div>
                                                <!-- End Select -->
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->

                                        <div class="d-grid">
                                            <a class="btn btn-primary" href="javascript:;">Apply</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                    </div>
                    <!-- End Dropdown -->
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0, 2, 3, 6, 7],
                      "orderable": false
                    }],
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 15,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
                    <thead class="thead-light">
                    <tr>
                        <th class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                                <label class="form-check-label" for="datatableCheckAll"></label>
                            </div>
                        </th>
                        <th class="table-column-ps-0">Полное имя</th>
                        <th>Номер</th>
                        <th>Эл.Почта</th>
                        <th>Пароль</th>
                        <th>Completion</th>
                        <th><i class="bi-paperclip"></i></th>
                        <th><i class="bi-chat-left-dots"></i></th>
                        <th>Due date</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($class->teachers as $teacher)

                        <tr>
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck1">
                                    <label class="form-check-label" for="usersDataCheck1"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="project.html">
                                    <div class="ms-3">
                                        <span class="d-block h5 text-inherit mb-0">{{$teacher->name}}</span>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{$teacher->number}}
                                </div>
                            </td>
                            <td>
                                {{$teacher->email}}
                            </td>
                            <td>
                                <strong>{{$teacher->password}}</strong>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="fs-6 me-2">35%</span>
                                    <div class="progress table-progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a class="text-body" href="project-files.html">
                                    <i class="bi-paperclip"></i> 10
                                </a>
                            </td>
                            <td>
                                <a class="text-body" href="project-activity.html">
                                    <i class="bi-chat-left-dots"></i> 2
                                </a>
                            </td>
                            <td>05 May</td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Showing:</span>

                            <!-- Select -->
                            <div class="tom-select-custom">
                                <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                                    <option value="10">10</option>
                                    <option value="15" selected="">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <span class="text-secondary me-2">of</span>

                            <!-- Pagination Quantity -->
                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
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
