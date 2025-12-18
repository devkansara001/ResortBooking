<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Grand Oasis Resort - Book Your Stay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f4f8; /* Light blue-gray background */
            color: #334155; /* Dark slate gray text */
        }
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images3.alphacoders.com/689/689318.jpg') no-repeat center center/cover;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }
        .section-title {
            color: #1e293b; /* Darker slate gray for titles */
        }
        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px_6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }
        .btn-primary {
            @apply inline-block text-center font-semibold transition duration-300 ease-in-out;
            background-color: #0d9488; /* Teal */
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #0f766e; /* Darker teal */
        }
        .btn-secondary {
             @apply inline-block text-center font-semibold transition duration-300 ease-in-out;
             background-color: white;
             color: #0d9488;
             border: 1px solid #0d9488;
             padding: 10px 20px;
             border-radius: 8px;
        }
        .btn-secondary:hover {
            background-color: #f0fdfa; /* very light teal */
        }
        .footer {
            background-color: #1e293b; /* Dark slate gray */
            color: #e2e8f0; /* Light gray */
        }
        .form-input {
            @apply w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 transition;
        }
        .form-label {
            @apply block text-sm font-medium text-gray-700 mb-1;
        }
        /* Custom modal styles */
        .modal-backdrop {
            @apply fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 transition-opacity duration-300;
        }
        .modal-content {
            @apply bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full text-center transform transition-all duration-300;
        }
        /* Bootstrap Carousel Custom Styles */
        .carousel-item img {
            height: 24rem; /* 384px */
            object-fit: cover;
            border-radius: 12px; /* Tailwind's rounded-xl */
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(13, 148, 136, 0.7); /* Semi-transparent Teal */
            border-radius: 50%;
            padding: 1.25rem;
            background-size: 50%;
        }
        .carousel-indicators [data-bs-target] {
            background-color: #0d9488; /* Teal */
        }
        
        /* Mobile menu specific styles */
        .mobile-menu-open {
            display: block;
        }
        .mobile-menu-closed {
            display: none;
        }
        
        /* Hamburger icon animation */
        .menu-button-icon {
            transition: transform 0.3s ease-in-out;
        }
        .menu-button-open .top-bar {
            transform: translateY(6px) rotate(45deg);
        }
        .menu-button-open .middle-bar {
            opacity: 0;
        }
        .menu-button-open .bottom-bar {
            transform: translateY(-6px) rotate(-45deg);
        }
    </style>
