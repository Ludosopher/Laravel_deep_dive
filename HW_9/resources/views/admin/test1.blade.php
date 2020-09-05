@extends ('layouts.main')

@section ('title')
    @parentГлавная администратора
@endsection
@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Тест 1</h1>
            <p class="lead"></p>
        </div>
    </div>
{{--    <h2 class="text-center">Тест 1<h2>--}}
@endsection

