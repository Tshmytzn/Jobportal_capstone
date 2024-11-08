    <?php $active = $active ?? ''; ?>
    <!-- Navbar & Hero Start -->
    <div class="container-fluid header position-relative overflow-hidden p-0">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="display-6 text-primary m-0">
                    <img src="{{ asset('../assets/img/PESOLOGO.png') }}" alt="" class="mb-2 me-2">
                    {{-- <i class="fa-solid fa-helmet-safety me-3"></i> --}}
                    </i>Job Portal
                </h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('homepage') }}"
                        class="nav-item nav-link {{ $active == 'homepage' ? 'active' : '' }}">
                        <i class="fas fa-home"></i> Home
                    </a>

                    <a href="{{ route('about') }}" class="nav-item nav-link {{ $active == 'about' ? 'active' : '' }}">
                        <i class="fas fa-info-circle"></i> About
                    </a>

                    {{-- <a href="" class="nav-item nav-link {{ $active == 'skillassessment' ? 'active' : '' }}">
                        <i class="fas fa-tasks"></i> Skill Assessment
                    </a> --}}

                    <div class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle {{ in_array($active, ['jobs', 'jobslist']) ? 'active' : '' }}"
                            data-bs-toggle="dropdown">
                            <i class="fas fa-briefcase"></i> Jobs
                        </a>

                        <div class="dropdown-menu dropdown-menu-adjust">
                            <a href="{{ route('jobs') }}" class="dropdown-item {{ $active == 'jobs' ? 'active' : '' }}">
                                <i class="fas fa-th-list"></i> Job Categories
                            </a>
                            <a href="{{ route('jobslist') }}"
                                class="dropdown-item {{ $active == 'jobslist' ? 'active' : '' }}">
                                <i class="fas fa-list"></i> Job List
                            </a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle {{ in_array($active, ['agencies', 'feedback']) ? 'active' : '' }}"
                            data-bs-toggle="dropdown">
                            <i class="fas fa-handshake"></i> Agency
                        </a>
                        <div class="dropdown-menu dropdown-menu-adjust">
                            <a href="{{ route('agencies') }}"
                                class="dropdown-item {{ $active == 'agencies' ? 'active' : '' }}">
                                <i class="fas fa-project-diagram"></i> Agencies
                            </a>
                            <a href="{{ route('agencyfeedback') }}"
                                class="dropdown-item {{ $active == 'feedback' ? 'active' : '' }}">
                                <i class="fas fa-comment-dots"></i> Feedback
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('faqs') }}"
                    class="nav-item nav-link {{ $active == 'faqs' ? 'active' : '' }}">
                    <i class="fas fa-question-circle"></i> FAQS
                </a>

                    <a href="{{ route('contactus') }}"
                        class="nav-item nav-link {{ $active == 'contactus' ? 'active' : '' }}">
                        <i class="fas fa-comments"></i> Contact Us
                    </a>

                    @if (session()->has('user_id'))

                    <a href="{{ route('skillassessment') }}"
                        class="nav-item nav-link tooltip-container">
                            <div class="rounded-circle btn-gradient d-flex justify-content-center align-items-center" style="width: 45px; height:45px; margin-top:-12px">
                                <i class="fas fa-clipboard-check"></i>
                                <span class="tooltip-text">Take Skill Assessment</span>
                            </div>
                    </a>

                @else

                    <div>
                        <!-- You can add some content here or leave this block empty if not needed -->
                    </div>

                @endif


                </div>

                <!-- Check if a user is logged in -->
                @if (session()->has('user_id'))
                    <!-- User Profile Dropdown -->
                    <div class="dropdown d-inline">
                        <button
                            class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 dropdown-toggle me-1"
                            type="button" id="profileDropdown">
                            <!-- Display user name or icon -->
                            {{ session('user_name') }} <i class="ms-2 fas fa-user"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user-circle"></i> &nbsp; Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('applicationstatus') }}">
                                    <i class="fas fa-tasks"></i> &nbsp; Applications
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('settings') }}">
                                    <i class="fas fa-cog"></i> &nbsp; Settings
                                </a>
                            </li>
                            <form action="{{ route('LogoutJobseeker') }}" method="POST" id="logoutadminForm">
                                @csrf
                                <li>
                                    <a class="dropdown-item" href="#" onclick="confirmLogout(event)">
                                        <i class="fas fa-sign-out-alt"></i> &nbsp; Log Out
                                    </a>
                                </li>
                            </form>
                        </ul>

                    </div>
                @else
                    <!-- Log In Dropdown -->
                    <div class="dropdown d-inline">
                        <button
                            class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 dropdown-toggle me-1"
                            type="button" id="loginDropdown">
                            Log In
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                            <li><a class="dropdown-item {{ $active == 'login' ? 'active' : '' }}"
                                    href="{{ route('login') }}">as Jobseeker</a></li>
                            <li><a class="dropdown-item {{ $active == 'agencylogin' ? 'active' : '' }}"
                                    href="{{ route('agencylogin') }}">as Agency</a></li>
                        </ul>
                    </div>

                    <!-- Sign Up Dropdown -->
                    <div class="dropdown d-inline">
                        <button class="btn btn-primary rounded-pill text-white py-2 px-4 dropdown-toggle" type="button"
                            id="signupDropdown">
                            Sign Up
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="signupDropdown">
                            <li><a class="dropdown-item {{ $active == 'signup' ? 'active' : '' }}"
                                    href="{{ route('signup') }}">as Jobseeker</a></li>
                            <li><a class="dropdown-item {{ $active == 'agencysignup' ? 'active' : '' }}"
                                    href="{{ route('agencysignup') }}">as Agency</a></li>
                        </ul>
                    </div>
                @endif


            </div>
        </nav>

        <script>
            function confirmLogout(event) {
                event.preventDefault(); // Prevent the default action of the anchor tag

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be logged out!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, log me out!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('loading').style.display = 'grid';

                        // Form submission will trigger page reload, no need to hide the loading spinner
                        document.getElementById('logoutadminForm').submit(); // Submit the form if confirmed

                    }
                });
            }
        </script>

        @include('Jobseeker.components.loading')