</head>
<body class="antialiased">

    <nav class="bg-white shadow-lg p-4 md:p-6 flex justify-between items-center sticky top-0 z-40">
        <div class="text-2xl font-bold text-teal-600">The Grand Oasis Resort</div>
        <div class="hidden md:flex space-x-6 items-center">
            <a href="#home" class="text-gray-700 hover:text-teal-600 font-medium">Home</a>
            <a href="#rooms" class="text-gray-700 hover:text-teal-600 font-medium">Rooms</a>
            <a href="#amenities" class="text-gray-700 hover:text-teal-600 font-medium">Amenities</a>
            <a href="#gallery" class="text-gray-700 hover:text-teal-600 font-medium">Gallery</a>
            <a href="#contact" class="text-gray-700 hover:text-teal-600 font-medium">Contact</a>
            <a href="bookingroom.php" class="btn-primary !py-2 !px-4 !text-sm">Book Now</a>
            <a href="index.php" class="btn-secondary !py-2 !px-4 !text-sm">Logout</a>
        </div>
        <button id="menu-button" class="md:hidden text-gray-700 focus:outline-none z-50">
            <svg class="w-6 h-6 menu-button-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path class="top-bar transition-all duration-300 ease-in-out" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16"></path>
                <path class="middle-bar transition-all duration-300 ease-in-out" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16"></path>
                <path class="bottom-bar transition-all duration-300 ease-in-out" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 18h16"></path>
            </svg>
        </button>
    </nav>

    <div id="mobile-menu" class="fixed inset-x-0 top-0 pt-20 bg-white shadow-lg z-40 transform -translate-y-full transition-transform duration-300 ease-in-out md:hidden">
        <div class="flex flex-col space-y-2 p-4">
            <a href="#home" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Home</a>
            <a href="#rooms" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Rooms</a>
            <a href="#amenities" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Amenities</a>
            <a href="#gallery" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Gallery</a>
            <a href="#contact" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Contact</a>
            <a href="bookingroom.php" class="block mx-4 my-2 text-center btn-primary">Book Now</a>
            <a href="index.php" class="block mx-4 my-2 text-center btn-secondary">Logout</a>
        </div>
    </div>

    <header id="home" class="hero-section mb-12">
        <div class="max-w-4xl px-4">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-4 drop-shadow-lg">Discover Your Perfect Getaway</h1>
            <p class="text-xl md:text-2xl mb-8 drop-shadow-md">Experience unparalleled luxury and breathtaking views at The Grand Oasis Resort.</p>
            <a href="#rooms" class="btn-primary inline-block font-semibold shadow-lg hover:shadow-xl">Explore Our Rooms</a>
        </div>
    </header>

    <section id="rooms" class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <h2 class="section-title text-4xl font-bold text-center mb-10">Our Luxurious Rooms & Suites</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="card">
                    <img src="https://img.freepik.com/premium-photo/luxury-living-room-hd-8k-wallpaper-stock-photographic-image_915071-28920.jpg?w=2000" alt="Deluxe Room" class="w-full h-56 object-cover">
                    <div class="p-6 flex flex-col">
                        <h3 class="text-2xl font-semibold mb-2 text-gray-800">Deluxe Room</h3>
                        <p class="text-gray-600 mb-4">Spacious room with a king-size bed, private balcony, and stunning garden views.</p>
                        <div class="flex-grow"></div>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-teal-700">₹15,000 <span class="text-sm font-normal">/night</span></span>
                            <button class="btn-secondary book-now-btn" data-room="Deluxe Room" data-price="15000"><a href="bookingroom.php">Book Now</a></button>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <img src="https://www.theungasan.com/wp-content/uploads/2016/09/ungasan_ocean-view-plunge-pool_villa-chintamani_rgb-1.jpg" alt="Ocean View Suite" class="w-full h-56 object-cover">
                    <div class="p-6 flex flex-col">
                        <h3 class="text-2xl font-semibold mb-2 text-gray-800">Ocean View Suite</h3>
                        <p class="text-gray-600 mb-4">Luxurious suite with a separate living area and panoramic ocean vistas.</p>
                         <div class="flex-grow"></div>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-teal-700">₹25,000 <span class="text-sm font-normal">/night</span></span>
                            <button class="btn-secondary book-now-btn" data-room="Ocean View Suite" data-price="25000"><a href="bookingroom.php">Book Now</a></button>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <img src="https://static.vecteezy.com/system/resources/previews/023/131/348/non_2x/modern-villa-illustration-ai-generative-free-photo.jpg" alt="Family Villa" class="w-full h-56 object-cover">
                    <div class="p-6 flex flex-col">
                        <h3 class="text-2xl font-semibold mb-2 text-gray-800">Family Villa</h3>
                        <p class="text-gray-600 mb-4">Spacious villa perfect for families, featuring multiple bedrooms and a private pool.</p>
                         <div class="flex-grow"></div>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-teal-700">₹20,000 <span class="text-sm font-normal">/night</span></span>
                            <button class="btn-secondary book-now-btn" data-room="Family Villa" data-price="20000"><a href="bookingroom.php">Book Now</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
                        

    <section id="amenities" class="container mx-auto px-4 py-12">
        <h2 class="section-title text-4xl font-bold text-center mb-10">World-Class Amenities</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <a href="pool.php" class="block">
                <div class="card p-6 text-center h-full">
                    <div class="text-5xl text-teal-600 mb-4">🏊</div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Infinity Pool</h3>
                    <p class="text-gray-600">Relax by our stunning infinity pool with breathtaking views.</p>
                </div>
            </a>
            <a href="gourmet_dianing.php" class="block">
                <div class="card p-6 text-center">
                    <div class="text-5xl text-teal-600 mb-4">🍽️</div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Gourmet Dining</h3>
                    <p class="text-gray-600">Savor exquisite dishes at our on-site restaurants.</p>
                </div>
            </a>
            <a href="spa.php" class="block">
            <div class="card p-6 text-center">
                <div class="text-5xl text-teal-600 mb-4">🧘</div>
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Spa & Wellness</h3>
                <p class="text-gray-600">Rejuvenate your mind and body at our luxurious spa.</p>
            </div>
            </a>
            <a href="fitness.php" class="block">
            <div class="card p-6 text-center">
                <div class="text-5xl text-teal-600 mb-4">🏋️</div>
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Fitness Center</h3>
                <p class="text-gray-600">Stay active with our state-of-the-art fitness facilities.</p>
            </div>
            </a>
        </div>
    </section>

    <section id="gallery" class="bg-gray-50 py-12 mb-12">
        <div class="container mx-auto px-4">
            <h2 class="section-title text-4xl font-bold text-center mb-10">Our Beautiful Gallery</h2>
            <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    </div>
                <div class="carousel-inner">
                    </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    
    <section id="contact" class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="section-title text-4xl font-bold text-center mb-10">Contact Us</h2>
            <div class="max-w-3xl mx-auto bg-slate-100 p-8 rounded-2xl">
                <p class="text-center text-lg mb-6 text-gray-700">Have questions? Reach out to us!</p>
                <form class="space-y-6">
                    <div>
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Your Name" required>
                    </div>
                    <div>
                        <label for="contact-email" class="form-label">Email:</label>
                        <input type="email" id="contact-email" name="email" class="form-input" placeholder="your@example.com" required>
                    </div>
                    <div>
                        <label for="message" class="form-label">Message:</label>
                        <textarea id="message" name="message" rows="5" class="form-input" placeholder="Your message here..." required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn-primary font-semibold shadow-lg hover:shadow-xl">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer class="footer py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p class="mb-4">&copy; 2025 The Grand Oasis Resort. All rights reserved.</p>
            <div class="flex justify-center space-x-6 text-lg">
                <a href="#" class="hover:text-teal-400">Facebook</a>
                <a href="#" class="hover:text-teal-400">Instagram</a>
                <a href="#" class="hover:text-teal-400">Twitter</a>
            </div>
        </div>
    </footer>

    <div id="status-modal" class="modal-backdrop hidden opacity-0">
        <div id="modal-content" class="modal-content scale-95">
            <div id="modal-icon" class="mx-auto mb-4 w-16 h-16 rounded-full flex items-center justify-center">
                </div>
            <h3 id="modal-title" class="text-2xl font-bold text-gray-800 mb-2"></h3>
            <p id="modal-message" class="text-gray-600"></p>
            <button id="modal-close-btn" class="btn-primary mt-6">Close</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Gallery Images Array ---
            const galleryImages = [
                "https://plus.unsplash.com/premium_photo-1687960116497-0dc41e1808a2?q=80&w=1171&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                "https://images.unsplash.com/photo-1606402179428-a57976d71fa4?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                "https://plus.unsplash.com/premium_photo-1663126637580-ff22a73f9bfc?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                "https://images.unsplash.com/photo-1728486884112-e6e5d7ccfea5?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                "https://plus.unsplash.com/premium_photo-1733514433498-b326f0e901da?q=80&w=1171&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                "https://images.unsplash.com/photo-1677267921451-05a367affda7?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            ];

            // --- Function to Dynamically Create Carousel ---
            function createGalleryCarousel(images) {
                const carouselIndicators = document.querySelector('#galleryCarousel .carousel-indicators');
                const carouselInner = document.querySelector('#galleryCarousel .carousel-inner');
                
                carouselIndicators.innerHTML = ''; // Clear existing indicators
                carouselInner.innerHTML = ''; // Clear existing items

                images.forEach((src, index) => {
                    // Create Indicator Button
                    const indicator = document.createElement('button');
                    indicator.type = 'button';
                    indicator.dataset.bsTarget = '#galleryCarousel';
                    indicator.dataset.bsSlideTo = index;
                    indicator.setAttribute('aria-label', `Slide ${index + 1}`);
                    if (index === 0) {
                        indicator.classList.add('active');
                        indicator.setAttribute('aria-current', 'true');
                    }
                    carouselIndicators.appendChild(indicator);

                    // Create Carousel Item
                    const item = document.createElement('div');
                    item.classList.add('carousel-item');
                    if (index === 0) {
                        item.classList.add('active');
                    }
                    item.innerHTML = `<img src="${src}" class="d-block w-100" alt="Gallery Image ${index + 1}">`;
                    carouselInner.appendChild(item);
                });
            }

            // --- Initialize Dynamic Gallery ---
            createGalleryCarousel(galleryImages);

            // --- DOM Element References ---
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuLinks = mobileMenu.querySelectorAll('a[href^="#"]');
            
            const bookingForm = document.getElementById('booking-form');
            const roomTypeSelect = document.getElementById('room-type');
            const checkInInput = document.getElementById('check-in');
            const checkOutInput = document.getElementById('check-out');
            const bookNowButtons = document.querySelectorAll('.book-now-btn');
            const formSection = document.getElementById('booking-form-section');

            // Price summary elements
            const summaryRoomName = document.getElementById('summary-room-name');
            const summaryNights = document.getElementById('summary-nights');
            const summarySubtotal = document.getElementById('summary-subtotal');
            const summaryTaxes = document.getElementById('summary-taxes');
            const summaryTotal = document.getElementById('summary-total');
            
            // Modal elements
            const modal = document.getElementById('status-modal');
            const modalContent = document.getElementById('modal-content');
            const modalIcon = document.getElementById('modal-icon');
            const modalTitle = document.getElementById('modal-title');
            const modalMessage = document.getElementById('modal-message');
            const modalCloseBtn = document.getElementById('modal-close-btn');

            // --- Initial Setup ---
            const today = new Date().toISOString().split('T')[0];
            if (checkInInput) {
                checkInInput.setAttribute('min', today);
            }
            if (checkInInput) {
                checkInInput.addEventListener('change', () => {
                    if (checkInInput.value) {
                        let nextDay = new Date(checkInInput.value);
                        nextDay.setDate(nextDay.getDate() + 1);
                        checkOutInput.setAttribute('min', nextDay.toISOString().split('T')[0]);
                    }
                });
            }

            // --- Event Listeners ---
            menuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('-translate-y-full');
                menuButton.classList.toggle('menu-button-open');
            });
            
            // This event listener is for the links inside the mobile menu
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('-translate-y-full');
                    menuButton.classList.remove('menu-button-open');
                });
            });

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetElement = document.querySelector(this.getAttribute('href'));
                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
            
            if (bookNowButtons) {
                bookNowButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const roomPrice = this.dataset.price;
                        roomTypeSelect.value = roomPrice;
                        roomTypeSelect.dispatchEvent(new Event('change'));
                        formSection.scrollIntoView({ behavior: 'smooth' });
                    });
                });
            }
            if (bookingForm) {
                bookingForm.addEventListener('change', updatePriceSummary);

                bookingForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    if (validateForm()) {
                        const roomName = roomTypeSelect.options[roomTypeSelect.selectedIndex].dataset.roomName;
                        showModal('success', 'Booking Confirmed!', `Thank you! Your booking for the ${roomName} is confirmed. We've sent details to your email.`);
                        bookingForm.reset();
                        updatePriceSummary();
                    }
                });
            }
            if (modalCloseBtn) {
                modalCloseBtn.addEventListener('click', hideModal);
            }
            if (modal) {
                modal.addEventListener('click', (e) => {
                    if(e.target === modal) hideModal();
                });
            }

            // --- Functions ---
            function updatePriceSummary() {
                const pricePerNight = parseFloat(roomTypeSelect.value) || 0;
                const selectedOption = roomTypeSelect.options[roomTypeSelect.selectedIndex];
                const roomName = selectedOption ? selectedOption.dataset.roomName : 'N/A';
                
                const checkInDate = new Date(checkInInput.value);
                const checkOutDate = new Date(checkOutInput.value);

                let nights = 0;
                if (checkInInput.value && checkOutInput.value && checkOutDate > checkInDate) {
                    const timeDiff = checkOutDate.getTime() - checkInDate.getTime();
                    nights = Math.ceil(timeDiff / (1000 * 3600 * 24));
                }

                const subtotal = nights * pricePerNight;
                const taxes = subtotal * 0.18;
                const total = subtotal + taxes;
                
                const formatCurrency = (amount) => new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', minimumFractionDigits: 0 }).format(amount);
                
                if (summaryRoomName) summaryRoomName.textContent = roomName;
                if (summaryNights) summaryNights.textContent = nights;
                if (summarySubtotal) summarySubtotal.textContent = formatCurrency(subtotal);
                if (summaryTaxes) summaryTaxes.textContent = formatCurrency(taxes);
                if (summaryTotal) summaryTotal.textContent = formatCurrency(total);
            }

            function validateForm() {
                if (!checkInInput.value || !checkOutInput.value) {
                    showModal('error', 'Invalid Dates', 'Please select both a check-in and check-out date.');
                    return false;
                }
                if (new Date(checkOutInput.value) <= new Date(checkInInput.value)) {
                    showModal('error', 'Invalid Dates', 'Check-out date must be after the check-in date.');
                    return false;
                }
                return true;
            }

            function showModal(type, title, message) {
                modalTitle.textContent = title;
                modalMessage.textContent = message;

                if (type === 'success') {
                    modalIcon.innerHTML = `<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;
                    modalIcon.className = 'mx-auto mb-4 w-16 h-16 rounded-full flex items-center justify-center bg-green-100 text-green-600';
                    modalCloseBtn.className = 'btn-primary mt-6 bg-green-600 hover:bg-green-700';
                } else { // error
                    modalIcon.innerHTML = `<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;
                    modalIcon.className = 'mx-auto mb-4 w-16 h-16 rounded-full flex items-center justify-center bg-red-100 text-red-600';
                    modalCloseBtn.className = 'btn-primary mt-6 bg-red-600 hover:bg-red-700';
                }

                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modalContent.classList.remove('scale-95');
                }, 10);
            }

            function hideModal() {
                 modal.classList.add('opacity-0');
                 modalContent.classList.add('scale-95');
                 setTimeout(() => modal.classList.add('hidden'), 300);
            }
            
            updatePriceSummary();
        });
    </script>
</body>
</html>