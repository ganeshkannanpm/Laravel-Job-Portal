<style>
    .scrollbar-hide::-webkit-scrollbar {
  display: none;
}
.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

</style>
<section class="bg-gradient-to-r from-indigo-500 to-indigo-600 py-12 relative">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Section Header -->
    <div class="text-center mb-8 text-white">
      <h2 class="text-3xl font-bold">Career Advice</h2>
      <p class="mt-2 text-indigo-100">
        Expert tips to grow your career and stand out in the job market
      </p>
    </div>

    <!-- Carousel -->
    <div class="relative">
      <!-- Left Arrow -->
      <button id="scroll-left" class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white rounded-full p-2 shadow hover:bg-gray-100">
        &#8592;
      </button>

      <!-- Cards Container -->
      <div id="career-cards" class="flex space-x-6 overflow-x-hidden scrollbar-hide">
        <!-- We'll duplicate cards for infinite effect -->
      </div>

      <!-- Right Arrow -->
      <button id="scroll-right" class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white rounded-full p-2 shadow hover:bg-gray-100">
        &#8594;
      </button>
    </div>
  </div>
</section>
<script>
  const container = document.getElementById("career-cards");

  // Card data
  const cards = [
    {
      title: "Resume Building Tips",
      desc: "Learn how to create an impactful resume that gets noticed by recruiters.",
      icon: `<svg class="w-8 h-8 text-indigo-500 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9"></path><path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16"></path></svg>`
    },
    {
      title: "Interview Preparation",
      desc: "Discover essential tips to ace your interviews and land your dream job.",
      icon: `<svg class="w-8 h-8 text-indigo-500 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4"></path><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`
    },
    {
      title: "Skill Development",
      desc: "Upgrade your skills with trending technologies to stay ahead in your career.",
      icon: `<svg class="w-8 h-8 text-indigo-500 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 100 20 10 10 0 000-20z"></path></svg>`
    },
    {
      title: "Networking Strategies",
      desc: "Learn how to network effectively and open doors to new opportunities.",
      icon: `<svg class="w-8 h-8 text-indigo-500 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7l4-4l4 4"></path><path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a9 9 0 00-18 0v2"></path></svg>`
    }
  ];

  // Create cards
  function createCard(card) {
    const cardDiv = document.createElement("div");
    cardDiv.className = "min-w-[300px] bg-white rounded-lg shadow-md p-6 flex flex-col flex-shrink-0";
    cardDiv.innerHTML = `
      <div class="flex items-center mb-4">${card.icon}<h3 class="text-xl font-semibold text-gray-800">${card.title}</h3></div>
      <p class="text-gray-600 mb-4 flex-grow">${card.desc}</p>
      <a href="#" class="text-indigo-600 font-medium hover:underline mt-auto">Read More →</a>
    `;
    return cardDiv;
  }

  // Append two sets of cards for looping effect
  cards.concat(cards).forEach(card => {
    container.appendChild(createCard(card));
  });

  let scrollAmount = 0;
  const scrollStep = 2; // speed of sliding

  function autoSlide() {
    scrollAmount += scrollStep;
    container.scrollLeft = scrollAmount;

    // If reached end of first set, reset scroll
    if (scrollAmount >= container.scrollWidth / 2) {
      scrollAmount = 0;
    }
    requestAnimationFrame(autoSlide);
  }

  autoSlide();

  // Arrow buttons
  document.getElementById("scroll-left").addEventListener("click", () => {
    scrollAmount -= 300;
    container.scrollLeft = scrollAmount;
  });
  document.getElementById("scroll-right").addEventListener("click", () => {
    scrollAmount += 300;
    container.scrollLeft = scrollAmount;
  });
</script>
