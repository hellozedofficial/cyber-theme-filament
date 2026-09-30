<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Liquid Glass Theme Settings
    |--------------------------------------------------------------------------
    |
    | Configuration options for the Liquid Glass Filament 5 theme.
    | Includes frosted glass modals, slide-overs, dropdowns, progressive
    | faded blurred header, and ambient royal blue / blue-purple background glow.
    |
    */

    'enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Background Ambient Glow
    |--------------------------------------------------------------------------
    |
    | Subtle, ethereal ambient light glow in the background (like Revolut Business).
    | By default uses royal blue and blue-purple aura.
    |
    */
    'background_glow' => [
        'enabled' => true,
        'dark' => [
            'bg_canvas' => '#0b0f19',
            'royal_blue' => 'rgba(30, 64, 175, 0.32)',
            'blue_purple' => 'rgba(109, 40, 217, 0.22)',
            'ambient' => 'rgba(59, 130, 246, 0.08)',
        ],
        'light' => [
            'bg_canvas' => '#f8fafc',
            'royal_blue' => 'rgba(37, 99, 235, 0.12)',
            'blue_purple' => 'rgba(139, 92, 246, 0.09)',
            'ambient' => 'rgba(99, 102, 241, 0.04)',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Faded Blurred Header (Progressive Blur)
    |--------------------------------------------------------------------------
    |
    | Innovation header with hard blur at the top, gracefully fading out
    | into a soft transparent mist at the bottom edge.
    |
    */
    'header' => [
        'faded_blur' => true,
        'blur_intensity' => '28px',
        'saturation' => '180%',
        'border' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Frosted Glass Modals
    |--------------------------------------------------------------------------
    |
    | All Filament default action and confirmation modals.
    |
    */
    'modals' => [
        'frosted' => true,
        'blur' => '28px',
        'backdrop_blur' => '8px',
        'opacity' => [
            'light' => 0.82,
            'dark' => 0.78,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Frosted Glass Slide-over (Slider) Modals
    |--------------------------------------------------------------------------
    |
    | Full height drawer / slide-over panels from start or end.
    |
    */
    'slide_overs' => [
        'frosted' => true,
        'blur' => '32px',
        'opacity' => [
            'light' => 0.88,
            'dark' => 0.82,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Frosted Glass Dropdown Menus
    |--------------------------------------------------------------------------
    |
    | Action menus, user profile dropdowns, table column filters, etc.
    |
    */
    'dropdowns' => [
        'frosted' => true,
        'blur' => '24px',
        'opacity' => [
            'light' => 0.88,
            'dark' => 0.85,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | General Surfaces & Cards
    |--------------------------------------------------------------------------
    */
    'surfaces' => [
        'sidebar' => true,
        'cards' => true,
        'widgets' => true,
        'tables' => true,
        'blur' => '16px',
    ],
];
