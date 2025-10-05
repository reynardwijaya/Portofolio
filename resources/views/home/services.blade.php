<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.tailwindcss.com"></script>

<style>
.star-rating {
  color: #fbbf24;
}
.experience-card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.experience-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}
.description-text {
  margin-top: 0.5rem;
  line-height: 1.5;
}
.read-more-link {
  color: #f97316;
  font-weight: 500;
  cursor: pointer;
}
.read-more-link:hover {
  color: #ea580c;
}
.pagination-circle {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid #d1d5db;
  margin: 0 4px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.pagination-circle.active {
  background-color: #f97316;
  color: white;
  border-color: #f97316;
}
.pagination-nav-btn {
  padding: 8px 16px;
  border-radius: 25px;
  border: 1px solid #d1d5db;
  color: #6b7280;
  background-color: white;
  transition: all 0.3s ease;
}
.pagination-nav-btn:hover {
  border-color: #9ca3af;
  color: #374151;
}
.pagination-nav-btn.disabled {
  opacity: 0.5;
  pointer-events: none;
}
</style>

<!-- Experience Section -->
<div class="services_section bg-white pt-48 pb-24">
  <div class="container mx-auto px-6">
    <!-- Title -->
    <div class="text-center mb-16">
      <h1 class="text-4xl md:text-5xl font-semibold text-gray-900 mb-3">
        Discover places you're going to love
      </h1>
      <p class="text-lg text-gray-500 max-w-2xl mx-auto">
        From cultural wonders to nature escapes, let what you love point you toward Bali's most amazing experiences.
      </p>
    </div>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
      @if(isset($experiences) && $experiences->count() > 0)
        @foreach($experiences as $experience)
        <div class="experience-card bg-white rounded-2xl border border-gray-200 overflow-hidden flex flex-col h-[420px]">
          <!-- Image -->
          <div class="h-44 w-full">
            <img src="{{ asset('images/dummy/' . $experience->image) }}" 
                 alt="{{ $experience->title }}" 
                 class="w-full h-full object-cover">
          </div>

          <!-- Content -->
          <div class="flex flex-col p-5 flex-grow">
            <!-- Title & Rating -->
            <div class="flex justify-between items-start mb-2">
              <h3 class="text-lg font-semibold text-gray-900 leading-tight mr-3">
                {{ $experience->title }}
              </h3>
              <div class="flex items-center text-lg font-bold">
                <span class="star-rating mr-1 text-xl">★</span>
                <span class="text-gray-900">{{ $experience->rating }}</span>
              </div>
            </div>

            <!-- Maps Link -->
            @if($experience->maps_link)
            <a href="{{ $experience->maps_link }}" target="_blank" 
               class="text-sm text-gray-500 hover:text-gray-700 mb-2">
              View on Maps
            </a>
            @endif

            <!-- Separator -->
            <div class="border-t border-gray-200 mt-1 mb-2"></div>

            <!-- Description -->
            <p class="text-gray-600 text-sm description-text flex-grow" data-full-text="{{ $experience->description }}">
              {{ Str::limit($experience->description, 100) }}
              @if(strlen($experience->description) > 100)
                <span class="read-more-link ml-1">Read More</span>
              @endif
            </p>
          </div>
        </div>
        @endforeach
      @else
        <div class="col-span-full text-center py-12 text-gray-500">
          No experiences available at the moment.
        </div>
      @endif
    </div>

    <!-- Pagination -->
    @if(isset($experiences) && $experiences->count() > 0)
    <div class="flex justify-between items-center w-full max-w-4xl mx-auto">
      <div>
        @if($experiences->currentPage() > 1)
          <a href="{{ $experiences->previousPageUrl() }}" class="pagination-nav-btn">Back</a>
        @else
          <span class="pagination-nav-btn disabled">Back</span>
        @endif
      </div>

      <div class="flex items-center">
        @for($i = 1; $i <= $experiences->lastPage(); $i++)
          <a href="{{ $experiences->url($i) }}" class="pagination-circle {{ $i == $experiences->currentPage() ? 'active' : '' }}">
            {{ $i }}
          </a>
        @endfor
      </div>

      <div>
        @if($experiences->hasMorePages())
          <a href="{{ $experiences->nextPageUrl() }}" class="pagination-nav-btn">Next</a>
        @else
          <span class="pagination-nav-btn disabled">Next</span>
        @endif
      </div>
    </div>
    @endif
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.read-more-link').forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const desc = this.closest('.description-text');
      const fullText = desc.getAttribute('data-full-text');
      const card = this.closest('.experience-card');
      
      if (this.textContent === 'Read More') {
        desc.innerHTML = fullText + ' <span class="read-more-link">Read Less</span>';
      } else {
        const truncated = fullText.length > 100 ? fullText.substring(0, 100) + '...' : fullText;
        desc.innerHTML = truncated + (fullText.length > 100 ? ' <span class="read-more-link">Read More</span>' : '');
      }

      // rebind
      desc.querySelector('.read-more-link')?.addEventListener('click', arguments.callee);
    });
  });
});
</script>
