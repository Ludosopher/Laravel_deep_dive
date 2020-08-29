<li class="nav-item {{request()->routeIs('Home') ? 'active': ''}}">
    <a class="nav-link" href="{{route('Home')}}">Главная</a>
</li>
<li class="nav-item {{request()->routeIs('admin.news.index') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.news.index')}}">Страница администратора</a>
</li>
<li class="nav-item {{request()->routeIs('admin.news.create') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.news.create')}}">Добавление новости</a>
</li>
<li class="nav-item {{request()->routeIs('admin.catalog.index') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.catalog.index')}}">CRUD категорий</a>
</li>
<li class="nav-item {{request()->routeIs('admin.Test1') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.Test1')}}">Тест 1</a>
</li>
<li class="nav-item {{request()->routeIs('admin.Test2') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.Test2')}}">Тест 2</a>
</li>
