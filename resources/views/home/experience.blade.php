<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.homecss')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .star-rating {
            color: #fbbf24;
        }
        .experience-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .experience-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.08);
        }
        .pagination-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #d1d5db;
            margin: 0 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .pagination-circle.active {
            background-color: #f97316;
            color: white;
            border-color: #f97316;
        }
        .pagination-circle:hover {
            background-color: #f3f4f6;
        }
        .pagination-circle.active:hover {
            background-color: #ea580c;
        }
    </style>
</head>
<body class="bg-white text-gray-800">
    <!-- Header -->
    <div class="header_section">
        @include('home.header')
    </div>

    <!-- Experience Section -->
    <section class="pt-70 pb-24">
        <div class="container mx-auto px-6">
            
            <!-- Section Title -->
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">
                    Discover places you're going to love
                </h1>
                <p class="text-lg text-gray-500 max-w-3xl mx-auto">
                    From cultural wonders to nature escapes, let what you love point you toward Bali's most amazing experiences.
                </p>
            </div>

            <!-- Experience Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($experiences as $experience)
                <div class="experience-card bg-white rounded-2xl shadow-md overflow-hidden max-w-lg mx-auto border border-gray-100" style="height: 420px;">
                    
                    <!-- Image -->
                    <div class="w-full h-48 overflow-hidden">
                        <img src="{{ asset('images/dummy/' . $experience->image) }}" 
                             alt="{{ $experience->title }}" 
                             class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Card Content -->
                    <div class="p-5 h-52 flex flex-col">
                        <!-- Title and Rating -->
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-lg font-semibold text-gray-900 leading-snug flex-1 mr-3">
                                {{ $experience->title }}
                            </h3>
                            <div class="flex items-center text-sm font-semibold text-gray-700">
                                <span class="star-rating text-lg mr-1">★</span>
                                <span class="text-base">{{ $experience->rating }}</span>
                            </div>
                        </div>

                        <!-- Maps Link -->
                        @if($experience->maps_link)
                        <a href="{{ $experience->maps_link }}" target="_blank" class="text-gray-500 text-xs mb-2 hover:text-gray-700 transition">
                            Maps
                        </a>
                        @endif

                        <!-- Separator -->
                        <div class="border-t border-gray-200 mb-3"></div>

                        <!-- Description -->
                        <div class="flex-1 leading-relaxed text-sm text-gray-600">
                            <p class="description-text" data-full-text="{{ $experience->description }}">
                                {{ Str::limit($experience->description, 100) }}
                                @if(strlen($experience->description) > 100)
                                    <span class="read-more-link text-orange-600 hover:text-orange-800 cursor-pointer ml-1 font-medium">
                                        Read More
                                    </span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center items-center space-x-6">
                <!-- Back -->
                <div>
                    @if($experiences->currentPage() > 1)
                        <a href="{{ $experiences->previousPageUrl() }}" class="text-gray-600 hover:text-gray-900 font-medium transition">
                            ← Back Page
                        </a>
                    @else
                        <span class="text-gray-400">← Back Page</span>
                    @endif
                </div>

                <!-- Page Numbers -->
                <div class="flex items-center">
                    @for($i = 1; $i <= $experiences->lastPage(); $i++)
                        <a href="{{ $experiences->url($i) }}" 
                           class="pagination-circle {{ $i == $experiences->currentPage() ? 'active' : '' }}">
                            {{ $i }}
                        </a>
                    @endfor
                </div>

                <!-- Next -->
                <div>
                    @if($experiences->hasMorePages())
                        <a href="{{ $experiences->nextPageUrl() }}" class="text-gray-600 hover:text-gray-900 font-medium transition">
                            Next Page →
                        </a>
                    @else
                        <span class="text-gray-400">Next Page →</span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('home.footer')

    <!-- JS -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.read-more-link').forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const descriptionText = this.closest('.description-text');
                const fullText = descriptionText.getAttribute('data-full-text');
                const card = this.closest('.experience-card');
                
                if (this.textContent === 'Read More') {
                    card.style.height = 'auto';
                    descriptionText.innerHTML = fullText + 
                        ' <span class="read-more-link text-blue-600 hover:text-blue-800 cursor-pointer ml-1 font-medium">Read Less</span>';
                    descriptionText.querySelector('.read-more-link').addEventListener('click', arguments.callee);
                } else {
                    card.style.height = '420px';
                    const truncated = fullText.length > 100 ? fullText.substring(0, 100) + '...' : fullText;
                    descriptionText.innerHTML = truncated + 
                        (fullText.length > 100 ? ' <span class="read-more-link text-blue-600 hover:text-blue-800 cursor-pointer ml-1 font-medium">Read More</span>' : '');
                    if (descriptionText.querySelector('.read-more-link')) {
                        descriptionText.querySelector('.read-more-link').addEventListener('click', arguments.callee);
                    }
                }
            });
        });
    });
    </script>
</body>
</html>
