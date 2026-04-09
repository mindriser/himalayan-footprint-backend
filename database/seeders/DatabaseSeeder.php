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
            'email' => 'tamangsagar70@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('Pa$$word1$'),
        ]);

        User::factory()->create([
            'name' => 'mangaer User',
            'email' => 'dev.sagartmg@gmail.com',
            'role' => 'manager',
            'password' => Hash::make('Pa$$word1$'),
        ]);

        User::factory()->create([
            'name' => 'Blog User',
            'email' => 'raisugam224@gmail.com',
            'role' => 'content_writer',
            'password' => Hash::make('fjCgkU8LfRuz'),
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'Trekking',
                'slug' => 'trekking',
                'show_in_navbar' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tours',
                'slug' => 'tours',
                'show_in_navbar' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'show_in_navbar' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);


        DB::table('packages')->insert([
            [
                "badge" => "cultural",
                'category_id' => 2,
                'title' => 'Lumbini Visit',
                'slug' => Str::slug('Lumbini Visit'),
                'short_description' => 'A spiritual journey to the birthplace of Lord Buddha.',
                'description' => 'Explore Lumbini, the birthplace of Lord Buddha and one of the most sacred pilgrimage sites in the world. Visit Maya Devi Temple, Ashoka Pillar, peaceful monasteries, and immerse yourself in Nepal’s spiritual heritage.',
                'destination' => 'Lumbini',
                'duration_label' => '3 days',
                'difficulty' => 'easy',
                'max_elevation' => '150m',
                'best_time' => 'All year',
                'is_featured' => true,
                'is_popular' => true,
                'is_active' => true,
                'old_group_price' => 300.00,
                'new_group_price' => 250.00,
                'activities' => 'Temple visits, Cultural exploration',
                'accomodations' => '3-star hotel',
                'meals' => 'Breakfast included',
                'is_luxury' => false,
                'meta_title' => 'Lumbini Tour Package',
                'meta_description' => 'Spiritual tour to Lumbini, birthplace of Lord Buddha.',
                'meta_keywords' => 'Lumbini, Buddha, Nepal tour',
                'max_people_per_trip' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                "badge" => "wildlife",
                'category_id' => 2,
                'title' => 'Chitwan Visit',
                'slug' => Str::slug('Chitwan Visit'),
                'short_description' => 'Wildlife safari in Nepal’s most famous national park.',
                'description' => 'Enjoy jeep safari, canoe rides, bird watching, and Tharu cultural experiences in Chitwan National Park. Spot rhinos, crocodiles, deer, and if lucky, the Bengal tiger.',
                'destination' => 'Chitwan',
                'duration_label' => '3 days',
                'difficulty' => 'easy',
                'max_elevation' => '415m',
                'best_time' => 'Oct-Mar',
                'is_featured' => true,
                'is_popular' => true,
                'is_active' => true,
                'old_group_price' => 350.00,
                'new_group_price' => 300.00,
                'activities' => 'Safari, Canoeing, Cultural dance',
                'accomodations' => 'Jungle resort',
                'meals' => 'All meals included',
                'is_luxury' => true,
                'meta_title' => 'Chitwan Jungle Safari Tour',
                'meta_description' => 'Wildlife safari tour in Chitwan National Park.',
                'meta_keywords' => 'Chitwan, safari, Nepal',
                'max_people_per_trip' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                "badge" => "adventure",
                'category_id' => 1,
                'title' => 'Annapurna Base Camp Trek',
                'slug' => Str::slug('Annapurna Base Camp Trek'),
                'short_description' => 'Classic Himalayan trek to Annapurna Base Camp.',
                'description' => 'A beautiful trek through forests, Gurung villages, and alpine landscapes leading to Annapurna Base Camp at 4,130m.',
                'destination' => 'Annapurna Region',
                'duration_label' => '12 days',
                'difficulty' => 'moderate',
                'max_elevation' => '4130m',
                'best_time' => 'Oct-Nov, Mar-May',
                'is_featured' => true,
                'is_popular' => true,
                'is_active' => true,
                'old_group_price' => 1400.00,
                'new_group_price' => 1100.00,
                'activities' => 'Trekking, Sightseeing',
                'accomodations' => 'Teahouses and lodges',
                'meals' => 'Breakfast, Lunch, Dinner',
                'is_luxury' => false,
                'meta_title' => 'Annapurna Base Camp Trek',
                'meta_description' => '12-day trek to Annapurna Base Camp.',
                'meta_keywords' => 'Annapurna, trekking, Nepal',
                'max_people_per_trip' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                "badge" => "adventure",
                'category_id' => 1,
                'title' => 'Ghorepani Poon Hill Trek',
                'slug' => Str::slug('Ghorepani Poon Hill Trek'),
                'short_description' => 'Short scenic trek with sunrise mountain views.',
                'description' => 'Perfect beginner trek with sunrise from Poon Hill and panoramic Annapurna and Dhaulagiri views.',
                'destination' => 'Poon Hill',
                'duration_label' => '5 days',
                'difficulty' => 'easy',
                'max_elevation' => '3210m',
                'best_time' => 'Oct-Nov, Mar-May',
                'is_featured' => true,
                'is_popular' => true,
                'is_active' => true,
                'old_group_price' => 550.00,
                'new_group_price' => 450.00,
                'activities' => 'Trekking, Sunrise',
                'accomodations' => 'Teahouses',
                'meals' => 'Breakfast included',
                'is_luxury' => false,
                'meta_title' => 'Poon Hill Trek',
                'meta_description' => '5-day beginner trek with sunrise views.',
                'meta_keywords' => 'Poon Hill, trek, Nepal',
                'max_people_per_trip' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                "badge" => "adventure",
                'category_id' => 1,
                'title' => 'Helambu Trek',
                'slug' => Str::slug('Helambu Trek'),
                'short_description' => 'Beautiful cultural trek near Kathmandu.',
                'description' => 'A short trek through forests, monasteries, and Tamang villages with mountain scenery close to Kathmandu.',
                'destination' => 'Helambu',
                'duration_label' => '7 days',
                'difficulty' => 'easy',
                'max_elevation' => '3780m',
                'best_time' => 'Sep-Nov, Mar-May',
                'is_featured' => false,
                'is_popular' => false,
                'is_active' => true,
                'old_group_price' => 650.00,
                'new_group_price' => 550.00,
                'activities' => 'Trekking, Culture',
                'accomodations' => 'Guesthouses',
                'meals' => 'Breakfast and Dinner',
                'is_luxury' => false,
                'meta_title' => 'Helambu Trek',
                'meta_description' => '7-day trek near Kathmandu.',
                'meta_keywords' => 'Helambu, trekking, Nepal',
                'max_people_per_trip' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                "badge" => "adventure",
                'category_id' => 1,
                'title' => 'Gokyo Lakes Trek',
                'slug' => Str::slug('Gokyo Lakes Trek'),
                'short_description' => 'Turquoise lakes and Everest panoramic views.',
                'description' => 'A stunning Everest region trek to the beautiful Gokyo Lakes with fewer crowds and breathtaking Himalayan scenery.',
                'destination' => 'Gokyo',
                'duration_label' => '12 days',
                'difficulty' => 'hard',
                'max_elevation' => '5360m',
                'best_time' => 'Mar-May, Sep-Nov',
                'is_featured' => false,
                'is_popular' => true,
                'is_active' => true,
                'old_group_price' => 1700.00,
                'new_group_price' => 1400.00,
                'activities' => 'Trekking, Lake exploration',
                'accomodations' => 'Teahouses',
                'meals' => 'All meals included',
                'is_luxury' => true,
                'meta_title' => 'Gokyo Lakes Trek',
                'meta_description' => '12-day Everest region trek.',
                'meta_keywords' => 'Gokyo, Everest, trekking',
                'max_people_per_trip' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                "badge" => "adventure",
                'category_id' => 1,
                'title' => 'Upper Mustang Trek',
                'slug' => Str::slug('Upper Mustang Trek'),
                'short_description' => 'Explore the hidden kingdom of Mustang.',
                'description' => 'A unique trek through desert-like landscapes, Tibetan culture, caves, monasteries, and the ancient walled city of Lo Manthang.',
                'destination' => 'Upper Mustang',
                'duration_label' => '14 days',
                'difficulty' => 'hard',
                'max_elevation' => '3840m',
                'best_time' => 'Mar-May, Sep-Nov',
                'is_featured' => true,
                'is_popular' => true,
                'is_active' => true,
                'old_group_price' => 1900.00,
                'new_group_price' => 1600.00,
                'activities' => 'Trekking, Cultural exploration',
                'accomodations' => 'Lodges',
                'meals' => 'Breakfast, Lunch, Dinner',
                'is_luxury' => true,
                'meta_title' => 'Upper Mustang Trek',
                'meta_description' => '14-day hidden kingdom trek.',
                'meta_keywords' => 'Mustang, trekking, Nepal',
                'max_people_per_trip' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                "badge" => "adventure",
                'category_id' => 1,
                'title' => 'Rara Lake Trek',
                'slug' => Str::slug('Rara Lake Trek'),
                'short_description' => 'Trek to Nepal’s most beautiful lake.',
                'description' => 'A peaceful trek to the pristine Rara Lake surrounded by forests and mountains in remote western Nepal.',
                'destination' => 'Rara Lake',
                'duration_label' => '7 days',
                'difficulty' => 'moderate',
                'max_elevation' => '2990m',
                'best_time' => 'Sep-Nov, Mar-May',
                'is_featured' => false,
                'is_popular' => false,
                'is_active' => true,
                'old_group_price' => 750.00,
                'new_group_price' => 650.00,
                'activities' => 'Trekking, Lake sightseeing',
                'accomodations' => 'Guesthouses',
                'meals' => 'Breakfast included',
                'is_luxury' => false,
                'meta_title' => 'Rara Lake Trek',
                'meta_description' => '7-day trek to Nepal’s largest lake.',
                'meta_keywords' => 'Rara, trekking, Nepal',
                'max_people_per_trip' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        $products = Package::all();

        $imageFiles = [
            'lumbini-visit.jpg',
            'chitwan-visit.jpg',
            'annapurna-base-camp-trek.jpg',
            'ghorepani-poon-hill-trek.jpg',
            'helambu-trek.jpg',
            'gokyo-lakes-trek.jpg',
            'upper-mustang-trek.jpg',
            'rara-lake-trek.jpg',
            // 'one.jpg',
            'two.jpg',
            'three.jpg',
            'four.jpg',
            'five.jpg',
            'six.jpg',
            // 'seven.jpg',
            // 'eight.jpg',
            // 'nine.jpg',
            // 'ten.jpg',
            // 'eleven.jpg',
            // 'twelve.jpg',
            // 'thirteen.jpg',
            // 'fourteen.jpg'
        ];

        // foreach ($products as $product) {
        //     foreach ($imageFiles as $index => $file) {
        //         DB::table('images')->insert([
        //             'imageable_id' => $product->id,
        //             'imageable_type' => Package::class,
        //             'image_url' => $file,
        //             'is_primary' => $index === 0 ? true : false, // first image is primary
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]);
        //     }
        // }


        $galleryImages = [
            // 'one.jpg',
            'two.jpg',
            'three.jpg',
            'four.jpg',
            'five.jpg',
            'six.jpg',
            'seven.jpg',
            'eight.jpg',
            'nine.jpg',
            // 'ten.jpg',
            // 'eleven.jpg',
            // 'twelve.jpg',
            // 'thirteen.jpg',
            // 'fourteen.jpg',
        ];

        foreach ($products as $product) {
            $images = array_merge(
                [$product->slug . '.jpg'], // package specific primary image
                $galleryImages
            );

            foreach ($images as $index => $file) {
                DB::table('images')->insert([
                    'imageable_id' => $product->id,
                    'imageable_type' => Package::class,
                    'image_url' => $file,
                    'is_primary' => $index === 0,
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

        for ($i = 0; $i < 20; $i++) {

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
                // 'type' => rand(0, 1) ? 'fixed' : 'custom',
                'type' => "fixed",
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
                    'status' => 'approved',
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
                'image_url' => 'nine.jpg',
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
                'image_url' => 'eight.jpg',
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
                'image_url' => 'seven.jpg',
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
                'image_url' => 'six.jpg',
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
                'image_url' => 'five.jpg',
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
                'image_url' => 'four.jpg',
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
                'image_url' => 'three.jpg',
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
                'image_url' => 'two.jpg',
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
                'photo_url' => 'two.jpg',
                'instagram_link' => 'https://instagram.com/p/post2',
                'caption' => 'Exploring the peaceful trails of Annapurna.',
                'location' => 'Annapurna Region',
                'likes_count' => 165,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'three.jpg',
                'instagram_link' => 'https://instagram.com/p/post3',
                'caption' => 'Prayer flags dancing in the Himalayan wind.',
                'location' => 'Namche Bazaar',
                'likes_count' => 172,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'four.jpg',
                'instagram_link' => 'https://instagram.com/p/post4',
                'caption' => 'Golden sunset over the Langtang valley.',
                'location' => 'Langtang',
                'likes_count' => 143,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'five.jpg',
                'instagram_link' => 'https://instagram.com/p/post5',
                'caption' => 'Crossing suspension bridges in the Himalayas.',
                'location' => 'Everest Region',
                'likes_count' => 188,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'six.jpg',
                'instagram_link' => 'https://instagram.com/p/post6',
                'caption' => 'Yak caravans along the mountain trails.',
                'location' => 'Manang',
                'likes_count' => 160,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'seven.jpg',
                'instagram_link' => 'https://instagram.com/p/post7',
                'caption' => 'Morning coffee with a Himalayan view.',
                'location' => 'Pokhara',
                'likes_count' => 175,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo_url' => 'eight.jpg',
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
