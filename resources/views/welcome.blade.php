<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    {{-- Bootstrap --}}
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])


    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">


</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-light py-2 mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#register">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron/Hero Section -->
    <div class="jumbotron text-center">

        <img src="https://placehold.co/1020x480" alt="Banner" class="img-fluid mb-4 rounded">

        <h1 class="display-4">Welcome to WORKFLOW</h1>
        <p class="lead">Effortless Project Management for your Teams.</p>
        <a class="btn btn-primary btn-lg" href="#signup" role="button">Get Started</a>
    </div>

    <!-- Features Section -->
    <section id="features" class="bg-light py-5 mt-5">
        <div class="container">
            <h2 class="text-center mb-4">Key Features</h2>
            <div class="row">
                <!-- Add feature cards  -->
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Feature 1</h5>
                            <p class="card-text">Description of feature 1.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Feature 2</h5>
                            <p class="card-text">Description of feature 2.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Feature 3</h5>
                            <p class="card-text">Description of feature 3.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features 1-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="https://placehold.co/600x400" class="img-fluid rounded" alt="Image">
            </div>
    
            <div class="col-md-6 ps-lg-4">
                <h2>Feature #1</h2>
                <p class="lead mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel turpis ut felis vestibulum vehicula sed sed justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vel augue id quam bibendum consectetur vel et libero.</p>
                <button class="btn btn-primary px-3">Read More</button>
            </div>
        </div>
    </div>

     <!-- Features 2 -->
     <div class="bg-light mt-5">
        <div class="container py-5">
            <div class="row">
        
                <div class="col-md-6 pe-lg-4">
                    <h2>Feature #2</h2>
                    <p class="lead mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel turpis ut felis vestibulum vehicula sed sed justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vel augue id quam bibendum consectetur vel et libero.</p>
                    <button class="btn btn-primary px-3">Read More</button>
                </div>
                
                <div class="col-md-6">
                    <img src="https://placehold.co/600x400" class="img-fluid rounded" alt="Image">
                </div>
        
            </div>
        </div>
     </div>


    <!-- Footer Section -->
    <footer class="text-center py-3">
        <p class="text-muted">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </footer>


</body>

</html>