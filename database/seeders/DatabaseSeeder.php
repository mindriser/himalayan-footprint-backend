<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Faq;
use App\Models\Image;
use App\Models\Itinerary;
use App\Models\Package;
use App\Models\PackageCostClause;
use App\Models\Team;
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


        DB::table('categories')->insert([
            [
                'name' => 'trek',
                'slug' => 'trek',
                "show_in_navbar" => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'tour',
                'slug' => 'tour',
                "show_in_navbar" => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'travel and tour',
                'slug' => 'travel-tour',
                "show_in_navbar" => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);


        DB::table('packages')->insert([
            [
                "badge" => "cultural",
                'category_id' => 2,
                'title' => 'LumbiniVisit',
                'slug' => Str::slug('Lumbini Visit'),
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
                // 'old_single_price' => 1500.00,
                // 'new_single_price' => 1200.00,
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "badge" => "wildlife",
                'category_id' => 2,
                'title' => 'Chitwan Visit',
                'slug' => Str::slug('Chitwan Visit'),
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
                // 'old_single_price' => 1500.00,
                // 'new_single_price' => 1200.00,
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                "badge" => "adventure",
                'category_id' => 1,
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
                // 'old_single_price' => 1500.00,
                // 'new_single_price' => 1200.00,
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "badge" => "adventure",

                'category_id' => 3,
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

                // 'old_single_price' => 600.00,
                // 'new_single_price' => 500.00,
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "badge" => "adventure",

                'category_id' => 1,
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

                // 'old_single_price' => 700.00,
                // 'new_single_price' => 600.00,
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "badge" => "adventure",

                'category_id' => 1,
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

                // 'old_single_price' => 1800.00,
                // 'new_single_price' => 1500.00,
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "badge" => "adventure",

                'category_id' => 1,
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

                // 'old_single_price' => 2500.00,
                // 'new_single_price' => 2200.00,
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "badge" => "adventure",

                'category_id' => 1,
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

                // 'old_single_price' => 350.00,
                // 'new_single_price' => 300.00,
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "badge" => "adventure",

                'category_id' => 1,
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

                // 'old_single_price' => 2000.00,
                // 'new_single_price' => 1700.00,
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "badge" => "adventure",

                'category_id' => 1,
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

                // 'old_single_price' => 800.00,
                // 'new_single_price' => 700.00,
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

        // DB::table('departures')->insert([
        //     [
        //         'type' => 'fixed',
        //         'description' => $description,
        //         'package_id' => 1,
        //         'start_date' => Carbon::now()->addDays(30),
        //         'end_date' => Carbon::now()->addDays(45),
        //         'max_capacity' => 15,
        //         'current_occupancy' => 5,
        //         'status' => 'open',
        //         'cutoff_date' => Carbon::now()->addDays(25),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'type' => 'fixed',
        //         'description' => $description,
        //         'package_id' => 1,
        //         'start_date' => Carbon::now()->addDays(60),
        //         'end_date' => Carbon::now()->addDays(75),
        //         'max_capacity' => 12,
        //         'current_occupancy' => 12,
        //         'status' => 'full',
        //         'cutoff_date' => Carbon::now()->addDays(55),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'type' => 'custom',
        //         'description' => $description,
        //         'package_id' => 1,
        //         'start_date' => Carbon::now()->addDays(90),
        //         'end_date' => Carbon::now()->addDays(105),
        //         'max_capacity' => 8,
        //         'current_occupancy' => 2,
        //         'status' => 'guaranteed',
        //         'cutoff_date' => Carbon::now()->addDays(85),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);


        $description = 'Sample departure description';

        $departures = [];

        $baseStartDate = Carbon::now()->addMonth(); // first departure 1 month from now

        for ($i = 0; $i < 30; $i++) {

            $startDate = $baseStartDate->copy()->addMonths($i);
            $endDate = $startDate->copy()->addDays(15); // 15 day trip
            $cutoffDate = $startDate->copy()->subDays(5);

            $maxCapacity = rand(8, 20);
            $currentOccupancy = rand(0, $maxCapacity);

            // Auto determine status
            $status = 'open';
            if ($currentOccupancy >= $maxCapacity) {
                $status = 'full';
            } elseif ($currentOccupancy >= ($maxCapacity * 0.7)) {
                $status = 'guaranteed';
            }

            $departures[] = [
                'type' => rand(0, 1) ? 'fixed' : 'custom',
                'description' => $description,
                'package_id' => 1,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'max_capacity' => $maxCapacity,
                'current_occupancy' => $currentOccupancy,
                'status' => $status,
                'cutoff_date' => $cutoffDate,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('departures')->insert($departures);


        $departments = [
            'guide' => [
                'Senior Guide',
                'Assistant Guide',
                'Mountain Guide',
                'Trekking Guide',
            ],
            'marketing' => [
                'Marketing Executive',
                'SEO Specialist',
                'Content Manager',
                'Sales Executive',
            ],
            'leaders' => [
                'Expedition Leader',
                'Team Leader',
                'Operations Head',
                'Field Coordinator',
            ],
        ];

        foreach ($departments as $department => $designations) {
            foreach ($designations as $index => $designation) {
                Team::create([
                    'name' => ucfirst($department) . ' Member ' . ($index + 1),
                    'image' => 'johnDoe.png',
                    'designation' => $designation,
                    'department' => $department,
                    'contact' => '+100000000' . $index,
                    'description' => $designation . ' in the ' . ucfirst($department) . ' department.',
                ]);
            }
        }



        $packages = Package::all(); // all packages

        foreach ($packages as $package) {

            // --- Itineraries (Day 1 to Day 4) ---
            for ($day = 1; $day <= 4; $day++) {
                $itinerary = Itinerary::create([
                    'package_id' => $package->id,
                    'day_number' => $day,
                    'title' => "What is included in the 4-day package, and are there any additional costs I should be aware of?",
                    'description' => "<p><strong>Our 4-day package includes:</strong></p> <ul> <li>✔️ Accommodation for 3 nights in a 3-star or equivalent hotel</li> <li>✔️ Daily breakfast</li> <li>✔️ All ground transportation during the tour</li> <li>✔️ Guided sightseeing as mentioned in the itinerary</li> <li>✔️ All government taxes and service charges</li> </ul> <p><strong>Not Included:</strong></p> <ul> <li>❌ International or domestic flights</li> <li>❌ Personal expenses (laundry, phone calls, tips, etc.)</li> <li>❌ Travel insurance</li> <li>❌ Entry fees not specifically mentioned in the itinerary</li> </ul> <p><em>Please review the “Extra Notes” section for each day in the itinerary for any optional activities that may require additional payment.</em></p> <p>If you would like a fully customized quote including flights and optional add-ons, feel free to contact us.</p>",
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



        $packageIds = DB::table('packages')->pluck('id');

        if ($packageIds->isEmpty()) {
            $this->command->warn('No packages found. Please seed packages first.');
            return;
        }

        $reviews = [
            [
                'reviewer_name'  => 'Sarah Johnson',
                'reviewer_image' => null,
                'title'          => 'Absolutely Breathtaking Experience',
                'description'    => '<p>This was the trip of a lifetime! Every detail was perfectly organized and the guides were incredibly knowledgeable. I couldn\'t have asked for a better experience in the Himalayas.</p>',
                'rating'         => 5,
                'review_date'    => '2024-11-15',
                'is_featured'    => true,
            ],
            [
                'reviewer_name'  => 'Michael Chen',
                'reviewer_image' => null,
                'title'          => 'Great Value for Money',
                'description'    => '<p>Excellent package at a very reasonable price. The accommodations were comfortable and the itinerary was well-balanced between adventure and relaxation. Would highly recommend!</p>',
                'rating'         => 4,
                'review_date'    => '2024-10-22',
                'is_featured'    => true,
            ],
            [
                'reviewer_name'  => 'Emily Rodriguez',
                'reviewer_image' => null,
                'title'          => 'A Journey I Will Never Forget',
                'description'    => '<p>From the moment we landed to our departure, everything was handled professionally. The local guides really made the difference — their stories and passion for the culture were inspiring.</p>',
                'rating'         => 5,
                'review_date'    => '2024-09-10',
                'is_featured'    => true,
            ],
            [
                'reviewer_name'  => 'David Thompson',
                'reviewer_image' => null,
                'title'          => 'Good Trip, Minor Hiccups',
                'description'    => '<p>Overall a wonderful experience. There were a couple of small logistical issues along the way but the team handled them quickly. The scenery was absolutely stunning.</p>',
                'rating'         => 4,
                'review_date'    => '2024-08-05',
                'is_featured'    => false,
            ],
            [
                'reviewer_name'  => 'Priya Patel',
                'reviewer_image' => null,
                'title'          => 'Perfect Honeymoon Destination',
                'description'    => '<p>We chose this package for our honeymoon and it exceeded every expectation. The romantic settings, delicious food, and attentive service made it truly special. Thank you!</p>',
                'rating'         => 5,
                'review_date'    => '2024-07-18',
                'is_featured'    => true,
            ],
            [
                'reviewer_name'  => 'James O\'Brien',
                'reviewer_image' => null,
                'title'          => 'Solid Adventure Package',
                'description'    => '<p>As an avid trekker, I was impressed by how well the difficulty level was communicated upfront. The trail conditions matched the description perfectly. Will be booking again next year.</p>',
                'rating'         => 4,
                'review_date'    => '2024-06-30',
                'is_featured'    => false,
            ],
            [
                'reviewer_name'  => 'Amelia Foster',
                'reviewer_image' => null,
                'title'          => 'Exceeded All Expectations',
                'description'    => '<p>I was a bit nervous travelling solo but the team made me feel safe and welcome throughout. The group was friendly and the pace was perfect. Truly a life-changing trip.</p>',
                'rating'         => 5,
                'review_date'    => '2024-05-12',
                'is_featured'    => false,
            ],
            [
                'reviewer_name'  => 'Liam Nakamura',
                'reviewer_image' => null,
                'title'          => 'Beautiful Scenery, Well Organised',
                'description'    => '<p>The landscapes were jaw-dropping at every turn. Our guide was punctual, friendly, and full of useful tips. The only thing I would change is more free time to explore on our own.</p>',
                'rating'         => 4,
                'review_date'    => '2024-04-20',
                'is_featured'    => false,
            ],
        ];

        $rows = [];

        foreach ($packageIds as $packageId) {
            foreach ($reviews as $review) {
                $rows[] = array_merge($review, [
                    'package_id' => $packageId,
                    'status'=>'approved',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        DB::table('reviews')->insert($rows);


        $packageIds = DB::table('packages')->pluck('id');

        if ($packageIds->count() < 2) {
            $this->command->warn('Need at least 2 packages to create related packages.');
            return;
        }

        $rows = [];

        foreach ($packageIds as $packageId) {
            // Pick 3 other packages as related (or fewer if not enough packages)
            $related = $packageIds
                ->filter(fn($id) => $id !== $packageId)
                ->take(3);

            foreach ($related as $relatedId) {
                $rows[] = [
                    'package_id'         => $packageId,
                    'related_package_id' => $relatedId,
                    'created_at'         => null,
                    'updated_at'         => null,
                ];
            }
        }

        // Avoid duplicate pairs
        $unique = collect($rows)->unique(
            fn($row) =>
            $row['package_id'] . '-' . $row['related_package_id']
        )->values()->toArray();

        DB::table('related_packages')->insert($unique);


        $faqs = [
            [
                'package_id' => null,
                'question' => 'What is the best season for trekking in Nepal?',
                'answer' => 'The best seasons for trekking in Nepal are Spring (March–May) and Autumn (September–November).',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'package_id' => null,
                'question' => 'Do I need a guide for trekking?',
                'answer' => 'While some treks can be done independently, hiring a guide is recommended for safety and local insight.',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'package_id' => null,
                'question' => 'Do I need a permit for trekking?',
                'answer' => 'Yes, certain trekking regions require permits. Popular areas like Annapurna and Everest require TIMS and national park permits.',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'package_id' => null,
                'question' => 'What type of fitness level is required for treks?',
                'answer' => 'Moderate fitness is recommended. Some treks are easier while others require stamina and endurance. Consult the trek description for details.',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'package_id' => null,
                'question' => 'What should I pack for a trek in Nepal?',
                'answer' => 'Essential items include trekking shoes, warm clothing, rain gear, water bottles, snacks, and personal medication. A detailed packing list is usually provided by the trek operator.',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'package_id' => null,
                'question' => 'Is travel insurance necessary?',
                'answer' => 'Yes, travel insurance is highly recommended, especially one that covers trekking and high-altitude emergencies.',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'package_id' => null,
                'question' => 'Are meals included in the trek packages?',
                'answer' => 'Most packages include breakfast, lunch, and dinner at teahouses or lodges along the route. Check the specific package for meal details.',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'package_id' => null,
                'question' => 'Can I customize my trek?',
                'answer' => 'Yes, many operators allow you to customize treks based on duration, difficulty, or specific points of interest.',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'package_id' => null,
                'question' => 'What is the cancellation policy?',
                'answer' => 'Cancellation policies vary by package. Typically, full or partial refunds are provided depending on the notice period. Always check your package terms.',
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'package_id' => null,
                'question' => 'Can solo travelers join a trek?',
                'answer' => 'Absolutely! Solo travelers are welcome. Group treks are often arranged, and single supplements may apply depending on accommodations.',
                'is_active' => true,
                'sort_order' => 10,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }



        DB::table('banners')->insert([
            [
                'title' => 'Explore the Himalayas',
                'label' => 'Adventure Awaits',
                'description' => 'Join our Annapurna Base Camp trek and experience breathtaking Himalayan views.',
                'image_url' => 'one.jpg',
                'redirect_url' => '/destinations/annapurna-base-camp-trek',
                'redirect_label' => 'Book Now',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Visit Lumbini',
                'label' => 'Cultural Tour',
                'description' => 'Discover the birthplace of Buddha with our one-day Lumbini tour.',
                'image_url' => 'two.jpg',
                'redirect_url' => '/destinations/lumbini-visit',
                'redirect_label' => 'Learn More',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Chitwan Safari Adventure',
                'label' => 'Wildlife Experience',
                'description' => 'Enjoy a jungle safari and encounter tigers, rhinos, and elephants in Chitwan.',
                'image_url' => 'three.jpg',
                'redirect_url' => '/destinations/chitwan-visit',
                'redirect_label' => 'Join Now',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Everest Base Camp Trek',
                'label' => 'Ultimate Challenge',
                'description' => 'Reach the roof of the world with our 16-day Everest Base Camp trek.',
                'image_url' => 'four.jpg',
                'redirect_url' => '/destinations/everest-base-camp-trek',
                'redirect_label' => 'Start Adventure',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('blogs')->insert([
            [
                'category' => 'Trekking',
                'title' => 'The Ultimate Guide to Everest Base Camp Trekking',
                'slug' => Str::slug('The Ultimate Guide to Everest Base Camp Trekking'),
                'content' => '<h2>Embarking on the Journey of a Lifetime</h2>
                <p>Standing at the foot of the world\'s highest peak is a dream for many adventurers. The <strong>Everest Base Camp (EBC) trek</strong> is not just a walk; it is a test of endurance, a cultural immersion, and a spiritual awakening. Over the course of 12 to 14 days, you will traverse through the heart of the Khumbu region, passing through Sherpa villages that seem frozen in time.</p>
                <h3>Preparation and Physical Fitness</h3>
                <p>You don\'t need to be a professional athlete, but you do need stamina. We recommend at least 3 months of cardiovascular training. Focus on hiking with a weighted pack, stair climbing, and leg strength. Remember, the air gets thin above 4,000 meters, so your heart needs to be ready to work harder.</p>
                <ul>
                    <li><strong>Acclimatization:</strong> Never skip rest days in Namche Bazaar and Dingboche.</li>
                    <li><strong>Hydration:</strong> Drink 4-5 liters of water daily to combat altitude sickness.</li>
                    <li><strong>Gear:</strong> Invest in a high-quality down jacket and broken-in trekking boots.</li>
                </ul>
                <h3>The Route and Highlights</h3>
                <p>The journey begins with a thrilling flight to Lukla, often called the most dangerous airport in the world. From there, you descend into the Dudh Koshi valley. As you ascend toward Namche Bazaar, the "Gateway to Everest," the landscape shifts from lush forests to alpine scrub. One of the most iconic stops is the Tengboche Monastery, where you can witness monks chanting against a backdrop of Ama Dablam. Finally, reaching Gorak Shep and walking across the Khumbu Glacier to the prayer-flag-strewn Base Camp provides a sense of achievement unlike any other. The view from Kala Patthar at sunrise, where Everest turns gold, is the literal high point of the trip.</p>
                <p>In conclusion, respect the mountains, listen to your guide, and take plenty of photos. The Himalayas have a way of changing you forever.</p>',
                'user_id' => 1,
                'image_url' => 'one.jpg',
                'readingTime' => '5 min',
                'is_published' => true,
                'initial_view_count' => 500,
                'view_count' => 1250,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Culture',
                'title' => 'Ancient Traditions: The Spirit of Upper Mustang',
                'slug' => Str::slug('Ancient Traditions The Spirit of Upper Mustang'),
                'content' => '<h2>The Forbidden Kingdom Unearthed</h2>
                <p>Upper Mustang, once the <em>Kingdom of Lo</em>, is a high-altitude desert that feels more like Tibet than Nepal. For centuries, this region remained closed to foreigners, preserving a unique form of Buddhism and a way of life that has vanished elsewhere. The landscape is dominated by canyons, red-rock cliffs, and man-made caves that date back thousands of years.</p>
                <h3>The Tiji Festival</h3>
                <p>If you time your visit correctly, you can witness the Tiji Festival in Lo Manthang. This three-day ritual celebrates the victory of good over evil. Monks dressed in elaborate costumes and masks perform sacred dances in the palace square. The sound of long horns (dungchen) and drums echoes through the walled city, creating an atmosphere of ancient mystery.</p>
                <p><strong>Living History:</strong> The people of Mustang, known as Loba, still follow the Sky Burial traditions in some remote pockets, though the practice is becoming rarer. Their houses are built of whitewashed mud-bricks with firewood stacked neatly on the roofs—a sign of wealth in a land where trees are scarce.</p>
                <h3>Architecture and Sky Caves</h3>
                <p>One of the greatest mysteries of the Himalayas is the "Sky Caves" of Mustang. These are thousands of man-made holes dug into the sides of sheer cliffs. Archeologists have found mummified remains, ancient manuscripts, and murals inside. Some were used as burial chambers, while others served as meditation retreats or defensive hideouts during times of war. Walking through the narrow alleys of Lo Manthang, you feel the weight of history in every stone. It is a place where the modern world feels like a distant memory, and the desert wind tells stories of kings and caravans.</p>',
                'user_id' => 1,
                'image_url' => 'one.jpg',
                'readingTime' => '5 min',
                'is_published' => true,
                'initial_view_count' => 300,
                'view_count' => 840,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Wildlife',
                'title' => 'Deep in the Jungle: A Safari in Chitwan National Park',
                'slug' => Str::slug('Deep in the Jungle A Safari in Chitwan National Park'),
                'content' => '<h2>Where the Wild Things Are</h2>
                <p>Nepal is famous for its mountains, but its southern plains (the Terai) hold a different kind of magic. <strong>Chitwan National Park</strong>, a UNESCO World Heritage site, is one of the best places in Asia for wildlife viewing. Here, the dense Sal forests and tall elephant grass hide some of the world\'s most endangered species.</p>
                <h3>The Big Three: Rhino, Tiger, and Gharial</h3>
                <p>The star of the show is the One-Horned Rhinoceros. Thanks to successful conservation efforts, sightings are almost guaranteed. However, the Royal Bengal Tiger remains elusive, a "ghost of the jungle" that only the lucky few encounter. Along the Rapti River, you can spot the Gharial crocodile, a prehistoric-looking creature with a long, thin snout, sunning itself on the banks.</p>
                <ul>
                    <li><strong>Jeep Safari:</strong> The most efficient way to cover large distances and reach the core areas.</li>
                    <li><strong>Canoe Rides:</strong> A peaceful way to birdwatch and see crocodiles up close.</li>
                    <li><strong>Nature Walks:</strong> For the brave, walking through the jungle with a trained naturalist offers the ultimate thrill.</li>
                </ul>
                <h3>Conservation and Community</h3>
                <p>What makes Chitwan special is the involvement of the local Tharu community. Once the only inhabitants of these malaria-prone jungles, the Tharu people now manage "Buffer Zones." A portion of park entrance fees goes directly to local schools and hospitals. When you visit a Tharu village, you aren\'t just a tourist; you are contributing to a sustainable ecosystem where humans and tigers coexist. Whether you are watching the sunset over the river or listening to the alarm call of a spotted deer, Chitwan reminds us of the delicate balance of nature. It is a must-visit for anyone looking to see the greener side of Nepal.</p>',
                'user_id' => 1,
                'image_url' => 'one.jpg',
                'readingTime' => '5 min',
                'is_published' => true,
                'initial_view_count' => 250,
                'view_count' => 600,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Safety',
                'title' => 'Altitude Sickness: Prevention and Treatment',
                'slug' => Str::slug('Altitude Sickness Prevention and Treatment'),
                'content' => '<h2>Understanding the Thin Air</h2>
                <p>Acute Mountain Sickness (AMS) is the primary concern for anyone trekking above 2,500 meters. In the Himalayas, where trails often cross 5,000 meters, understanding AMS is not just helpful—it is vital for survival. AMS occurs because the body hasn\'t had enough time to adapt to the lower oxygen levels at high altitudes.</p>
                <h3>Early Warning Signs</h3>
                <p>It starts subtly. You might feel a dull headache, a loss of appetite, or difficulty sleeping. Many trekkers dismiss these as fatigue, but that is a dangerous mistake. If a headache persists after taking aspirin and drinking water, you must assume it is altitude-related.</p>
                <ol>
                    <li><strong>Mild Symptoms:</strong> Dizziness, fatigue, shortness of breath upon exertion.</li>
                    <li><strong>Severe Symptoms (HAPE/HACE):</strong> Extreme breathlessness even at rest, confusion, loss of coordination (ataxia), and a persistent cough producing frothy spit. These are medical emergencies.</li>
                </ol>
                <h3>The Golden Rules of Prevention</h3>
                <p>The best treatment for altitude sickness is prevention. The "Golden Rule" is to never ascend more than 300-500 meters of <em>sleeping altitude</em> per day once you pass 3,000 meters. Follow the "climb high, sleep low" philosophy: hike to a higher point during the day but return to a lower elevation to sleep. Avoid alcohol and tobacco, as they dehydrate the body and mask symptoms. Many guides recommend <strong>Diamox (Acetazolamide)</strong>, which helps the body acclimatize faster, but you should consult a doctor before using it. Most importantly, if symptoms worsen, the only cure is descent. Never, ever go higher if you are feeling unwell. The mountain will always be there, but your health is irreplaceable.</p>',
                'user_id' => 1,
                'image_url' => 'one.jpg',
                'readingTime' => '5 min',
                'is_published' => true,
                'initial_view_count' => 600,
                'view_count' => 2100,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Photography',
                'title' => 'Landscape Photography Tips for the Himalayas',
                'slug' => Str::slug('Landscape Photography Tips for the Himalayas'),
                'content' => '<h2>Capturing the Scale of Giants</h2>
                <p>The Himalayas are perhaps the most photogenic mountains on Earth, but they are also the most challenging to shoot. The sheer scale can be overwhelming, making your photos look flat or small. To truly capture the majesty of the peaks, you need to think about composition, lighting, and gear protection.</p>
                <h3>Working with Light</h3>
                <p>The "Golden Hour"—the first hour after sunrise and the last hour before sunset—is your best friend. In the mountains, this light is even more dramatic because of the shadows cast by the ridges. Use a tripod to keep your ISO low and your images sharp. During the middle of the day, the sun can be very harsh, blowing out the whites of the snow. Use a <strong>Circular Polarizer</strong> to cut glare and make the blue sky pop against the white peaks.</p>
                <h3>Compositional Techniques</h3>
                <p>Don\'t just point your camera at the mountain. Find a "leading line"—a winding path, a river, or a row of prayer flags—to lead the viewer\'s eye into the frame. Including a human element, like a lone trekker or a yak caravan, provides a sense of scale. Without a person or a house for reference, it is hard for the viewer to realize that the mountain they are looking at is 8,000 meters high.</p>
                <p><strong>Gear Maintenance:</strong> Cold weather drains batteries incredibly fast. Keep your spare batteries in an inside pocket close to your body heat. Also, be careful when moving from the cold outdoors into a warm teahouse; condensation can form inside your lens. Place your camera in a sealed plastic bag before entering to let it warm up gradually. With patience and these techniques, you\'ll return home with a portfolio that does justice to the Royal Himalayan Footprint.</p>',
                'user_id' => 1,
                'image_url' => 'one.jpg',
                'readingTime' => '5 min',
                'is_published' => true,
                'initial_view_count' => 400,
                'view_count' => 1100,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Adventure',
                'title' => 'Beyond the Trails: Mountain Biking in Nepal',
                'slug' => Str::slug('Beyond the Trails Mountain Biking in Nepal'),
                'content' => '<h2>Two Wheels, One Adventure</h2>
                <p>While trekking is the traditional way to see Nepal, mountain biking is fast becoming the preferred choice for adrenaline junkies. The country\'s rugged topography offers everything from technical single-tracks to wide, sweeping jeep trails. From the outskirts of Kathmandu to the high-altitude plateaus of Mustang, the variety is endless.</p>
                <h3>Top Biking Destinations</h3>
                <p>The <strong>Annapurna Circuit</strong> is now a world-class biking destination. What used to be a 21-day trek can now be biked in about 10-12 days. The descent from Thorong La Pass (5,416m) down to Muktinath is one of the longest and most exhilarating descents in the world. For those looking for something closer to the capital, the Kathmandu Valley rim offers trails like Helambu and Nagarkot, providing steep climbs and rewarding views of the Langtang range.</p>
                <p><strong>Technical Challenges:</strong> Biking in the Himalayas requires more than just fitness; it requires bike handling skills. You will encounter loose gravel, stream crossings, and suspension bridges. It is essential to have a high-quality mountain bike with good hydraulic disc brakes and front or full suspension.</p>
                <h3>Why Bike?</h3>
                <p>Biking allows you to cover more ground than trekking, meaning you see more villages and more landscapes in a shorter time. It also changes how locals perceive you; a cyclist is often greeted with even more curiosity and enthusiasm than a trekker. Whether you are grinding up a 10% grade or flying down a forest trail, mountain biking in Nepal is a physical and mental challenge that rewards you with the most spectacular views on the planet. Just remember: always wear a helmet, and watch out for the yaks!</p>',
                'user_id' => 1,
                'image_url' => 'one.jpg',
                'readingTime' => '5 min',
                'is_published' => true,
                'initial_view_count' => 150,
                'view_count' => 420,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Adventure1 ',
                'title' => 'Beyond the Trails: Mountain Biking in Nepal 1',
                'slug' => Str::slug('Beyond the Trails Mountain Biking in Nepal 1'),
                'content' => '<h2>Two Wheels, One Adventure</h2>
                <p>While trekking is the traditional way to see Nepal, mountain biking is fast becoming the preferred choice for adrenaline junkies. The country\'s rugged topography offers everything from technical single-tracks to wide, sweeping jeep trails. From the outskirts of Kathmandu to the high-altitude plateaus of Mustang, the variety is endless.</p>
                <h3>Top Biking Destinations</h3>
                <p>The <strong>Annapurna Circuit</strong> is now a world-class biking destination. What used to be a 21-day trek can now be biked in about 10-12 days. The descent from Thorong La Pass (5,416m) down to Muktinath is one of the longest and most exhilarating descents in the world. For those looking for something closer to the capital, the Kathmandu Valley rim offers trails like Helambu and Nagarkot, providing steep climbs and rewarding views of the Langtang range.</p>
                <p><strong>Technical Challenges:</strong> Biking in the Himalayas requires more than just fitness; it requires bike handling skills. You will encounter loose gravel, stream crossings, and suspension bridges. It is essential to have a high-quality mountain bike with good hydraulic disc brakes and front or full suspension.</p>
                <h3>Why Bike?</h3>
                <p>Biking allows you to cover more ground than trekking, meaning you see more villages and more landscapes in a shorter time. It also changes how locals perceive you; a cyclist is often greeted with even more curiosity and enthusiasm than a trekker. Whether you are grinding up a 10% grade or flying down a forest trail, mountain biking in Nepal is a physical and mental challenge that rewards you with the most spectacular views on the planet. Just remember: always wear a helmet, and watch out for the yaks!</p>',
                'user_id' => 1,
                'image_url' => 'one.jpg',
                'readingTime' => '5 min',
                'is_published' => true,
                'initial_view_count' => 150,
                'view_count' => 420,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Adventure 2',
                'title' => 'Beyond the Trails: Mountain Biking in Nepal 2',
                'slug' => Str::slug('Beyond the Trails Mountain Biking in Nepal 2'),
                'content' => '<h2>Two Wheels, One Adventure</h2>
                <p>While trekking is the traditional way to see Nepal, mountain biking is fast becoming the preferred choice for adrenaline junkies. The country\'s rugged topography offers everything from technical single-tracks to wide, sweeping jeep trails. From the outskirts of Kathmandu to the high-altitude plateaus of Mustang, the variety is endless.</p>
                <h3>Top Biking Destinations</h3>
                <p>The <strong>Annapurna Circuit</strong> is now a world-class biking destination. What used to be a 21-day trek can now be biked in about 10-12 days. The descent from Thorong La Pass (5,416m) down to Muktinath is one of the longest and most exhilarating descents in the world. For those looking for something closer to the capital, the Kathmandu Valley rim offers trails like Helambu and Nagarkot, providing steep climbs and rewarding views of the Langtang range.</p>
                <p><strong>Technical Challenges:</strong> Biking in the Himalayas requires more than just fitness; it requires bike handling skills. You will encounter loose gravel, stream crossings, and suspension bridges. It is essential to have a high-quality mountain bike with good hydraulic disc brakes and front or full suspension.</p>
                <h3>Why Bike?</h3>
                <p>Biking allows you to cover more ground than trekking, meaning you see more villages and more landscapes in a shorter time. It also changes how locals perceive you; a cyclist is often greeted with even more curiosity and enthusiasm than a trekker. Whether you are grinding up a 10% grade or flying down a forest trail, mountain biking in Nepal is a physical and mental challenge that rewards you with the most spectacular views on the planet. Just remember: always wear a helmet, and watch out for the yaks!</p>',
                'user_id' => 1,
                'image_url' => 'one.jpg',
                'readingTime' => '5 min',
                'is_published' => true,
                'initial_view_count' => 150,
                'view_count' => 420,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Adventure3',
                'title' => 'Beyond the Trails: Mountain Biking in Nepal3 ',
                'slug' => Str::slug('Beyond the Trails Mountain Biking in Nepal 3 '),
                'content' => '<h2>Two Wheels, One Adventure</h2>
                <p>While trekking is the traditional way to see Nepal, mountain biking is fast becoming the preferred choice for adrenaline junkies. The country\'s rugged topography offers everything from technical single-tracks to wide, sweeping jeep trails. From the outskirts of Kathmandu to the high-altitude plateaus of Mustang, the variety is endless.</p>
                <h3>Top Biking Destinations</h3>
                <p>The <strong>Annapurna Circuit</strong> is now a world-class biking destination. What used to be a 21-day trek can now be biked in about 10-12 days. The descent from Thorong La Pass (5,416m) down to Muktinath is one of the longest and most exhilarating descents in the world. For those looking for something closer to the capital, the Kathmandu Valley rim offers trails like Helambu and Nagarkot, providing steep climbs and rewarding views of the Langtang range.</p>
                <p><strong>Technical Challenges:</strong> Biking in the Himalayas requires more than just fitness; it requires bike handling skills. You will encounter loose gravel, stream crossings, and suspension bridges. It is essential to have a high-quality mountain bike with good hydraulic disc brakes and front or full suspension.</p>
                <h3>Why Bike?</h3>
                <p>Biking allows you to cover more ground than trekking, meaning you see more villages and more landscapes in a shorter time. It also changes how locals perceive you; a cyclist is often greeted with even more curiosity and enthusiasm than a trekker. Whether you are grinding up a 10% grade or flying down a forest trail, mountain biking in Nepal is a physical and mental challenge that rewards you with the most spectacular views on the planet. Just remember: always wear a helmet, and watch out for the yaks!</p>',
                'user_id' => 1,
                'image_url' => 'one.jpg',
                'readingTime' => '5 min',
                'is_published' => true,
                'initial_view_count' => 150,
                'view_count' => 420,
                'is_featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $blogs = Blog::pluck('id')->toArray();
        $packages = Package::pluck('id')->toArray();

        foreach ($blogs as $blogId) {

            // ----- Related Blogs -----
            $relatedBlogs = collect($blogs)
                ->reject(fn($id) => $id == $blogId)
                ->shuffle()
                ->take(5);

            foreach ($relatedBlogs as $relatedId) {
                DB::table('related_blogs')->insertOrIgnore([
                    'blog_id' => $blogId,
                    'related_blog_id' => $relatedId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // ----- Related Packages -----
            $relatedPackages = collect($packages)
                ->shuffle()
                ->take(5);

            foreach ($relatedPackages as $packageId) {
                DB::table('blog_packages')->insertOrIgnore([
                    'blog_id' => $blogId,
                    'package_id' => $packageId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        DB::table('contacts')->insert([

            [
                'type' => 'info',
                'service' => 'phone',
                'value' => '+9779812345678',
                'label' => 'Phone',
                'sub' => 'Primary contact number',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'type' => 'info',
                'service' => 'office',
                'value' => '+977014567890',
                'label' => 'Office Phone',
                'sub' => 'Office contact line',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'type' => 'info',
                'service' => 'whatsapp',
                'value' => '+9779812345678',
                'label' => 'WhatsApp',
                'sub' => 'Quick replies on WhatsApp',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'type' => 'info',
                'service' => 'viber',
                'value' => '+9779812345678',
                'label' => 'Viber',
                'sub' => 'Chat with us on Viber',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'type' => 'info',
                'service' => 'email',
                'value' => 'info@example.com',
                'label' => 'Email',
                'sub' => 'We usually reply within 1 hour',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'type' => 'social',
                'service' => 'facebook',
                'value' => 'https://facebook.com/yourpage',
                'label' => 'Facebook',
                'sub' => 'Follow us on Facebook',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'type' => 'social',
                'service' => 'instagram',
                'value' => 'https://instagram.com/yourpage',
                'label' => 'Instagram',
                'sub' => 'Follow us on Instagram',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'type' => 'social',
                'service' => 'youtube',
                'value' => 'https://youtube.com/@yourchannel',
                'label' => 'YouTube',
                'sub' => 'Watch our videos',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'type' => 'social',
                'service' => 'tiktok',
                'value' => 'https://tiktok.com/@yourpage',
                'label' => 'TikTok',
                'sub' => 'Fun short videos',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'type' => 'social',
                'service' => 'tripadvisor',
                'value' => 'https://tripadvisor.com/yourbusiness',
                'label' => 'Trip Advisor',
                'sub' => 'Check our reviews',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'type' => 'info',
                'service' => 'google_map_link',
                'value' => 'https://maps.google.com/?q=Kathmandu',
                'label' => 'Google Map Link',
                'sub' => 'View on Google Maps',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'type' => 'info',
                'service' => 'google_map_embed_link',
                'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450"></iframe>',
                'label' => 'Google Map Embed',
                'sub' => 'Embedded location for website',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

         DB::table('instagram_posts')->insert([
            [
                'photo_url' => 'one.jpg',
                'instagram_link' => 'https://instagram.com/p/post1',
                'caption' => 'Sunrise view from Everest Base Camp.',
                'location' => 'Everest Base Camp',
                'likes_count' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'one.jpg',
                'instagram_link' => 'https://instagram.com/p/post2',
                'caption' => 'Exploring the peaceful trails of Annapurna.',
                'location' => 'Annapurna Region',
                'likes_count' => 165,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'one.jpg',
                'instagram_link' => 'https://instagram.com/p/post3',
                'caption' => 'Prayer flags dancing in the Himalayan wind.',
                'location' => 'Namche Bazaar',
                'likes_count' => 172,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'one.jpg',
                'instagram_link' => 'https://instagram.com/p/post4',
                'caption' => 'Golden sunset over the Langtang valley.',
                'location' => 'Langtang',
                'likes_count' => 143,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'one.jpg',
                'instagram_link' => 'https://instagram.com/p/post5',
                'caption' => 'Crossing suspension bridges in the Himalayas.',
                'location' => 'Everest Region',
                'likes_count' => 188,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'one.jpg',
                'instagram_link' => 'https://instagram.com/p/post6',
                'caption' => 'Yak caravans along the mountain trails.',
                'location' => 'Manang',
                'likes_count' => 160,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'one.jpg',
                'instagram_link' => 'https://instagram.com/p/post7',
                'caption' => 'Morning coffee with a Himalayan view.',
                'location' => 'Pokhara',
                'likes_count' => 175,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'one.jpg',
                'instagram_link' => 'https://instagram.com/p/post8',
                'caption' => 'Adventure begins on the trail.',
                'location' => 'Mardi Himal',
                'likes_count' => 190,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);



        $this->command->info('Package cost clauses seeded successfully!');
    }
}
