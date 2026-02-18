<?php

namespace App\Filament\Resources\Bookings\Schemas;

use App\Models\Departure;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('departure_id')
                    ->label('Departure')
                    ->required()
                    ->preload() // load options when form loads
                    ->searchable()
                    ->options(function () {
                        return Departure::with('variant.package') // eager load variant and package
                            ->whereHas('variant', function ($query) {
                                $query->where('is_active', true); // only departures with active variants
                            })
                            ->get()
                            ->mapWithKeys(function ($departure) {
                                // value = departure id, label = "Package - Variant - Start Date"
                                $packageTitle = $departure->variant->package->title ?? '';
                                $variantName = $departure->variant->variation_name ?? '';
                                $startDate = Carbon::parse($departure->start_date)->format('Y-m-d');
                                $endDate = Carbon::parse($departure->end_date)->format('Y-m-d');
                                return [$departure->id => "{$packageTitle} {$variantName} : {$startDate}-{$endDate}"];
                            })
                            ->toArray();
                    })
                    ->placeholder('Select a departure'),
                TextInput::make('package_name')
                    ->required(),
                DatePicker::make('departure_start_date')
                    ->required(),
                DatePicker::make('departure_end_date')
                    ->required(),
                TextInput::make('booking_reference')
                    ->required(),
                TextInput::make('num_travelers')
                    ->label("Number of travellers")
                    ->required()
                    ->numeric(),
                TextInput::make('base_price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('total_price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('currency')
                    ->maxLength(4)
                    ->required(),
                Select::make('booking_status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                        'expired' => 'Expired',
                    ])
                    ->required()
                    ->default('pending'),
                Select::make('payment_status')
                    ->options([
                        'unpaid' => 'Unpaid',
                        'partial' => 'Partial',
                        'paid' => 'Paid',
                        'refunded' => 'Refunded',
                    ])
                    ->required()
                    ->default('unpaid'),
                Textarea::make('special_request')
                    ->columnSpanFull(),
                DateTimePicker::make('booked_at')
                    ->required(),
                DateTimePicker::make('confirmed_at'),
                DateTimePicker::make('cancelled_at'),


                // start this on new row,
                Repeater::make('members')
                    ->label('Booking Members')
                    ->relationship('members') // must match the Eloquent relationship on Booking model
                    ->schema([
                        TextInput::make('full_name')
                            ->required()
                            ->label('Full Name'),
                        TextInput::make('email')
                            ->email()
                            ->label('Email'),
                        TextInput::make('phone')
                            ->label('Phone'),
                        Select::make('gender')
                            ->label('Gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other',
                            ])
                            ->nullable(),
                        DatePicker::make('dob')
                            ->label('Date of Birth')
                            ->nullable()
                            // ->typeable() // allows typing the date manually
                            ->displayFormat('Y-m-d') // how the date is displayed in the input
                            ->placeholder('YYYY-MM-DD'),
                        TextInput::make('nationality')
                            ->label('Nationality'),
                        TextInput::make('passport_number')
                            ->label('Passport Number'),
                        Toggle::make('is_lead_member')
                            ->label('Lead Member')
                            ->inline(false),
                        // there shoould only be one lead member
                    ])
                    ->columnSpanFull()
                    ->columns(2) // show 2 fields per row in the repeater
                    ->addActionLabel('Add Member')
                    ->rules([
                        function () {
                            return function (string $attribute, $value, $fail) {
                                $leadCount = collect($value)->filter(fn($member) => $member['is_lead_member'] ?? false)->count();

                                if ($leadCount === 0) {
                                    $fail('At least one member must be designated as the lead member.');
                                } elseif ($leadCount > 1) {
                                    $fail('Only one member can be the lead member.');
                                }
                            };
                        },
                    ])
            ]);
    }
}
