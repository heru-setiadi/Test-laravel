<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Coding Collective</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($tittle === "Home") ? 'active' : '' }}" href="/Home">Home</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link {{ ($tittle === "Candidate List") ? 'active' : '' }}" href="/Candidate">Candidates List</a>
        </li>
        <li class="nav-item">
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        @endauth
      </ul>


      <ul class="navbar-nav ms-auto" >
      @auth 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Welcome, {{ auth()->user()->name }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Dashboard</a></li> 
          <li><hr class="dropdown-divider"></li>
          <li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit"  class="dropdown-item" >
                <i class="bi bi-box-arrow-right"> Logout</i>
              </button>
            </form>
        </ul>
      </li>
      @else
        <li class="nav-item">
          <a href="/login" class="nav-link {{ ($tittle === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"> Login</i></a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>