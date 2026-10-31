@extends('layouts.app')

@section('content')
    <main>
        <section class="hero">
            <div class="container">
                <div class="hero__wrapper">
                    <div class="hero__header">
                        <h1 class="hero__title">Find Your Dream Job Today!</h1>
                        <p class="hero__subtitle">
                            Connecting Talent with Opportunity: Your Gateway to Career
                            Success
                        </p>
                    </div>
                    <form class="hero__search" action="{{ route('jobs') }}" method="GET">
                        <div class="hero__fields">
                            <input class="form__input" type="text" name="keyword" placeholder="Job Title or Company" />
                            <div class="form__select-wrapper">
                                <select class="form__select" name="location">
                                    <option value="">Select Location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location }}">
                                            {{ $location }}
                                        </option>
                                    @endforeach
                                </select>

                                <img class="form__select-icon" src="images/chevron-down.svg" alt=""
                                    aria-hidden="true" />
                            </div>
                            <div class="form__select-wrapper">
                                <select class="form__select" name="category">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category => $count)
                                        <option value="{{ $category }}">
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>

                                <img class="form__select-icon" src="images/chevron-down.svg" alt=""
                                    aria-hidden="true" />
                            </div>
                        </div>
                        <button class="button hero__button" type="submit">
                            <img class="hero__search-icon" src="images/search-white.svg" alt="" />
                            Search Job
                        </button>
                    </form>
                    <ul class="hero__statistics">
                        <li class="hero__stat">
                            <img src="images/jobs.svg" alt="" />
                            <div class="hero__stat-content">
                                <span class="hero__stat-number">25,850</span><span class="hero__stat-label">Jobs</span>
                            </div>
                        </li>
                        <li class="hero__stat">
                            <img src="images/candidates.svg" alt="" />
                            <div class="hero__stat-content">
                                <span class="hero__stat-number">10,250</span><span
                                    class="hero__stat-label">Candidates</span>
                            </div>
                        </li>
                        <li class="hero__stat">
                            <img src="images/companies.svg" alt="" />
                            <div class="hero__stat-content">
                                <span class="hero__stat-number">18,400</span><span class="hero__stat-label">Companies</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="company-logos">
            <div class="container">
                <ul class="company-logos__list">
                    <li class="company-logos__item">
                        <img src="images/spotify.svg" alt="Spotify" />
                    </li>

                    <li class="company-logos__item">
                        <img src="images/slack.svg" alt="Slack" />
                    </li>

                    <li class="company-logos__item">
                        <img src="images/adobe.svg" alt="Adobe" />
                    </li>

                    <li class="company-logos__item">
                        <img src="images/asana-home.svg" alt="Asana" />
                    </li>

                    <li class="company-logos__item">
                        <img src="images/linear.svg" alt="Linear" />
                    </li>
                </ul>
            </div>
        </section>

        <section class="jobs">
            <div class="container">
                <div class="jobs__wrapper">
                    <div class="jobs__header">
                        <div class="jobs__heading">
                            <h2 class="jobs__header-title">Recent Jobs Available</h2>
                            <p class="jobs__header-desc">
                                At eu lobortis pretium tincidunt amet lacus ut aenean aliquet
                            </p>
                        </div>
                        <a class="viewall-link viewall-link--desktop" href="{{ route('jobs') }}">View all</a>
                    </div>

                    <ul class="jobs__list">
                        @foreach ($jobs as $job)
                            <li class="jobs__item">
                                <article class="job-card">
                                    <div class="job-card__top">
                                        <div class="badge">
                                            <span>10 min ago</span>
                                        </div>
                                        <button class="job-card__favorite" type="button" aria-label="Add to favorites">
                                            <img src="images/plus.svg" alt="" />
                                        </button>
                                    </div>
                                    <div class="job-card__main">
                                        <img src="{{ asset('images/jobs-1.svg') }}" alt="" />
                                        <div class="job-card__contents">
                                            <p class="job-card__title">{{ $job['title'] }}</p>
                                            <p class="job-card__subtitle">
                                                {{ $job['company'] }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="job-card__bottom">
                                        <ul class="job-card__meta">
                                            <li class="job-card__meta-item">
                                                <img src="images/bag.svg" alt="" />
                                                <span>{{ $job['category'] }}</span>
                                            </li>

                                            <li class="job-card__meta-item">
                                                <img src="images/clock-job-card.svg" alt="" />
                                                <span>{{ $job['type'] }}</span>
                                            </li>

                                            <li class="job-card__meta-item">
                                                <img src="images/wallet.svg" alt="" />
                                                <span>${{ $job->salary_min }}-${{ $job->salary_max }}</span>
                                            </li>

                                            <li class="job-card__meta-item">
                                                <img src="images/location.svg" alt="" />
                                                <span>{{ $job['location'] }}</span>
                                            </li>
                                        </ul>

                                        <div class="job-card__details">
                                            <a class="button" href="{{ route('job-details', ['id' => $job['id']]) }}">
                                                Job Details
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                    <a class="viewall-link viewall-link--mobile" href="jobs.html">View all</a>
                </div>
            </div>
        </section>

        <section class="category">
            <div class="container">
                <div class="category__wrapper">
                    <div class="category__header">
                        <h2 class="category__header-title">Browse by Category</h2>
                        <p class="category__header-desc">
                            At eu lobortis pretium tincidunt amet lacus ut aenean aliquet.
                            Blandit a massa elementum id sceleri
                        </p>
                    </div>

                    <ul class="category__list">
                        @foreach ($categories as $category => $count)
                            <li class="category__item">
                                <a class="category__link" href="{{ route('jobs', ['category' => $category]) }}">
                                    <img class="category__icon" src="images/agriculture.svg" alt="" />
                                    <p class="category__title">{{ $category }}</p>
                                    <p class="badge">{{ $count }} jobs</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <section class="about">
            <div class="container">
                <div class="about__wrapper">
                    <div class="about__content">
                        <img class="about__img" src="images/about-img.webp" alt="" />
                        <div class="about__body">
                            <div class="about__text">
                                <h2 class="about__title">
                                    Good Life Begins With A Good Company
                                </h2>
                                <p class="about__desc">
                                    Ultricies purus dolor viverra mi laoreet at cursus justo.
                                    Ultrices purus diam egestas amet faucibus tempor blandit.
                                    Elit velit mauris aliquam est diam. Leo sagittis consectetur
                                    diam morbi erat aenean. Vulputate praesent congue faucibus
                                    in euismod feugiat euismod volutpat
                                </p>
                            </div>
                            <div class="about__actions">
                                <a class="button" href="{{ route('jobs') }}">Search Job</a>
                                <a class="about__learn" href="#">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="about__stats">
                        <ul class="about__list">
                            <li class="about__item">
                                <span class="about__count">12k+</span>
                                <h3 class="about__label">Clients worldwide</h3>
                                <p class="about__info">
                                    At eu lobortis pretium tincidunt amet lacus ut aenean
                                    aliquet. Blandit a massa elementum
                                </p>
                            </li>
                            <li class="about__item">
                                <span class="about__count">20k+</span>
                                <h3 class="about__label">Active resume</h3>
                                <p class="about__info">
                                    At eu lobortis pretium tincidunt amet lacus ut aenean
                                    aliquet. Blandit a massa elementum
                                </p>
                            </li>
                            <li class="about__item">
                                <span class="about__count">18k+</span>
                                <h3 class="about__label">Companies</h3>
                                <p class="about__info">
                                    At eu lobortis pretium tincidunt amet lacus ut aenean
                                    aliquet. Blandit a massa elementum
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="banner">
            <div class="container">
                <div class="banner__wrapper">
                    <div class="banner__left">
                        <div class="banner__text">
                            <h2 class="banner__title">
                                Create A Better Future For Yourself
                            </h2>
                            <p class="banner__desc">
                                At eu lobortis pretium tincidunt amet lacus ut aenean aliquet.
                                Blandit a massa elementum id scelerisque rhoncus
                            </p>
                        </div>
                        <a class="button" href="{{ route('jobs') }}">Search Job</a>
                    </div>
                    <img class="banner__img" src="images/banner-img.webp" alt="" />
                </div>
            </div>
        </section>

        <section class="testimonial">
            <div class="container">
                <div class="testimonial__wrapper">
                    <div class="testimonial__header">
                        <h2 class="testimonial__title">
                            Testimonials from Our Customers
                        </h2>
                        <p class="testimonial__desc">
                            At eu lobortis pretium tincidunt amet lacus ut aenean aliquet.
                            Blandit a massa elementum id
                        </p>
                    </div>
                    <ul class="testimonial__list">
                        <li class="testimonial__item">
                            <div class="testimonial__body">
                                <ul class="testimonial__rating">
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                </ul>

                                <h3 class="testimonial__headline">Amazing services</h3>
                                <p class="testimonial__content">
                                    Metus faucibus sed turpis lectus feugiat tincidunt. Rhoncus
                                    sed tristique in dolor. Mus etiam et vestibulum venenatis
                                </p>
                            </div>
                            <img class="testimonial__quote" src="images/quote.svg" alt="" />
                            <div class="testimonial__author">
                                <img class="testimonial__avatar" src="images/customer.svg" alt="" />
                                <div class="testimonial__info">
                                    <p class="testimonial__name">Marco Kihn</p>
                                    <p class="testimonial__role">Happy Client</p>
                                </div>
                            </div>
                        </li>
                        <li class="testimonial__item">
                            <div class="testimonial__body">
                                <ul class="testimonial__rating">
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                </ul>
                                <h3 class="testimonial__headline">Everything simple</h3>
                                <p class="testimonial__content">
                                    Mus etiam et vestibulum venenatis viverra ut. Elit morbi
                                    bibendum ullamcorper augue faucibus
                                </p>
                            </div>
                            <img class="testimonial__quote" src="images/quote.svg" alt="" />
                            <div class="testimonial__author">
                                <img class="testimonial__avatar" src="images/customer.svg" alt="" />
                                <div class="testimonial__info">
                                    <p class="testimonial__name">Kristin Hester</p>
                                    <p class="testimonial__role">Happy Client</p>
                                </div>
                            </div>
                        </li>
                        <li class="testimonial__item">
                            <div class="testimonial__body">
                                <ul class="testimonial__rating">
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                    <li class="testimonial__star">
                                        <img src="images/star.svg" alt="" />
                                    </li>
                                </ul>
                                <h3 class="testimonial__headline">Awesome, thank you!</h3>
                                <p class="testimonial__content">
                                    Rhoncus sed tristique in dolor. Mus etiam et vestibulum
                                    venenatis viverra ut. Elit morbi bibendum ullamcorper augue
                                    faucibus. Nulla et tempor montes
                                </p>
                            </div>
                            <img class="testimonial__quote" src="images/quote.svg" alt="" />
                            <div class="testimonial__author">
                                <img class="testimonial__avatar" src="images/customer.svg" alt="" />
                                <div class="testimonial__info">
                                    <p class="testimonial__name">Zion Cisneros</p>
                                    <p class="testimonial__role">Happy Client</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="blog">
            <div class="container">
                <div class="blog__wrapper">
                    <div class="blog__header">
                        <div class="blog__text">
                            <h2 class="blog__title">News and Blog</h2>
                            <p class="blog__intro">
                                Metus faucibus sed turpis lectus feugiat tincidunt. Rhoncus
                                sed tristique in dolor
                            </p>
                        </div>
                        <a class="viewall-link viewall-link--desktop" href="jobs.html">View all</a>
                    </div>
                    <ul class="blog__list">
                        <li class="blog__item">
                            <a class="blog__link" href="#">
                                <div class="blog__heading">
                                    <img class="blog__image" src="images/blog-image1.webp" alt="" />
                                    <span class="blog__genre">News</span>
                                </div>
                                <div class="blog__content">
                                    <time class="blog__date" datetime="2024-03-30">
                                        30 March 2024
                                    </time>
                                    <h3 class="blog__headline">
                                        Revitalizing Workplace Morale: Innovative Tactics for
                                        Boosting Employee Engagement in 2024
                                    </h3>
                                    <div class="blog__more">
                                        <span class="blog__read-more">Read more</span>
                                        <img class="blog__arrow" src="images/arrow.svg" alt="" />
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="blog__item">
                            <a class="blog__link" href="#">
                                <div class="blog__heading">
                                    <img class="blog__image" src="images/blog-image2.webp" alt="" />
                                    <span class="blog__genre">Blog</span>
                                </div>
                                <div class="blog__content">
                                    <time class="blog__date" datetime="2024-03-30">
                                        30 March 2024
                                    </time>
                                    <h3 class="blog__headline">
                                        How to avoid the top six most common job interview
                                        mistakes
                                    </h3>
                                    <div class="blog__more">
                                        <span class="blog__read-more">Read more</span>
                                        <img class="blog__arrow" src="images/arrow.svg" alt="" />
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <a class="viewall-link viewall-link--mobile" href="jobs.html">View all</a>
                </div>
            </div>
        </section>
    </main>
@endsection
