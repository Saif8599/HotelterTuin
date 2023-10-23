<?php
include_once('../connection.php');
?>

<html>

<head>
  <meta charset="UTF-8">
  <title>Contact</title>
</head>

<body class="bg-gray-100">
  <?php include('../blocks/navbar.php'); ?>
  <header class="bg-gradient-to-r from-indigo-600 to-purple-400 text-white py-6 text-center">
    <h1 class="text-2xl font-semibold">Contact Us</h1>
  </header>
  <div class="container mx-auto h-screen pt-20">
    <div class="bg-white shadow-lg rounded p-6">
      <form action="#" method="post">
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-semibold">Your Name:</label>
          <input type="text" id="name" name="name" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-semibold">Your Email:</label>
          <input type="email" id="email" name="email" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <label for="message" class="block text-gray-700 font-semibold">Your Message:</label>
          <textarea id="message" name="message" rows="6" class="w-full border rounded p-2" required></textarea>
        </div>
        <div>
          <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <?php include('../blocks/footer.php'); ?>
</body>

</html>