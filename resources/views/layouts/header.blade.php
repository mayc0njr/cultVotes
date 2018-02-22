    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <a class="navbar-brand" href="#">Projeto</a>
        @auth('admin')
        
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/musicas">Músicas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/relatorio">Relatório</a>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        @endauth
    </nav>