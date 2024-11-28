@extends('layouts.app')
@section('content')
<main>
        
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(42deg, rgba(0, 0, 0, 0.7), rgb(0 0 0 / 38%)), url('https://github.com/bhupindersingh007/workflow/assets/63149405/a1cb4c88-6fdc-4455-891b-47af9eae940c') center/cover no-repeat;">
    <div class="container text-white text-center py-5">
        <h1 class="mb-3 display-2 text-uppercase">WORKFLOW</h1>
        <p class="lead mb-4">Simplify Project Management for Your Teams.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('register.create') }}" role="button">Get Started</a>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Key Features</h2>
        <div class="row">
            <!-- Add feature cards  -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Authentication</h5>
                        <p class="card-text">Register, login, and manage your account effortlessly.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Project Management</h5>
                        <p class="card-text">Create projects, assign tasks, and collaborate seamlessly.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Comment System</h5>
                        <p class="card-text">Communicate effectively with team members using the built-in comment system.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature 1 -->
<section id="feature1" class="bg-light">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <img src="https://github.com/bhupindersingh007/workflow/assets/63149405/52fea8bc-cbb1-4c1b-af1c-f4744659395a" class="img-fluid rounded" alt="Image" height="400">
            </div>

            <div class="col-md-6 ps-lg-4">
                <h2>Effortless Project Management</h2>
                <p class="lead mb-3">Streamline project tasks with Workflow. Simplify creation, organization, and tracking. From small teams to large enterprises, enhance collaboration and boost productivity. Bid farewell to scattered tasks and hello to efficient project execution.</p>
                <button class="btn btn-primary px-3">Learn More</button>
            </div>
        </div>
    </div>
</section>

<!-- Feature 2 -->
<section id="feature2" class="mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 pe-lg-4">
                <h2>Collaborative Task Management</h2>
                <p class="lead mb-3">Make your team more efficient with Workflow’s task tools. Assign, track, and collaborate effortlessly. Stay updated in real time with simple workflows that keep everyone aligned. Simplify task management and remove productivity roadblocks.</p>
                <button class="btn btn-primary px-3 mb-4 mb-lg-0">Discover More</button>
            </div>

            <div class="col-md-6">
                <img src="https://github.com/bhupindersingh007/workflow/assets/63149405/a1cb4c88-6fdc-4455-891b-47af9eae940c" class="img-fluid rounded" alt="Image">
            </div>
        </div>
    </div>
</section>


</main>


@endsection