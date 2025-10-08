<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Payment</title>
    <!-- Tailwind CSS CDN for a modern and responsive design -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ['Inter', 'sans-serif'],
            },
          },
        },
      };
    </script>
    <!-- PayPal SDK with a placeholder client ID.
         In a real app, you would replace 'YOUR_PAYPAL_CLIENT_ID' with your actual ID. -->
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_PAYPAL_CLIENT_ID&currency=USD"></script>
    <style>
      body {
        font-family: 'Inter', sans-serif;
      }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-lg w-full">
        <!-- Main Header Section -->
        <h1 id="page-title" class="text-3xl font-bold text-center mb-6 text-gray-800">Booking Details</h1>
        
        <!-- Hotel & Price Details Section -->
        <div class="space-y-4 mb-8 text-gray-600">
            <h2 id="hotel-name" class="text-xl font-semibold text-gray-800"></h2>
            <div class="text-lg">
                <span class="font-medium">Rating:</span>
                <span id="hotel-rating" class="text-yellow-400"></span>
            </div>
            <p id="hotel-description" class="text-sm italic leading-relaxed"></p>
            <div class="flex justify-between text-2xl font-bold text-gray-800 border-t border-gray-200 pt-4">
                <span>Price:</span>
                <span id="hotel-price" class="text-green-600"></span>
            </div>
        </div>

        <!-- PayPal Payment Section -->
        <div class="mb-8 border-t border-gray-200 pt-8">
            <h2 class="text-xl font-semibold text-center text-gray-700 mb-4">Pay with PayPal</h2>
            <div id="paypal-button-container"></div>
        </div>

        <!-- "Scan to Pay" Section with QR Code and Phone Number -->
        <div class="border-t border-gray-200 pt-8 mt-8">
            <h2 class="text-xl font-semibold text-center text-gray-700 mb-4">Or, Scan to Pay</h2>
            <div class="flex flex-col items-center space-y-4">
                <!-- Placeholder for QR code. -->
                <img id="qr-code" src="https://placehold.co/200x200/2563EB/ffffff?text=Scan+to+Pay" alt="QR Code for payment" class="rounded-lg shadow-md border-2 border-gray-200">
                <div class="text-center">
                    <p class="text-gray-600">Scan the QR code above or pay using:</p>
                    <p id="phone-number" class="text-xl font-semibold text-gray-800 mt-2">Phone Number: +1 (555) 123-4567</p>
                    <p id="upi-id" class="text-gray-600">UPI ID: your-upi-id@bank</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Message Modal (replaces alert()) -->
    <div id="message-modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded-xl shadow-lg max-w-sm w-full">
            <div class="flex flex-col items-center text-center space-y-4">
                <div id="modal-icon" class="text-5xl"></div>
                <h3 id="modal-title" class="text-2xl font-bold text-gray-800"></h3>
                <p id="modal-message" class="text-gray-600"></p>
                <button onclick="closeModal()" class="mt-4 px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">OK</button>
            </div>
        </div>
    </div>

    <script>
        // --- DATA FETCHING & RENDERING (SIMULATED) ---
        // This function simulates fetching hotel data from your PHP backend.
        // In a real application, you would replace this with an actual fetch() call.
        async function fetchHotelData(hotelId) {
            console.log(`Simulating data fetch for hotel ID: ${hotelId}`);
            // Mock data based on your PHP script's expected output
            const mockHotelData = {
                id: hotelId,
                hotel_name: 'The Grand Vista',
                description: 'Experience unparalleled luxury with a breathtaking panoramic view of the city skyline. Our rooms are equipped with state-of-the-art amenities and 24-hour concierge service. The Grand Vista is a haven of tranquility in the heart of the bustling metropolis.',
                price_per_night: 225.50,
                rating: 4.8
            };
            return mockHotelData;
        }

        // This function populates the HTML with the fetched data.
        function renderHotelDetails(data) {
            if (!data) {
                console.error("No hotel data to render.");
                return;
            }
// the code are showing the main things in the js code 
            // Update the page title and details
            document.getElementById('page-title').textContent = `Book Your Stay at ${data.hotel_name}`;
            document.getElementById('hotel-name').textContent = data.hotel_name;
            document.getElementById('hotel-description').textContent = data.description;
            document.getElementById('hotel-price').textContent = `$${data.price_per_night.toFixed(2)}`;
            document.getElementById('hotel-rating').innerHTML = generateStars(data.rating);
        }

        // Function to generate star ratings
        function generateStars(rating) {
            const fullStars = Math.floor(rating);
            const halfStar = (rating - fullStars) >= 0.5;
            const emptyStars = 5 - fullStars - (halfStar ? 1 : 0);
            
            let starsHtml = '';
            for (let i = 0; i < fullStars; i++) { starsHtml += '<i class="fas fa-star"></i>'; }
            if (halfStar) { starsHtml += '<i class="fas fa-star-half-alt"></i>'; }
            for (let i = 0; i < emptyStars; i++) { starsHtml += '<i class="far fa-star"></i>'; }
            return starsHtml;
        }

        // --- CUSTOM MODAL FUNCTIONS ---
        // Function to show the custom modal
        function showModal(title, message, isSuccess) {
            const modal = document.getElementById('message-modal');
            const icon = document.getElementById('modal-icon');
            const titleElement = document.getElementById('modal-title');
            const messageElement = document.getElementById('modal-message');

            if (isSuccess) {
                icon.innerHTML = '✅';
                icon.className = 'text-green-500 text-5xl';
            } else {
                icon.innerHTML = '❌';
                icon.className = 'text-red-500 text-5xl';
            }

            titleElement.textContent = title;
            messageElement.textContent = message;
            modal.classList.remove('hidden');
        }

        // Function to close the custom modal
        function closeModal() {
            const modal = document.getElementById('message-modal');
            modal.classList.add('hidden');
        }

        // --- PAYPAL BUTTONS CONFIGURATION ---
        window.onload = async function() {
            // Simulate fetching hotel ID from the URL (like your PHP script)
            const urlParams = new URLSearchParams(window.location.search);
            const hotelId = urlParams.get('id') || 1; 

            // Fetch and render hotel data
            const hotelData = await fetchHotelData(hotelId);
            renderHotelDetails(hotelData);

            // Now, configure the PayPal button with the fetched price
            paypal.Buttons({
                // Sets up the transaction details.
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: hotelData.price_per_night.toFixed(2) // Use the dynamically fetched price
                            },
                            custom_id: `hotel_${hotelData.id}`
                        }]
                    });
                },
                // Called when the buyer approves the payment.
                onApprove: function(data, actions) {
                    // This function should be replaced with a secure server-side call.
                    // For this demo, we'll simulate a successful payment.
                    return actions.order.capture().then(function(details) {
                        const transactionId = details.id;
                        showModal('Booking Confirmed!', `Your payment of $${hotelData.price_per_night.toFixed(2)} has been successfully processed. Transaction ID: ${transactionId}`, true);
                    });
                },
                // Handles errors and cancellations.
                onError: function(err) {
                    console.error('PayPal button error', err);
                    showModal('Payment Failed', 'Something went wrong with the payment. Please try again.', false);
                },
                onCancel: function(data) {
                    console.log('Payment cancelled by user', data);
                    showModal('Payment Cancelled', 'You have cancelled the payment process.', false);
                }
            }).render('#paypal-button-container');
        };
    </script>
</body>
</html>