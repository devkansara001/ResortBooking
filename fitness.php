<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Centre - The Grand Oasis Resort</title>
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
            <h1 class="text-4xl md:text-5xl font-extrabold text-center text-gray-800 mb-6">Fitness Centre</h1>
            <p class="text-lg text-center text-gray-600 mb-10">Stay active and energized during your stay.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mb-10">
                <div class="image-wrapper">
                    <img src="https://patongparagon.com/images/2716.jpg" alt="A modern gym with various equipment">
                </div>
                <div class="image-wrapper">
                    <img src="https://images.unsplash.com/photo-1549576490-b0b4831ef60a?q=80&w=1920&auto=format&fit=crop" alt="Workout area with yoga mats and weights">
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">State-of-the-Art Facilities</h2>
                <p class="text-gray-700 leading-relaxed mb-8 max-w-3xl mx-auto">
                    Our fully-equipped fitness centre is open 24/7, ensuring you can maintain your workout routine at your convenience. We feature the latest cardio machines, free weights, and strength training equipment. Personal trainers are also available to provide guidance and create a customized plan just for you.
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