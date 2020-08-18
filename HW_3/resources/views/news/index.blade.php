@extends ('layouts.main')

@section ('title')
    @parentНовости
@endsection
@section ('menu')
    @include('menu')
@endsection

@section ('content')
    @forelse ($news as $item)
        <a href="{{route('news.newsOne', $item['id'])}}">{{$item['title']}}</a><br>
    @empty
        Новостей нет.
    @endforelse
@endsection
