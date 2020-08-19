@extends ('layouts.main')

@section ('title')
    @parentНовость
@endsection
@section ('menu')
    @include('menu')
@endsection

@section('content')
    @if (!$news['isPrivate'])
        <div class="container">
            <ul class="list-group">
                <li class="list-group-item active">{{$news['title']}}</li>
                <li class="list-group-item">{{$news['text']}}</li>
            </ul>
        </div>
     @else
        <div class="container">
            Новость приватная. Зарегистрируйтесь для просмотра.
        </div>
    @endif
@endsection
