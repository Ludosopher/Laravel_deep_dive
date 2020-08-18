@extends ('layouts.main')

@section ('title')
    @parentНовости по категории
@endsection
@section ('menu')
    @include('menu')
@endsection

@section ('content')
    <h2>Новости в категории "{{$title}}"</h2>
    @forelse ($news as $item)
        <a href="{{route('news.newsOne', $item['id'])}}">{{$item['title']}}</a><br>
    @empty
        Новостей по данной категории нет.
    @endforelse
@endsection
