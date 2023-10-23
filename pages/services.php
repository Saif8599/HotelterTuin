<?php
include_once('../connection.php');
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Contact</title>
</head>

<body>
    <?php include('../blocks/navbar.php'); ?>
    <!-- About Us Section -->
    <section class="h-screen bg-gray-100 py-16 text-center">
        <div class="container mx-auto">
            <h2 class="text-4xl font-semibold text-gray-800 mb-8">Discover Hotel ter Tuin</h2>

            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="about-description md:w-1/2 text-left">
                    <p class="text-lg mb-6 leading-relaxed text-gray-700">
                        Welcome to Hotel ter Tuin, where history and luxury converge. Our iconic hotel has stood at the heart of the city for over a century.
                    </p>
                    <p class="text-lg mb-6 leading-relaxed text-gray-700">
                        The moment you step inside, you'll be transported to a world of elegance and comfort. Our unwavering commitment to excellence and dedication to providing exceptional service make us the ideal choice for your stay.
                    </p>
                    <p class="text-lg leading-relaxed text-gray-700">
                        Explore our rich history and uncover the stories woven into our walls. Join us as we continue to craft unforgettable experiences for our guests and become a part of our legacy.
                    </p>
                    <p class="text-lg mt-6 font-semibold text-gray-800">Our Services:</p>
                    <ul class="list-disc list-inside text-gray-600 ml-4">
                        <li>Luxurious Rooms</li>
                        <li>Fine Dining Restaurant</li>
                        <li>Swimming Pool</li>
                        <li>Spa and Wellness Center</li>
                        <li>Concierge Services</li>
                    </ul>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="relative">
                        <img src="https://picsum.photos/seed/087/200/300" alt="Hotel Lobby" class="rounded-lg shadow-lg w-full h-full object-cover">
                        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-0 hover:opacity-50 transition-opacity duration-300"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white text-lg opacity-0 hover:opacity-100 transition-opacity duration-300">
                            Hotel Lobby
                        </div>
                    </div>
                    <div class="relative">
                        <img src="https://picsum.photos/seed/35/200/300" alt="Hotel History" class="rounded-lg shadow-lg w-full h-full object-cover">
                        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-0 hover:opacity-50 transition-opacity duration-300"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white text-lg opacity-0 hover:opacity-100 transition-opacity duration-300">
                            Hotel History
                        </div>
                    </div>
                    <div class="relative">
                        <img src="https://picsum.photos/seed/345/200/300" alt="Hotel Exterior" class="rounded-lg shadow-lg w-full h-full object-cover">
                        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-0 hover:opacity-50 transition-opacity duration-300"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white text-lg opacity-0 hover:opacity-100 transition-opacity duration-300">
                            Hotel Exterior
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('../blocks/footer.php'); ?>
</body>

</html>
