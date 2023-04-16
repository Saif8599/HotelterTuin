<?php
include_once('../connection.php');

?>
<html>

<head>
   <meta charset="UTF-8">
   <title>Welkom op Hotel ter tuin!</title>
   <style>
      .series {
         display: flex;
         flex-direction: row;
      }

      .rating {
         display: flex;
         justify-content: center;
      }

      .title {
         display: flex;
         justify-content: left;
      }

      .duur {
         display: flex;
         justify-content: center;
      }

      .desc {
         color: gray;
         font-style: italic;
         font-size: 12px;
      }

      .addserie {
         display: flex;
         flex-direction: row;
      }

      .addfilm {
         display: flex;
         flex-direction: row;
      }

      .addmedia {
         display: flex;
         flex-direction: row;
      }
   </style>
</head>

<body>
   <!-- Navbar -->
   <nav class=" border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-900">
      <div class="container flex flex-wrap items-center justify-between mx-auto">
         <span class="text-xl font-semibold dark:text-white">Hotel ter tuin</span>
         <div class="hidden w-full md:block md:w-auto">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
               <li>
                  <a href="index.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Home</a>
               </li>
               <li>
                  <a href="reservation.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Kamers</a>
               </li>
               <li>
                  <a href="services.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Services</a>
               </li>
               <li>
                  <a href="contact.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Contact</a>
               </li>
               <li>
                  <a href="../admin/login.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Login</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <!-- Navbar -->

   <div class="p-10">
      <a class="text-3xl pb-4 font-bold underline text-red-600">Welkom op Hotel ter tuin</a>
   </div>


   <!-- <a href="logout.php">Logout</a> -->
</body>

</html>