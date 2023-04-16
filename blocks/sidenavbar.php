<?php
include_once('../connection.php');
?>

<div class="flex flex-col h-screen w-64 bg-gray-800">
  <div class="flex items-center h-16 px-4 bg-gray-900">
    <span class="text-lg font-semibold text-white">Hotel Management</span>
  </div>
  <nav class="flex-1 bg-gray-800 py-4 px-2">
    <a href="../admin/index.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
      <span class="text-gray-200">Dashboard</span>
    </a>
    <a href="../admin/reservations.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
      <span class="text-gray-200">Reservations</span>
    </a>
    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
      <span class="text-gray-200">Guests</span>
    </a>
    <a href="../admin/logout.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
      <span class="text-gray-200">Logout</span>
    </a>
  </nav>
</div>