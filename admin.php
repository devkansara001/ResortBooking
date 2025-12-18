<?php
session_start();

// --- Database Connection Details ---
// IMPORTANT: Update these details with your own database configuration
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "devam";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Admin Authentication and Session Management ---
$admin_password = 'admin-123'; // Hardcoded password for this demo.

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['is_admin'] = true;
        header('Location: admin.php');
        exit();
    } else {
        $login_error = "Invalid password. Please try again.";
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit();
}

// --- CRUD Operations (only for logged-in admins) ---

// Handle booking deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
        $id = $conn->real_escape_string($_POST['booking_id']);
        $sql = "DELETE FROM bookings WHERE id = '$id'";
        if (!$conn->query($sql)) {
            $crud_error = "Error deleting record: " . $conn->error;
        }
        // Refresh page to show updated table
        header('Location: admin.php');
        exit();
    }
}

// Handle booking update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
        $id = $conn->real_escape_string($_POST['booking_id']);
        $full_name = $conn->real_escape_string($_POST['full_name']);
        $room_name = $conn->real_escape_string($_POST['room_name']);
        $check_in_date = $conn->real_escape_string($_POST['check_in_date']);
        $check_out_date = $conn->real_escape_string($_POST['check_out_date']);

        // --- New: Recalculate price based on new data ---
        $room_prices = [
            'Deluxe Room' => 15000,
            'Ocean View Suite' => 25000,
            'Family Villa' => 20000,
        ];
        
        $room_price = $room_prices[$room_name] ?? 0;
        
        $datetime1 = new DateTime($check_in_date);
        $datetime2 = new DateTime($check_out_date);
        $interval = $datetime1->diff($datetime2);
        $nights = $interval->days;

        $subtotal = $room_price * $nights;
        $taxes = $subtotal * 0.18;
        $total = $subtotal + $taxes;
        
        $sql = "UPDATE bookings SET full_name = '$full_name', room_name = '$room_name', check_in_date = '$check_in_date', check_out_date = '$check_out_date', nights = '$nights', subtotal = '$subtotal', taxes = '$taxes', total = '$total' WHERE id = '$id'";
        
        if (!$conn->query($sql)) {
            $crud_error = "Error updating record: " . $conn->error;
        }
        // Refresh page to show updated table
        header('Location: admin.php');
        exit();
    }
}

// --- Fetch all bookings for display ---
$bookings = [];
if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
    $sql = "SELECT * FROM bookings ORDER BY booking_date DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookings[] = $row;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
        <!-- Admin Dashboard Content -->
        <div class="max-w-7xl mx-auto p-8 antialiased">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-4xl font-extrabold text-gray-800">Admin Dashboard</h1>
                <a href="?logout" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md shadow-md transition duration-200">Logout</a>
            </div>
            
            <?php if (isset($crud_error)): ?>
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4 font-semibold"><?php echo $crud_error; ?></div>
            <?php endif; ?>

            <!-- Dashboard Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700">Total Bookings</h2>
                    <p class="text-4xl font-bold text-teal-600 mt-2"><?php echo count($bookings); ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700">Total Revenue</h2>
                    <?php
                        $total_revenue = array_reduce($bookings, function($sum, $booking) {
                            return $sum + $booking['total'];
                        }, 0);
                    ?>
                    <p class="text-4xl font-bold text-teal-600 mt-2">₹<?php echo number_format($total_revenue, 2); ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700">Unique Guest IDs</h2>
                    <?php
                        $unique_guests = array_unique(array_column($bookings, 'email'));
                    ?>
                    <p class="text-4xl font-bold text-teal-600 mt-2"><?php echo count($unique_guests); ?></p>
                </div>
            </div>

            <!-- Bookings Table -->
            <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">All Bookings</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Full Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php if (count($bookings) > 0): ?>
                                <?php foreach ($bookings as $booking): ?>
                                    <tr id="booking-row-<?php echo htmlspecialchars($booking['id']); ?>">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($booking['id']); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($booking['full_name']); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($booking['room_name']); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($booking['check_in_date']); ?> to <?php echo htmlspecialchars($booking['check_out_date']); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₹<?php echo number_format($booking['total'], 2); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button onclick="toggleEdit('<?php echo htmlspecialchars($booking['id']); ?>')" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                            <form method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                                <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($booking['id']); ?>">
                                                <button type="submit" name="delete" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr id="edit-row-<?php echo htmlspecialchars($booking['id']); ?>" class="hidden">
                                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo htmlspecialchars($booking['id']); ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            <form method="POST">
                                                <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($booking['id']); ?>">
                                                <input type="text" name="full_name" value="<?php echo htmlspecialchars($booking['full_name']); ?>" class="border rounded px-2 py-1 w-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            <select name="room_name" class="border rounded px-2 py-1 w-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="Deluxe Room" <?php echo ($booking['room_name'] == 'Deluxe Room') ? 'selected' : ''; ?>>Deluxe Room</option>
                                                <option value="Ocean View Suite" <?php echo ($booking['room_name'] == 'Ocean View Suite') ? 'selected' : ''; ?>>Ocean View Suite</option>
                                                <option value="Family Villa" <?php echo ($booking['room_name'] == 'Family Villa') ? 'selected' : ''; ?>>Family Villa</option>
                                            </select>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            <input type="date" name="check_in_date" value="<?php echo htmlspecialchars($booking['check_in_date']); ?>" class="border rounded px-2 py-1 mb-1 w-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                            <input type="date" name="check_out_date" value="<?php echo htmlspecialchars($booking['check_out_date']); ?>" class="border rounded px-2 py-1 w-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            <span>₹<?php echo number_format($booking['total'], 2); ?> (will be recalculated)</span>
                                        </td>
                                        <td class="px-6 py-4 text-right text-sm font-medium">
                                            <button type="submit" name="update" class="text-indigo-600 hover:text-indigo-900">Save</button>
                                            <button type="button" onclick="toggleEdit('<?php echo htmlspecialchars($booking['id']); ?>')" class="ml-2 text-gray-600 hover:text-gray-900">Cancel</button>
                                        </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No bookings found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            // JavaScript to toggle between view and edit modes for a table row
            function toggleEdit(id) {
                const viewRow = document.getElementById('booking-row-' + id);
                const editRow = document.getElementById('edit-row-' + id);
                viewRow.classList.toggle('hidden');
                editRow.classList.toggle('hidden');
            }
        </script>
    <?php else: ?>
        <!-- Admin Login Form -->
        <div class="bg-gray-100 min-h-screen flex items-center justify-center antialiased">
            <div class="w-full max-w-md">
                <form method="POST" class="bg-white shadow-md rounded-lg p-8 space-y-6">
                    <h2 class="text-2xl font-bold text-center text-gray-800">Admin Login</h2>
                    <p class="text-center text-sm text-gray-500">For this demo, the password is: <code class="bg-gray-200 p-1 rounded">admin-123</code></p>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="password" type="password" placeholder="Enter admin password" name="password" required>
                    </div>
                    <?php if (isset($login_error)): ?>
                        <p class="text-red-500 text-xs italic"><?php echo $login_error; ?></p>
                    <?php endif; ?>
                    <button type="submit" name="login" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                        Login
                    </button>
                </form>
            </div>
        </div>
    <?php endif; ?>

</body>
</html>
