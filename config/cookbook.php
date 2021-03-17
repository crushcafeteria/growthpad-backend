<?php

/**
 * Created by PhpStorm.
 * User: Nelson
 * Date: 3/28/2020
 * Time: 4:04 PM
 */

return [
    'paypal' => [
        'client_id' => 'AaWxtqJJ7lhvixIndKL9Q3tZLPYAe_lwf8E5mcZhJOoKavMIpORSTPhFc8VVZV8OODG4ExNH_33EDNeL',
        'secret'    => 'ECwWA8WDklMatJMB82qEISSm-F_4YnlNSIN3NXsmAWuMEnMAacR8y1oNG1hbMLk4-XVnoJdNMtyfWqLl'
    ],

    'products' => [
//        [
//            'picture'   => '/recipe/products/Chakula-Chetu-Ebook-Cover-1e.jpg',
//            'file'      => 'recipes/IREN KENYA COOKBOOK final Screen Resolution (With Covers).pdf',
//            'type'      => 'vegan',
//            'name'      => [
//                'en' => 'Test Product',
//                'de' => 'Test Product',
//            ],
//            'price'     => [
//                'en' => 5,
//                'de' => .1
//            ],
//            'nutrients' => null
//        ],
        [
            'picture'   => 'recipe/products/Cookbook-2nd-Edition-Site-Thumbnail.jpg',
            'file'      => 'recipes/Chakula Chetu Cookbook 2nd Edition Ebook (1).pdf',
            'type'      => 'vegan',
            'name'      => [
                'en' => 'Chakula Chetu Cookbook 2nd Edition',
                'de' => 'Bestellen Sie unser gesamtes Kochbuch',
            ],
            'price'     => [
                'en' => 8000,
                'de' => 60
            ],
            'nutrients' => null
        ],
        [
            'picture'   => '/recipe/products/Chakula-Chetu-Ebook-Cover-1e.jpg',
            'file'      => 'recipes/IREN KENYA COOKBOOK final Screen Resolution (With Covers).pdf',
            'type'      => 'vegan',
            'name'      => [
                'en' => 'Buy Complete Recipe Book',
                'de' => 'Bestellen Sie unser gesamtes Kochbuch',
            ],
            'price'     => [
                'en' => 5000,
                'de' => 40
            ],
            'nutrients' => null
        ],
        [
            'picture'   => '/recipe/products/18-Spider-Plant-(Chisaka).jpg',
            'file'      => 'recipes/CHISAKA - Spider Plant.pdf',
            'type'      => 'vegan',
            'name'      => [
                'en' => 'CHISAKA - Spider Plant',
                'de' => '',
            ],
            'price'     => [
                'en' => 250,
                'de' => 2
            ],
            'nutrients' => '
Spider plant: vitamin C, A, calcium, magnesium, iron and zinc<br>
Milk: Protein, carbohydrates, sugar and fat
            '
        ],
        [
            'picture'      => '/recipe/products/6-Boiled-Narrow-Leaf-(Emiroo).jpg',
            'file'         => 'recipes/EMIROO - Boiled Narrow Leaf.pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'EMIROO - Boiled Narrow Leaf',
                'de' => '',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Narrow leaf: Potassium, calcium, magnesium, iron, zinc, phosphorous<br>
Milk/cream: Protein, carbohydrates, sugar and fat
            '
        ],
        [
            'picture'      => '/recipe/products/7-Dried-Fish-(Eshibambala).jpg',
            'file'         => 'recipes/de/13. Dried fish (Eshibambala) (Trockenfisch).pdf',
            'type'         => 'meat',
            'name'         => [
                'en' => 'ESHIBAMBALA - Dried Fish',
                'de' => 'Trockenfisch',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Dried fish: fats, cholesterol, sodium, potassium, proteins, vitamin A, B6, calcium, magnesium, iron<br>
Milk/cream: Proteins, carbohydrates, sugar and fat
            '
        ],
        [
            'picture'      => '/recipe/products/16-Smoked-Fish-(Eshibambala).jpg',
            'file'         => 'recipes/de/17. Smoked Fish (Eshibambala) (Geräucherter Fisch).pdf',
            'type'         => 'meat',
            'name'         => [
                'en' => 'ESHIBAMBALA - Smoked Fish',
                'de' => 'Geräucherter Fisch',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Fish: fat, sodium, potassium, proteins, vitamin A, B6 calcium and magnesium
            '
        ],
        [
            'picture'      => '/recipe/products/3-Banana-Bread-(Eshitata).jpg',
            'file'         => 'recipes/de/16. Banana Bread (Eshitata) (Bananenbrot).pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'ESHITATA - Banana Bread',
                'de' => 'Bananenbrot',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Ripe banana: Fibre, Vb6,VC, carbohydrates <br>
Maize Flour: Carbohydrates
            '
        ],
        [
            'picture'      => '/recipe/products/5-Boiled-Black-Nightshade-(Esufuwa).jpg',
            'file'         => 'recipes/de/4. Boiled Black Nightshades ESUFUWA.pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'ESUFUWA - Boiled Black Nightshades',
                'de' => 'Gekochter Schwarzer Nachtschatten',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Fish: fat, sodium, potassium, proteins, vitamin A, B6 calcium and magnesium
            '
        ],
        [
            'picture'      => '/recipe/products/9-Free-Range-Chicken-(Ingokho).jpg',
            'file'         => 'recipes/de/8. Free Range Chicken (Ingokho) (Freilandhuhn).pdf',
            'type'         => 'meat',
            'name'         => [
                'en' => 'INGOKHO - Free Range Chicken',
                'de' => 'Freilandhuhn',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Chicken – Protein, fats, cholesterol sodium, iron

            '
        ],
        [
            'picture'      => '/recipe/products/2-Bamboo-Shoots-(Kamalea).jpg',
            'file'         => 'recipes/KAMALEA - Bamboo Shoots.pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'KAMALEA - Bamboo Shoots',
                'de' => '',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Vitamin C and phosphorous
            '
        ],
        [
            'picture'      => '/recipe/products/14-Pumpkin-Leaf-Vegetables-(Lisebebe).jpg',
            'file'         => 'recipes/de/12. Pumpkin Leaf Vegetables (Lisebebe) (Kürbisblattgemüse).pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'LISEBEBE - Pumpkin Leaf Vegetables',
                'de' => 'Kürbisblattgemüse',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Vine spinach: Vitamin C and A, plant protein, iron, calcium, magnesium, phosphorous and potassium and antioxidants<br>
Pumpkin leaves: Niacin, dietary fiber, protein, vitamin A, E K, thiamin, riboflavin, vitamin B6<br>
Milk/cream: Protein, carbohydrates, sugar and fat<br>
Simsim: Fat, potassium, carbohydrates, protein, calcium, iron, Vitamin B6, magnesium
            '
        ],
        [
            'picture'      => '/recipe/products/17-Sorghum-Porridge-(Obusera-obwa-Amabele).jpg',
            'file'         => 'recipes/de/9. Sorghum Porridge (Obusera obwa Amabele) (Sorghum Brei).pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'OBUSERA OBWA AMABELE - Sorghum Porridge',
                'de' => 'Sorghum Brei',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Sorghum: carbohydrates, fiber, proteins, fats, calcium, iron<br>
Milk: Protein, carbohydrates, sugar& fat<br>
Sugar: carbohydrates
            '
        ],
        [
            'picture'      => '/recipe/products/12-Millet-Ugali-(Obusuma-obwa-Obule).jpg',
            'file'         => 'recipes/de/15. Millet Ugali (Obusuma obwa Obule) (Hirse Greis).pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'OBUSUMA OBWA - Millet Ugali',
                'de' => 'Hirsebrei',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Millet: Carbohydrates, fat, fiber, proteins, iron
            '
        ],
        [
            'picture'      => '/recipe/products/13-Mushroom-Stew-(Obwoba).jpg',
            'file'         => 'recipes/de/1. Mushroom Stew (Obwoba) (Pilzeintopf).pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'OBWOBA - Mushroom Stew',
                'de' => 'Pilzeintopf',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Mushroom- Fiber, proteins, vitamins <br>
Milk – Proteins, carbohydrates, sugar, fat
            '
        ],
        [
            'picture'      => '/recipe/products/11-Jute-_-Cowpeas-Leaves-(Omurere-_-Likhubi).jpg',
            'file'         => 'recipes/Omurere and Likhubi - Jute & Cowpeas.pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'Omurere and Likhubi - Jute & Cowpeas',
                'de' => '',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Jute mallow - Beta carotene, iron, calcium, vitamin B, C and E, folate, fiber Cowpeas leaves: Dietary fiber, protein, iron, magnesium, vitamin B6<br>
Milk -Protein, carbohydrates, sugar and fat
            '
        ],
        [
            'picture'      => '/recipe/products/4-Beans-and-Sweet-Potatoes-Composite-(Omushenye).jpg',
            'file'         => 'recipes/de/5. Beans and sweet potato composite OMUSHENYE.pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'OMUSHENYE - Beans and sweet potato composite',
                'de' => 'Bohnen-Süßkartoffel-Püree',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Sweet potatoes- Vitamin A,B6,C, iron, protein, magnesium, carbohydrates, dietary fiber<br>
Beans – Potassium, protein, calcium, magnesium, iron and carbohydrates
            '
        ],
        [
            'picture'      => '/recipe/products/10-Green-Grams-_-Sweet-Potatoes-(Omushenye).jpg',
            'file'         => 'recipes/de/2. Green Grams & Sweet Potatoes (Omushenye).pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'OMUSHENYE - Green gram and Sweet Potatoes',
                'de' => 'Mungbohne & Süßkartoffeln',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Green grams- Potassium, protein, iron, magnesium, vitamin B6, Calcium<br>
Sweet potatoes – Vitamin A,B6,C, iron, protein, magnesium, carbohydrates, dietary fiber
            '
        ],
        [
            'picture'      => '/recipe/products/15-Smoked-Beef-(Shihango).jpg',
            'file'         => 'recipes/de/6. Smoked Beef (Shihango) (Geräuchertes Rindfleisch).pdf',
            'type'         => 'meat',
            'name'         => [
                'en' => 'SHIHANGO - Smoked Beef',
                'de' => 'Geräuchertes Rindfleisch',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Beef- Vitamin B6, iron, magnesium, fat
            '
        ],
        [
            'picture'      => '/recipe/products/8-Dried-Termites-(Tsiswa).jpg',
            'file'         => 'recipes/TSISWA - Dried Termites.pdf',
            'type'         => 'meat',
            'name'         => [
                'en' => 'TSISWA - Dried Termites',
                'de' => '',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Termites-Vitamin A, protein, lipid, carbohydrates<br>
Boiled Black Nightshade Black nightshade – Vitamin B,C, folic acid, magnesium, potassium, calcium, iron, sodium, zinc<br>
Milk/cream – Protein, carbohydrates, sugar, fat
            '
        ],
        [
            'picture'      => '/recipe/products/20-Cow-Blood-(KAMALASILE).jpg',
            'file'         => 'recipes/de/20. Kamalasile (Boiled Blood) (Gekochtes Blut).pdf',
            'type'         => 'meat',
            'name'         => [
                'en' => 'Kamalasile - Boiled Blood',
                'de' => 'Mungbohnen-Süßkartoffel-Püree',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => 'Blood: protein, iron'
        ],
        [
            'picture'      => '/recipe/products/19-Cow-Leg(Silenge).jpg',
            'file'         => 'recipes/de/21. SILENGE (Boiled cow leg) (Gekochtes Kuhbein).pdf',
            'type'         => 'meat',
            'name'         => [
                'en' => 'SILENGE - Boiled cow leg',
                'de' => 'Gekochtes Kuhbein',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Cow leg: Vitamin B6, iron, magnesium, fat
'
        ],
        [
            'picture'      => '/recipe/products/23-LITORE-(Bakhayo-Mashed-Banana),-SIKHUBI-(Smoked-Fish-&-Cowpeas).jpg',
            'file'         => 'recipes/de/18. Litore (Boiled Mashed Bananas) (Gekochte Bananenpüree).pdf',
            'type'         => 'vegan',
            'name'         => [
                'en' => 'Litore - Boiled Mashed Bananas',
                'de' => 'Gekochtes Bananenpüree und geräucherter Fisch mit Kuhbohnen',
            ],
            'price'        => [
                'en' => 250,
                'de' => 2
            ], 'nutrients' => '
Green Bananas: Fiber, potassium, vitamin B6, sugar <br>
Milk/cream: Protein, carbohydrates, sugar& fat
'
        ],

    ]

];
