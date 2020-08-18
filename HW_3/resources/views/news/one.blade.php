@extends ('layouts.main')

@section ('title')
    @parentНовость
@endsection
@section ('menu')
    @include('menu')
@endsection

@section('content')
    @if (!$news['isPrivate'])
        <h3><?=$news['title']?></h3>
        <p><?=$news['text']?></p>
    @else
        Новость приватная. Зарегистрируйтесь для просмотра.
    @endif
@endsection
