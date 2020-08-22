@extends ('layouts.main')

@section ('title')
    @parentНовости
@endsection
@section ('menu')
    @include('menu')
@endsection

@section ('content')
    <div class="container">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Все новости
            </a>
        @forelse ($news as $item)
                <a href="{{route('news.newsOne', $item->id)}}" class="list-group-item list-group-item-action">{{$item->title}}</a>
                <div class="card-img" style="background-image: url({{$item->image ?? asset('storage/news_1.jpg')}})"></div>
        @empty
            Новостей нет.
        @endforelse
        </div>
    </div>
@endsection


