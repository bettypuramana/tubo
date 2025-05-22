<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TUBO</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/user/images/logos/Tubo logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/lucide@latest/dist/lucide.css">
    @yield('css')
</head>

<body>
    <main>
        <!-- Navigation -->
        <header class="navbar">
            <div class="container">
                <div class="logo">
                    <a href="{{ route('user.home') }}">
                        <img src="{{ asset('assets/user/images/logos/Tubo logo.png') }}" alt="TUBO Logo">
                    </a>
                </div>
                <nav>
                    <ul>
                        <li><a href="{{ route('user.home') }}">Home</a></li>
                        <li>
                            <a href="{{ route('about_us') }}">About Us</a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('services') }}"><span class="arrow"></span> Services</a>
                            <ul class="submenu">
                                @foreach (getServices() as $service)
                                    <li>
                                        <a href="{{ route('services') }}#{{ $service->title }}{{ $service->id }}"> {{ formatTitleCase($service->title) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('projects') }}"><span class="arrow"></span> Projects</a>
                            <ul class="submenu">
                                @foreach (getClients() as $client)
                                    <li>
                                        <a href="{{ route('projects') }}#{{ $client->title }}{{ $client->id }}"> {{ formatTitleCase($client->title) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('careers') }}">Careers</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </nav>
                <div class="icons-nav">
                    <nav>
                        <a href="mailto:info@tubo.qa">
                            <i class="icon-mail" data-lucide="mail" style="width:20px; height:20px;"></i>
                        </a>
                        <!-- <i class="icon-globe" data-lucide="globe" style="width:20px; height:20px;"></i>
                        <i class="icon-search" data-lucide="search" style="width:20px; height:20px;"></i> -->
                    </nav>
                </div>
                <div class="mobile-menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </header>

        @yield('content')
        
    </main>
    <!-- Footer -->
    <footer>
        <div class="social-linkedin">
            <a href="https://www.linkedin.com/company/tubo-trading-contracting/" target="_blank">
                <img src="{{ asset('assets/user/images/socials/linkedin.png') }}" alt="linkedin" height="25px" width="25px">
            </a>
        </div>
        <br><br>
        <div class="footer-nav">
            <a href="{{ route('user.home') }}">Home</a>
            <a href="{{ route('about_us') }}">About Us</a>
            <a href="{{ route('services') }}">Services</a>
            <a href="{{ route('projects') }}">Projects</a>
            <a href="{{ route('careers') }}">Careers</a>
            <a href="{{ route('contact') }}">Contact Us</a>
        </div>

    </footer>
    <div class="footer-bottom">
        <p class="copyright">All rights reserved Copyright© {{ date('Y') }}</p>
    </div>
@yield('js')

</body>

</html>
<script>
    const accordionItems = document.querySelectorAll('.accordion-item');
    const previewImage = document.getElementById('accordion-image');
    const previewDescription = document.getElementById('accordion-description');

    const isMobile = window.matchMedia("(max-width: 768px)").matches;

    accordionItems.forEach(item => {
        const imagePath = 'uploads/services/' + item.getAttribute('data-image');
        // item.style.backgroundImage = `url(${imagePath})`;

        const updatePreview = () => {
            previewImage.style.opacity = 0;
            setTimeout(() => {
                previewImage.src = imagePath;
                previewDescription.textContent = item.getAttribute('data-description');
                previewImage.style.opacity = 1;
            }, 200);
        };

        if (isMobile) {
            item.addEventListener('click', updatePreview);
        } else {
            item.addEventListener('mouseover', updatePreview);
        }
    });


    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const nav = document.querySelector('.navbar nav');
        const submenuParents = document.querySelectorAll('.has-submenu');

        // Mobile menu toggle
        mobileMenuToggle.addEventListener('click', function () {
            this.classList.toggle('active');
            nav.classList.toggle('active');
        });


        submenuParents.forEach(item => {
            const parentLink = item.querySelector('a');

            parentLink.addEventListener('click', function (e) {
                if (window.innerWidth <= 768) {

                    if (!item.classList.contains('active')) {
                        e.preventDefault();
                        item.classList.add('active');
                    }

                }
            });
        });


        const navLinks = document.querySelectorAll('.navbar nav ul li a');
        navLinks.forEach(link => {
            link.addEventListener('click', function () {

                if (window.innerWidth <= 768 && !this.closest('.has-submenu')) {
                    mobileMenuToggle.classList.remove('active');
                    nav.classList.remove('active');
                }
            });
        });
    });


</script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>