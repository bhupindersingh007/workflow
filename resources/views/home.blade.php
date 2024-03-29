@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<section class="py-5" 
style="background: linear-gradient(42deg, rgba(0, 0, 0, 0.7), rgb(0 0 0 / 28%)),
 url('#') center/cover no-repeat;">
    <div class="container text-white py-5">
        <h1 class="mb-3 display-2 text-uppercase">Welcome to WORKFLOW</h1>
        <p class="lead mb-4">Effortless Project Management for your Teams.</p>
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
            <p class="lead mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel turpis ut felis
                vestibulum vehicula sed sed justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                posuere cubilia Curae; Sed vel augue id quam bibendum consectetur vel et libero.</p>
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
                <p class="lead mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel turpis ut felis
                    vestibulum vehicula sed sed justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                    posuere cubilia Curae; Sed vel augue id quam bibendum consectetur vel et libero.</p>
                <button class="btn btn-primary px-3">Read More</button>
            </div>

            <div class="col-md-6">
                <img src="https://placehold.co/600x400" class="img-fluid rounded" alt="Image">
            </div>

        </div>
    </div>
</div>


@endsection