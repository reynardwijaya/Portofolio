<div class="blog_section layout_padding pt-10 bg-white w-full relative overflow-visible">
  <div class="px-4 sm:px-8 md:px-12 py-10 max-w-[1600px] mx-auto">

    <!-- Section Header (kiri) -->
    <div class="flex flex-col md:flex-row items-center md:items-end justify-between mb-6">
      <div class="text-left mb-4 md:mb-0">
        <h2 class="text-3xl font-semibold text-gray-900 mb-2">Explore Bali</h2>
        <p class="text-gray-500 text-base max-w-md">
          Discover exciting activities and breathtaking destinations around the island.
        </p>
      </div>

      <!-- Navigation + Page Indicator -->
      <div class="flex items-center space-x-4">
        <button id="prevSlideFloating"
                class="bg-white shadow-md w-10 h-10 rounded-full flex items-center justify-center hover:bg-gray-100 transition-transform duration-200 hover:scale-110">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </button>

        <span id="pageIndicator" class="text-gray-500 text-sm">1 / 2</span>

        <button id="nextSlideFloating"
                class="bg-white shadow-md w-10 h-10 rounded-full flex items-center justify-center hover:bg-gray-100 transition-transform duration-200 hover:scale-110">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Carousel Container -->
    <div class="relative w-full">
      <div id="carouselContainer"
           class="flex space-x-6 overflow-x-hidden scroll-smooth snap-x snap-mandatory px-6">
        @foreach ([ 
          ['title' => 'Private Sightseeing Tours', 'category' => 'Activities', 'price' => 'From IDR 296,963', 'image' => 'images/tour.jpeg'],
          ['title' => 'Uluwatu Temple (Pura Luhur Uluwatu)', 'category' => 'Attractions', 'price' => 'From IDR 435,603', 'image' => 'images/uluwatu.jpg'],
          ['title' => '4WD Tours', 'category' => 'Activities', 'price' => 'From IDR 407,264', 'image' => 'images/4wd.jpg'],
          ['title' => 'Mountain Bike Tours', 'category' => 'Activities', 'price' => 'From IDR 500,000', 'image' => 'images/mountain.jpg'],
          ['title' => 'Scuba Diving', 'category' => 'Activities', 'price' => 'From IDR 1,086,037', 'image' => 'images/diving.webp'],
          ['title' => 'White Water Rafting', 'category' => 'Activities', 'price' => 'From IDR 458,172', 'image' => 'images/rafting.jpeg']
        ] as $activity)
        <div class="relative min-w-[90%] sm:min-w-[48%] md:min-w-[23%] snap-start rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
          <!-- Image -->
          <img src="{{ asset($activity['image']) }}" alt="{{ $activity['title'] }}"
               class="w-full h-[360px] object-cover group-hover:scale-105 transition-transform duration-500">

          <!-- Overlay -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>

          <!-- Category -->
          <div class="absolute top-4 left-4">
            <span class="bg-black/60 text-white text-xs px-3 py-1 rounded-full font-medium">
              {{ $activity['category'] }}
            </span>
          </div>

          <!-- Text -->
          <div class="absolute bottom-6 left-6 right-6 text-white">
            <h3 class="text-2xl font-bold mb-3 leading-tight text-white">{{ $activity['title'] }}</h3>
            <div class="border-t border-white/40 mb-2"></div>
            <p class="text-sm text-gray-200 font-medium">{{ $activity['price'] }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

<!-- Carousel Script -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("carouselContainer");
    const prevButton = document.getElementById("prevSlideFloating");
    const nextButton = document.getElementById("nextSlideFloating");
    const indicator = document.getElementById("pageIndicator");

    let currentPage = 1;
    let totalPages = Math.ceil(container.scrollWidth / container.clientWidth);

    const updateIndicator = () => {
      totalPages = Math.ceil(container.scrollWidth / container.clientWidth);
      indicator.textContent = `${currentPage} / ${totalPages}`;
    };

    const scrollCarousel = (direction) => {
      const scrollAmount = container.clientWidth;
      container.scrollBy({ left: direction * scrollAmount, behavior: "smooth" });

      // Update indicator after scroll
      setTimeout(() => {
        const scrollLeft = container.scrollLeft;
        const maxScroll = container.scrollWidth - container.clientWidth;
        currentPage = Math.round((scrollLeft / maxScroll) * totalPages) + 1;
        currentPage = Math.max(1, Math.min(currentPage, totalPages));
        updateIndicator();
      }, 500);
    };

    prevButton.addEventListener("click", () => scrollCarousel(-1));
    nextButton.addEventListener("click", () => scrollCarousel(1));

    updateIndicator();
    window.addEventListener("resize", updateIndicator);
  });
</script>


<!-- Testimonials Section -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <!-- Heading -->
    <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-2">
      What Travelers Are Saying
    </h2>
    <p class="text-gray-500 mb-10">
      Real stories from explorers who found their perfect Bali experience through CariBali.
    </p>

  
<!-- Grid of Testimonials -->
<section id="blog">
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
  @foreach ([
    ['name' => 'Olivia Maxwell', 'role' => 'American Tourist', 'rating' => '4.7', 'image' => 'images/t1.png', 'text' => "CariBali helped me find places that I wouldn’t have discovered on my own. The recommendations felt personal and really matched my preferences."],
    ['name' => 'Sofia Martinez', 'role' => 'Spanish Photographer', 'rating' => '4.8', 'image' => 'images/t2.jpeg', 'text' => "CariBali introduced me to hidden beaches and vibrant markets I would’ve never found. Every suggestion felt like it was made just for me."],
    ['name' => 'Max Chen', 'role' => 'Food Blogger', 'rating' => '4.5', 'image' => 'images/t3.png', 'text' => "From street food stalls to fine dining, CariBali nailed every recommendation. It was like traveling with a local friend."],
    ['name' => 'Amara Patel', 'role' => 'Indian Travel Writer', 'rating' => '4.9', 'image' => 'images/t4.jpeg', 'text' => "I discovered cultural gems and quiet retreats that made my trip unforgettable. CariBali truly understands a traveler’s heart."],
    ['name' => "Liam O'Connor", 'role' => 'Australian Surfer', 'rating' => '4.7', 'image' => 'images/t5.jpeg', 'text' => "The app showed me the best surfing spots that weren’t crowded. Now, it’s my go-to for planning adventures in Bali."],
    ['name' => 'Hana Kim', 'role' => 'Korean Tourist', 'rating' => '4.8', 'image' => 'images/t6.png', 'text' => "I loved the cozy cafes and co-working spaces that CariBali recommended. They were perfect for mixing work and exploration."]
  ] as $t)
  <div class="border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition bg-white">
    <!-- Header -->
    <div class="flex items-center mb-4">
      <img src="{{ asset($t['image']) }}" alt="{{ $t['name'] }}" class="w-12 h-12 rounded-full object-cover mr-4">
      <div class="flex-1">
        <div class="flex items-center justify-between">
          <div>
            <h3 class="font-semibold text-gray-900 text-sm leading-tight">{{ $t['name'] }}</h3>
            <p class="text-gray-500 text-xs leading-tight">{{ $t['role'] }}</p>
          </div>
          <div class="flex items-center text-orange-400 text-sm font-medium ml-3">
            <span class="mr-1">★</span>{{ $t['rating'] }}
          </div>
        </div>
      </div>
    </div>

    <!-- Separator -->
    <hr class="border-gray-100 mb-3">

    <!-- Text -->
    <p class="text-gray-600 text-sm leading-relaxed">
      {{ $t['text'] }}
    </p>
  </div>
  @endforeach
  </section>
