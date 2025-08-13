<link rel="stylesheet" href="{{ asset('CSS/styles-parciais.css')}}">
</head>
<body>
  
  <header>
    <div class="interface">
      <section class="logo">
        <a href="{{ route('home') }}" class="logo">C<span>o</span>nexus</a>
      </section>

      <section class="menu-desktop">
        <nav>
          <ul class="links">
            <li><a href="../perfil/index.php">Perfil</a></li>
            <li><a href="{{ route('area-user') }}">Aréa de Usuário</a></li>
            <li><a href="{{ route('sobre') }}">Sobre Nós</a></li>
            <li><a href="">Salas</a></li>
          </ul>
        </nav>
      </section>

      <div class="menu-mobile" id="menu-mobile">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="menu-mobile-nav" id="menu-mobile-nav">
        <ul>
          <li><a href="">Quem Somos</a></li>
          <li><a href="../area-usuario/index.php">Aréa de Usuário</a></li>
          <li><a href="../sobrenos/index.php">Sobre Nós</a></li>
          <li><a href="">Salas</a></li>
          <li>
            <form class="search-form-mobile" action="#" method="get">
              <input type="text" name="q" placeholder="Buscar..." />
              <button type="submit">&#128269;</button>
            </form>
          </li>
        </ul>
      </nav>

      <form class="search-form" action="#" method="get">
        <input type="text" name="q" placeholder="Buscar..." />
        <button type="submit">&#128269;</button>
      </form>

     <section class="btn-contato">
    @auth
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Sair</button>
        </form>
    @endauth

    @guest
        <a href="{{ route('cadastro.create') }}">
            <button>Conecte-se</button>
        </a>
    @endguest
</section>

      </section>
    </div>
    <script>
      const menuBtn = document.getElementById('menu-mobile');
      const menuNav = document.getElementById('menu-mobile-nav');
      menuBtn.onclick = function() {
        menuBtn.classList.toggle('open');
        menuNav.classList.toggle('open');
      }
    </script>
  </header>
  <script src="{{ asset('JS/script.js') }}"></script>
</body>