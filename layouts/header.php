<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">QUEST</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#grades">Grades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#testimonials">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
            </ul>
            <div class="d-flex">
                <div class="dropdown me-2">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="loginDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="student-login.php"><i class="fas fa-graduation-cap me-2"></i>Student Login</a></li>
                        <li><a class="dropdown-item" href="parent-login.php"><i class="fas fa-user-friends me-2"></i>Parent Login</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="signupDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-user-plus me-2"></i>Sign Up
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="student-signup.php"><i class="fas fa-graduation-cap me-2"></i>Student Sign Up</a></li>
                        <li><a class="dropdown-item" href="parent-signup.php"><i class="fas fa-user-friends me-2"></i>Parent Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>