<nav class="navbar navbar-expand-lg custom-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#WafiAdminNavbar"
            aria-controls="WafiAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i></i>
						<i></i>
						<i></i>
					</span>
    </button>

    <div class="collapse navbar-collapse" id="WafiAdminNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{
                    url()->current() == route('home') ? 'active-page' : ''}}" href="{{route('home')}}"
                   id="dashboardsDropdown">
                    <i class="icon-devices_other nav-icon"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                                url()->current() == route('companies.index') ||
                                url()->current() == route('companies.create') ||
                                (isset($id) && url()->current() == route('companies.edit', $id))
                                ? 'active-page' : ''}}" href="{{route('companies.index')}}"
                   id="dashboardsDropdown">
                    <i class="icon-location_city nav-icon"></i>
                    Companies
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                                url()->current() == route('employees.index') ||
                                url()->current() == route('employees.create') ||
                                (isset($id) && url()->current() == route('employees.edit', $id))
                                ? 'active-page' : ''}}" href="{{route('employees.index')}}"
                   id="dashboardsDropdown">
                    <i class="icon-users nav-icon"></i>
                    Employees
                </a>
            </li>
        </ul>
    </div>
</nav>
