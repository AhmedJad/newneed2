    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">

                <svg height="40" width="250" class="logo">
                    <linearGradient id="MyGradient">
                        <stop offset="5%" stop-color="#87CCA6" />
                        <stop offset="95%" stop-color="#0CB6E0" />
                    </linearGradient>
                    <text x="40" y="30" fill="url(#MyGradient)">Needeg</text>
                </svg>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="dark-blue-text"><i class="fas fa-bars fa-1x"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/user/login">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/user/register"> Register</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categories as $category)
                            <li><a class="dropdown-item">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endauth
                </ul>
                @auth
                <div class="d-flex">
                    <a href="/user/products/show-cart">
                    <i class="fas fa-shopping-cart" title="show cart"></i>
                    </a>
                    <svg width="70" height="70">
                        <rect width="45" height="40" y="10" style="fill:#032541 ;stroke-width:1;stroke:white" />
                        <text x="12" y="35" fill="white" class="fw-bold">EN</text>
                    </svg>

                    <svg height="70" width="70">
                        <circle cx="20" cy="30" r="20" stroke-width="3" fill="#0177D2" />
                        <text x="15" y="35" fill="white" class="fw-bold">{{strtoupper(auth()->user()->name[0])}}
                        </text>
                    </svg>
                    <a href="/user/logout">
                        <i class="fas fa-power-off" title="logout"></i>
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </nav>
