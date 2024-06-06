<section id="menu">

    <!-- Search -->
    <section>
        <form class="search" method="get" action="#">
            <input type="text" name="query" placeholder="Search" />
        </form>
    </section>

    <!-- Links -->
    <section>
      <ul class="links">
        <x-nav-link
          url="{{ route('categories.index') }}"
          title="Categories"
          description="List of categories"
        />
        <x-nav-link
          url="{{ route('tags.index') }}"
          title="Tags"
          description="List of tags"
        />
        <x-nav-link
          url="{{ route('posts.index') }}"
          title="Posts"
          description="List of posts"
        />
        @auth
        <x-nav-link
          url="{{ route('comments.index') }}"
          title="Comments"
          description="List of comments"
        />
        @endauth
        <x-nav-link
            url="{{ route('projects.index') }}"
            title="Projects"
            description="List of projects"
        />
      </ul>
    </section>

    <!-- Actions -->
    <section>
      <ul class="actions stacked">
        <li>
        @guest
          <a href="{{ route('login') }}" class="button large fit">Log In</a>
        @else
          <x-form
            method="post"
            action="{{ route('logout') }}"
          >
            <button class="button large fit">Log Out</button>
          </x-form>
        @endguest
        </li>
      </ul>
    </section>

</section>
