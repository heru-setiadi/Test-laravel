<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('/Candidate') ? 'active' : '' }}" aria-current="page" href="/Candidate">
            <span data-feather="home" class="align-text-bottom"></span>
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/candidate/candidates') ? 'active' : '' }}" href="/candidate/candidates">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Candidates List
          </a>
        </li>
      </ul>
    </div>
  </nav>