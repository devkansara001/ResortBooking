<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - The Grand Oasis Resort</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include '../src/views/header.php'; ?>
    <?php include '../src/views/navbar.php'; ?>

    <main class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Welcome to The Grand Oasis Resort</h1>
        <p class="text-lg text-center mb-12">Experience luxury and comfort like never before.</p>

        <section class="features mb-12">
            <h2 class="text-3xl font-semibold text-center mb-6">Our Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="feature-card">
                    <h3 class="text-xl font-bold">Luxurious Rooms</h3>
                    <p>Enjoy our elegantly designed rooms with stunning views and modern amenities.</p>
                </div>
                <div class="feature-card">
                    <h3 class="text-xl font-bold">Gourmet Dining</h3>
                    <p>Savor exquisite dishes prepared by our world-class chefs.</p>
                </div>
                <div class="feature-card">
                    <h3 class="text-xl font-bold">Spa & Wellness</h3>
                    <p>Relax and rejuvenate at our luxurious spa with a variety of treatments.</p>
                </div>
            </div>
        </section>

        <section class="amenities mb-12">
            <h2 class="text-3xl font-semibold text-center mb-6">World-Class Amenities</h2>
            <ul class="list-disc list-inside mx-auto max-w-2xl">
                <li>Infinity Pool</li>
                <li>Fitness Center</li>
                <li>Free Wi-Fi</li>
                <li>24/7 Room Service</li>
                <li>Concierge Services</li>
            </ul>
        </section>
    </main>

    <?php include '../src/views/footer.php'; ?>
    <script src="assets/js/main.js"></script>
</body>
</html>