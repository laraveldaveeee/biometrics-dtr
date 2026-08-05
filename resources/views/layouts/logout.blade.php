    <div class="dropdown">

    <a href="#"
       class="d-flex align-items-center text-decoration-none dropdown-toggle"
       id="userDropdown"
       data-bs-toggle="dropdown"
       aria-expanded="false">

        <div class="text-end me-3">

            <div class="fw-bold text-dark">

                Administrator

            </div>

            <small class="text-muted">

                System Admin

            </small>

        </div>

        <div class="">

        </div>

    </a>

    <ul class="dropdown-menu dropdown-menu-end shadow border-0">

    {{--     <li>

            <a class="dropdown-item" href="#">

                <i class="bi bi-person-circle me-2"></i>

                My Profile

            </a>

        </li> --}}

        <li>

            <a class="dropdown-item"
               href="{{ route('settings.index') }}">

                <i class="bi bi-gear me-2"></i>

                System Settings

            </a>

        </li>

        <li><hr class="dropdown-divider"></li>

        <li>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="dropdown-item text-danger">

                    <i class="bi bi-box-arrow-right me-2"></i>

                    Logout

                </button>

            </form>

        </li>

    </ul>

</div>