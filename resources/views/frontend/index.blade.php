@extends('frontend.layouts.base')


@section('content')
    <!-- Content -->
    <div class="bg-image-container">
        <div class="search-container text-center">

            <form action="/search" method="post" class="d-inline-block mt-4">
                <div class="search-block">
                    <p>
                    <h3 class="align-center">預約居家清潔</h3>
                    </p>
                    <p>
                    <h5 class="align-center">「快篩認證/疫苗認證」上線，服務人員安心挑選！</h5>
                    </p>
                    <ul class="nav nav-tabs mt-4" id="searchTabs" role="tablist">
                        <li class="nav-item" role="presentation" style="width: 33%">
                            <a class="nav-link active" id="quick-search-tab" data-bs-toggle="tab" href="#quickSearch"
                                role="tab">快速搜尋</a>
                        </li>
                        <li class="nav-item" role="presentation" style="width: 33%">
                            <a class="nav-link" id="duo-search-tab" data-bs-toggle="tab" href="#duoSearch"
                                role="tab">雙人快清</a>
                        </li>
                        <li class="nav-item" role="presentation" style="width: 33%">
                            <a class="nav-link" id="specific-person-tab" data-bs-toggle="tab" href="#specificPersonSearch"
                                role="tab">指定人員</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="searchTabsContent">
                        <div class="tab-pane fade show active" id="quickSearch" role="tabpanel">
                            <input type="text" id="region_quick" class="form-control mb-2">
                            <select class="form-control mb-2" name="cleaning_type">
                                <option value="single">單人打掃</option>
                                <option value="duo">雙人打掃</option>
                            </select>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="hasPet" name="has_pet">
                                <label class="form-check-label" for="hasPet">家中有寵物</label>
                            </div>
                            <button type="submit" class="btn btn-primary">搜尋</button>
                        </div>

                        <div class="tab-pane fade" id="duoSearch" role="tabpanel">
                            <input type="text" id="region_duo" class="form-control">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="duoHasPet" name="has_pet">
                                <label class="form-check-label" for="duoHasPet">家中有寵物</label>
                            </div>
                            <button type="submit" class="btn btn-primary">搜尋</button>
                        </div>

                        <div class="tab-pane fade" id="specificPersonSearch" role="tabpanel">
                            <input type="text" id="region_person" class="form-control">
                            <input type="text" class="form-control mb-2" name="person_name" placeholder="名稱">
                            <button type="submit" class="btn btn-primary">搜尋</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cascader.css') }}">
    <style>
        .bg-image-container {
            background: url('{{ asset('images/white-room-1.jpg') }}') no-repeat center center;
            background-size: cover;
            width: 100%;
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            filter: brightness(115%);
        }

        .search-container {
            width: 80%;
            /* or whatever width you want */
            margin: auto;

        }

        .search-block {
            background: #d3d3d3;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('js/cascader.js') }}"></script>
    <script>
        jQuery.ajaxSetup({
            async: false
        });

        $(function() {
            let data = [];
            $.get('/api/searchApi', function(res) {
                data = res
            })


            // parse data
            data.forEach(function(item) {
                item.label = item.name
                item.value = item.indexcode
                item.children = item.s
                item.s.forEach(function(item2) {
                    item2.label = item2.name
                    item2.value = item2.indexcode
                    if (item2.s && item2.s.length) {
                        item2.children = item2.s
                        item2.s.forEach(function(item3) {
                            item3.label = item3.name
                            item3.value = item3.indexcode
                        })
                    }
                })
            })

            // initialize
            $('#region_quick').zdCascader({
                data: data,
                container: '#region_quick',
                onChange: function(value, label, datas) {
                    console.log(value, label, datas);
                }
            });
            $('#region_duo').zdCascader({
                data: data,
                container: '#region_duo',
                onChange: function(value, label, datas) {
                    console.log(value, label, datas);
                }
            });
            $('#region_person').zdCascader({
                data: data,
                container: '#region_person',
                onChange: function(value, label, datas) {
                    console.log(value, label, datas);
                }
            });

        })
    </script>
@endsection
