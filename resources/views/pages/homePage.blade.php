@extends('layouts.app')

@section('title', 'Muhammad Hamid - Software Engineer | Portfolio')
@section('meta_description', 'Welcome to Muhammad Hamid\'s professional portfolio. I am a Software Engineer and Laravel Developer specializing in full-stack web development.')
@section('meta_keywords', 'Muhammad Hamid, Software Engineer, Laravel Developer, Portfolio, Fullstack Developer, Web Developer')

@section('content')
    <!-- Hero Section -->
    @include('pages.herosection')

    <!-- About Section -->
    @include('pages.about')

    <!-- Stats Section -->
    @include('pages.stats')

    <!-- Skills Section -->
    @include('pages.skills')

    <!-- Resume Section -->
    @include('pages.resume')

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">My Projects</h2>
            @include('pages.portfolio')
        </div>
    </section>

    <!-- Services Section -->
    @include('pages.services')

    <!-- Testimonials Section -->
    @include('pages.testimonials')

    <!-- Contact Section -->
    <section id="contact" class="contact-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">Get in Touch</h2>
            <p class="text-center">If you want to discuss a project or just want to say hi, feel free to contact me.</p>
            @include('pages.contact')
        </div>
    </section>

    <!-- Swiper Pagination -->
    <div class="swiper-pagination"></div>
@endsection

@push('styles')
    <!-- Additional CSS for Home Page -->
    <style>
        /* Custom styles for Hero Section */
        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }

        .portfolio-section h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #444;
        }

        .contact-section h2 {
            font-size: 2rem;
            color: #444;
        }
    </style>
@endpush

@push('scripts')
    <!-- Add Structured Data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "Muhammad Hamid",
      "url": "{{ url('/') }}",
      "sameAs": [
        "https://twitter.com/xihamid",
        "https://facebook.com/xihamid",
        "https://instagram.com/xihamid",
        "https://linkedin.com/in/xihamid"
      ],
      "jobTitle": "Software Engineer",
      "worksFor": {
        "@type": "Organization",
        "name": "Self-Employed"
      },
      "image": "{{ asset('assets/img/my-profile-img.jpg') }}",
      "description": "I am Muhammad Hamid, a professional Software Engineer specializing in Laravel and full-stack web development."
    }
    </script>

    <!-- Track Page Load -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log("HomePage Loaded Successfully!");
        });
    </script>
@endpush
