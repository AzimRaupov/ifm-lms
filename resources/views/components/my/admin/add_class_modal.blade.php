<div class="modal fade" id="createClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.class.store')}}" method="post">

                <div class="modal-body">
                    @csrf
                    <label for="literal_int" class="form-label">Класс</label>
                    <input type="text" name="literal_int" class="form-control" id="literal_int" placeholder="">
                    <label for="literal_char" class="form-label">Литерал</label>
                    <input type="text" name="literal_char" class="form-control" id="literal_char" placeholder="">
                    <label for="teacher_id" class="form-label">Teacher</label>
                    <select name="teacher_id" class="form-select">
                        @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>
