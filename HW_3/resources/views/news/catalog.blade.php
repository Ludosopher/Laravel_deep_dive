@extends ('layouts.main')

@section ('title')
    @parentКатегории новостей
@endsection
@section ('menu')
    @include('menu')
@endsection

@section ('content')
    @forelse ($catalog as $item)
        <a href="{{route('news.categoryOne', $item['slug'])}}">{{$item['title']}}</a><br>
    @empty
        Категорий нет.
    @endforelse
@endsection


