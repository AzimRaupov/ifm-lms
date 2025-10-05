@extends('layouts.admin')

@section('body-class')
    navbar-vertical-aside-mini-mode
@endsection

@section('content-main')
    <div class="table-responsive datatable-custom">
        <table id="datatableColumnSearch" class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
               data-hs-datatables-options='{
                 "order": [],
                 "orderCellsTop": true
               }'>
            <thead class="thead-light">
            <tr>
                <th>Имя</th>
                <th>Возраст</th>
                <th>Номер</th>

                <th>Почта</th>
                <th>Предмет</th>
            </tr>
            <tr>
                <form action="{{route('admin.teacher.store')}}" method="post">
                    @csrf
                <th>
                    <input type="text" id="column1_search" name="name" class="form-control form-control-sm" placeholder="Поное имя">
                </th>
                    <th>
                        <input type="number" id="column2_search" name="old" class="form-control form-control-sm" placeholder="возраст">
                    </th>

                    <th>
                    <input type="number" id="column2_search" name="number" class="form-control form-control-sm" placeholder="Номер">
                </th>
                <th>
                    <input type="text" id="column3_search" name="email" class="form-control form-control-sm" placeholder="Эл.Почта">
                </th>
                <th>

                    <div class="tom-select-custom tom-select-custom-with-tags">
                        <select class="js-select form-select" name="subjects[]" autocomplete="off" multiple
                                data-hs-tom-select-options='{
            "placeholder": "Select a person..."
          }'>
                        @foreach($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->subject}}</option>
                        @endforeach
                        </select>
                    </div>

                                   </th>
                    <th>
                        <input type="submit" value="Добавить" class="btn btn-primary">
                    </th>
                </form>
            </tr>
            </thead>

            <tbody>

            @foreach($teachers as $teacher)

            <tr>
                <td>
                    <span class="d-block h5 text-hover-primary mb-0">{{$teacher->name}} <i class="bi-patch-check-fill text-primary" data-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                </td>

                <td>
                    <span class="d-block h5 mb-0">{{$teacher->number}}</span>
                </td>
                <td>{{$teacher->email}}</td>
                <td>
dsds
                </td>
            </tr>

            @endforeach
            </tbody>
        </table>
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
