@extends ('layouts.main')

@section ('title')
    @parentНовости по категории
@endsection
@section ('menu')
    @include('menu')
@endsection

@section ('content')
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
            Новости в категории "{{$title}}"
        </a>
    @forelse ($news as $item)
        <a href="{{route('news.newsOne', $item['id'])}}" class="list-group-item list-group-item-action">{{$item['title']}}</a>
    @empty
        Новостей по данной категории нет.
    @endforelse
    </div>
@endsection

