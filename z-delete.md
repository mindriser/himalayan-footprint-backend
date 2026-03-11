erDiagram
    CATEGORIES ||--o{ TOURS : "contains"
    TOURS ||--o{ TOUR_TAGS : "labeled with"
    TAGS ||--o{ TOUR_TAGS : "is part of"
    TOURS ||--o{ TOUR_VARIANTS : "offered in"
    TOUR_VARIANTS ||--o{ TOUR_SLOTS : "scheduled on"
    TOUR_SLOTS ||--o{ BOOKINGS : "reserved for"
    TOURS ||--o{ REVIEWS : "rated by"
    TOURS ||--o{ TOUR_DOCUMENTS : "has"
    TOURS ||--o{ RELATED_PACKAGES : "suggests"
    TOURS ||--o{ ENQUIRIES : "received for"
    TOURS ||--o| BANNERS : "featured on"

    ENQUIRIES ||--o{ ENQUIRY_TOURS : "relates to"
    TOURS ||--o{ ENQUIRY_TOURS : "included in"

   
   <!--  package categories -->
    CATEGORIES {
        int id PK "Auto ncrement"
        string name "Unique - e.g. Trek, Tour, Peak Climbing"
        string slug "Unique - URL friendly name"
    }

<!--  package -->
    TOURS {
        int id PK
        int category_id FK
        string title
        <!-- slug -->
        string short_description "rquired"
        longtext description  "rich text editor"
        string destination  "eg: solukhumbhu "
        string duration   "eg: 10-15 days"  ............. this in string,  cause duration willl be  calcuated from departure date in actual. and some departure data may vary from another for same package. ?????? research more. 



        string difficulty  "enum: easy intermediate hard "
        string max_elevation "5000 m"
        string best_time   " june to july"  .. best seasons
        boolean is_featured
        string meta_keywords
        string meta_title
        string meta_description  "seperate according to variatns or ??
        is_active ??

    }


<!--  package tags -->
    TAGS {
        int id PK
        string name "unique: e.g., Best Price, Safest"
    }

    TOUR_TAGS {
        int tag_id FK
        int tour_id FK "tour_id and tag_id unique constraint"
    }

    <!-- package variants -->
    TOUR_VARIANTS {
        int id PK
        int tour_id FK
        string variation_name " unique per tour : Standard, Deluxe, Luxury,Premium"
        decimal old_single_price "For strike-through"  // optinal
        decimal new__single_price "Individual/Base price"
        decimal old_group_price "per person group price"   optional.... for showing in frontend  discount...
        decimal new_group_price "Per person group rate"
        text variant_specific_description
        text variation_specific_short_description
        min group size :: to be considered as group.

        is_default ??? why ??  lets says , standard to be default...  or we will pick the one which has been picked the most. 



    }

    <!--  tour departues table -->
    variant_id, start date, end date, max person ( from which we will check avaibility)  status ( open close gauranteeed)


<!--  this is simialr to tour departures..... -->
    TOUR_SLOTS {
        int id PK
        int variant_id FK  "what if a tour has no any variants?"  <-------one compuslary>
        date start_date
        date end_date
        int max_capacity "e.g., 15"
        int current_occupancy
        enum status "Open, Full, Closed"
    }

    BOOKINGS {
        int id PK
        int slot_id FK  --- deprature di
        string customer_name
        string email
        string phone
        int num_travelers
        decimal total_price   <----- snapshot ... price at the time of booking>
        enum payment_status
        timestamp created_at
        currency........ $ or AUD or NPR


    }


    BOOKING_MEMBERS {
        UUID id PK
        UUID booking_id FK
        STRING full_name
        STRING nationality
        STRING passport_number
        BOOLEAN is_lead_member
        STRING phone
        STRING email
    }


    PAYMENTS {
        UUID id PK
        UUID booking_id FK
        DECIMAL amount
        STRING currency
        STRING payment_method
        STRING payment_type
        STRING transaction_id
        STRING status
        TIMESTAMP paid_at
    }




    REVIEWS {
        int id PK
        int tour_id FK
        string name  "required"
        string email    "rquired: same email user can only comment once in single tour"
        text description "nuilable"
        int rating "required 1 to 5" 
    }

    TOUR_DOCUMENTS {
        int id PK
        int tour_id FK
        string title "require"
        string document_url "required:PDF storage link"
    }

    RELATED_PACKAGES {
        int id PK
        int tour_id FK
        int related_tour_id FK  "rquired:  unique per tour, let notdo as per variants"
    }

    TEAMS {
        int id PK
        string name
        string image
        string designation "Guide, Porter, Leader"
        string department  "unique: guide, executive, marketing, leaders"
        string contact
        text description
    }

    %% ENQUIRIES {
    %%     int id PK
    %%     int tour_id FK "nullable or it can even be multiple"
    %%     string name
    %%     string email
    %%     string phone
    %%     string country
    %%     text message
    %%     int num_travelers
    %% }

    ENQUIRIES {
        int id PK
        string name
        string email
        string phone
        string country
        text message
        int neum_travelrs
        timestamp created_at
    }

    ENQUIRY_TOURS {
        int enquiry_id FK
        int tour_id FK
    }

    BANNERS {
        int id PK
        int tour_id FK "nullable"
        string title
        string label
        string description
        string image_url
    }

    CONTACTS {
        int id PK
        string name "Unique key: tel, whatsapp, etc"
        string value
    }

    SOCIAL_MEDIA {
        int id PK
        string name "Facebook, TikTok, etc"
        string url
    }


    SETTING_GROUPS {
        int id PK
        string group_name "e.g. SocialMedia, Contacts"
    }

    SETTINGS {
        int id PK
        int group_id FK
        string key "e.g. whatsapp_num"
        string label "e.g. WhatsApp Number"
        string value
        string input_type "text, url, email so that frontend can redirect accordingly                   "
    }

    SUBSCRIBERS {
        int id PK
        string email
        timestamp created_at
    } 

    NEWS{
        for top navbar 
        link
        rich text editor
        start_date
        end_date
    }

    

    package...variant images...

