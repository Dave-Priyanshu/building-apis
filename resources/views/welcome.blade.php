<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Learning Hub</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
</head>
<body>
    <nav class="header-nav">
        <ul class="nav-left">
            <li><a href="#" class="nav-link"><i class="uil uil-user"></i> About Developer</a></li>
            <li><a href="#" class="nav-link"><i class="uil uil-github"></i> Git Repo</a></li>
        </ul>
        <ul class="nav-right">
            <li class="nav-link-tooltip">
                <a href="#" class="nav-link"><i class="uil uil-folder-open"></i> Create your portfolio</a>
                <span class="tooltip">Create your Portfolio, Fill in your details, click “Publish,” and share a gorgeous, mobile-responsive portfolio —no coding required.</span>
            </li>
        </ul>
    </nav>
    <div class="hero">
        <h1>API Learning Hub</h1>
        <p>Master APIs and web development with hands-on tutorials</p>
    </div>
    <div class="grid-container">
        <div class="card">
            <i class="uil uil-credit-card card-icon"></i>
            <h3>Payment Gateway</h3>
            <a href="{{ route('razorpay.form') }}" class="card-button">Get Started</a>
        </div>
        <div class="card">
            <i class="uil uil-bolt card-icon"></i>
            <h3>Live Wire Tutorial</h3>
            <a href="{{ route('razorpay.form') }}" class="card-button">Get Started</a>
        </div>
        <div class="card">
            <i class="uil uil-code-branch card-icon"></i>
            <h3>API Tutorial</h3>
            <a href="#" class="card-button">Get Started</a>
        </div>
        <!-- Placeholder cards (hidden initially) -->
        <div class="card hidden">
            <i class="uil uil-server card-icon"></i>
            <h3>Database Basics</h3>
            <a href="#" class="card-button">Get Started</a>
        </div>
        <div class="card hidden">
            <i class="uil uil-lock card-icon"></i>
            <h3>Authentication</h3>
            <a href="#" class="card-button">Get Started</a>
        </div>
        <div class="card hidden">
            <i class="uil uil-sitemap card-icon"></i>
            <h3>GraphQL Basics</h3>
            <a href="#" class="card-button">Get Started</a>
        </div>
    </div>
    <button id="toggle-cards" class="toggle-button">Load More</button>
    <script>
        const toggleButton = document.getElementById('toggle-cards');
        const gridContainer = document.querySelector('.grid-container');
        let isExpanded = false;

        toggleButton.addEventListener('click', () => {
            const hiddenCards = document.querySelectorAll('.card.hidden');
            const visibleCards = document.querySelectorAll('.card:not(.hidden)');

            if (!isExpanded) {
                hiddenCards.forEach(card => {
                    card.classList.remove('hidden');
                    card.classList.add('fade-in');
                    card.classList.remove('fade-out');
                });
                toggleButton.textContent = 'Show Less';
                isExpanded = true;
            } else {
                const cardsToHide = Array.from(visibleCards).slice(3);
                cardsToHide.forEach(card => {
                    card.classList.add('fade-out');
                    setTimeout(() => {
                        card.classList.add('hidden');
                        card.classList.remove('fade-out');
                    }, 500);
                });
                toggleButton.textContent = 'Load More';
                isExpanded = false;
            }
        });

        const tooltip = document.querySelector('.tooltip');
        function toggleTooltip() {
            tooltip.classList.add('tooltip-visible');
            setTimeout(() => {
                tooltip.classList.remove('tooltip-visible');
            }, 5000);
        }
        setInterval(toggleTooltip, 10000);
        toggleTooltip();
    </script>
</body>
</html>