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
                    <input id="datatableSearch" type="search" class="form-control" placeholder="Поиск учителя" aria-label="Search users">
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
                  Выбрано
                </span>
                    <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                        <i class="bi-trash"></i> Удалить
                    </a>
                </div>
            </div>
            <!-- End Datatable Info -->

            <!-- Dropdown -->
            <div class="dropdown">
                <button type="button" class="btn btn-white btn-sm dropdown-toggle w-100" id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-download me-2"></i> Скачать
                </button>

                <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                    <span class="dropdown-header">Формат</span>

                    <a id="export-excel" class="dropdown-item" href="javascript:;">
                        <img class="avatar avatar-xss avatar-4x3 me-2" src="{{asset('assets/svg/brands/excel-icon.svg')}}" alt="Image Description">
                        Excel
                    </a>
                    <a id="export-csv" class="dropdown-item" href="javascript:;">
                        <img class="avatar avatar-xss avatar-4x3 me-2" src="{{asset('assets/svg/components/placeholder-csv-format.svg')}}" alt="Image Description">
                        .CSV
                    </a>
                    <a id="export-pdf" class="dropdown-item" href="javascript:;">
                        <img class="avatar avatar-xss avatar-4x3 me-2" src="{{asset('assets/svg/brands/pdf-icon.svg')}}" alt="Image Description">
                        PDF
                    </a>
                </div>
            </div>
            <!-- End Dropdown -->

            <!-- Dropdown -->
            <!-- End Dropdown -->
        </div>
    </div>
    <!-- End Header -->

    <!-- Table -->
    <div class="table-responsive datatable-custom">
        <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0],
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
            </tr>
            </thead>

            <tbody>
            @foreach($teachers as $teacher)

                <tr>
                    <td class="table-column-pe-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="usersDataCheck1">
                            <label class="form-check-label" for="usersDataCheck1"></label>
                        </div>
                    </td>
                    <td class="table-column-ps-0">
                        <a class="d-flex align-items-center" href="{{route('admin.teacher.edit',$teacher->id)}}">
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
                    <span class="me-2">Показаны:</span>

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
