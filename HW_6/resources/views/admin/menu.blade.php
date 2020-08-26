<li class="nav-item {{request()->routeIs('Home') ? 'active': ''}}">
    <a class="nav-link" href="{{route('Home')}}">Главная</a>
</li>
<li class="nav-item {{request()->routeIs('admin.Index') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.Index')}}">Страница администратора</a>
</li>
<li class="nav-item {{request()->routeIs('admin.Create') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.Create')}}">Добавление новости</a>
</li>
<li class="nav-item {{request()->routeIs('admin.catalog.Index') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.catalog.Index')}}">CRUD категорий</a>
</li>
<li class="nav-item {{request()->routeIs('admin.Test1') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.Test1')}}">Тест 1</a>
</li>
<li class="nav-item {{request()->routeIs('admin.Test2') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.Test2')}}">Тест 2</a>
</li>
