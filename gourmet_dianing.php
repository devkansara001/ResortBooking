<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gourmet Dining - The Grand Oasis Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f4f8;
            color: #334155;
        }
        .footer {
            background-color: #1e293b;
            color: #e2e8f0;
        }
        .image-wrapper img {
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            width: 100%;
            height: auto;
            object-fit: cover;
            aspect-ratio: 4 / 3;
        }
    </style>
</head>
<body class="antialiased">

    <nav class="bg-white shadow-lg p-4 md:p-6 flex justify-between items-center">
        <a href="index.php" class="text-2xl font-bold text-teal-600">The Grand Oasis Resort</a>
        <a href="bookingroom.php" class="inline-block text-center font-semibold transition duration-300 ease-in-out bg-[#0d9488] text-white py-2 px-4 rounded-lg text-sm hover:bg-[#0f766e]">Book Your Stay</a>
    </nav>

    <main class="container mx-auto px-4 py-12 md:py-16">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold text-center text-gray-800 mb-6">Gourmet Dining</h1>
            <p class="text-lg text-center text-gray-600 mb-10">A culinary journey for the discerning palate.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mb-10">
                <div class="image-wrapper">
                    <img src="https://www.royaldubrovnik.com/wp-content/uploads/elementor/thumbs/Restaurant-Zoe-770x500-1-qlktjeyjr43kxpj8cruu7da86p1eah9y5prliot0js.jpg" alt="A beautifully plated gourmet dish">
                </div>
                <div class="image-wrapper">
                    <img src="https://www.kumarakomlakeresort.in/assets/images/luxury-dining/vembanad-the-seafood-bar/gallery/vembanad-the-seafood-bar-8.jpg" alt="A luxurious restaurant interior">
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Savor Every Moment</h2>
                <p class="text-gray-700 leading-relaxed mb-8 max-w-3xl mx-auto">
                    At The Grand Oasis Resort, dining is an art form. Our world-class chefs use the freshest local ingredients to craft exquisite dishes that delight the senses. From casual beachfront cafes to elegant fine-dining restaurants, we offer a variety of culinary experiences to satisfy every craving.
                </p>
                <a href="resort.php" class="inline-block text-center font-semibold transition duration-300 ease-in-out bg-[#0d9488] text-white py-3 px-6 rounded-lg hover:bg-[#0f766e]">Return to Home</a>
            </div>
        </div>
    </main>

    <footer class="footer py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 The Grand Oasis Resort. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>