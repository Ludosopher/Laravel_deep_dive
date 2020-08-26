@extends ('layouts.main')

@section ('title')
    @parentКатегории новостей для администратора
@endsection
@section ('menu')
    @include('menu')
@endsection

@section ('content')
{{--    <div class="container">--}}
{{--        <div class="list-group">--}}
{{--            <h2>Категории новостей</h2>--}}
{{--            <a href="{{ route('admin.catalog.Create') }}" class="btn btn-success">--}}
{{--                Создать новую категорию--}}
{{--            </a>--}}
{{--            @forelse ($catalog as $item)--}}
{{--                <a href="{{route('news.categoryOne', $item->slug)}}" class="list-group-item list-group-item-action">{{$item->title}}</a>--}}
{{--                <a href="{{ route('admin.catalog.Edit', $item) }}" class="btn btn-success">--}}
{{--                    Edit--}}
{{--                </a>--}}
{{--                <a href="{{ route('admin.catalog.Destroy', $item) }}" class="btn btn-danger">--}}
{{--                    Delete--}}
{{--                </a>--}}
{{--            @empty--}}
{{--                Категорий нет.--}}
{{--            @endforelse--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Категории новостей</h2>
                        <a href="{{ route('admin.catalog.Create') }}" class="btn btn-success">
                            Добавить
                        </a><br><br>
                        @forelse ($catalog as $item)
                            <a href="{{route('news.categoryOne', $item->slug)}}" class="list-group-item list-group-item-action">{{$item->title}}</a>
                            <a href="{{ route('admin.catalog.Edit', $item) }}" class="btn btn-success">
                                Изменить
                            </a>
                            <a href="{{ route('admin.catalog.Destroy', $item) }}" class="btn btn-danger">
                                Удалить
                            </a><br><br>
                        @empty
                            Категорий нет.
                        @endforelse
                        {{ $catalog->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
