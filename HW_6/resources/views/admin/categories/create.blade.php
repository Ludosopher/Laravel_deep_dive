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
                        <form enctype="multipart/form-data" action="{{ $categories->id ? route('admin.catalog.Update', $categories): route('admin.catalog.Create') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="categoryTitle">Заголовок категории</label>
                                <input type="text" name="title" id="categoryTitle" class="form-control"
                                       value="{{ $categories->title ?? old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="categorySlug">Slug</label>
                                <input type="text" name="slug" id="categorySlug" class="form-control"
                                       value="{{ $categories->slug ?? old('slug') }}">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="{{ $categories->id ? 'Изменить': 'Добавить' }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
