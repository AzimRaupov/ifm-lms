@extends('layouts.app')

@section('head')
    <script src="{{asset('js/main.js')}}"></script>
@endsection

@section('content-main')
    @if($tests->count()>0)
        <style>
            :root {
                --primary-color: #2563eb;
                --success-color: #10b981;
                --bg-color: #f3f4f6;
                --card-bg: #ffffff;
                --text-color: #1f2937;
                --border-color: #e5e7eb;
                --shadow: 0 10px 30px rgba(0,0,0,0.05);
                --shadow-hover: 0 12px 28px rgba(0,0,0,0.1);
                --radius: 16px;
            }

            body {
                background: var(--bg-color);
                font-family: "Inter", sans-serif;
                padding: 2rem 0;
            }

            .nav-segment {
                background: #fff;
                padding: 0.5rem;
                border-radius: var(--radius);
                display: inline-flex;
                gap: 0.5rem;
                box-shadow: var(--shadow);
                margin-bottom: 2rem;
            }

            .nav-segment .nav-link {
                padding: 0.5rem 1rem;
                border-radius: 8px;
                font-weight: 500;
                color: #6b7280;
                transition: all 0.3s;
            }

            .nav-segment .nav-link.active {
                background: var(--primary-color);
                color: #fff;
                box-shadow: var(--shadow-hover);
            }

            /* Test Card */
            .tests_list.card {
                max-width: 900px;
                margin: 2rem auto;
                border-radius: var(--radius);
                background: var(--card-bg);
                padding: 2rem;
                box-shadow: var(--shadow);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .tests_list.card:hover {
                transform: translateY(-3px);
                box-shadow: var(--shadow-hover);
            }

            .tests_list h2 {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
                color: var(--text-color);
            }

            /* Form Controls */
            .form-control {
                border: 1px solid var(--border-color);
                border-radius: 10px;
                padding: 0.75rem;
                font-size: 1rem;
                transition: all 0.3s;
            }

            .form-control:focus {
                outline: none;
                border-color: var(--primary-color);
                box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
            }

            /* Answer options */
            .answer-option {
                border: 1px solid var(--border-color);
                border-radius: 10px;
                padding: 0.75rem 1rem;
                margin-bottom: 0.5rem;
                display: flex;
                align-items: center;
                gap: 1rem;
                cursor: pointer;
                transition: all 0.2s;
            }

            .answer-option:hover {
                border-color: var(--primary-color);
                background: #f3f4f6;
            }

            .answer-option input {
                width: 20px;
                height: 20px;
                cursor: pointer;
                accent-color: var(--primary-color);
            }

            .answer-option label {
                flex: 1;
                margin: 0;
                font-size: 1rem;
                cursor: pointer;
            }

            .answer-option input:checked ~ label {
                font-weight: 600;
                color: var(--primary-color);
            }

            /* Matching test */
            .matching-test {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
                margin-top: 1.5rem;
            }

            .matching-column {
                background: #f9fafb;
                border-radius: var(--radius);
                padding: 1rem;
                box-shadow: var(--shadow);
            }

            .matching-column h3 {
                font-size: 0.9rem;
                font-weight: 600;
                color: #6b7280;
                margin-bottom: 1rem;
            }

            .list-group {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }

            .list-group-item {
                padding: 0.75rem 1rem;
                border-radius: 10px;
                border: 1px solid var(--border-color);
                background: #fff;
                cursor: grab;
                transition: all 0.2s;
                font-weight: 500;
            }

            .list-group-item:hover {
                box-shadow: var(--shadow-hover);
                transform: translateY(-2px);
            }

            .list1 .list-group-item {
                cursor: default;
                background: #e0e7ff;
                color: #1e3a8a;
                border: none;
            }

            .sortable-ghost {
                opacity: 0.5;
            }

            /* Buttons */
            .btn {
                padding: 0.75rem 1.5rem;
                border-radius: 10px;
                font-weight: 500;
                border: none;
                cursor: pointer;
                transition: all 0.2s;
            }

            .btn-primary { background: var(--primary-color); color:#fff; }
            .btn-success { background: var(--success-color); color:#fff; }

            .btn:hover { transform: translateY(-2px); box-shadow: var(--shadow-hover); }

            @media(max-width:768px) { .matching-test { grid-template-columns: 1fr; } .btn { width: 100%; } }
        </style>

        <div class="text-center mb-4">
            <ul class="nav nav-segment nav-pills" role="tablist">
                @foreach($tests as $index => $test)
                    <li class="nav-item">
                        <a class="nav-link {{ $index === 0 ? 'active' : '' }}"
                           id="test_nav{{ $test->id }}"
                           href="#tab{{ $test->id }}"
                           data-bs-toggle="pill"
                           data-bs-target="#tab{{ $test->id }}"
                           role="tab"
                           aria-controls="tab{{ $test->id }}"
                           aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                            Вопрос {{ $index + 1 }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tab-content">
            @foreach($tests as $index => $test)
                <div class="tests_list card tab-pane fade {{ $index===0?'show active':'' }}" id="tab{{ $test->id }}" role="tabpanel" aria-labelledby="test_nav{{ $test->id }}">
                    <div class="card-body" data-name="{{ $test->id }}" data-value="{{ $test->type_test }}">
                        <h2>{{ $test->text }}</h2>

                        @if($test->type_test=="question_answer")
                            <textarea class="form-control" name="answer_{{ $test->id }}" rows="6" placeholder="Введите ответ..."></textarea>
                        @elseif($test->type_test=="one_correct" || $test->type_test=="list_correct")
                            @foreach($test->variantss as $in=>$variant)
                                <div class="answer-option">
                                    <input type="{{ $test->type_test=="one_correct"?"radio":"checkbox" }}"
                                           id="variant-{{ $test->id }}-{{ $in }}"
                                           name="correct_{{ $test->id }}[]"
                                           value="{{ $in }}">
                                    <label for="variant-{{ $test->id }}-{{ $in }}">{{ $variant->variant }}</label>
                                </div>
                            @endforeach
                        @elseif($test->type_test=="matching")
                            @php $test->lists2 = $test->lists2->shuffle(); @endphp
                            <div class="matching-test" data-test-id="{{ $test->id }}">
                                <div class="matching-column">
                                    <h3>Вопросы</h3>
                                    <div id="list1-{{ $test->id }}" class="list-group list1 js-sortable">
                                        @foreach($test->lists1 as $in=>$list)
                                            <div class="list-group-item" id="item1-{{ $test->id }}-{{ $in }}">
                                                {{ $list->str }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="matching-column">
                                    <h3>Ответы</h3>
                                    <div id="list2-{{ $test->id }}" class="list-group list2 js-sortable">
                                        @foreach($test->lists2 as $in=>$list)
                                            <div class="list-group-item" id="item2-{{ $test->id }}-{{ $in }}">
                                                {{ $list->str }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @elseif($test->type_test=="true_false")
                            <div class="answer-option">
                                <input type="radio" id="true_{{ $test->id }}" name="true_false_{{ $test->id }}" value="1">
                                <label for="true_{{ $test->id }}">Да</label>
                            </div>
                            <div class="answer-option">
                                <input type="radio" id="false_{{ $test->id }}" name="true_false_{{ $test->id }}" value="0">
                                <label for="false_{{ $test->id }}">Нет</label>
                            </div>
                        @endif

                        @if($index < count($tests)-1)
                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-primary next-tab-btn" data-next-tab="#tab{{ $tests[$index+1]->id }}">
                                    Следующий вопрос →
                                </button>
                            </div>
                        @endif

                        @if($index === count($tests)-1)
                            <div class="text-center mt-4">
                                <button class="btn btn-success" onclick="pr_test()">✓ Завершить тест</button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.matching-test').forEach(container=>{
                const testId = container.dataset.testId;
                const list1 = document.getElementById(`list1-${testId}`);
                const list2 = document.getElementById(`list2-${testId}`);
                if(list1 && list2){
                    new Sortable(list1, { sort:false, group:{name:'match-'+testId, pull:'clone', put:false} });
                    new Sortable(list2, { animation:200, group:{name:'match-'+testId, pull:false, put:true} });
                }
            });

            document.querySelectorAll('.next-tab-btn').forEach(btn=>{
                btn.addEventListener('click',()=>{
                    const nextLink = document.querySelector(`a[href="${btn.dataset.nextTab}"]`);
                    if(nextLink) new bootstrap.Tab(nextLink).show();
                });
            });
        });

        function pr_test(){
            const tests = document.querySelectorAll('.tests_list');
            const results = [];
            tests.forEach(test=>{
                const testId = test.querySelector('.card-body').dataset.name;
                const typeTest = test.querySelector('.card-body').dataset.value;
                let answer = null;
                if(typeTest==="question_answer"){
                    answer = test.querySelector('textarea').value;
                } else if(typeTest==="one_correct"||typeTest==="true_false"){
                    const sel = test.querySelector('input[type="radio"]:checked');
                    answer = sel?sel.value:null;
                } else if(typeTest==="list_correct"){
                    answer = Array.from(test.querySelectorAll('input[type="checkbox"]:checked')).map(e=>e.value);
                } else if(typeTest==="matching"){
                    answer = Array.from(test.querySelectorAll(`#list2-${testId} .list-group-item`)).map(i=>i.textContent.trim());
                }
                results.push({test_id:testId,type:typeTest,answer});
            });

            $.ajax({
                url:`{{ route('test.check') }}`,
                type:"POST",
                headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},
                contentType:"application/json",
                data:JSON.stringify({id:{{$request->id}},answer:results}),
                success:res=>location.reload(),
                error:(xhr,status,error)=>console.error(error)
            });
        }
    </script>
@endsection
