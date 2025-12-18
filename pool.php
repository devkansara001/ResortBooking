<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinity Pool - The Grand Oasis Resort</title>
    <!-- Tailwind CSS CDN for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f4f8;
            color: #334155;
        }
        .btn-primary {
            @apply inline-block text-center font-semibold transition duration-300 ease-in-out;
            background-color: #0d9488;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
        }
        .btn-primary:hover {
            background-color: #0f766e;
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

    <!-- Navigation Bar -->
    <nav class="bg-white shadow-lg p-4 md:p-6 flex justify-between items-center">
        <a href="index.php" class="text-2xl font-bold text-teal-600">The Grand Oasis Resort</a>
        <a href="bookingroom.php" class="btn-primary !py-2 !px-4 !text-sm">Book Your Stay</a>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12 md:py-16">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold text-center text-gray-800 mb-6">The Infinity Pool</h1>
            <p class="text-lg text-center text-gray-600 mb-10">Your serene escape with an endless ocean view.</p>

            <!-- Image Gallery -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mb-10">
                <div class="image-wrapper">
                   <img src="https://resizeapi.com/resize-cgi/image/format=jpeg,fit=cover,width=500,quality=75/https://r2-us-west.interiorai.com/1706804896-f8ed442677aa5fbf2537f7fe0c9f0ddc-4.png">
                </div>
                <div class="image-wrapper">
                    <img src="https://th.bing.com/th/id/OIP.G_ZzgkIe5n7tvIQhf_tf-gHaEK?w=271&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3">
                </div>
            </div>

            <!-- Details Section -->
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Experience True Relaxation</h2>
                <p class="text-gray-700 leading-relaxed mb-8 max-w-3xl mx-auto">
                    Our magnificent infinity pool is the centerpiece of The Grand Oasis Resort. Designed to blend seamlessly with the horizon, it offers breathtaking, panoramic views of the ocean. Comfortable sun loungers, private cabanas, and poolside service are available to ensure your time here is nothing short of perfect.
                </p>
                <a href="resort.php" class="btn-primary">Return to Home</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 The Grand Oasis Resort. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
