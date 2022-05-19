@props(['categories'])
<nav class="d-flex felx-row p-4 col-12 h-100" style="background-color: #31572C;">
    <div class="d-flex flex-row col-12">
        <form class="col-9 d-flex flex-row gap-3" action="{{ route('products.index') }}" method="GET">
            <input value="{{ request('search') }}" class="form-control rounded-pill w-50" type="text" name="search" id="search" placeholder="Search for...">
            <select class="form-select rounded-pill w-25" name="category" id="category">
                <option value="all" {{ (strcmp(request('category'), 'all') == 0) ? 'selected' : '' }}>
                    All categories
                </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (request('category') == $category->id) ? 'selected' : '' }}>
                        {{ ucfirst($category->name) }}
                    </option>
                @endforeach
            </select>
            <button class="btn btn-primary border-dark text-dark rounded-pill" style="background-color: #efefef;" type="submit">
                Search
            </button>
        </form>
        @auth
            <div class="nav-item dropdown col-3 d-flex flex-row justify-content-end">
                <x-button class="w-50" type="button" id="menu" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ ucfirst(auth()->user()->name) }}
                </x-button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menu">
                    <li>
                        <a href="{{ route('dashboard.index') }}" class="dropdown-item">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            Account
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input class="dropdown-item" type="submit" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="col-3 d-flex flex-row gap-3">
                <x-link class="w-50" href="{{ route('login') }}">
                    Log in
                </x-link>
                <x-link class="w-50" href="{{ route('register') }}">
                    Register
                </x-link>
            </div>
        @endauth
    </div>
</nav>
