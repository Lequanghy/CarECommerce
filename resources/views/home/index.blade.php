<x-app-layout title='Home Page'>
    <!-- Home Slider -->
    <section class="hero-slider">
        <!-- Carousel wrapper -->
        <div class="hero-slides">
            <!-- Item 1 -->
            <div class="hero-slide">
                <div class="container">
                    <div class="slide-content">
                        <p class="hero-kicker">Curated marketplace for modern car buyers</p>
                        <h1 class="hero-slider-title">
                            Find your next <strong>perfect drive</strong> with confidence
                        </h1>
                        <div class="hero-slider-content">
                            <p>
                                Explore standout listings, compare details quickly, and narrow
                                the right match with flexible filters for maker, model, year,
                                budget, and body style.
                            </p>

                            <div class="hero-actions">
                                <a href="{{ route('car.search') }}" class="btn btn-hero-slider">Browse inventory</a>
                                <a href="{{ route('about') }}" class="btn btn-hero-secondary">How it works</a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-image">
                        <img src="/img/car-png-39071.png" alt="" class="img-responsive" />
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="hero-slide">
                <div class="flex container">
                    <div class="slide-content">
                        <p class="hero-kicker">List faster and stand out</p>
                        <h2 class="hero-slider-title">
                            Ready to <strong>sell your car</strong> without the usual friction?
                        </h2>
                        <div class="hero-slider-content">
                            <p>
                                Create a polished listing, upload photos, and present your car
                                with the details buyers actually care about.
                            </p>

                            <div class="hero-actions">
                                <a href="{{ route('car.create') }}" class="btn btn-hero-slider">Add your car</a>
                                <a href="{{ route('car.search') }}" class="btn btn-hero-secondary">See examples</a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-image">
                        <img src="/img/car-png-39071.png" alt="" class="img-responsive" />
                    </div>
                </div>
            </div>
            <button type="button" class="hero-slide-prev">
                <svg style="width: 18px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </button>
            <button type="button" class="hero-slide-next">
                <svg style="width: 18px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </section>
    <!--/ Home Slider -->
    <main>
        <x-search-form :makers="$makers" :car_types="$car_types" :models="$models" action='/search' method='GET' />

        <!-- New Cars -->
        <section>
            <div class="container">
                <div class="section-heading">
                    <div>
                        <p class="section-kicker">Fresh arrivals</p>
                        <h2>Latest Added Cars</h2>
                    </div>
                    <a href="{{ route('car.search') }}" class="section-link">View all listings</a>
                </div>
                <div class="car-items-listing">
                    @foreach ($cars as $car)
                        <x-car-item :$car />
                    @endforeach
                </div>
            </div>
        </section>
        <!--/ New Cars -->
    </main>
</x-app-layout>
