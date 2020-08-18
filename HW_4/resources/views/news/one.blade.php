@extends ('layouts.main')

@section ('title')
    @parentНовость
@endsection
@section ('menu')
    @include('menu')
@endsection

@section('content')
    @if (!$news['isPrivate'])
        <ul class="list-group">
            <li class="list-group-item active">{{$news['title']}}</li>
            <li class="list-group-item">{{$news['text']}}</li>
         </ul>
     @else
        Новость приватная. Зарегистрируйтесь для просмотра.
    @endif
@endsection
