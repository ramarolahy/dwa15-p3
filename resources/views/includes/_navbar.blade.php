<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <a href="{{ route('pages.index') }}"><span class="mdl-layout-title">PRETTY QUOTES</span></a>
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="{{ route('pages.index') }}">Home</a>
                <a class="mdl-navigation__link" href="{{ route('pages.quote') }}">Quote Maker</a>
                </nav>
                {{-- Spacer to alight nav to the left --}}
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="">Signup</a>
                <a class="mdl-navigation__link" href="">Login</a>
                <a class="mdl-navigation__link" href="">Logout</a>
                </nav>
                </div>
        </header>
    </div>
