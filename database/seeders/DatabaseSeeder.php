<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Image;
use App\Models\Itinerary;
use App\Models\Package;
use App\Models\PackageCostClause;
use App\Models\User;
use App\Models\Variant;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Editor User',
            'email' => 'editor@editor.com',
            'role' => 'editor',
            'password' => Hash::make('password'),
        ]);
        User::factory()->create([
            'name' => 'Blog User',
            'email' => 'blog@blog.com',
            'role' => 'blog-writer',
            'password' => Hash::make('password'),
        ]);


        // DB::table('categories')->insert([
        //     [
        //         'name' => 'travel',
        //         'slug' => 'travel',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'name' => 'tour',
        //         'slug' => 'tour',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ]);


        DB::table('packages')->insert([
            [
                'category' => "trek",
                'title' => 'Annapurna Base Camp Trek',
                'slug' => Str::slug('Annapurna Base Camp Trek'),
                'short_description' => 'The Annapurna Base Camp trek is a classic 14-day Himalayan adventure through forests, traditional villages, and diverse landscapes, reaching 4,130 meters within the Annapurna Sanctuary.',
                'description' => '<p>The number-one bucket-list trek on Earth begins with a scenic <strong>30-minute flight</strong> to Lukla, the gateway to the Everest region. From Lukla, the trail follows the Dudh Koshi Valley, passing through well-known Sherpa villages including <strong>Namche Bazaar</strong>, <strong>Tengboche</strong>, and <strong>Dingboche</strong> while gradually ascending through the Khumbu region.</p><p>The trek starts and ends in <strong>Lukla</strong>.</p><p>The EBC trek culminates at <strong>Everest Base Camp </strong>at<strong> 5,364 meters</strong>, located at the edge of the Khumbu Icefall. After returning to <strong>Gorak Shep</strong>, the route continues with an early morning ascent to <strong>Kala Patthar at 5,545 meters</strong>, the highest point of the Everest Base Camp trek and a highlight for panoramic Himalayan scenery.</p><p>The highest sleeping point on the Everest Base Camp trek is <strong>Gorak Shep at 5,164 meters</strong>.</p><p>The 16-day Everest Base Camp trek includes <strong>11 days of trekking</strong>, with <strong>two acclimatization days</strong> at Namche Bazaar and Dingboche. The itinerary allows <strong>one day for the Lukla to Kathmandu flight</strong>, <strong>one pre-trek rest day in Kathmandu</strong>, <strong>one buffer day for potential Lukla flight delays</strong>, and <strong>two days for international arrival and departure</strong>.</p><p>The Everest Base Camp trek requires the <strong>Sagarmatha National Park Entry Permit</strong> and the <strong>Khumbu Pasang Lhamu Rural Municipality Permit</strong>.</p><p>The Everest Base Camp trek covers <strong>138 km (85.7 miles)</strong>, including the hike to Kala Patthar and both acclimatization hikes.</p><p>The Everest Base Camp trek is a non-technical journey rated<strong> moderate to strenuous</strong> and suitable for fit hikers with good endurance, even without prior high-altitude trekking experience.</p><p>The best time of the year for the Everest Base Camp trek is <strong>spring (March to May)</strong> and <strong>autumn (September to November)</strong>, when weather conditions are stable, flight reliability to Lukla is higher, trails remain dry and safe, and daytime temperatures stay comfortable for trekking.</p><h2><strong>Everest Base Camp Trek Key Highlights</strong></h2><p>The Everest Base Camp Trek brings together iconic viewpoints, towering snow-capped peaks, Sherpa culture, and protected alpine landscapes.</p><h3><strong>Iconic Landmarks and Viewpoints</strong></h3><ul><li><p>Stand at <strong>Everest Base Camp (5,364m)</strong>, the legendary <strong>South Camp</strong> at the foot of the top of the world.</p></li><li><p>Climb <strong>Kala Patthar (5,545m)</strong> at sunrise for close-up views of <strong>Everest</strong>, <strong>Lhotse</strong>, <strong>Nuptse</strong>, <strong>Pumori</strong>, <strong>Khumbu Glacier</strong>, and even <strong>Everest Base Camp</strong>.</p></li><li><p>Take an acclimatization hike to<strong> Nangkartshang Hill </strong>(5,083m) in <strong>Dingboche</strong>, with wide-ranging great views of <strong>Makalu</strong> and<strong> Island Peak</strong>.</p></li><li><p>Hike to <strong>Everest View Hotel (3,880m)</strong>, the world’s highest luxury hotel, for early views of <strong>Everest</strong> and surrounding mountains like <strong>Ama Dablam</strong>, and <strong>Lhotse</strong>.</p></li></ul><h3><strong>8,000-Meter Peaks Visible on the EBC Trek Route</strong></h3><p>Encounter four eight-thousand-meter mountains on the Everest Base Camp trek, including <strong>Mount Everest (8,848.86 m)</strong>, <strong>Lhotse (8,516 m)</strong>, <strong>Makalu (8,485 m)</strong>, and <strong>Cho Oyu (8,188 m)</strong>.</p><h3><strong>Scenic Lukla Flight</strong></h3><p>Fly to <strong>Tenzing–Hillary Airport (2,860 m)</strong>, where a short mountain runway and rapidly changing weather make the approach uniquely challenging and memorable.</p><h3><strong>Sacred Monasteries &amp; Sherpa Culture</strong></h3><ul><li><p>Visit <strong>Tengboche Monastery</strong> (Dawa Choling Gompa), the largest monastery in the Khumbu, and join the monks for their evening prayer session.</p></li><li><p>Explore historic sites including <strong>Pangboche Monastery</strong>, the oldest in the region, <strong>Khumjung Monastery</strong>, famed for its Yeti relic, and the monastery at <strong>Namche Bazaar</strong>.</p></li><li><p>Witness sacred mask dances and monastery rituals during <strong>Mani Rimdu</strong> in <strong>Tengboche</strong>, where vibrant local participation in late October or early November adds rich cultural depth to the Everest Base Camp trek.</p></li><li><p>Acclimatise in <strong>Namche Bazaar (3,440m)</strong>, the cultural and commercial heart of the Khumbu.</p></li></ul><h3><strong>Sagarmatha National Park &amp; Wildlife</strong></h3><p>Trek through <strong>Sagarmatha National Park</strong>, a UNESCO World Heritage Site, along ancient alpine trails while spotting wildlife such as blue sheep, yaks, rare birds, and the Himalayan Monal.</p><h3><strong>Everest Legacy, Responsible Trekking &amp; Authentic Teahouse Experience</strong></h3><ul><li><p>Walk through <strong>Thukla (Dughla) Pass</strong>, where memorials honour climbers like Rob Hall, Scott Fischer, and Babu Chiri Sherpa, preserving their legacy and sacrifice.</p></li><li><p>Support mountain conservation by joining <strong>Sagarmatha Next and </strong>carrying 1 kg of waste from<strong> Namche </strong>or<strong> Pangboche </strong>to<strong> Lukla.</strong></p></li><li><p>Immerse yourself in Sherpa culture by staying at traditional teahouses, enjoying local hospitality, dal bhat, butter tea, and authentic Himalayan cuisine.</p></li></ul><h2><strong>Everest Base Camp Trek Route Overview</strong></h2><p>The Everest Base Camp trek trail offers a rare balance of well-managed infrastructure and thoughtful commercialisation while preserving authentic mountain culture and raw trekking experiences.</p><p>Acclimatization is crucial and non-negotiable on the Everest Base Camp trek. Proper acclimatization days are included to ensure safety and comfort, with planned hikes from <strong>Namche Bazaar </strong>to the <strong>Everest View Hotel </strong>and from <strong>Dingboche</strong> to <strong>Nangkartshang Hill</strong>.</p><p>From Phakding, the trail passes through pine, rhododendron, and fir forests, <strong>opening into expansive alpine terrain at Tengboche</strong>, where trekkers often catch their first clear view of Mount Everest.</p><p>Beyond Tengboche, the forest briefly returns before thinning with altitude, and from<strong> Dingboche </strong>to<strong> Lobuche, </strong>passing through <strong>Thukla Pass,</strong> the landscape becomes fully open alpine terrain above the treeline.</p><p>The final approach to <strong>Everest Base Camp</strong> from <strong>Lobuche</strong> follows rugged moraine paths alongside the Khumbu Glacier.</p><p>Several sections of the trail include well-built stone staircases, especially around Lukla and along the acclimatization hike to the Everest View Hotel.</p><p>The acclimatization hike to <strong>Nangkartshang Hill </strong>in <strong>Dingboche</strong> is physically demanding, and the route from <strong>Gorak Shep</strong> to <strong>EBC</strong> is rocky, with microspikes often required in snowy conditions. The ascent to <strong>Kala Patthar</strong> is a sustained uphill climb that adds to the overall challenge.</p><p>Weather permitting, <strong>Everest</strong> may be visible even before <strong>Namche Bazaar </strong>and remains in view along parts of the trail until <strong>Pangboche</strong>, after which it disappears until reaching <strong>Gorak Shep</strong>.</p><p>On the return journey, the EBC trek descends via <strong>Pheriche</strong> rather than <strong>Dingboche</strong>, following a shorter and quieter trail.</p><h2><strong>Everest Base Camp Trek Alternatives</strong></h2><p>While <strong>Nepal Hiking Team’s 16-day Everest Base Camp Trek</strong> remains a classic itinerary, we also offer several alternative packages, each designed with its own distinctive features and experiences.</p><table><tbody><tr><td rowspan="1" colspan="1"><p><strong>Trip</strong></p></td><td rowspan="1" colspan="1"><p><strong>Duration</strong></p></td><td rowspan="1" colspan="1"><p><strong>Difficulty</strong></p></td><td rowspan="1" colspan="1"><p><strong>Price</strong></p></td><td rowspan="1" colspan="1"><p><strong>Key Feature</strong></p></td></tr><tr><td rowspan="1" colspan="1"><p><a target="_blank" rel="noopener noreferrer nofollow" href="https://www.nepalhikingteam.com/package/everest-base-camp-short-trek"><strong>Short EBC Trek</strong></a></p></td><td rowspan="1" colspan="1"><p>14 Days</p></td><td rowspan="1" colspan="1"><p>Moderate to Strenuous</p></td><td rowspan="1" colspan="1"><p><strong>$1,475</strong></p></td><td rowspan="1" colspan="1"><p>Only two nights in Kathmandu, following the same route as the 16-day EBC trek package.</p></td></tr><tr><td rowspan="1" colspan="1"><p><a target="_blank" rel="noopener noreferrer nofollow" href="https://www.nepalhikingteam.com/package/everest-chola-pass-trek"><strong>EBC Gokyo with Cho La Pass</strong></a></p></td><td rowspan="1" colspan="1"><p>19 Days</p></td><td rowspan="1" colspan="1"><p>Strenuous</p></td><td rowspan="1" colspan="1"><p><strong>$1,720</strong></p></td><td rowspan="1" colspan="1"><p>For very fit, experienced trekkers, covering Gokyo Lakes and the Cho La Pass.</p></td></tr><tr><td rowspan="1" colspan="1"><p><a target="_blank" rel="noopener noreferrer nofollow" href="https://www.nepalhikingteam.com/package/everest-base-camp-heli-shuttle-trek"><strong>EBC Heli Shuttle Trek</strong></a></p></td><td rowspan="1" colspan="1"><p>12 Days</p></td><td rowspan="1" colspan="1"><p>Moderate</p></td><td rowspan="1" colspan="1"><p><strong>$2,350</strong></p></td><td rowspan="1" colspan="1"><p>For trekkers who hike up and return by helicopter from Gorak Shep.</p></td></tr></tbody></table><p><em>The listed price is the <strong>per-person cost for two travellers</strong>, based on <strong>Nepal Hiking Team&#039;s standard package rates</strong>. Costs will be slightly higher for a solo traveller and lower for larger groups.</em></p><h2><strong>Everest Base Camp Trekking with Local Experts and Top-rated Company</strong></h2><p>At <strong>Nepal Hiking Team</strong>, we operate all Everest routes with <strong>experienced licensed guides</strong>, <strong>dependable porters</strong>, and a <strong>dedicated 24/7 logistics coordination team</strong>.</p><p>Every trek is carefully planned with <strong>altitude management as the top priority</strong>, and daily pacing is adjusted to match individual comfort and acclimatization needs. With <strong>reliable on-ground logistics and constant support</strong>, we ensure a safe, flexible, and rewarding Everest Base Camp experience, whether you join a <strong>group departure</strong> or choose a <strong>private trek</strong>.</p>', // truncated for brevity
                'destination' => 'Annapurna',
                'duration_label' => '12 days',
                'difficulty' => 'moderate',
                'max_elevation' => '4130m',
                'best_time' => 'Oct-Nov, Mar-May',
                'is_featured' => false,
                'is_popular' => true,
                'is_active' => true,

                // Pricing per person
                'old_single_price' => 1500.00,
                'new_single_price' => 1200.00,
                'old_group_price' => 1400.00,
                'new_group_price' => 1100.00,

                'activities' => 'Trekking, Sightseeing, Cultural visits',
                'accomodations' => 'Luxury lodges, 5-star hotel in Kathmandu',
                'meals' => 'Breakfast, Lunch, Dinner included',
                'is_luxury' => true,

                'meta_title' => 'Annapurna Base Camp Trek',
                'meta_description' => '12-day trek to Annapurna Base Camp, Nepal.',
                'meta_keywords' => 'Annapurna, trekking, Nepal, adventure',
                'max_people_per_trip' => 15,
                'total_reviews' => 129,
                'rating' => 4.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "trek",
                'title' => 'Ghorepani Poon Hill Trek',
                'slug' => Str::slug('Ghorepani Poon Hill Trek'),
                'short_description' => 'Short and scenic trek with panoramic mountain views.',
                'description' => 'This 5-day trek is perfect for beginners, offering sunrise views from Poon Hill and an introduction to Nepali mountain culture.',
                'destination' => 'Ghorepani',
                'duration_label' => '5 days',
                'difficulty' => 'easy',
                'max_elevation' => '3210m',
                'best_time' => 'Oct-Nov, Mar-May',
                'is_featured' => true,
                'is_popular' => true,
                'is_active' => true,

                'old_single_price' => 600.00,
                'new_single_price' => 500.00,
                'old_group_price' => 550.00,
                'new_group_price' => 450.00,

                'activities' => 'Trekking, Sunrise view from Poon Hill',
                'accomodations' => 'Teahouses and lodges',
                'meals' => 'Breakfast included',
                'is_luxury' => false,

                'meta_title' => 'Ghorepani Poon Hill Trek',
                'meta_description' => '5-day trek to Poon Hill, ideal for beginners.',
                'meta_keywords' => 'Poon Hill, trekking, Nepal, adventure',
                'max_people_per_trip' => 12,
                'total_reviews' => 98,
                'rating' => 4.7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "trek",
                'title' => 'Helambu Trek',
                'slug' => Str::slug('Helambu Trek'),
                'short_description' => 'A short trek near Kathmandu with beautiful landscapes and culture.',
                'description' => 'The 7-day Helambu Trek passes through lush forests, traditional villages, and Buddhist monasteries, perfect for cultural immersion.',
                'destination' => 'Helambu',
                'duration_label' => '7 days',
                'difficulty' => 'easy',
                'max_elevation' => '3780m',
                'best_time' => 'Sep-Nov, Mar-May',
                'is_featured' => false,
                'is_popular' => false,
                'is_active' => true,

                'old_single_price' => 700.00,
                'new_single_price' => 600.00,
                'old_group_price' => 650.00,
                'new_group_price' => 550.00,

                'activities' => 'Trekking, Cultural visits, Nature walks',
                'accomodations' => 'Guesthouses and lodges',
                'meals' => 'Breakfast and Dinner',
                'is_luxury' => false,

                'meta_title' => 'Helambu Trek',
                'meta_description' => '7-day trek to Helambu, Nepal, for nature and culture lovers.',
                'meta_keywords' => 'Helambu, trekking, Nepal, adventure',
                'max_people_per_trip' => 10,
                'total_reviews' => 64,
                'rating' => 4.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "trek",
                'title' => 'Gokyo Lakes Trek',
                'slug' => Str::slug('Gokyo Lakes Trek'),
                'short_description' => 'Stunning trek to the turquoise Gokyo Lakes in Everest region.',
                'description' => 'A 12-day trek through Everest region, exploring the beautiful Gokyo Lakes and panoramic Himalayan views including Everest and Cho Oyu.',
                'destination' => 'Everest Region',
                'duration_label' => '12 days',
                'difficulty' => 'hard',
                'max_elevation' => '5360m',
                'best_time' => 'Mar-May, Sep-Nov',
                'is_featured' => false,
                'is_popular' => false,
                'is_active' => true,

                'old_single_price' => 1800.00,
                'new_single_price' => 1500.00,
                'old_group_price' => 1700.00,
                'new_group_price' => 1400.00,

                'activities' => 'Trekking, High-altitude exploration',
                'accomodations' => 'Teahouses, Lodges',
                'meals' => 'All meals included',
                'is_luxury' => true,

                'meta_title' => 'Gokyo Lakes Trek',
                'meta_description' => '12-day trek to Gokyo Lakes with Everest views.',
                'meta_keywords' => 'Gokyo, trekking, Nepal, Everest, adventure',
                'max_people_per_trip' => 8,
                'total_reviews' => 87,
                'rating' => 4.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "trek",
                'title' => 'Dhaulagiri Circuit Trek',
                'slug' => Str::slug('Dhaulagiri Circuit Trek'),
                'short_description' => 'Challenging trek circling the majestic Dhaulagiri range.',
                'description' => 'This 18-day trek offers incredible mountain scenery, remote villages, and high passes, perfect for experienced trekkers seeking adventure.',
                'destination' => 'Dhaulagiri Region',
                'duration_label' => '18 days',
                'difficulty' => 'hard',
                'max_elevation' => '5360m',
                'best_time' => 'Oct-Nov, Mar-May',
                'is_featured' => true,
                'is_popular' => true,
                'is_active' => true,

                'old_single_price' => 2500.00,
                'new_single_price' => 2200.00,
                'old_group_price' => 2400.00,
                'new_group_price' => 2100.00,

                'activities' => 'Trekking, High passes, Cultural exploration',
                'accomodations' => 'Teahouses and mountain lodges',
                'meals' => 'All meals included',
                'is_luxury' => true,

                'meta_title' => 'Dhaulagiri Circuit Trek',
                'meta_description' => '18-day trek around Dhaulagiri, Nepal for experienced trekkers.',
                'meta_keywords' => 'Dhaulagiri, trekking, Nepal, adventure',
                'max_people_per_trip' => 6,
                'total_reviews' => 45,
                'rating' => 4.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "trek",
                'title' => 'Chisapani Nagarkot Trek',
                'slug' => Str::slug('Chisapani Nagarkot Trek'),
                'short_description' => 'A short trek with sunrise views over the Himalayas.',
                'description' => 'This 3-day trek near Kathmandu offers stunning sunrise views from Nagarkot.',
                'destination' => 'Nagarkot',
                'duration_label' => '3 days',
                'difficulty' => 'easy',
                'max_elevation' => '2175m',
                'best_time' => 'Sep-Nov, Mar-May',
                'is_featured' => false,
                'is_popular' => false,
                'is_active' => true,

                'old_single_price' => 350.00,
                'new_single_price' => 300.00,
                'old_group_price' => 320.00,
                'new_group_price' => 280.00,

                'activities' => 'Trekking, Sunrise photography',
                'accomodations' => 'Guesthouses and lodges',
                'meals' => 'Breakfast included',
                'is_luxury' => false,

                'meta_title' => 'Chisapani Nagarkot Trek',
                'meta_description' => '3-day trek from Chisapani to Nagarkot.',
                'meta_keywords' => 'Nagarkot, trekking, Nepal',
                'max_people_per_trip' => 20,
                'total_reviews' => 112,
                'rating' => 4.6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "trek",
                'title' => 'Upper Mustang Trek',
                'slug' => Str::slug('Upper Mustang Trek'),
                'short_description' => 'Explore the hidden kingdom of Mustang.',
                'description' => '14-day trek through Upper Mustang region.',
                'destination' => 'Mustang',
                'duration_label' => '14 days',
                'difficulty' => 'hard',
                'max_elevation' => '3840m',
                'best_time' => 'Mar-May, Sep-Nov',
                'is_featured' => true,
                'is_popular' => true,
                'is_active' => true,

                'old_single_price' => 2000.00,
                'new_single_price' => 1700.00,
                'old_group_price' => 1900.00,
                'new_group_price' => 1600.00,

                'activities' => 'Trekking, Cultural exploration, Scenic flights',
                'accomodations' => 'Luxury lodges and guesthouses',
                'meals' => 'Breakfast, Lunch, Dinner included',
                'is_luxury' => true,

                'meta_title' => 'Upper Mustang Trek',
                'meta_description' => '14-day trek to Upper Mustang.',
                'meta_keywords' => 'Mustang, trekking, Nepal',
                'max_people_per_trip' => 10,
                'total_reviews' => 73,
                'rating' => 4.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => "trek",
                'title' => 'Rara Lake Trek',
                'slug' => Str::slug('Rara Lake Trek'),
                'short_description' => 'Trek to Nepal’s largest lake.',
                'description' => '7-day trek to Rara Lake.',
                'destination' => 'Rara',
                'duration_label' => '7 days',
                'difficulty' => 'moderate',
                'max_elevation' => '2990m',
                'best_time' => 'Sep-Nov, Mar-May',
                'is_featured' => false,
                'is_popular' => false,
                'is_active' => true,

                'old_single_price' => 800.00,
                'new_single_price' => 700.00,
                'old_group_price' => 750.00,
                'new_group_price' => 650.00,

                'activities' => 'Trekking, Lake sightseeing',
                'accomodations' => 'Guesthouses and lodges',
                'meals' => 'Breakfast included',
                'is_luxury' => false,

                'meta_title' => 'Rara Lake Trek',
                'meta_description' => '7-day trek to Rara Lake.',
                'meta_keywords' => 'Rara, trekking, Nepal',
                'max_people_per_trip' => 9,
                'total_reviews' => 51,
                'rating' => 4.7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        // DB::table('variants')->insert([
        //     [
        //         'package_id' => 1, // Solukhumbu Adventure
        //         'variation_name' => 'Standard Trek',
        //         'old_single_price' => 1200.00,
        //         'new_single_price' => 1100.00,
        //         'old_group_price' => 1000.00,
        //         'new_group_price' => 950.00,
        //         'currency' => 'USD',
        //         'min_group_size' => 2,
        //         'short_description' => 'Standard package for individual travelers or small groups.',
        //         'description' => 'This variant offers a comfortable trekking experience including guesthouse stays, local meals, and guided tours.',
        //         'is_default' => true,
        //         'is_active' => true,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'package_id' => 1, // Solukhumbu Adventure
        //         'variation_name' => 'Luxury Trek',
        //         'old_single_price' => 1800.00,
        //         'new_single_price' => 1700.00,
        //         'old_group_price' => 1500.00,
        //         'new_group_price' => 1450.00,
        //         'currency' => 'USD',
        //         'min_group_size' => 2,
        //         'short_description' => 'Premium trekking experience with luxury accommodations.',
        //         'description' => 'Luxury variant includes 4-star hotels where possible, private guides, and premium meals during the trek.',
        //         'is_default' => false,
        //         'is_active' => true,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'package_id' => 2, // Manasalu Base Camp Trek
        //         'variation_name' => 'Standard Trek',
        //         'old_single_price' => 1400.00,
        //         'new_single_price' => 1350.00,
        //         'old_group_price' => 1200.00,
        //         'new_group_price' => 1150.00,
        //         'currency' => 'USD',
        //         'min_group_size' => 2,
        //         'short_description' => 'Standard package for Manasalu Base Camp trek.',
        //         'description' => 'Includes 12-day trek with local tea house stays, guide services, and meals.',
        //         'is_default' => true,
        //         'is_active' => true,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'package_id' => 2, // Manasalu Base Camp Trek
        //         'variation_name' => 'Luxury Trek',
        //         'old_single_price' => 2000.00,
        //         'new_single_price' => 1900.00,
        //         'old_group_price' => 1700.00,
        //         'new_group_price' => 1600.00,
        //         'currency' => 'USD',
        //         'min_group_size' => 2,
        //         'short_description' => 'Premium Manasalu Base Camp trek experience.',
        //         'description' => 'Luxury variant with private guides, premium accommodations, and all meals included.',
        //         'is_default' => false,
        //         'is_active' => true,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);


        $products = Package::all();

        $imageFiles = [
            'one.jpg',
            'two.jpg',
            'three.jpg',
            'four.jpg',
            'five.jpg',
            'six.jpg',
            'seven.jpg',
            'eight.jpg',
            'nine.jpg',
            'ten.jpg',
            'eleven.jpg',
            'twelve.jpg',
            'thirteen.jpg',
            'fourteen.jpg'
        ];

        foreach ($products as $product) {
            foreach ($imageFiles as $index => $file) {
                DB::table('images')->insert([
                    'imageable_id' => $product->id,
                    'imageable_type' => Package::class,
                    'image_url' => $file,
                    'is_primary' => $index === 0 ? true : false, // first image is primary
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // // Insert images for each variant of this product
        // $productVariants = Variant::all();
        // foreach ($productVariants as $variant) {
        //     foreach ($imageFiles as $index => $file) {
        //         DB::table('images')->insert([
        //             'imageable_id' => $variant->id,
        //             'imageable_type' => Variant::class,
        //             'image_url' => $file,
        //             'is_primary' => $index === 0 ? true : false,
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]);
        //     }
        // }

        // $variant = DB::table('variants')
        //     ->join('packages', 'variants.package_id', '=', 'packages.id')
        //     ->select(
        //         'variants.id as variant_id',
        //         'variants.variation_name',
        //         'packages.title as package_title'
        //     )
        //     ->first();

        // if (!$variant) {
        //     $this->command->warn('No variant/package found.');
        //     return;
        // }


        $package = Package::first();

        $description = $package->title;

        DB::table('departures')->insert([
            [
                'type' => 'fixed',
                'description' => $description,
                'package_id' => 1,
                'start_date' => Carbon::now()->addDays(30),
                'end_date' => Carbon::now()->addDays(45),
                'max_capacity' => 15,
                'current_occupancy' => 5,
                'status' => 'open',
                'cutoff_date' => Carbon::now()->addDays(25),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'fixed',
                'description' => $description,
                // 'variant_id' => $package->variant_id,
                'package_id' => 1,
                'start_date' => Carbon::now()->addDays(60),
                'end_date' => Carbon::now()->addDays(75),
                'max_capacity' => 12,
                'current_occupancy' => 12,
                'status' => 'full',
                'cutoff_date' => Carbon::now()->addDays(55),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'custom',
                'description' => $description,
                // 'variant_id' => $package->variant_id,
                'package_id' => 1,
                //
                'start_date' => Carbon::now()->addDays(90),
                'end_date' => Carbon::now()->addDays(105),
                'max_capacity' => 8,
                'current_occupancy' => 2,
                'status' => 'guaranteed',
                'cutoff_date' => Carbon::now()->addDays(85),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);



        $packages = Package::all(); // all packages

        foreach ($packages as $package) {

            // --- Itineraries (Day 1 to Day 4) ---
            for ($day = 1; $day <= 4; $day++) {
                $itinerary = Itinerary::create([
                    'package_id' => $package->id,
                    'day_number' => $day,
                    'title' => "Day {$day} - Example Title",
                    'description' => "This is the itinerary description for day {$day}.",
                    'extra_notes' => "Optional notes for day {$day}.",
                ]);

                // --- 3 Images per itinerary ---
                for ($img = 1; $img <= 3; $img++) {
                    Image::create([
                        'imageable_id' => $itinerary->id,
                        'imageable_type' => Itinerary::class,
                        'image_url' => "one.jpg",
                        'is_primary' => $img === 1 ? true : false,
                    ]);
                }
            }

            // --- 4 FAQs per package ---
            for ($faq = 1; $faq <= 4; $faq++) {
                Faq::create([
                    'package_id' => $package->id,
                    'question' => "FAQ Question {$faq} for package {$package->title}",
                    'answer' => "This is the answer for FAQ {$faq} of package {$package->title}.",
                    'is_active' => true,
                    'sort_order' => $faq,
                ]);
            }
        }


        $sampleCostData = [
            'includes' => [
                "Bed and accommodation (tea houses along the trek)",
                "All meals during the trek (breakfast, lunch, dinner)",
                "Experienced trekking guide",
                "Porter service (2:1 ratio)",
                "All necessary permits and fees",
                "Airport pick-up and drop-off",
            ],
            'excludes' => [
                "International airfare",
                "Nepal visa fees",
                "Travel insurance",
                "Personal expenses (laundry, phone calls, etc.)",
                "Meals in Kathmandu",
                "Tips for guides and porters",
                "Emergency evacuation costs",
                "Items not included in the 'Cost Includes' section",
            ],
        ];

        // Loop through all packages
        Package::all()->each(function ($package) use ($sampleCostData) {

            // Insert inclusions
            foreach ($sampleCostData['includes'] as $index => $description) {
                PackageCostClause::create([
                    'package_id' => $package->id,
                    'type' => 'inclusion',
                    'description' => $description,
                    'sort_order' => $index,
                ]);
            }

            // Insert exclusions
            foreach ($sampleCostData['excludes'] as $index => $description) {
                PackageCostClause::create([
                    'package_id' => $package->id,
                    'type' => 'exclusion',
                    'description' => $description,
                    'sort_order' => $index,
                ]);
            }
        });

        $this->command->info('Package cost clauses seeded successfully!');
    }
}
