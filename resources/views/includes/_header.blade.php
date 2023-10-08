<header id="header">
    <h1><a href="{{ route('home') }}">Future Imperfect</a></h1>
    <nav class="links">
        <ul>
            <li><a href="{{ route('categories.index')}}">Categories</a></li>
            <li><a href="{{ route('tags.index')}}">Tags</a></li>
            <li><a href="{{ route('posts.index')}}">Posts</a></li>
            <li><a href="{{ route('comments.index')}}">Comments</a></li>
        </ul>
    </nav>
    <nav class="main">
        <ul>
            <li class="search">
                <a class="fa-search" href="#search">Search</a>
                <form id="search" method="get" action="#">
                    <input type="text" name="query" placeholder="Search" />
                </form>
            </li>
            <li class="menu">
                <a class="fa-bars" href="#menu">Menu</a>
            </li>
        </ul>
    </nav>
</header>
