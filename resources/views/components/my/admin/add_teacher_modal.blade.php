<div class="modal fade" id="add_teacher_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Добавиь учителя</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.teacher.store')}}" method="post">

                <div class="modal-body">
                    @csrf
                    <label for="name">Полное имя</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <label for="subjects">Предметы</label>

                    <div class="tom-select-custom tom-select-custom-with-tags">
                        <select class="js-select form-select" autocomplete="off" name="subjects[]" multiple
                                data-hs-tom-select-options='{
            "placeholder": "Select a person..."
          }'>
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->subject}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="email">Эл.Почта</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <label for="number">Телефон</label>
                    <input type="number" name="number" id="number" class="form-control">
                    <label for="old">Возраст</label>
                    <input type="number" name="old" id="old" class="form-control">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>
