<div class="nav-scroller bg-body shadow-sm">
    <div class="container">
        <nav class="nav" aria-label="Secondary navigation">
            <a class="nav-link" aria-current="page" href="{{ route('dashboard.overview', ['clinic' => $clinic->slug]) }}">Overview</a>
            <a class="nav-link" href="{{ route('dashboard.patients.index', ['clinic' => $clinic->slug]) }}">Manage Patients</a>
            <a class="nav-link" href="{{ route('dashboard.forms.index', ['clinic' => $clinic->slug]) }}">Manage Forms</a>

        </nav>
    </div>
</div>
