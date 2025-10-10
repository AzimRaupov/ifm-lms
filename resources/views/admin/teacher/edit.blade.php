@extends('layouts.admin')


@section('content-main')



    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Редактировать {{$teacher->name}}</h1>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createClass">
                        <i class="bi-person-plus-fill me-1"></i> Создать класс
                    </a>
                </div>
            </div>
        </div>



        <!-- End Row -->

        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
            <div class="card-body">
                <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="POST">
                    @csrf


                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Полное имя</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name', $teacher->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="subjects" class="form-label">Предметы</label>
                            <div class="tom-select-custom tom-select-custom-with-tags">
                                <select class="js-select form-select" autocomplete="off" name="subjects[]" multiple
                                        data-hs-tom-select-options='{"placeholder": "Выберите предмет..."}'>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ $teacher->subjects->contains($subject->id) ? 'selected' : '' }}>
                                            {{ $subject->subject }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Эл. почта</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{ old('email', $teacher->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="number" class="form-label">Телефон</label>
                            <input type="tel" name="number" id="number" class="form-control"
                                   value="{{ old('number', $teacher->number) }}">
                        </div>

                        <div class="mb-3">
                            <label for="old" class="form-label">Возраст</label>
                            <input type="number" name="old" id="old" class="form-control"
                                   value="{{ old('old', $teacher->old) }}">
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">


                            <button type="submit" name="destroy" value="1" class="btn btn-danger">Удалить</button>


                        <button type="submit" name="update" value="1" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>
            </div>
        </div>


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
