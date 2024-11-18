<!-- resources/views/partials/language-selector.blade.php -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('locale.setLocale', 'es') }}">Español</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('locale.setLocale', 'en') }}">English</a>
    </li>
</ul>