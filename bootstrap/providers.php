<?php

//bootstrap > providers.php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    Intervention\Image\Laravel\ServiceProvider::class,// while adding it ndefined type 'Intervention\Image\Laravel\ServiceProvider'
];
