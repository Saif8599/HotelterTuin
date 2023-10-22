<?php
include_once('connection.php');
header('Content-Type: text/html; charset=utf-8');
?>
<html>

<head>
   <meta charset="UTF-8">
   <title>Hotel ter tuin!</title>
</head>

<body>
   <nav class=" border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-900">
      <div class="container flex flex-wrap items-center justify-between mx-auto">
         <span class="text-xl font-semibold dark:text-white">Hotel ter tuin</span>
         <div class="hidden w-full md:block md:w-auto">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
               <li>
                  <a href="index.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Home</a>
               </li>
               <li>
                  <a href="./pages/reservation.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Kamers</a>
               </li>
               <li>
                  <a href="./pages/services.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Services</a>
               </li>
               <li>
                  <a href="./pages/contact.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Contact</a>
               </li>
               <li>
                  <a href="../admin/login.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Login</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <div class="p-10">
      <a class="flex justify-center text-3xl pb-4 font-bold text-red-600">Welkom op Hotel ter tuin</a>
   </div>

</body>

</html>