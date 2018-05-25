<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <a class="navbar-brand" href="#">We Like Games</a> -->
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item">
                <a class="nav-link" href="/games">List</a>
            </li> -->
            @if( auth()->check() )
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ auth()->login()->firstname }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log Out</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
