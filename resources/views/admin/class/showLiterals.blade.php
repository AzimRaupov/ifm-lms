@extends('layouts.admin')


@section('content-main')
    @include('components.my.admin.add_class_modal')
    @include('components.my.admin.add_teacher_modal')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Управление</h1>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_teacher_modal">
                        <i class="bi-person-plus-fill me-1"></i> Добавить учителя
                    </a>
                </div>
                <div class="col-auto">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createClass">
                        <i class="bi-person-plus-fill me-1"></i> Создать класс
                    </a>
                </div>
            </div>
        </div>

        <div class="row g-3 justify-content-start" style="margin-bottom: 20px;">
            @foreach($classes as $class)
                <div class="col-12 col-md-4"> <!-- на мобильных 1 в ряд, на планшете и выше 3 в ряд -->
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="me-2">
                                    <h4 class="text-wrap">Классы: {{$class->literal_int.$class->literal_char}}</h4>


                                </div>

                                <div class="ms-auto">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" data-bs-toggle="dropdown">
                                            <i class="bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{route('admin.class.show',$class->id)}}"><i class="bi-pencil dropdown-item-icon"></i>Добавить ученика</a>
                                            <a class="dropdown-item" href="{{route('admin.class.teachers',$class->id)}}"><i class="bi-pencil dropdown-item-icon"></i>Добавить учителя</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="row mb-3 text-center">
                                <div class="col">
                                    <div class="text-center">
                                        <span class="d-block h4 mb-1">{{$class->students->count()}}</span>
                                        <span class="d-block fs-6">Ученики</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-center">
                                        <span class="d-block h4 mb-1"></span>
                                        <span class="d-block fs-6">Учащийся</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-center">
                                        <span class="d-block h4 mb-1"></span>
                                        <span class="d-block fs-6">Выпускники</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Progress -->
                            <div class="progress mb-3">
                                <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                            </div>
                            <a href="{{route('admin.class.teachers',$class->id)}}" class="btn btn-primary mt-auto">
                                Учителя
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <h1 class="page-header-title">Учителя:</h1>




        @include('components.my.admin.teacher_table')


        <div class="row">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-sm-between">
                        <h4 class="card-header-title mb-2 mb-sm-0">Transactions</h4>
                        <button id="js-daterangepicker-predefined" class="btn btn-ghost-secondary btn-sm dropdown-toggle">
                            <i class="bi-calendar-week"></i>
                            <span class="js-daterangepicker-predefined-preview ms-1"></span>
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="chartjs-custom mx-auto" style="height: 20rem;">
                            <canvas class="js-chart-datalabels" data-hs-chartjs-options='{
                              "type": "bubble",
                              "data": {
                                "datasets": [
                                  {
                                    "label": "Label 1",
                                    "data": [
                                      {"x": 50, "y": 65, "r": 99}
                                    ],
                                    "color": "#fff",
                                    "backgroundColor": "rgba(55, 125, 255, 0.9)",
                                    "borderColor": "transparent"
                                  },
                                  {
                                    "label": "Label 2",
                                    "data": [
                                      {"x": 46, "y": 42, "r": 65}
                                    ],
                                    "color": "#fff",
                                    "backgroundColor": "rgba(100, 0, 214, 0.8)",
                                    "borderColor": "transparent"
                                  },
                                  {
                                    "label": "Label 3",
                                    "data": [
                                      {"x": 48, "y": 15, "r": 38}
                                    ],
                                    "color": "#fff",
                                    "backgroundColor": "#00c9db",
                                    "borderColor": "transparent"
                                  },
                                  {
                                    "label": "Label 3",
                                    "data": [
                                      {"x": 55, "y": 2, "r": 61}
                                    ],
                                    "color": "#fff",
                                    "backgroundColor": "#4338ca",
                                    "borderColor": "transparent"
                                  }
                                ]
                              },
                              "options": {
                                "scales": {
                                  "y": {
                                    "grid": {
                                      "display": false,
                                      "drawBorder": false
                                    },
                                    "ticks": {
                                      "display": false,
                                      "max": 100,
                                      "beginAtZero": true
                                    }
                                  },
                                  "x": {
                                  "grid": {
                                      "display": false,
                                      "drawBorder": false
                                    },
                                    "ticks": {
                                      "display": false,
                                      "max": 100,
                                      "beginAtZero": true
                                    }
                                  }
                                },
                                "plugins": {
                                  "tooltip": false
                                }
                              }
                            }'></canvas>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <span class="legend-indicator bg-primary"></span> New
                            </div>
                            <div class="col-auto">
                                <span class="legend-indicator" style="background-color: #7000f2;"></span> Pending
                            </div>
                            <div class="col-auto">
                                <span class="legend-indicator bg-info"></span> Failed
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Reports overview</h4>
                        <div class="dropdown">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="reportsOverviewDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="reportsOverviewDropdown1">
                                <span class="dropdown-header">Settings</span>

                                <a class="dropdown-item" href="#">
                                    <i class="bi-share-fill dropdown-item-icon"></i> Share reports
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-download dropdown-item-icon"></i> Download
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-alt dropdown-item-icon"></i> Connect other apps
                                </a>

                                <div class="dropdown-divider"></div>

                                <span class="dropdown-header">Feedback</span>

                                <a class="dropdown-item" href="#">
                                    <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <span class="h1 d-block mb-4">$7,431.14 USD</span>

                        <div class="progress rounded-pill mb-2">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="Gross value"></div>
                            <div class="progress-bar opacity-50" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="Net volume from sales"></div>
                            <div class="progress-bar opacity-25" role="progressbar" style="width: 9%" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="New volume from sales"></div>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <span>0%</span>
                            <span>100%</span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-lg table-nowrap card-table mb-0">
                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator bg-primary"></span>Gross value
                                    </th>
                                    <td>$3,500.71</td>
                                    <td>
                                        <span class="badge bg-soft-success text-success">+12.1%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator bg-primary opacity-50"></span>Net volume from sales
                                    </th>
                                    <td>$2,980.45</td>
                                    <td>
                                        <span class="badge bg-soft-warning text-warning">+6.9%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator bg-primary opacity-25"></span>New volume from sales
                                    </th>
                                    <td>$950.00</td>
                                    <td>
                                        <span class="badge bg-soft-danger text-danger">-1.5%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator"></span>Other
                                    </th>
                                    <td>32</td>
                                    <td>
                                        <span class="badge bg-soft-success text-success">1.9%</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

