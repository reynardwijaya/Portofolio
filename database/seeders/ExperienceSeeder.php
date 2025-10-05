<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [
            [
                'title' => 'Mount Batur Sunrise Trek',
                'description' => 'Experience the breathtaking sunrise from the summit of Mount Batur, an active volcano in Bali. This early morning trek offers spectacular views of Lake Batur and the surrounding mountains. The moderate hike takes about 2 hours and includes a delicious breakfast cooked using volcanic steam.',
                'rating' => 5,
                'image' => 'batur.png',
                'maps_link' => 'https://maps.google.com/?q=Mount+Batur,+Bali'
            ],
            [
                'title' => 'Tirta Empul Temple',
                'description' => 'Visit the sacred Tirta Empul Temple, famous for its holy spring water where Balinese Hindus come for ritual purification. Built around 960 AD, this temple complex offers a unique spiritual experience with its ancient architecture and sacred pools.',
                'rating' => 4,
                'image' => 'empul.png',
                'maps_link' => 'https://maps.google.com/?q=Tirta+Empul+Temple,+Bali'
            ],
            [
                'title' => 'Sacred Monkey Forest Sanctuary',
                'description' => 'Explore the mystical Monkey Forest Sanctuary in Ubud, home to over 700 Balinese long-tailed monkeys. Walk through ancient temples covered in moss and interact with playful monkeys in their natural habitat while learning about Balinese Hindu culture.',
                'rating' => 4,
                'image' => 'monkeyforest.png',
                'maps_link' => 'https://maps.google.com/?q=Sacred+Monkey+Forest+Sanctuary,+Ubud,+Bali'
            ],
            [
                'title' => 'Nusa Penida Island Adventure',
                'description' => 'Discover the pristine beauty of Nusa Penida Island with its dramatic cliffs, crystal-clear waters, and hidden beaches. Visit iconic spots like Kelingking Beach, Angel\'s Billabong, and Broken Beach for unforgettable photo opportunities and snorkeling adventures.',
                'rating' => 5,
                'image' => 'nusapenida.png'
            ],
            [
                'title' => 'Tegallalang Rice Terraces',
                'description' => 'Marvel at the stunning Tegallalang Rice Terraces, a UNESCO World Heritage site showcasing traditional Balinese irrigation system called Subak. Walk through the emerald green terraces, enjoy local coffee, and experience the peaceful rural life of Bali.',
                'rating' => 4,
                'image' => 'tagalalang.png'
            ],
            [
                'title' => 'Uluwatu Temple Sunset',
                'description' => 'Watch the magnificent sunset at Uluwatu Temple, perched dramatically on a cliff 70 meters above the Indian Ocean. Enjoy the traditional Kecak fire dance performance while witnessing one of Bali\'s most spectacular sunsets.',
                'rating' => 5,
                'image' => 'uluwatu.png'
            ],
            [
                'title' => 'Sekumpul Waterfall Trek',
                'description' => 'Embark on an adventurous trek to Sekumpul Waterfall, considered one of Bali\'s most beautiful waterfalls. The journey through lush jungle and rice fields leads to a spectacular seven-tiered waterfall where you can swim in natural pools.',
                'rating' => 4,
                'image' => 'dummy.jpg'
            ],
            [
                'title' => 'Jatiluwih Rice Terraces',
                'description' => 'Experience the vast expanse of Jatiluwih Rice Terraces, a UNESCO World Heritage site covering over 600 hectares. Cycle through the scenic landscape, learn about traditional farming methods, and enjoy panoramic mountain views.',
                'rating' => 4,
                'image' => 'dummy.jpg'
            ]
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
