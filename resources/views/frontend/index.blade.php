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
                            <form action="/search/quick" method="get">
                                <select class="form-control mb-2" name="region">
                                    <option value="">選擇區域</option>
                                    <!-- 可以加入其他區域選項 -->
                                </select>
                                <select class="form-control mb-2" name="cleaning_type">
                                    <option value="single">單人打掃</option>
                                    <option value="duo">雙人打掃</option>
                                </select>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="hasPet" name="has_pet">
                                    <label class="form-check-label" for="hasPet">家中有寵物</label>
                                </div>
                                <button type="submit" class="btn btn-primary">搜尋</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="duoSearch" role="tabpanel">
                            <form action="/search/duo" method="get">
                                <select class="form-control mb-2" name="region">
                                    <option value="">選擇區域</option>
                                    <!-- 可以加入其他區域選項 -->
                                </select>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="duoHasPet" name="has_pet">
                                    <label class="form-check-label" for="duoHasPet">家中有寵物</label>
                                </div>
                                <button type="submit" class="btn btn-primary">搜尋</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="specificPersonSearch" role="tabpanel">
                            <form action="/search/specific" method="get">
                                <select class="form-control mb-2" name="region">
                                    <option value="">選擇區域</option>
                                    <!-- 可以加入其他區域選項 -->
                                </select>
                                <input type="text" class="form-control mb-2" name="person_name" placeholder="名稱">
                                <button type="submit" class="btn btn-primary">搜尋</button>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
@endsection

@section('css')
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
