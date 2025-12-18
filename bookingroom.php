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

$message = '';
$is_success = false;

// --- Handle Form Submission ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['full-name'])) {
    
    // Get and sanitize data from the form
    $full_name = $conn->real_escape_string($_POST['full-name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $room_name = $conn->real_escape_string($_POST['room-name']);
    $check_in_date = $conn->real_escape_string($_POST['check-in']);
    $check_out_date = $conn->real_escape_string($_POST['check-out']);
    $adults = $conn->real_escape_string($_POST['adults']);
    $children = $conn->real_escape_string($_POST['children']);

    // Handle document upload (Commented out as in original)
    // $document_path = '';
    // if (isset($_FILES['user-documents']) && $_FILES['user-documents']['error'] == 0) {
    //     ...
    // }
    
    // These values are passed from the JS summary section
    $nights = $conn->real_escape_string($_POST['nights']);
    $subtotal = $conn->real_escape_string($_POST['subtotal']);
    $taxes = $conn->real_escape_string($_POST['taxes']);
    $total = $conn->real_escape_string($_POST['total']);
    
    // SQL query to insert data into the 'bookings' table
    $sql = "INSERT INTO bookings (full_name, email, phone, room_name, check_in_date, check_out_date, adults, children, nights, subtotal, taxes, total) 
            VALUES ('$full_name', '$email', '$phone', '$room_name', '$check_in_date', '$check_out_date', '$adults', '$children', '$nights', '$subtotal', '$taxes', '$total')";

    if ($conn->query($sql) === TRUE) {
        $booking_id = $conn->insert_id;
        $message = "Thank you, " . htmlspecialchars($full_name) . "! Your booking has been successfully confirmed with Booking ID: #" . $booking_id . ".";
        $is_success = true;
        // All $_POST variables are still available in this scope, so they can be used later in the HTML
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
        $is_success = false;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Stay</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* General Body and Container Styles */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc; /* Very light gray background */
            line-height: 1.6;
            color: #334155;
            padding: 0;
            margin: 0;
        }
        .container {
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .section-padding {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }
        
        /* Typography and Headings */
        .text-center {
            text-align: center;
        }
        .text-4xl {
            font-size: 2.25rem;
            line-height: 2.5rem;
        }
        .font-bold {
            font-weight: 700;
        }
        .text-gray-800 {
            color: #1f2937;
        }
        .text-gray-600 {
            color: #4b5563;
        }
        .mt-2 {
            margin-top: 0.5rem;
        }
        .mb-12 {
            margin-bottom: 3rem;
        }

        /* Main Form and Summary Layout */
        .main-container {
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            display: grid;
            gap: 2rem;
            grid-template-columns: 1fr;
        }
        @media (min-width: 1024px) {
            .main-container {
                grid-template-columns: 2fr 1fr;
            }
        }
        
        /* Form Sections */
        .form-section {
            background-color: #ffffff;
            border-radius: 0.75rem;
            /* box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); */
            /* padding: 2rem; */
        }
        .summary-section {
            background-color: #f0fdfa; /* Teal-50 */
            border-radius: 0.75rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            height: fit-content; /* Changed from 85% to fit content */
        }
        
        /* Form Elements */
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #334155;
            margin-bottom: 0.25rem;
        }
        .form-input, .form-select {
            display: block;
            width: 100%; /* Changed to 100% for better responsiveness */
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease-in-out;
            box-sizing: border-box; /* Added for consistent sizing */
        }
        .form-select{
            width: 100%;
        }
        .form-input:focus, .form-select:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.2);
            border-color: #14b8a6;
        }
        .form-grid {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
        @media (min-width: 768px) {
            .form-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }
        
        /* Summary Section Items */
        .summary-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f766e; /* Teal-800 */
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #c2f5e9;
        }
        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem; /* Added margin for spacing */
        }
        .summary-item span {
            font-weight: 500;
            color: #374151; /* Gray-700 */
        }
        .summary-total {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #c2f5e9;
            display: flex;
            justify-content: space-between;
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f766e; /* Teal-800 */
        }
        
        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0.75rem 2rem;
            border: 1px solid transparent;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.2s ease-in-out;
            text-decoration: none; /* For <a> tags styled as buttons */
            cursor: pointer; /* For <button> tags */
        }
        .btn-primary {
            color: #ffffff;
            background-color: #14b8a6; /* Teal-600 */
            margin-top: 2rem;
        }
        .btn-primary:hover {
            background-color: #0d9488; /* Teal-700 */
        }
        .btn-secondary {
            border: 1px solid #d1d5db;
            color: #4b5563; /* Gray-700 */
            background-color: #ffffff;
        }
        .btn-secondary:hover {
            background-color: #f3f4f6; /* Gray-100 */
        }
        .modal-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        @media (min-width: 640px) {
            .modal-buttons {
                flex-direction: row;
            }
            .modal-buttons .btn {
                width: auto; /* Allow buttons to size to content on desktop */
                flex-grow: 1; /* Make buttons share space */
            }
        }
        .message-box {
            padding: 1.5rem;
            border-radius: 0.5rem;
            text-align: center;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        .success-box {
            background-color: #dcfce7;
            color: #16a34a;
        }
        .error-box {
            background-color: #fee2e2;
            color: #dc2626;
        }
    </style>
</head>
<body>
    <section id="booking-form-section" class="section-padding">
        <div class="container">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800">Reserve Your Stay</h2>
                <p class="text-gray-600 mt-2">Fill out the form below to secure your booking.</p>
            </div>
            
            <?php if (!empty($message)): ?>
                <!-- This is the success/error message box -->
                <div class="message-box <?php echo $is_success ? 'success-box' : 'error-box'; ?>">
                    <?php echo $message; ?>
                    <div class="modal-buttons">
                        <a href="resort.php" class="btn btn-primary">Return to Home</a>
                        <?php if ($is_success): ?>
                            <!-- NEW: Download Receipt Button -->
                            <button id="download-receipt-btn" type="button" class="btn btn-primary">Download Receipt</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- The form is hidden if a message is set, which is good practice after submission -->
            <?php if (empty($message)): ?>
                <form id="booking-form" class="main-container" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <!-- Form Fields -->
                    <div class="form-section">
                        <div class="form-grid">
                            <div>
                                <label for="full-name" class="form-label">Full Name</label>
                                <input type="text" id="full-name" name="full-name" class="form-input" placeholder="e.g., John Doe" required>
                            </div>
                            <div>
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email" class="form-input" placeholder="you@example.com" required>
                            </div>
                            <div>
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-input" placeholder="+91 12345 67890" required>
                            </div>
                            <!-- <div>
                                <label for="user-documents" class="form-label">Upload Documents (e.g., Passport, ID)</label>
                                <input type="file" id="user-documents" name="user-documents" class="form-input" required>
                            </div> -->
                            <div>
                                <label for="room-type" class="form-label">Room Type</label>
                                <select id="room-type" name="room-type" class="form-input form-select" required>
                                    <option value="15000" data-room-name="Deluxe Room">Deluxe Room (₹15,000/night)</option>
                                    <option value="25000" data-room-name="Ocean View Suite">Ocean View Suite (₹25,000/night)</option>
                                    <option value="20000" data-room-name="Family Villa">Family Villa (₹20,000/night)</option>
                                </select>
                            </div>
                            <div>
                                <label for="check-in" class="form-label">Check-in Date</label>
                                <input type="date" id="check-in" name="check-in" class="form-input" required>
                            </div>
                            <div>
                                <label for="check-out" class="form-label">Check-out Date</label>
                                <input type="date" id="check-out" name="check-out" class="form-input" required>
                            </div>
                            <div>
                                <label for="adults" class="form-label">Adults</label>
                                <input type="number" id="adults" name="adults" class="form-input" value="2" min="1" max="10" required>
                            </div>
                            <div>
                                <label for="children" class="form-label">Children</label>
                                <input type="number" id="children" name="children" class="form-input" value="0" min="0" max="5">
                            </div>
                        </div>
                    </div>

                    <!-- Price Summary -->
                    <div class="summary-section">
                        <h3 class="summary-title">Booking Summary</h3>
                        <div style="flex-grow: 1;">
                            <div class="summary-item">
                                <span>Room:</span>
                                <span id="summary-room-name" style="font-weight: 600;">Deluxe Room</span>
                                <input type="hidden" id="room-name" name="room-name" value="Deluxe Room">
                            </div>
                            <div class="summary-item">
                                <span>Nights:</span>
                                <span id="summary-nights" style="font-weight: 600;">0</span>
                                <input type="hidden" id="nights" name="nights" value="0">
                            </div>
                            <div class="summary-item">
                                <span>Subtotal:</span>
                                <span id="summary-subtotal" style="font-weight: 600;">₹0</span>
                                <input type="hidden" id="subtotal" name="subtotal" value="0">
                            </div>
                            <div class="summary-item">
                                <span>Taxes (18%):</span>
                                <span id="summary-taxes" style="font-weight: 600;">₹0</span>
                                <input type="hidden" id="taxes" name="taxes" value="0">
                            </div>
                            <div class="summary-total">
                                <span>Total:</span>
                                <span id="summary-total">₹0</span>
                                <input type="hidden" id="total" name="total" value="0">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirm Booking</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </section>

    <!-- 
    NEW: Hidden Receipt Content
    This div is populated by PHP ONLY on a successful submission.
    It's hidden by default and used by the JavaScript print function.
    -->
    <?php if ($is_success): ?>
    <div id="receipt-content" style="display: none;">
        <h2 style="text-align: center; color: #0f766e; font-family: 'Inter', Arial, sans-serif;">Booking Receipt</h2>
        <p style="text-align: center; font-size: 1.2em; font-family: 'Inter', Arial, sans-serif;"><strong>Booking ID: #<?php echo $booking_id; ?></strong></p>
        <hr style="border: 0; border-top: 1px solid #eee;">
        
        <table style="width: 100%; font-family: 'Inter', Arial, sans-serif; border-collapse: collapse;">
            <tr style="vertical-align: top;">
                <td style="padding: 10px; width: 50%;">
                    <h3 style="color: #333; border-bottom: 1px solid #eee; padding-bottom: 5px;">Guest Details</h3>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($full_name); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
                </td>
                <td style="padding: 10px; width: 50%;">
                    <h3 style="color: #333; border-bottom: 1px solid #eee; padding-bottom: 5px;">Booking Details</h3>
                    <p><strong>Room:</strong> <?php echo htmlspecialchars($room_name); ?></p>
                    <p><strong>Check-in:</strong> <?php echo htmlspecialchars($check_in_date); ?></p>
                    <p><strong>Check-out:</strong> <?php echo htmlspecialchars($check_out_date); ?></p>
                    <p><strong>Guests:</strong> <?php echo htmlspecialchars($adults); ?> Adults, <?php echo htmlspecialchars($children); ?> Children</p>
                </td>
            </tr>
        </table>
        
        <hr style="border: 0; border-top: 1px solid #eee; margin-top: 15px;">
        
        <h3 style="color: #333; font-family: 'Inter', Arial, sans-serif; padding-left: 10px; margin-bottom: 10px;">Payment Summary</h3>
        <table style="width: 100%; font-family: 'Inter', Arial, sans-serif; border-collapse: collapse;">
            <tr style="background-color: #f8f8f8; font-weight: 600;">
                <td style="padding: 10px; border: 1px solid #eee;"><strong>Description</strong></td>
                <td style="padding: 10px; text-align: right; border: 1px solid #eee;"><strong>Amount</strong></td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #eee;">Room (<?php echo htmlspecialchars($nights); ?> Nights)</td>
                <td style="padding: 10px; text-align: right; border: 1px solid #eee;">₹<?php echo number_format((float)$subtotal, 2); ?></td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #eee;">Taxes (18%)</td>
                <td style="padding: 10px; text-align: right; border: 1px solid #eee;">₹<?php echo number_format((float)$taxes, 2); ?></td>
            </tr>
            <tr style="font-weight: 700; font-size: 1.2em; background-color: #f0fdfa; color: #0f766e;">
                <td style="padding: 10px; border: 1px solid #c2f5e9;"><strong>Total</strong></td>
                <td style="padding: 10px; text-align: right; border: 1px solid #c2f5e9;"><strong>₹<?php echo number_format((float)$total, 2); ?></strong></td>
            </tr>
        </table>
        <p style="text-align: center; margin-top: 25px; font-family: 'Inter', Arial, sans-serif; font-size: 0.9em; color: #555;">Thank you for booking with us!</p>
    </div>
    <?php endif; ?>

    <!-- JavaScript for dynamic calculations and form handling -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookingForm = document.getElementById('booking-form');
            const roomType = document.getElementById('room-type');
            const checkInDate = document.getElementById('check-in');
            const checkOutDate = document.getElementById('check-out');

            const summaryRoomName = document.getElementById('summary-room-name');
            const summaryNights = document.getElementById('summary-nights');
            const summarySubtotal = document.getElementById('summary-subtotal');
            const summaryTaxes = document.getElementById('summary-taxes');
            const summaryTotal = document.getElementById('summary-total');

            // Set min date for check-in to today
            const today = new Date().toISOString().split('T')[0];
            if (checkInDate) {
                checkInDate.setAttribute('min', today);
            }
            
            if (checkInDate) {
                checkInDate.addEventListener('change', () => {
                    if (checkInDate.value) {
                        let nextDay = new Date(checkInDate.value);
                        nextDay.setDate(nextDay.getDate() + 1);
                        if (checkOutDate) {
                            checkOutDate.setAttribute('min', nextDay.toISOString().split('T')[0]);
                            // If checkout is before new min, clear it
                            if (checkOutDate.value && new Date(checkOutDate.value) < nextDay) {
                                checkOutDate.value = '';
                            }
                        }
                    }
                    calculateSummary(); // Recalculate when check-in changes
                });
            }

            function calculateSummary() {
                if (!roomType || !checkInDate || !checkOutDate) return; // Ensure elements exist

                const roomPrice = parseFloat(roomType.value);
                const selectedRoomName = roomType.options[roomType.selectedIndex].getAttribute('data-room-name');
                
                const checkIn = new Date(checkInDate.value);
                const checkOut = new Date(checkOutDate.value);
                
                let nights = 0;
                let subtotal = 0;
                let taxes = 0;
                let total = 0;

                if (!isNaN(checkIn.getTime()) && !isNaN(checkOut.getTime()) && checkOut > checkIn) {
                    const timeDiff = checkOut.getTime() - checkIn.getTime();
                    nights = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
                    subtotal = roomPrice * nights;
                    taxes = subtotal * 0.18; // 18% Tax
                    total = subtotal + taxes;
                }
                
                // Update the display
                summaryRoomName.textContent = selectedRoomName;
                summaryNights.textContent = nights;
                summarySubtotal.textContent = `₹${subtotal.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
                summaryTaxes.textContent = `₹${taxes.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
                summaryTotal.textContent = `₹${total.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;

                // Update the hidden input fields for PHP submission
                document.getElementById('room-name').value = selectedRoomName;
                document.getElementById('nights').value = nights;
                document.getElementById('subtotal').value = subtotal.toFixed(2);
                document.getElementById('taxes').value = taxes.toFixed(2);
                document.getElementById('total').value = total.toFixed(2);
            }

            // Add event listeners to trigger recalculation
            if (roomType) {
                roomType.addEventListener('change', calculateSummary);
            }
            if (checkOutDate) {
                checkOutDate.addEventListener('change', calculateSummary);
            }

            // Initial calculation on page load (if form exists)
            if (bookingForm) {
                calculateSummary();
            }

            // --- NEW: Event Listener for Download Receipt Button ---
            const downloadBtn = document.getElementById('download-receipt-btn');
            
            if (downloadBtn) {
                downloadBtn.addEventListener('click', function() {
                    const receiptContent = document.getElementById('receipt-content');
                    if (receiptContent) {
                        const receiptHTML = receiptContent.innerHTML;
                        const printWindow = window.open('', '_blank', 'height=700,width=800');
                        
                        printWindow.document.write('<html><head><title>Booking Receipt</title>');
                        // Add print-specific styles
                        printWindow.document.write('<style>');
                        printWindow.document.write(`
                            body { font-family: 'Inter', Arial, sans-serif; line-height: 1.6; color: #333; margin: 20px; }
                            @media print {
                                body { margin: 0; }
                            }
                        `);
                        printWindow.document.write('</style></head><body>');
                        printWindow.document.write(receiptHTML);
                        printWindow.document.write('</body></html>');
                        
                        printWindow.document.close();
                        printWindow.focus(); // Focus on the new window
                        
                        // Use a slight delay to ensure content is fully rendered before printing
                        setTimeout(() => {
                            printWindow.print();
                            printWindow.close();
                        }, 250);
                    }
                });
            }
        });
    </script>
</body>
</html>