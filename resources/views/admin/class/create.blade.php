@extends('layouts.admin')


@section('content-main')
    <div class="table-responsive datatable-custom">
        <table id="datatableColumnSearch" class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
               data-hs-datatables-options='{
                 "order": [],
                 "orderCellsTop": true
               }'>
            <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Country</th>
                <th>Status</th>
            </tr>
            <tr>
                <th>
                    <input type="text" id="column1_search" class="form-control form-control-sm" placeholder="Search names">
                </th>
                <th>
                    <input type="text" id="column2_search" class="form-control form-control-sm" placeholder="Search positions">
                </th>
                <th>
                    <input type="text" id="column3_search" class="form-control form-control-sm" placeholder="Search countries">
                </th>
                <th>
                    <div class="tom-select-custom">
                        <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" autocomplete="off"
                                data-target-column-index="3"
                                data-target-table="datatableColumnSearch"
                                data-hs-tom-select-options='{
                    "searchInDropdown": false,
                    "hideSearch": true,
                    "dropdownWidth": "10rem"
                  }'>
                            <option value="null" selected>Any</option>
                            <option value="Active">Active</option>
                            <option value="Pending">Pending</option>
                            <option value="Suspended">Suspended</option>
                        </select>
                    </div>
                </th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>
                    <span class="d-block h5 text-hover-primary mb-0">Amanda Harvey <i class="bi-patch-check-fill text-primary" data-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                    <span class="d-block fs-5 text-body">amanda@example.com</span>
                </td>
                <td>
                    <span class="d-block h5 mb-0">Director</span>
                    <span class="d-block fs-5">Human resources</span>
                </td>
                <td>United Kingdom</td>
                <td>
                    <span class="legend-indicator bg-success"></span>Active
                </td>
            </tr>

            <tr>
                <td>
                    <span class="d-block h5 text-hover-primary mb-0">Anne Richard</span>
                    <span class="d-block fs-5 text-body">anne@example.com</span>
                </td>
                <td>
                    <span class="d-block h5 mb-0">Seller</span>
                    <span class="d-block fs-5">Branding products</span>
                </td>
                <td>United States</td>
                <td>
                    <span class="legend-indicator bg-warning"></span>Pending
                </td>
            </tr>

            <tr>
                <td>
                    <span class="d-block h5 text-hover-primary mb-0">David Harrison</span>
                    <span class="d-block fs-5 text-body">david@example.com</span>
                </td>
                <td>
                    <span class="d-block h5 mb-0">Unknown</span>
                    <span class="d-block fs-5">Unknown</span>
                </td>
                <td>United States</td>
                <td>
                    <span class="legend-indicator bg-success"></span>Active
                </td>
            </tr>

            <tr>
                <td>
                    <span class="d-block h5 text-hover-primary mb-0">Finch Hoot</span>
                    <span class="d-block fs-5 text-body">finch@example.com</span>
                </td>
                <td>
                    <span class="d-block h5 mb-0">Designer</span>
                    <span class="d-block fs-5">IT department</span>
                </td>
                <td>Argentina</td>
                <td>
                    <span class="legend-indicator bg-danger"></span>Suspended
                </td>
            </tr>

            <tr>
                <td>
                    <span class="d-block h5 text-hover-primary mb-0">Bob Dean</span>
                    <span class="d-block fs-5 text-body">bob@example.com</span>
                </td>
                <td>
                    <span class="d-block h5 mb-0">Executive director</span>
                    <span class="d-block fs-5">Marketing</span>
                </td>
                <td>Austria</td>
                <td>
                    <span class="legend-indicator bg-success"></span>Active
                </td>
            </tr>

            <tr>
                <td>
                    <span class="d-block h5 text-hover-primary mb-0">Ella Lauda <i class="bi-patch-check-fill text-primary" data-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                    <span class="d-block fs-5 text-body">ella@example.com</span>
                </td>
                <td>
                    <span class="d-block h5 mb-0">Co-founder</span>
                    <span class="d-block fs-5">All departments</span>
                </td>
                <td>United Kingdom</td>
                <td>
                    <span class="legend-indicator bg-success"></span>Active
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

