
<nav class="navbar fixed-top shadow-sm p-3 mb-5 rounded
	justify-content-between ">
	<div class="navbar-nav col px-3">
		<div class="nav-item d-md-none">
			<img class="simple-logo sidebarCollapse" src="{{ asset('images/simple-logo-ac.png') }}" alt="menu-lateral">
		</div>
	</div>
	
	<div class="navbar-nav col-3 text-end px-3">
		<div class="nav-item ">
			<a class="button btn-sm btn btn-outline-primary ac-colors blur-border-effect" 
			role="button" href="{{ route('auth.logout') }}">Sair</a>
		</div>
	</div>
</nav>

<nav class="col-md-2 col-6 d-none d-md-block sidebar">
	<div class="sidebar-sticky shadow-sm p-3 mb-5 rounded">
		<ul class="nav flex-column mb-2">
			<li class="nav-item d-none d-md-block">
				<img class="mw-100 pr-2" src="{{ asset('images/logo-ac.png') }}" alt="logo-ac">
			</li>
			<li class="nav-item text-center d-md-none">
				<button type="button" class="sidebarCollapse btn btn-info">Fechar</button>
			</li>
			<li class="bg-dark my-4 d-md-none dropdown-divider"></li>
			<li class="nav-item">
			<a class="nav-link feather" onclick="loading()" href="{{ route('dashboard') }}">
				<span data-feather="activity"></span>
				Dashboard
			</a>
			</li>
			<li class="nav-item">
			<a class="nav-link feather" onclick="loading()" href="{{ route('users.index') }}">
				<span data-feather="users"></span>
				Usuários
			</a>
			</li>
			<li class="nav-item">
			<a class="nav-link feather" onclick="loading()" href="{{ route('temas.index') }}">
				<span data-feather="clipboard"></span>
				Temas
			</a>
			</li>
			<li class="nav-item">
			<a class="nav-link feather" onclick="loading()" href="{{ route('polos.index') }}">
				<span data-feather="home"></span>
				Polos
			</a>
			</li>
		</ul>
	</div>
</nav>