<li class="nav-item {{request()->routeIs('Home') ? 'active': ''}}">
    <a class="nav-link" href="{{route('Home')}}">Главная</a>
</li>
<li class="nav-item {{request()->routeIs('news.catalog') ? 'active': ''}}">
    <a class="nav-link" href="{{route('news.catalog')}}">Каталог новостей</a>
</li>
<li class="nav-item {{request()->routeIs('news.index') ? 'active': ''}}">
    <a class="nav-link" href="{{route('news.index')}}">Все новости</a>
</li>
<li class="nav-item {{request()->routeIs('admin.news.index') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.news.index')}}">Страница администратора</a>
</li>
