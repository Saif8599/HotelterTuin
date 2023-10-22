<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body>
    <?php include_once('../connection.php'); ?>
    <div class="container mx-auto px-4 mt-8 bg-white p-8 rounded shadow-lg">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">Luxurious Suites</h1>

        <!-- Room Details -->
        <div id="RoomDetails" class="relative">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="https://picsum.photos/seed/65/500/300" class="w-full h-auto" alt="slide">
                </div>
                <div class="item height-full">
                    <img src="https://picsum.photos/seed/64/500/300" class="w-full h-auto" alt="slide">
                </div>
                <div class="item height-full">
                    <img src="https://picsum.photos/seed/95/500/300" class="w-full h-auto" alt="slide">
                </div>
            </div>
        </div>
        <div class="room-features mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="text-gray-800 leading-relaxed">
                <p class="leading-loose">Discover the amazing features of our luxurious suites and experience unparalleled comfort and style. Our spacious suites are designed to provide you with a relaxing and enjoyable stay. Don't miss this opportunity to make your stay unforgettable!</p>
                <p class="leading-loose mt-4">Our suites offer a range of amenities, including:</p>
                <ul class="list-disc list-inside text-gray-800 ml-4">
                    <li>Spacious living areas</li>
                    <li>Luxurious furnishings</li>
                    <li>Breathtaking views</li>
                    <li>24/7 concierge service</li>
                    <li>And much more!</li>
                </ul>
            </div>
            <div class="amenities">
                <h3 class="text-lg font-semibold text-gray-800">Amenities</h3>
                <ul class="list-disc list-inside text-gray-800 ml-4">
                    <li>Spacious living areas</li>
                    <li>Luxurious furnishings</li>
                    <li>Breathtaking views</li>
                    <li>24/7 concierge service</li>
                    <li>And much more!</li>
                </ul>
            </div>
            <div class="size-price mt-8 grid grid-cols-2 gap-6">
                <div>
                    <p class="text-lg font-semibold text-gray-800">Size</p>
                    <span class="text-gray-800">44 sq</span>
                </div>
                <div>
                    <p class="text-lg font-semibold text-gray-800">Price</p>
                    <span class="text-gray-800">$200.00</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
