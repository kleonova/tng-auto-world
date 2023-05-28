<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container"> 
    <a href="{{ route('cars.index') }}" class="navbar-brand">Auto World</a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a href="{{ route('cars.index') }}" class="nav-link">Catalog</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cars.trash') }}" class="nav-link">Trash</a>
            </li>
        </ul>
    </div>
  </div> 
</nav>