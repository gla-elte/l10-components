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
        <x-nav-link
          url="{{ route('comments.index') }}"
          title="Comments"
          description="List of comments"
        />
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
            <li><a href="#" class="button large fit">Log In</a></li>
        </ul>
    </section>

</section>
