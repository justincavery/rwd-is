<nav class="nav nav--primary nav--inverted" :class="{ open: open, fixed: fixed }" data-app="nav--primary">

    <header class="nav__bar">
        <span class="nav__logo logo"><a href="/">Responsive Design Is</a></span>
    </header>

    <div class="nav__container">
        <form role="search" method="get" class="search-form" action="/search">
            <input class="search-form__query" type="text" name="s" placeholder="Search the site" />
            <input class="search-form__submit btn btn--cta" type="submit" value="Search" />
        </form>

        <ul class="nav__items">
            <li class="nav__item">
                <a href="/" class="nav__link">
                    <h3 class="nav__title">Home</h3>
                    <p class="nav__desc">It's where the heart is.</p>
                </a>
            </li>
            <li class="nav__item">
                <a href="/design" class="nav__link">
                    <h3 class="nav__title">Design</h3>
                    <p class="nav__desc">Design hints tips and ideas.</p>
                </a>
            </li>
            <li class="nav__item">
                <a href="/develop" class="nav__link">
                    <h3 class="nav__title">Develop</h3>
                    <p class="nav__desc">The practical side of RWD.</p>
                </a>
            </li>
            <li class="nav__item">
                <a href="/strategy" class="nav__link">
                    <h3 class="nav__title">Strategy</h3>
                    <p class="nav__desc">Think about it.</p>
                </a>
            </li>

            <li class="nav__item">
                <a href="/articles" class="nav__link">
                    <h3 class="nav__title">Articles</h3>
                    <p class="nav__desc">Our long form writing on RWD.</p>
                </a>
            </li>
            <li class="nav__item">
                <a href="/resources" class="nav__link">
                    <h3 class="nav__title">Resources</h3>
                    <p class="nav__desc">Shortcuts to all things responsive.</p>
                </a>
            </li>
            <li class="nav__item">
                <a href="/example" class="nav__link">
                    <h3 class="nav__title">Examples</h3>
                    <p class="nav__desc">Inspiration at your fingertips.</p>
                </a>
            </li>
            <li class="nav__item">
                <a href="/patterns" class="nav__link">
                    <h3 class="nav__title">Patterns</h3>
                    <p class="nav__desc">Find something that works for you.</p>
                </a>
            </li>
            <li class="nav__item">
                <a href="/podcasts" class="nav__link">
                    <h3 class="nav__title">Podcast</h3>
                    <p class="nav__desc">Woah oh ohhhh, listen to the music.</p>
                </a>
            </li>
            <li class="nav__item"></li>
        </ul>
    </div>

    <div class="nav__handle" @click.prevent="toggleMenu">
        <div class="nav__handle-label" v-text="handle"></div>
        <div class="nav__handle-container">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>