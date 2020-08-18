@extends ('layouts.main')

@section ('title')
    @parentДобавление новости
@endsection
@section ('menu')
    @include('admin.menu')
@endsection

{{--@dump(old())--}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create') }}</div>

                    <div class="card-body">
                        <form action="{{ route('admin.Create') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="newsTitle">Заголовок новости</label>
                                <input type="text" name="title" id="newsTitle" class="form-control"
                                       value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="newsCategory">Категория новости</label>
                                <select name="category_id" id="newsCategory" class="form-control">

                                    @forelse($categories as $item)
                                        <option @if ($item['id'] == old('category_id')) selected
                                                @endif value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                                    @empty
                                        <option value="0" selected>Нет категории</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="newsText">Текст новости</label>
                                <textarea name="text" id="newsText" class="form-control">{{ old('text') }}</textarea>
                            </div>

                            <div class="form-check">
                                <input  @if (old('isPrivate') === "1") checked @endif id="newsPrivate" name="isPrivate"
                                        type="checkbox" value="1" class="form-check-input">
                                <label for="newsPrivate">Приватная</label>

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="Добавить новость">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
