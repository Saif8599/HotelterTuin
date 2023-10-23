<?php
include_once('connection.php');
header('Content-Type: text/html; charset=utf-8');
?>
<html>

<head>
   <title>Hotel ter tuin!</title>
</head>

<body>
   <!-- Navbar Section -->
   <nav class=" border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-900">
      <div class="container flex flex-wrap items-center justify-between mx-auto">
         <span class="text-xl font-semibold dark:text-white">Hotel ter tuin</span>
         <div class="hidden w-full md:block md:w-auto">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
               <li>
                  <a href="index.php" class="block py-2 pl-3 pr-4 text-purple-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Home</a>
               </li>
               <li>
                  <a href="./pages/reservation.php" class="block py-2 pl-3 pr-4 text-purple-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Kamers</a>
               </li>
               <li>
                  <a href="./pages/services.php" class="block py-2 pl-3 pr-4 text-purple-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Services</a>
               </li>
               <li>
                  <a href="./pages/contact.php" class="block py-2 pl-3 pr-4 text-purple-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Contact</a>
               </li>
               <li>
                  <a href="./admin/login.php" class="block py-2 pl-3 pr-4 text-purple-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Login</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <!-- Hero Section -->
   <header class="bg-gradient-to-r from-indigo-600 to-purple-400 text-white py-16 text-center relative overflow-hidden">
      <div class="container mx-auto px-4">
         <h1 class="text-5xl font-bold mb-4 transform -translate-y-4 sm:text-6xl sm:mb-6">Welcome to Hotel ter Tuin</h1>
         <p class="text-xl mb-8 sm:text-2xl sm:mb-10">Experience comfort and luxury like never before.</p>
         <a href="./pages/reservation.php" class="bg-indigo-800 hover:bg-indigo-900 text-white px-6 py-3 rounded-full shadow-lg transition-transform transform hover:scale-105 inline-block text-lg sm:text-xl sm:px-8 sm:py-4">Book Now</a>
      </div>
      <div class="absolute bottom-0 left-0 w-full h-16 to-indigo-600"></div>
   </header>

   <!-- Features Section -->
   <section class="bg-gray-100 py-12 text-center">
      <div class="container mx-auto">
         <h2 class="text-3xl font-semibold text-gray-800 mb-6">Discover Our Features</h2>
         <div class="flex flex-wrap justify-center gap-6">
            <div class="flex-1 bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:shadow-blue-300 transform hover:-translate-y-2 transition-transform duration-300">
               <i class="text-3xl text-indigo-600 mb-4"></i>
               <h3 class="text-xl font-semibold text-gray-800 mb-2">Comfortable Rooms</h3>
               <p class="text-gray-600">Relax in our spacious and cozy rooms. The perfect getaway for you.</p>
            </div>
            <div class="flex-1 bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:shadow-blue-300 transform hover:-translate-y-2 transition-transform duration-300">
               <i class="text-3xl text-indigo-600 mb-4"></i>
               <h3 class="text-xl font-semibold text-gray-800 mb-2">Fine Dining</h3>
               <p class="text-gray-600">Enjoy exquisite cuisine at our restaurant. A culinary experience like no other.</p>
            </div>
            <div class="flex-1 bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:shadow-blue-300 transform hover:-translate-y-2 transition-transform duration-300">
               <i class="text-3xl text-indigo-600 mb-4"></i>
               <h3 class="text-xl font-semibold text-gray-800 mb-2">High-Speed Wi-Fi</h3>
               <p class="text-gray-600">Stay connected with our fast internet. Seamless browsing and streaming.</p>
            </div>
         </div>
      </div>
   </section>



   <!-- Testimonials Section -->
   <section class="bg-white py-16 text-center">
      <div class="container mx-auto">
         <h2 class="text-3xl font-semibold mb-6">What Our Guests Say</h2>
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="testimonial p-4 border rounded-lg border-gray-200 transition duration-300 ease-in-out transform hover:scale-105">
               <div class="testimonial-avatar">
                  <img src="user1.jpg" alt="User 1" class="w-20 h-20 rounded-full mx-auto mb-4">
               </div>
               <p class="text-gray-600 mt-4">"I had an amazing stay at Hotel ter Tuin. The staff was incredibly friendly, and the rooms were top-notch. I'll definitely be back!"</p>
               <h4 class="text-xl font-semibold mt-4">John Doe</h4>
            </div>
            <div class="testimonial p-4 border rounded-lg border-gray-200 transition duration-300 ease-in-out transform hover:scale-105">
               <div class="testimonial-avatar">
                  <img src="user2.jpg" alt="User 2" class="w-20 h-20 rounded-full mx-auto mb-4">
               </div>
               <p class="text-gray-600 mt-4">"Hotel ter Tuin provided a perfect getaway for our family. We enjoyed the amenities and beautiful surroundings."</p>
               <h4 class="text-xl font-semibold mt-4">Jane Smith</h4>
            </div>
            <div class="testimonial p-4 border rounded-lg border-gray-200 transition duration-300 ease-in-out transform hover:scale-105">
               <div class="testimonial-avatar">
                  <img src="user3.jpg" alt="User 3" class="w-20 h-20 rounded-full mx-auto mb-4">
               </div>
               <p class="text-gray-600 mt-4">"The service here is exceptional. I felt like a VIP during my stay. I highly recommend this hotel!"</p>
               <h4 class="text-xl font-semibold mt-4">Robert Johnson</h4>
            </div>
         </div>
      </div>
   </section>
   <?php include('./blocks/footer.php'); ?>
</body>

</html>