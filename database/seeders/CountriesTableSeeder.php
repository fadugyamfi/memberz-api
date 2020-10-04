<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('countries')->delete();

        DB::table('countries')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Afghanistan',
                'capital' => 'Kabul',
                'active' => 0,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Albania',
                'capital' => 'Tirana',
                'active' => 0,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Algeria',
                'capital' => 'Algiers',
                'active' => 0,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'American Samoa',
                'capital' => 'Pago Pago',
                'active' => 0,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Andorra',
                'capital' => 'Andorra',
                'active' => 0,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Angola',
                'capital' => 'Luanda',
                'active' => 0,
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Anguilla',
                'capital' => 'The Valley',
                'active' => 0,
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Antarctica',
                'capital' => 'None',
                'active' => 0,
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Antigua and Barbuda',
                'capital' => 'St. Johns',
                'active' => 0,
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Argentina',
                'capital' => 'Buenos Aires',
                'active' => 0,
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Armenia',
                'capital' => 'Yerevan',
                'active' => 0,
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'Aruba',
                'capital' => 'Oranjestad',
                'active' => 0,
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Australia',
                'capital' => 'Canberra',
                'active' => 0,
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Austria',
                'capital' => 'Vienna',
                'active' => 0,
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'Azerbaijan',
                'capital' => 'Baku',
                'active' => 0,
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'Bahamas',
                'capital' => 'Nassau',
                'active' => 0,
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'Bahrain',
                'capital' => 'Al-Manamah',
                'active' => 0,
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'Bangladesh',
                'capital' => 'Dhaka',
                'active' => 0,
            ),
            18 =>
            array (
                'id' => 19,
                'name' => 'Barbados',
                'capital' => 'Bridgetown',
                'active' => 0,
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'Belarus',
                'capital' => 'Minsk',
                'active' => 0,
            ),
            20 =>
            array (
                'id' => 21,
                'name' => 'Belgium',
                'capital' => 'Brussels',
                'active' => 0,
            ),
            21 =>
            array (
                'id' => 22,
                'name' => 'Belize',
                'capital' => 'Belmopan',
                'active' => 0,
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'Benin',
                'capital' => 'Porto-Novo',
                'active' => 1,
            ),
            23 =>
            array (
                'id' => 24,
                'name' => 'Bermuda',
                'capital' => 'Hamilton',
                'active' => 0,
            ),
            24 =>
            array (
                'id' => 25,
                'name' => 'Bhutan',
                'capital' => 'Thimphu',
                'active' => 0,
            ),
            25 =>
            array (
                'id' => 26,
                'name' => 'Bolivia',
                'capital' => 'La Paz',
                'active' => 0,
            ),
            26 =>
            array (
                'id' => 27,
                'name' => 'Bosnia-Herzegovina',
                'capital' => 'Sarajevo',
                'active' => 0,
            ),
            27 =>
            array (
                'id' => 28,
                'name' => 'Botswana',
                'capital' => 'Gaborone',
                'active' => 0,
            ),
            28 =>
            array (
                'id' => 29,
                'name' => 'Bouvet Island',
                'capital' => 'None',
                'active' => 0,
            ),
            29 =>
            array (
                'id' => 30,
                'name' => 'Brazil',
                'capital' => 'Brasilia',
                'active' => 0,
            ),
            30 =>
            array (
                'id' => 31,
                'name' => 'British Indian Ocean Territory',
                'capital' => 'None',
                'active' => 0,
            ),
            31 =>
            array (
                'id' => 32,
                'name' => 'Brunei Darussalam',
                'capital' => 'Bandar Seri Begawan',
                'active' => 0,
            ),
            32 =>
            array (
                'id' => 33,
                'name' => 'Bulgaria',
                'capital' => 'Sofia',
                'active' => 0,
            ),
            33 =>
            array (
                'id' => 34,
                'name' => 'Burkina Faso',
                'capital' => 'Ouagadougou',
                'active' => 1,
            ),
            34 =>
            array (
                'id' => 35,
                'name' => 'Burundi',
                'capital' => 'Bujumbura',
                'active' => 0,
            ),
            35 =>
            array (
                'id' => 36,
                'name' => 'Cambodia',
                'capital' => 'Phnom Penh',
                'active' => 0,
            ),
            36 =>
            array (
                'id' => 37,
                'name' => 'Cameroon',
                'capital' => 'Yaounde',
                'active' => 0,
            ),
            37 =>
            array (
                'id' => 38,
                'name' => 'Canada',
                'capital' => 'Ottawa',
                'active' => 0,
            ),
            38 =>
            array (
                'id' => 39,
                'name' => 'Cape Verde',
                'capital' => 'Praia',
                'active' => 0,
            ),
            39 =>
            array (
                'id' => 40,
                'name' => 'Cayman Islands',
                'capital' => 'Georgetown',
                'active' => 0,
            ),
            40 =>
            array (
                'id' => 41,
                'name' => 'Central African Republic',
                'capital' => 'Bangui',
                'active' => 0,
            ),
            41 =>
            array (
                'id' => 42,
                'name' => 'Chad',
                'capital' => 'N\'Djamena',
                'active' => 0,
            ),
            42 =>
            array (
                'id' => 43,
                'name' => 'Chile',
                'capital' => 'Santiago',
                'active' => 0,
            ),
            43 =>
            array (
                'id' => 44,
                'name' => 'China',
                'capital' => 'Beijing',
                'active' => 0,
            ),
            44 =>
            array (
                'id' => 45,
                'name' => 'Christmas Island',
                'capital' => 'The Settlement',
                'active' => 0,
            ),
            45 =>
            array (
                'id' => 46,
            'name' => 'Cocos (Keeling) Islands',
                'capital' => 'West Island',
                'active' => 0,
            ),
            46 =>
            array (
                'id' => 47,
                'name' => 'Colombia',
                'capital' => 'Bogota',
                'active' => 0,
            ),
            47 =>
            array (
                'id' => 48,
                'name' => 'Comoros',
                'capital' => 'Moroni',
                'active' => 0,
            ),
            48 =>
            array (
                'id' => 49,
                'name' => 'Congo',
                'capital' => 'Brazzaville',
                'active' => 0,
            ),
            49 =>
            array (
                'id' => 50,
                'name' => 'Congo, Dem. Republic',
                'capital' => 'Kinshasa',
                'active' => 0,
            ),
            50 =>
            array (
                'id' => 51,
                'name' => 'Cook Islands',
                'capital' => 'Avarua',
                'active' => 0,
            ),
            51 =>
            array (
                'id' => 52,
                'name' => 'Costa Rica',
                'capital' => 'San Jose',
                'active' => 0,
            ),
            52 =>
            array (
                'id' => 53,
                'name' => 'Croatia',
                'capital' => 'Zagreb',
                'active' => 0,
            ),
            53 =>
            array (
                'id' => 54,
                'name' => 'Cuba',
                'capital' => 'Havana',
                'active' => 0,
            ),
            54 =>
            array (
                'id' => 55,
                'name' => 'Cyprus',
                'capital' => 'Nicosia',
                'active' => 0,
            ),
            55 =>
            array (
                'id' => 56,
                'name' => 'Czech Rep.',
                'capital' => 'Prague',
                'active' => 0,
            ),
            56 =>
            array (
                'id' => 57,
                'name' => 'Denmark',
                'capital' => 'Copenhagen',
                'active' => 0,
            ),
            57 =>
            array (
                'id' => 58,
                'name' => 'Djibouti',
                'capital' => 'Djibouti',
                'active' => 0,
            ),
            58 =>
            array (
                'id' => 59,
                'name' => 'Dominica',
                'capital' => 'Roseau',
                'active' => 0,
            ),
            59 =>
            array (
                'id' => 60,
                'name' => 'Dominican Republic',
                'capital' => 'Santo Domingo',
                'active' => 0,
            ),
            60 =>
            array (
                'id' => 61,
                'name' => 'Ecuador',
                'capital' => 'Quito',
                'active' => 0,
            ),
            61 =>
            array (
                'id' => 62,
                'name' => 'Egypt',
                'capital' => 'Cairo',
                'active' => 0,
            ),
            62 =>
            array (
                'id' => 63,
                'name' => 'El Salvador',
                'capital' => 'San Salvador',
                'active' => 0,
            ),
            63 =>
            array (
                'id' => 64,
                'name' => 'Equatorial Guinea',
                'capital' => 'Malabo',
                'active' => 0,
            ),
            64 =>
            array (
                'id' => 65,
                'name' => 'Eritrea',
                'capital' => 'Asmara',
                'active' => 0,
            ),
            65 =>
            array (
                'id' => 66,
                'name' => 'Estonia',
                'capital' => 'Tallinn',
                'active' => 0,
            ),
            66 =>
            array (
                'id' => 67,
                'name' => 'Ethiopia',
                'capital' => 'Addis Ababa',
                'active' => 0,
            ),
            67 =>
            array (
                'id' => 68,
                'name' => 'European Union',
                'capital' => 'Brussels',
                'active' => 0,
            ),
            68 =>
            array (
                'id' => 69,
            'name' => 'Falkland Islands (Malvinas)',
                'capital' => 'Stanley',
                'active' => 0,
            ),
            69 =>
            array (
                'id' => 70,
                'name' => 'Faroe Islands',
                'capital' => 'Torshavn',
                'active' => 0,
            ),
            70 =>
            array (
                'id' => 71,
                'name' => 'Fiji',
                'capital' => 'Suva',
                'active' => 0,
            ),
            71 =>
            array (
                'id' => 72,
                'name' => 'Finland',
                'capital' => 'Helsinki',
                'active' => 0,
            ),
            72 =>
            array (
                'id' => 73,
                'name' => 'France',
                'capital' => 'Paris',
                'active' => 0,
            ),
            73 =>
            array (
                'id' => 74,
                'name' => 'French Guiana',
                'capital' => 'Cayenne',
                'active' => 0,
            ),
            74 =>
            array (
                'id' => 75,
                'name' => 'French Southern Territories',
                'capital' => 'None',
                'active' => 0,
            ),
            75 =>
            array (
                'id' => 76,
                'name' => 'Gabon',
                'capital' => 'Libreville',
                'active' => 0,
            ),
            76 =>
            array (
                'id' => 77,
                'name' => 'Gambia',
                'capital' => 'Banjul',
                'active' => 0,
            ),
            77 =>
            array (
                'id' => 78,
                'name' => 'Georgia',
                'capital' => 'Tbilisi',
                'active' => 0,
            ),
            78 =>
            array (
                'id' => 79,
                'name' => 'Germany',
                'capital' => 'Berlin',
                'active' => 0,
            ),
            79 =>
            array (
                'id' => 80,
                'name' => 'Ghana',
                'capital' => 'Accra',
                'active' => 1,
            ),
            80 =>
            array (
                'id' => 81,
                'name' => 'Gibraltar',
                'capital' => 'Gibraltar',
                'active' => 0,
            ),
            81 =>
            array (
                'id' => 82,
                'name' => 'Great Britain',
                'capital' => 'London',
                'active' => 0,
            ),
            82 =>
            array (
                'id' => 83,
                'name' => 'Greece',
                'capital' => 'Athens',
                'active' => 0,
            ),
            83 =>
            array (
                'id' => 84,
                'name' => 'Greenland',
                'capital' => 'Godthab',
                'active' => 0,
            ),
            84 =>
            array (
                'id' => 85,
                'name' => 'Grenada',
                'capital' => 'St. George\'s',
                'active' => 0,
            ),
            85 =>
            array (
                'id' => 86,
            'name' => 'Guadeloupe (French)',
                'capital' => 'Basse-Terre',
                'active' => 0,
            ),
            86 =>
            array (
                'id' => 87,
            'name' => 'Guam (USA)',
                'capital' => 'Agana',
                'active' => 0,
            ),
            87 =>
            array (
                'id' => 88,
                'name' => 'Guatemala',
                'capital' => 'Guatemala City',
                'active' => 0,
            ),
            88 =>
            array (
                'id' => 89,
                'name' => 'Guernsey',
                'capital' => 'St. Peter Port',
                'active' => 0,
            ),
            89 =>
            array (
                'id' => 90,
                'name' => 'Guinea',
                'capital' => 'Conakry',
                'active' => 0,
            ),
            90 =>
            array (
                'id' => 91,
                'name' => 'Guinea Bissau',
                'capital' => 'Bissau',
                'active' => 0,
            ),
            91 =>
            array (
                'id' => 92,
                'name' => 'Guyana',
                'capital' => 'Georgetown',
                'active' => 0,
            ),
            92 =>
            array (
                'id' => 93,
                'name' => 'Haiti',
                'capital' => 'Port-au-Prince',
                'active' => 0,
            ),
            93 =>
            array (
                'id' => 94,
                'name' => 'Heard Island and McDonald Islands',
                'capital' => 'None',
                'active' => 0,
            ),
            94 =>
            array (
                'id' => 95,
                'name' => 'Honduras',
                'capital' => 'Tegucigalpa',
                'active' => 0,
            ),
            95 =>
            array (
                'id' => 96,
                'name' => 'Hong Kong',
                'capital' => 'Victoria',
                'active' => 0,
            ),
            96 =>
            array (
                'id' => 97,
                'name' => 'Hungary',
                'capital' => 'Budapest',
                'active' => 0,
            ),
            97 =>
            array (
                'id' => 98,
                'name' => 'Iceland',
                'capital' => 'Reykjavik',
                'active' => 0,
            ),
            98 =>
            array (
                'id' => 99,
                'name' => 'India',
                'capital' => 'New Delhi',
                'active' => 0,
            ),
            99 =>
            array (
                'id' => 100,
                'name' => 'Indonesia',
                'capital' => 'Jakarta',
                'active' => 0,
            ),
            100 =>
            array (
                'id' => 101,
                'name' => 'Iran',
                'capital' => 'Tehran',
                'active' => 0,
            ),
            101 =>
            array (
                'id' => 102,
                'name' => 'Iraq',
                'capital' => 'Baghdad',
                'active' => 0,
            ),
            102 =>
            array (
                'id' => 103,
                'name' => 'Ireland',
                'capital' => 'Dublin',
                'active' => 0,
            ),
            103 =>
            array (
                'id' => 104,
                'name' => 'Isle of Man',
                'capital' => 'Douglas',
                'active' => 0,
            ),
            104 =>
            array (
                'id' => 105,
                'name' => 'Israel',
                'capital' => 'Jerusalem',
                'active' => 0,
            ),
            105 =>
            array (
                'id' => 106,
                'name' => 'Italy',
                'capital' => 'Rome',
                'active' => 0,
            ),
            106 =>
            array (
                'id' => 107,
                'name' => 'Ivory Coast',
                'capital' => 'Abidjan',
                'active' => 1,
            ),
            107 =>
            array (
                'id' => 108,
                'name' => 'Jamaica',
                'capital' => 'Kingston',
                'active' => 0,
            ),
            108 =>
            array (
                'id' => 109,
                'name' => 'Japan',
                'capital' => 'Tokyo',
                'active' => 0,
            ),
            109 =>
            array (
                'id' => 110,
                'name' => 'Jersey',
                'capital' => 'Saint Helier',
                'active' => 0,
            ),
            110 =>
            array (
                'id' => 111,
                'name' => 'Jordan',
                'capital' => 'Amman',
                'active' => 0,
            ),
            111 =>
            array (
                'id' => 112,
                'name' => 'Kazakhstan',
                'capital' => 'Astana',
                'active' => 0,
            ),
            112 =>
            array (
                'id' => 113,
                'name' => 'Kenya',
                'capital' => 'Nairobi',
                'active' => 1,
            ),
            113 =>
            array (
                'id' => 114,
                'name' => 'Kiribati',
                'capital' => 'Tarawa',
                'active' => 0,
            ),
            114 =>
            array (
                'id' => 115,
                'name' => 'Korea-North',
                'capital' => 'Pyongyang',
                'active' => 0,
            ),
            115 =>
            array (
                'id' => 116,
                'name' => 'Korea-South',
                'capital' => 'Seoul',
                'active' => 0,
            ),
            116 =>
            array (
                'id' => 117,
                'name' => 'Kuwait',
                'capital' => 'Kuwait City',
                'active' => 0,
            ),
            117 =>
            array (
                'id' => 118,
                'name' => 'Kyrgyzstan',
                'capital' => 'Bishkek',
                'active' => 0,
            ),
            118 =>
            array (
                'id' => 119,
                'name' => 'Laos',
                'capital' => 'Vientiane',
                'active' => 0,
            ),
            119 =>
            array (
                'id' => 120,
                'name' => 'Latvia',
                'capital' => 'Riga',
                'active' => 0,
            ),
            120 =>
            array (
                'id' => 121,
                'name' => 'Lebanon',
                'capital' => 'Beirut',
                'active' => 0,
            ),
            121 =>
            array (
                'id' => 122,
                'name' => 'Lesotho',
                'capital' => 'Maseru',
                'active' => 0,
            ),
            122 =>
            array (
                'id' => 123,
                'name' => 'Liberia',
                'capital' => 'Monrovia',
                'active' => 0,
            ),
            123 =>
            array (
                'id' => 124,
                'name' => 'Libya',
                'capital' => 'Tripoli',
                'active' => 0,
            ),
            124 =>
            array (
                'id' => 125,
                'name' => 'Liechtenstein',
                'capital' => 'Vaduz',
                'active' => 0,
            ),
            125 =>
            array (
                'id' => 126,
                'name' => 'Lithuania',
                'capital' => 'Vilnius',
                'active' => 0,
            ),
            126 =>
            array (
                'id' => 127,
                'name' => 'Luxembourg',
                'capital' => 'Luxembourg',
                'active' => 0,
            ),
            127 =>
            array (
                'id' => 128,
                'name' => 'Macau',
                'capital' => 'Macau',
                'active' => 0,
            ),
            128 =>
            array (
                'id' => 129,
                'name' => 'Macedonia',
                'capital' => 'Skopje',
                'active' => 0,
            ),
            129 =>
            array (
                'id' => 130,
                'name' => 'Madagascar',
                'capital' => 'Antananarivo',
                'active' => 0,
            ),
            130 =>
            array (
                'id' => 131,
                'name' => 'Malawi',
                'capital' => 'Lilongwe',
                'active' => 0,
            ),
            131 =>
            array (
                'id' => 132,
                'name' => 'Malaysia',
                'capital' => 'Kuala Lumpur',
                'active' => 0,
            ),
            132 =>
            array (
                'id' => 133,
                'name' => 'Maldives',
                'capital' => 'Male',
                'active' => 0,
            ),
            133 =>
            array (
                'id' => 134,
                'name' => 'Mali',
                'capital' => 'Bamako',
                'active' => 0,
            ),
            134 =>
            array (
                'id' => 135,
                'name' => 'Malta',
                'capital' => 'Valletta',
                'active' => 0,
            ),
            135 =>
            array (
                'id' => 136,
                'name' => 'Marshall Islands',
                'capital' => 'Majuro',
                'active' => 0,
            ),
            136 =>
            array (
                'id' => 137,
            'name' => 'Martinique (French)',
                'capital' => 'Fort-de-France',
                'active' => 0,
            ),
            137 =>
            array (
                'id' => 138,
                'name' => 'Mauritania',
                'capital' => 'Nouakchott',
                'active' => 0,
            ),
            138 =>
            array (
                'id' => 139,
                'name' => 'Mauritius',
                'capital' => 'Port Louis',
                'active' => 0,
            ),
            139 =>
            array (
                'id' => 140,
                'name' => 'Mayotte',
                'capital' => 'Dzaoudzi',
                'active' => 0,
            ),
            140 =>
            array (
                'id' => 141,
                'name' => 'Mexico',
                'capital' => 'Mexico City',
                'active' => 0,
            ),
            141 =>
            array (
                'id' => 142,
                'name' => 'Micronesia',
                'capital' => 'Palikir',
                'active' => 0,
            ),
            142 =>
            array (
                'id' => 143,
                'name' => 'Moldova',
                'capital' => 'Kishinev',
                'active' => 0,
            ),
            143 =>
            array (
                'id' => 144,
                'name' => 'Monaco',
                'capital' => 'Monaco',
                'active' => 0,
            ),
            144 =>
            array (
                'id' => 145,
                'name' => 'Mongolia',
                'capital' => 'Ulan Bator',
                'active' => 0,
            ),
            145 =>
            array (
                'id' => 146,
                'name' => 'Montenegro',
                'capital' => 'Podgorica',
                'active' => 0,
            ),
            146 =>
            array (
                'id' => 147,
                'name' => 'Montserrat',
                'capital' => 'Plymouth',
                'active' => 0,
            ),
            147 =>
            array (
                'id' => 148,
                'name' => 'Morocco',
                'capital' => 'Rabat',
                'active' => 0,
            ),
            148 =>
            array (
                'id' => 149,
                'name' => 'Mozambique',
                'capital' => 'Maputo',
                'active' => 0,
            ),
            149 =>
            array (
                'id' => 150,
                'name' => 'Myanmar',
                'capital' => 'Naypyidaw',
                'active' => 0,
            ),
            150 =>
            array (
                'id' => 151,
                'name' => 'Namibia',
                'capital' => 'Windhoek',
                'active' => 0,
            ),
            151 =>
            array (
                'id' => 152,
                'name' => 'Nauru',
                'capital' => 'Yaren',
                'active' => 0,
            ),
            152 =>
            array (
                'id' => 153,
                'name' => 'Nepal',
                'capital' => 'Kathmandu',
                'active' => 0,
            ),
            153 =>
            array (
                'id' => 154,
                'name' => 'Netherlands',
                'capital' => 'Amsterdam',
                'active' => 0,
            ),
            154 =>
            array (
                'id' => 155,
                'name' => 'Netherlands Antilles',
                'capital' => 'Willemstad',
                'active' => 0,
            ),
            155 =>
            array (
                'id' => 156,
            'name' => 'New Caledonia (French)',
                'capital' => 'Noumea',
                'active' => 0,
            ),
            156 =>
            array (
                'id' => 157,
                'name' => 'New Zealand',
                'capital' => 'Wellington',
                'active' => 0,
            ),
            157 =>
            array (
                'id' => 158,
                'name' => 'Nicaragua',
                'capital' => 'Managua',
                'active' => 0,
            ),
            158 =>
            array (
                'id' => 159,
                'name' => 'Niger',
                'capital' => 'Niamey',
                'active' => 0,
            ),
            159 =>
            array (
                'id' => 160,
                'name' => 'Nigeria',
                'capital' => 'Lagos',
                'active' => 1,
            ),
            160 =>
            array (
                'id' => 161,
                'name' => 'Niue',
                'capital' => 'Alofi',
                'active' => 0,
            ),
            161 =>
            array (
                'id' => 162,
                'name' => 'Norfolk Island',
                'capital' => 'Kingston',
                'active' => 0,
            ),
            162 =>
            array (
                'id' => 163,
                'name' => 'Northern Mariana Islands',
                'capital' => 'Saipan',
                'active' => 0,
            ),
            163 =>
            array (
                'id' => 164,
                'name' => 'Norway',
                'capital' => 'Oslo',
                'active' => 0,
            ),
            164 =>
            array (
                'id' => 165,
                'name' => 'Oman',
                'capital' => 'Muscat',
                'active' => 0,
            ),
            165 =>
            array (
                'id' => 166,
                'name' => 'Pakistan',
                'capital' => 'Islamabad',
                'active' => 0,
            ),
            166 =>
            array (
                'id' => 167,
                'name' => 'Palau',
                'capital' => 'Koror',
                'active' => 0,
            ),
            167 =>
            array (
                'id' => 168,
                'name' => 'Panama',
                'capital' => 'Panama City',
                'active' => 0,
            ),
            168 =>
            array (
                'id' => 169,
                'name' => 'Papua New Guinea',
                'capital' => 'Port Moresby',
                'active' => 0,
            ),
            169 =>
            array (
                'id' => 170,
                'name' => 'Paraguay',
                'capital' => 'Asuncion',
                'active' => 0,
            ),
            170 =>
            array (
                'id' => 171,
                'name' => 'Peru',
                'capital' => 'Lima',
                'active' => 0,
            ),
            171 =>
            array (
                'id' => 172,
                'name' => 'Philippines',
                'capital' => 'Manila',
                'active' => 0,
            ),
            172 =>
            array (
                'id' => 173,
                'name' => 'Pitcairn Island',
                'capital' => 'Adamstown',
                'active' => 0,
            ),
            173 =>
            array (
                'id' => 174,
                'name' => 'Poland',
                'capital' => 'Warsaw',
                'active' => 0,
            ),
            174 =>
            array (
                'id' => 175,
            'name' => 'Polynesia (French)',
                'capital' => 'Papeete',
                'active' => 0,
            ),
            175 =>
            array (
                'id' => 176,
                'name' => 'Portugal',
                'capital' => 'Lisbon',
                'active' => 0,
            ),
            176 =>
            array (
                'id' => 177,
                'name' => 'Puerto Rico',
                'capital' => 'San Juan',
                'active' => 0,
            ),
            177 =>
            array (
                'id' => 178,
                'name' => 'Qatar',
                'capital' => 'Doha',
                'active' => 0,
            ),
            178 =>
            array (
                'id' => 179,
            'name' => 'Reunion (French)',
                'capital' => 'Saint-Denis',
                'active' => 0,
            ),
            179 =>
            array (
                'id' => 180,
                'name' => 'Romania',
                'capital' => 'Bucharest',
                'active' => 0,
            ),
            180 =>
            array (
                'id' => 181,
                'name' => 'Russia',
                'capital' => 'Moscow',
                'active' => 0,
            ),
            181 =>
            array (
                'id' => 182,
                'name' => 'Rwanda',
                'capital' => 'Kigali',
                'active' => 0,
            ),
            182 =>
            array (
                'id' => 183,
                'name' => 'Saint Helena',
                'capital' => 'Jamestown',
                'active' => 0,
            ),
            183 =>
            array (
                'id' => 184,
                'name' => 'Saint Kitts & Nevis Anguilla',
                'capital' => 'Basseterre',
                'active' => 0,
            ),
            184 =>
            array (
                'id' => 185,
                'name' => 'Saint Lucia',
                'capital' => 'Castries',
                'active' => 0,
            ),
            185 =>
            array (
                'id' => 186,
                'name' => 'Saint Pierre and Miquelon',
                'capital' => 'St. Pierre',
                'active' => 0,
            ),
            186 =>
            array (
                'id' => 187,
                'name' => 'Saint Vincent & Grenadines',
                'capital' => 'Kingstown',
                'active' => 0,
            ),
            187 =>
            array (
                'id' => 188,
                'name' => 'Samoa',
                'capital' => 'Apia',
                'active' => 0,
            ),
            188 =>
            array (
                'id' => 189,
                'name' => 'San Marino',
                'capital' => 'San Marino',
                'active' => 0,
            ),
            189 =>
            array (
                'id' => 190,
                'name' => 'Sao Tome and Principe',
                'capital' => 'Sao Tome',
                'active' => 0,
            ),
            190 =>
            array (
                'id' => 191,
                'name' => 'Saudi Arabia',
                'capital' => 'Riyadh',
                'active' => 0,
            ),
            191 =>
            array (
                'id' => 192,
                'name' => 'Senegal',
                'capital' => 'Dakar',
                'active' => 0,
            ),
            192 =>
            array (
                'id' => 193,
                'name' => 'Serbia',
                'capital' => 'Belgrade',
                'active' => 0,
            ),
            193 =>
            array (
                'id' => 194,
                'name' => 'Seychelles',
                'capital' => 'Victoria',
                'active' => 0,
            ),
            194 =>
            array (
                'id' => 195,
                'name' => 'Sierra Leone',
                'capital' => 'Freetown',
                'active' => 0,
            ),
            195 =>
            array (
                'id' => 196,
                'name' => 'Singapore',
                'capital' => 'Singapore',
                'active' => 0,
            ),
            196 =>
            array (
                'id' => 197,
                'name' => 'Slovakia',
                'capital' => 'Bratislava',
                'active' => 0,
            ),
            197 =>
            array (
                'id' => 198,
                'name' => 'Slovenia',
                'capital' => 'Ljubljana',
                'active' => 0,
            ),
            198 =>
            array (
                'id' => 199,
                'name' => 'Solomon Islands',
                'capital' => 'Honiara',
                'active' => 0,
            ),
            199 =>
            array (
                'id' => 200,
                'name' => 'Somalia',
                'capital' => 'Mogadishu',
                'active' => 0,
            ),
            200 =>
            array (
                'id' => 201,
                'name' => 'South Africa',
                'capital' => 'Pretoria',
                'active' => 1,
            ),
            201 =>
            array (
                'id' => 202,
                'name' => 'South Georgia & South Sandwich Islands',
                'capital' => 'None',
                'active' => 0,
            ),
            202 =>
            array (
                'id' => 203,
                'name' => 'South Sudan',
                'capital' => 'Ramciel',
                'active' => 0,
            ),
            203 =>
            array (
                'id' => 204,
                'name' => 'Spain',
                'capital' => 'Madrid',
                'active' => 0,
            ),
            204 =>
            array (
                'id' => 205,
                'name' => 'Sri Lanka',
                'capital' => 'Colombo',
                'active' => 0,
            ),
            205 =>
            array (
                'id' => 206,
                'name' => 'Sudan',
                'capital' => 'Khartoum',
                'active' => 0,
            ),
            206 =>
            array (
                'id' => 207,
                'name' => 'Suriname',
                'capital' => 'Paramaribo',
                'active' => 0,
            ),
            207 =>
            array (
                'id' => 208,
                'name' => 'Svalbard and Jan Mayen Islands',
                'capital' => 'Longyearbyen',
                'active' => 0,
            ),
            208 =>
            array (
                'id' => 209,
                'name' => 'Swaziland',
                'capital' => 'Mbabane',
                'active' => 0,
            ),
            209 =>
            array (
                'id' => 210,
                'name' => 'Sweden',
                'capital' => 'Stockholm',
                'active' => 0,
            ),
            210 =>
            array (
                'id' => 211,
                'name' => 'Switzerland',
                'capital' => 'Bern',
                'active' => 0,
            ),
            211 =>
            array (
                'id' => 212,
                'name' => 'Syria',
                'capital' => 'Damascus',
                'active' => 0,
            ),
            212 =>
            array (
                'id' => 213,
                'name' => 'Taiwan',
                'capital' => 'Taipei',
                'active' => 0,
            ),
            213 =>
            array (
                'id' => 214,
                'name' => 'Tajikistan',
                'capital' => 'Dushanbe',
                'active' => 0,
            ),
            214 =>
            array (
                'id' => 215,
                'name' => 'Tanzania',
                'capital' => 'Dodoma',
                'active' => 0,
            ),
            215 =>
            array (
                'id' => 216,
                'name' => 'Thailand',
                'capital' => 'Bangkok',
                'active' => 0,
            ),
            216 =>
            array (
                'id' => 217,
                'name' => 'Togo',
                'capital' => 'Lome',
                'active' => 1,
            ),
            217 =>
            array (
                'id' => 218,
                'name' => 'Tokelau',
                'capital' => 'None',
                'active' => 0,
            ),
            218 =>
            array (
                'id' => 219,
                'name' => 'Tonga',
                'capital' => 'Nuku\'alofa',
                'active' => 0,
            ),
            219 =>
            array (
                'id' => 220,
                'name' => 'Trinidad and Tobago',
                'capital' => 'Port of Spain',
                'active' => 0,
            ),
            220 =>
            array (
                'id' => 221,
                'name' => 'Tunisia',
                'capital' => 'Tunis',
                'active' => 0,
            ),
            221 =>
            array (
                'id' => 222,
                'name' => 'Turkey',
                'capital' => 'Ankara',
                'active' => 0,
            ),
            222 =>
            array (
                'id' => 223,
                'name' => 'Turkmenistan',
                'capital' => 'Ashgabat',
                'active' => 0,
            ),
            223 =>
            array (
                'id' => 224,
                'name' => 'Turks and Caicos Islands',
                'capital' => 'Grand Turk',
                'active' => 0,
            ),
            224 =>
            array (
                'id' => 225,
                'name' => 'Tuvalu',
                'capital' => 'Funafuti',
                'active' => 0,
            ),
            225 =>
            array (
                'id' => 226,
                'name' => 'U.K.',
                'capital' => 'London',
                'active' => 0,
            ),
            226 =>
            array (
                'id' => 227,
                'name' => 'Uganda',
                'capital' => 'Kampala',
                'active' => 0,
            ),
            227 =>
            array (
                'id' => 228,
                'name' => 'Ukraine',
                'capital' => 'Kiev',
                'active' => 0,
            ),
            228 =>
            array (
                'id' => 229,
                'name' => 'United Arab Emirates',
                'capital' => 'Abu Dhabi',
                'active' => 0,
            ),
            229 =>
            array (
                'id' => 230,
                'name' => 'Uruguay',
                'capital' => 'Montevideo',
                'active' => 0,
            ),
            230 =>
            array (
                'id' => 231,
                'name' => 'USA',
                'capital' => 'Washington',
                'active' => 0,
            ),
            231 =>
            array (
                'id' => 232,
                'name' => 'USA Minor Outlying Islands',
                'capital' => 'None',
                'active' => 0,
            ),
            232 =>
            array (
                'id' => 233,
                'name' => 'Uzbekistan',
                'capital' => 'Tashkent',
                'active' => 0,
            ),
            233 =>
            array (
                'id' => 234,
                'name' => 'Vanuatu',
                'capital' => 'Port Vila',
                'active' => 0,
            ),
            234 =>
            array (
                'id' => 235,
                'name' => 'Vatican',
                'capital' => 'Vatican City',
                'active' => 0,
            ),
            235 =>
            array (
                'id' => 236,
                'name' => 'Venezuela',
                'capital' => 'Caracas',
                'active' => 0,
            ),
            236 =>
            array (
                'id' => 237,
                'name' => 'Vietnam',
                'capital' => 'Hanoi',
                'active' => 0,
            ),
            237 =>
            array (
                'id' => 238,
            'name' => 'Virgin Islands (British)',
                'capital' => 'Road Town',
                'active' => 0,
            ),
            238 =>
            array (
                'id' => 239,
            'name' => 'Virgin Islands (USA)',
                'capital' => 'Charlotte Amalie',
                'active' => 0,
            ),
            239 =>
            array (
                'id' => 240,
                'name' => 'Wallis and Futuna Islands',
                'capital' => 'Mata-Utu',
                'active' => 0,
            ),
            240 =>
            array (
                'id' => 241,
                'name' => 'Western Sahara',
                'capital' => 'El Aaiun',
                'active' => 0,
            ),
            241 =>
            array (
                'id' => 242,
                'name' => 'Yemen',
                'capital' => 'San\'a',
                'active' => 0,
            ),
            242 =>
            array (
                'id' => 243,
                'name' => 'Zambia',
                'capital' => 'Lusaka',
                'active' => 0,
            ),
            243 =>
            array (
                'id' => 244,
                'name' => 'Zimbabwe',
                'capital' => 'Harare',
                'active' => 0,
            ),
        ));


    }
}
