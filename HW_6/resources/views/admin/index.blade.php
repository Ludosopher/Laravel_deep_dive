@extends ('layouts.main')

@section ('title')
    @parentГлавная администратора
@endsection
@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>CRUD Новости</h2>
                        @forelse ($news as $item)
                            <h3>{{$item->title}}</h3>
{{--                            <div class="card-img" style="background-image: url({{$item->image ?? asset('storage/news_1.jpg')}})"></div>--}}
                            <a href="{{ route('admin.Edit', $item) }}" class="btn btn-success">
                                Изменить
                            </a>
                            <a href="{{ route('admin.Destroy', $item) }}" class="btn btn-danger">
                                Удалить
                            </a>
                        @empty
                            Новостей нет.
                     @endforelse
                        {{ $news->links() }}
                    </div>
                 </div>
            </div>
        </div>
    </div>
{{--    <div class="jumbotron jumbotron-fluid">--}}
{{--        <div class="container">--}}
{{--            <h1 class="display-4">Страница администратора</h1>--}}
{{--            <p class="lead"></p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <h2 class="text-center">Страница администратора<h2>--}}
@endsection
