<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('categorias.index') }}">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>
</li>

<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('categorias.index') }}">
        <i class=" fas fa-tag"></i><span>Categorías</span>
    </a>
</li>

<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link"  href="{{ route('productos.index') }}">
        <i class=" fas fa-tshirt"></i><span>Productos</span>
    </a>
</li>

<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('destinos.index') }}">
        <i class=" fas fa-store"></i><span>Sucursales</span>
    </a>
</li>
