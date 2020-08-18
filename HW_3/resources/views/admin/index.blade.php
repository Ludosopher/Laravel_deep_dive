@extends ('layouts.main')

@section ('title')
    @parentГлавная администратора
@endsection
@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h2>Админка<h2>
    @include('admin.menu')
@endsection
