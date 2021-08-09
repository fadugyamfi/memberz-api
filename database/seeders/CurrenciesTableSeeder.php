<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('currencies')->delete();

        DB::table('currencies')->insert(array (
            0 =>
            array (
                'id' => 1,
                'country_id' => 1,
                'currency_name' => 'Afghanistan Afghani',
                'currency_code' => 'AFN',
                'active' => 0,
            ),
            1 =>
            array (
                'id' => 2,
                'country_id' => 2,
                'currency_name' => 'Albanian Lek',
                'currency_code' => 'ALL',
                'active' => 0,
            ),
            2 =>
            array (
                'id' => 3,
                'country_id' => 3,
                'currency_name' => 'Algerian Dinar',
                'currency_code' => 'DZD',
                'active' => 0,
            ),
            3 =>
            array (
                'id' => 4,
                'country_id' => 4,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            4 =>
            array (
                'id' => 5,
                'country_id' => 5,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            5 =>
            array (
                'id' => 6,
                'country_id' => 6,
                'currency_name' => 'Angolan Kwanza',
                'currency_code' => 'AOA',
                'active' => 0,
            ),
            6 =>
            array (
                'id' => 7,
                'country_id' => 7,
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'active' => 0,
            ),
            7 =>
            array (
                'id' => 8,
                'country_id' => 8,
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'active' => 0,
            ),
            8 =>
            array (
                'id' => 9,
                'country_id' => 9,
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'active' => 0,
            ),
            9 =>
            array (
                'id' => 10,
                'country_id' => 10,
                'currency_name' => 'Argentine Peso',
                'currency_code' => 'ARS',
                'active' => 0,
            ),
            10 =>
            array (
                'id' => 11,
                'country_id' => 11,
                'currency_name' => 'Armenian Dram',
                'currency_code' => 'AMD',
                'active' => 0,
            ),
            11 =>
            array (
                'id' => 12,
                'country_id' => 12,
                'currency_name' => 'Aruban Guilder',
                'currency_code' => 'AWG',
                'active' => 0,
            ),
            12 =>
            array (
                'id' => 13,
                'country_id' => 13,
                'currency_name' => 'Australian Dollar',
                'currency_code' => 'AUD',
                'active' => 0,
            ),
            13 =>
            array (
                'id' => 14,
                'country_id' => 14,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            14 =>
            array (
                'id' => 15,
                'country_id' => 15,
                'currency_name' => 'Azerbaijan New Manat',
                'currency_code' => 'AZN',
                'active' => 0,
            ),
            15 =>
            array (
                'id' => 16,
                'country_id' => 16,
                'currency_name' => 'Bahamian Dollar',
                'currency_code' => 'BSD',
                'active' => 0,
            ),
            16 =>
            array (
                'id' => 17,
                'country_id' => 17,
                'currency_name' => 'Bahraini Dinar',
                'currency_code' => 'BHD',
                'active' => 0,
            ),
            17 =>
            array (
                'id' => 18,
                'country_id' => 18,
                'currency_name' => 'Bangladeshi Taka',
                'currency_code' => 'BDT',
                'active' => 0,
            ),
            18 =>
            array (
                'id' => 19,
                'country_id' => 19,
                'currency_name' => 'Barbados Dollar',
                'currency_code' => 'BBD',
                'active' => 0,
            ),
            19 =>
            array (
                'id' => 20,
                'country_id' => 20,
                'currency_name' => 'Belarussian Ruble',
                'currency_code' => 'BYR',
                'active' => 0,
            ),
            20 =>
            array (
                'id' => 21,
                'country_id' => 21,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            21 =>
            array (
                'id' => 22,
                'country_id' => 22,
                'currency_name' => 'Belize Dollar',
                'currency_code' => 'BZD',
                'active' => 0,
            ),
            22 =>
            array (
                'id' => 23,
                'country_id' => 23,
                'currency_name' => 'CFA Franc BCEAO',
                'currency_code' => 'XOF',
                'active' => 1,
            ),
            23 =>
            array (
                'id' => 24,
                'country_id' => 24,
                'currency_name' => 'Bermudian Dollar',
                'currency_code' => 'BMD',
                'active' => 0,
            ),
            24 =>
            array (
                'id' => 25,
                'country_id' => 25,
                'currency_name' => 'Bhutan Ngultrum',
                'currency_code' => 'BTN',
                'active' => 0,
            ),
            25 =>
            array (
                'id' => 26,
                'country_id' => 26,
                'currency_name' => 'Boliviano',
                'currency_code' => 'BOB',
                'active' => 0,
            ),
            26 =>
            array (
                'id' => 27,
                'country_id' => 27,
                'currency_name' => 'Marka',
                'currency_code' => 'BAM',
                'active' => 0,
            ),
            27 =>
            array (
                'id' => 28,
                'country_id' => 28,
                'currency_name' => 'Botswana Pula',
                'currency_code' => 'BWP',
                'active' => 0,
            ),
            28 =>
            array (
                'id' => 29,
                'country_id' => 29,
                'currency_name' => 'Norwegian Krone',
                'currency_code' => 'NOK',
                'active' => 0,
            ),
            29 =>
            array (
                'id' => 30,
                'country_id' => 30,
                'currency_name' => 'Brazilian Real',
                'currency_code' => 'BRL',
                'active' => 0,
            ),
            30 =>
            array (
                'id' => 31,
                'country_id' => 31,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            31 =>
            array (
                'id' => 32,
                'country_id' => 32,
                'currency_name' => 'Brunei Dollar',
                'currency_code' => 'BND',
                'active' => 0,
            ),
            32 =>
            array (
                'id' => 33,
                'country_id' => 33,
                'currency_name' => 'Bulgarian Lev',
                'currency_code' => 'BGN',
                'active' => 0,
            ),
            33 =>
            array (
                'id' => 34,
                'country_id' => 34,
                'currency_name' => 'CFA Franc BCEAO',
                'currency_code' => 'XOF',
                'active' => 0,
            ),
            34 =>
            array (
                'id' => 35,
                'country_id' => 35,
                'currency_name' => 'Burundi Franc',
                'currency_code' => 'BIF',
                'active' => 0,
            ),
            35 =>
            array (
                'id' => 36,
                'country_id' => 36,
                'currency_name' => 'Kampuchean Riel',
                'currency_code' => 'KHR',
                'active' => 0,
            ),
            36 =>
            array (
                'id' => 37,
                'country_id' => 37,
                'currency_name' => 'CFA Franc BEAC',
                'currency_code' => 'XAF',
                'active' => 0,
            ),
            37 =>
            array (
                'id' => 38,
                'country_id' => 38,
                'currency_name' => 'Canadian Dollar',
                'currency_code' => 'CAD',
                'active' => 0,
            ),
            38 =>
            array (
                'id' => 39,
                'country_id' => 39,
                'currency_name' => 'Cape Verde Escudo',
                'currency_code' => 'CVE',
                'active' => 0,
            ),
            39 =>
            array (
                'id' => 40,
                'country_id' => 40,
                'currency_name' => 'Cayman Islands Dollar',
                'currency_code' => 'KYD',
                'active' => 0,
            ),
            40 =>
            array (
                'id' => 41,
                'country_id' => 41,
                'currency_name' => 'CFA Franc BEAC',
                'currency_code' => 'XAF',
                'active' => 0,
            ),
            41 =>
            array (
                'id' => 42,
                'country_id' => 42,
                'currency_name' => 'CFA Franc BEAC',
                'currency_code' => 'XAF',
                'active' => 0,
            ),
            42 =>
            array (
                'id' => 43,
                'country_id' => 43,
                'currency_name' => 'Chilean Peso',
                'currency_code' => 'CLP',
                'active' => 0,
            ),
            43 =>
            array (
                'id' => 44,
                'country_id' => 44,
                'currency_name' => 'Yuan Renminbi',
                'currency_code' => 'CNY',
                'active' => 0,
            ),
            44 =>
            array (
                'id' => 45,
                'country_id' => 45,
                'currency_name' => 'Australian Dollar',
                'currency_code' => 'AUD',
                'active' => 0,
            ),
            45 =>
            array (
                'id' => 46,
                'country_id' => 46,
                'currency_name' => 'Australian Dollar',
                'currency_code' => 'AUD',
                'active' => 0,
            ),
            46 =>
            array (
                'id' => 47,
                'country_id' => 47,
                'currency_name' => 'Colombian Peso',
                'currency_code' => 'COP',
                'active' => 0,
            ),
            47 =>
            array (
                'id' => 48,
                'country_id' => 48,
                'currency_name' => 'Comoros Franc',
                'currency_code' => 'KMF',
                'active' => 0,
            ),
            48 =>
            array (
                'id' => 49,
                'country_id' => 49,
                'currency_name' => 'CFA Franc BEAC',
                'currency_code' => 'XAF',
                'active' => 0,
            ),
            49 =>
            array (
                'id' => 50,
                'country_id' => 50,
                'currency_name' => 'Francs',
                'currency_code' => 'CDF',
                'active' => 0,
            ),
            50 =>
            array (
                'id' => 51,
                'country_id' => 51,
                'currency_name' => 'New Zealand Dollar',
                'currency_code' => 'NZD',
                'active' => 0,
            ),
            51 =>
            array (
                'id' => 52,
                'country_id' => 52,
                'currency_name' => 'Costa Rican Colon',
                'currency_code' => 'CRC',
                'active' => 0,
            ),
            52 =>
            array (
                'id' => 53,
                'country_id' => 53,
                'currency_name' => 'Croatian Kuna',
                'currency_code' => 'HRK',
                'active' => 0,
            ),
            53 =>
            array (
                'id' => 54,
                'country_id' => 54,
                'currency_name' => 'Cuban Peso',
                'currency_code' => 'CUP',
                'active' => 0,
            ),
            54 =>
            array (
                'id' => 55,
                'country_id' => 55,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            55 =>
            array (
                'id' => 56,
                'country_id' => 56,
                'currency_name' => 'Czech Koruna',
                'currency_code' => 'CZK',
                'active' => 0,
            ),
            56 =>
            array (
                'id' => 57,
                'country_id' => 57,
                'currency_name' => 'Danish Krone',
                'currency_code' => 'DKK',
                'active' => 0,
            ),
            57 =>
            array (
                'id' => 58,
                'country_id' => 58,
                'currency_name' => 'Djibouti Franc',
                'currency_code' => 'DJF',
                'active' => 0,
            ),
            58 =>
            array (
                'id' => 59,
                'country_id' => 59,
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'active' => 0,
            ),
            59 =>
            array (
                'id' => 60,
                'country_id' => 60,
                'currency_name' => 'Dominican Peso',
                'currency_code' => 'DOP',
                'active' => 0,
            ),
            60 =>
            array (
                'id' => 61,
                'country_id' => 61,
                'currency_name' => 'Ecuador Sucre',
                'currency_code' => 'ECS',
                'active' => 0,
            ),
            61 =>
            array (
                'id' => 62,
                'country_id' => 62,
                'currency_name' => 'Egyptian Pound',
                'currency_code' => 'EGP',
                'active' => 0,
            ),
            62 =>
            array (
                'id' => 63,
                'country_id' => 63,
                'currency_name' => 'El Salvador Colon',
                'currency_code' => 'SVC',
                'active' => 0,
            ),
            63 =>
            array (
                'id' => 64,
                'country_id' => 64,
                'currency_name' => 'CFA Franc BEAC',
                'currency_code' => 'XAF',
                'active' => 0,
            ),
            64 =>
            array (
                'id' => 65,
                'country_id' => 65,
                'currency_name' => 'Eritrean Nakfa',
                'currency_code' => 'ERN',
                'active' => 0,
            ),
            65 =>
            array (
                'id' => 66,
                'country_id' => 66,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            66 =>
            array (
                'id' => 67,
                'country_id' => 67,
                'currency_name' => 'Ethiopian Birr',
                'currency_code' => 'ETB',
                'active' => 0,
            ),
            67 =>
            array (
                'id' => 68,
                'country_id' => 68,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            68 =>
            array (
                'id' => 69,
                'country_id' => 69,
                'currency_name' => 'Falkland Islands Pound',
                'currency_code' => 'FKP',
                'active' => 0,
            ),
            69 =>
            array (
                'id' => 70,
                'country_id' => 70,
                'currency_name' => 'Danish Krone',
                'currency_code' => 'DKK',
                'active' => 0,
            ),
            70 =>
            array (
                'id' => 71,
                'country_id' => 71,
                'currency_name' => 'Fiji Dollar',
                'currency_code' => 'FJD',
                'active' => 0,
            ),
            71 =>
            array (
                'id' => 72,
                'country_id' => 72,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            72 =>
            array (
                'id' => 73,
                'country_id' => 73,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            73 =>
            array (
                'id' => 74,
                'country_id' => 74,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            74 =>
            array (
                'id' => 75,
                'country_id' => 75,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            75 =>
            array (
                'id' => 76,
                'country_id' => 76,
                'currency_name' => 'CFA Franc BEAC',
                'currency_code' => 'XAF',
                'active' => 0,
            ),
            76 =>
            array (
                'id' => 77,
                'country_id' => 77,
                'currency_name' => 'Gambian Dalasi',
                'currency_code' => 'GMD',
                'active' => 0,
            ),
            77 =>
            array (
                'id' => 78,
                'country_id' => 78,
                'currency_name' => 'Georgian Lari',
                'currency_code' => 'GEL',
                'active' => 0,
            ),
            78 =>
            array (
                'id' => 79,
                'country_id' => 79,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 1,
            ),
            79 =>
            array (
                'id' => 80,
                'country_id' => 80,
                'currency_name' => 'Ghanaian Cedi',
                'currency_code' => 'GHS',
                'active' => 1,
            ),
            80 =>
            array (
                'id' => 81,
                'country_id' => 81,
                'currency_name' => 'Gibraltar Pound',
                'currency_code' => 'GIP',
                'active' => 0,
            ),
            81 =>
            array (
                'id' => 82,
                'country_id' => 82,
                'currency_name' => 'Pound Sterling',
                'currency_code' => 'GBP',
                'active' => 0,
            ),
            82 =>
            array (
                'id' => 83,
                'country_id' => 83,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            83 =>
            array (
                'id' => 84,
                'country_id' => 84,
                'currency_name' => 'Danish Krone',
                'currency_code' => 'DKK',
                'active' => 0,
            ),
            84 =>
            array (
                'id' => 85,
                'country_id' => 85,
                'currency_name' => 'East Carribean Dollar',
                'currency_code' => 'XCD',
                'active' => 0,
            ),
            85 =>
            array (
                'id' => 86,
                'country_id' => 86,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            86 =>
            array (
                'id' => 87,
                'country_id' => 87,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            87 =>
            array (
                'id' => 88,
                'country_id' => 88,
                'currency_name' => 'Guatemalan Quetzal',
                'currency_code' => 'QTQ',
                'active' => 0,
            ),
            88 =>
            array (
                'id' => 89,
                'country_id' => 89,
                'currency_name' => 'Pound Sterling',
                'currency_code' => 'GGP',
                'active' => 0,
            ),
            89 =>
            array (
                'id' => 90,
                'country_id' => 90,
                'currency_name' => 'Guinea Franc',
                'currency_code' => 'GNF',
                'active' => 0,
            ),
            90 =>
            array (
                'id' => 91,
                'country_id' => 91,
                'currency_name' => 'Guinea-Bissau Peso',
                'currency_code' => 'GWP',
                'active' => 0,
            ),
            91 =>
            array (
                'id' => 92,
                'country_id' => 92,
                'currency_name' => 'Guyana Dollar',
                'currency_code' => 'GYD',
                'active' => 0,
            ),
            92 =>
            array (
                'id' => 93,
                'country_id' => 93,
                'currency_name' => 'Haitian Gourde',
                'currency_code' => 'HTG',
                'active' => 0,
            ),
            93 =>
            array (
                'id' => 94,
                'country_id' => 94,
                'currency_name' => 'Australian Dollar',
                'currency_code' => 'AUD',
                'active' => 0,
            ),
            94 =>
            array (
                'id' => 95,
                'country_id' => 95,
                'currency_name' => 'Honduran Lempira',
                'currency_code' => 'HNL',
                'active' => 0,
            ),
            95 =>
            array (
                'id' => 96,
                'country_id' => 96,
                'currency_name' => 'Hong Kong Dollar',
                'currency_code' => 'HKD',
                'active' => 0,
            ),
            96 =>
            array (
                'id' => 97,
                'country_id' => 97,
                'currency_name' => 'Hungarian Forint',
                'currency_code' => 'HUF',
                'active' => 0,
            ),
            97 =>
            array (
                'id' => 98,
                'country_id' => 98,
                'currency_name' => 'Iceland Krona',
                'currency_code' => 'ISK',
                'active' => 0,
            ),
            98 =>
            array (
                'id' => 99,
                'country_id' => 99,
                'currency_name' => 'Indian Rupee',
                'currency_code' => 'INR',
                'active' => 0,
            ),
            99 =>
            array (
                'id' => 100,
                'country_id' => 100,
                'currency_name' => 'Indonesian Rupiah',
                'currency_code' => 'IDR',
                'active' => 0,
            ),
            100 =>
            array (
                'id' => 101,
                'country_id' => 101,
                'currency_name' => 'Iranian Rial',
                'currency_code' => 'IRR',
                'active' => 0,
            ),
            101 =>
            array (
                'id' => 102,
                'country_id' => 102,
                'currency_name' => 'Iraqi Dinar',
                'currency_code' => 'IQD',
                'active' => 0,
            ),
            102 =>
            array (
                'id' => 103,
                'country_id' => 103,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            103 =>
            array (
                'id' => 104,
                'country_id' => 104,
                'currency_name' => 'Pound Sterling',
                'currency_code' => 'GBP',
                'active' => 0,
            ),
            104 =>
            array (
                'id' => 105,
                'country_id' => 105,
                'currency_name' => 'Israeli New Shekel',
                'currency_code' => 'ILS',
                'active' => 0,
            ),
            105 =>
            array (
                'id' => 106,
                'country_id' => 106,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            106 =>
            array (
                'id' => 107,
                'country_id' => 107,
                'currency_name' => 'CFA Franc BCEAO',
                'currency_code' => 'XOF',
                'active' => 1,
            ),
            107 =>
            array (
                'id' => 108,
                'country_id' => 108,
                'currency_name' => 'Jamaican Dollar',
                'currency_code' => 'JMD',
                'active' => 0,
            ),
            108 =>
            array (
                'id' => 109,
                'country_id' => 109,
                'currency_name' => 'Japanese Yen',
                'currency_code' => 'JPY',
                'active' => 0,
            ),
            109 =>
            array (
                'id' => 110,
                'country_id' => 110,
                'currency_name' => 'Pound Sterling',
                'currency_code' => 'GBP',
                'active' => 0,
            ),
            110 =>
            array (
                'id' => 111,
                'country_id' => 111,
                'currency_name' => 'Jordanian Dinar',
                'currency_code' => 'JOD',
                'active' => 0,
            ),
            111 =>
            array (
                'id' => 112,
                'country_id' => 112,
                'currency_name' => 'Kazakhstan Tenge',
                'currency_code' => 'KZT',
                'active' => 0,
            ),
            112 =>
            array (
                'id' => 113,
                'country_id' => 113,
                'currency_name' => 'Kenyan Shilling',
                'currency_code' => 'KES',
                'active' => 1,
            ),
            113 =>
            array (
                'id' => 114,
                'country_id' => 114,
                'currency_name' => 'Australian Dollar',
                'currency_code' => 'AUD',
                'active' => 0,
            ),
            114 =>
            array (
                'id' => 115,
                'country_id' => 115,
                'currency_name' => 'North Korean Won',
                'currency_code' => 'KPW',
                'active' => 0,
            ),
            115 =>
            array (
                'id' => 116,
                'country_id' => 116,
                'currency_name' => 'Korean Won',
                'currency_code' => 'KRW',
                'active' => 0,
            ),
            116 =>
            array (
                'id' => 117,
                'country_id' => 117,
                'currency_name' => 'Kuwaiti Dinar',
                'currency_code' => 'KWD',
                'active' => 0,
            ),
            117 =>
            array (
                'id' => 118,
                'country_id' => 118,
                'currency_name' => 'Som',
                'currency_code' => 'KGS',
                'active' => 0,
            ),
            118 =>
            array (
                'id' => 119,
                'country_id' => 119,
                'currency_name' => 'Lao Kip',
                'currency_code' => 'LAK',
                'active' => 0,
            ),
            119 =>
            array (
                'id' => 120,
                'country_id' => 120,
                'currency_name' => 'Latvian Lats',
                'currency_code' => 'LVL',
                'active' => 0,
            ),
            120 =>
            array (
                'id' => 121,
                'country_id' => 121,
                'currency_name' => 'Lebanese Pound',
                'currency_code' => 'LBP',
                'active' => 0,
            ),
            121 =>
            array (
                'id' => 122,
                'country_id' => 122,
                'currency_name' => 'Lesotho Loti',
                'currency_code' => 'LSL',
                'active' => 0,
            ),
            122 =>
            array (
                'id' => 123,
                'country_id' => 123,
                'currency_name' => 'Liberian Dollar',
                'currency_code' => 'LRD',
                'active' => 0,
            ),
            123 =>
            array (
                'id' => 124,
                'country_id' => 124,
                'currency_name' => 'Libyan Dinar',
                'currency_code' => 'LYD',
                'active' => 0,
            ),
            124 =>
            array (
                'id' => 125,
                'country_id' => 125,
                'currency_name' => 'Swiss Franc',
                'currency_code' => 'CHF',
                'active' => 0,
            ),
            125 =>
            array (
                'id' => 126,
                'country_id' => 126,
                'currency_name' => 'Lithuanian Litas',
                'currency_code' => 'LTL',
                'active' => 0,
            ),
            126 =>
            array (
                'id' => 127,
                'country_id' => 127,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            127 =>
            array (
                'id' => 128,
                'country_id' => 128,
                'currency_name' => 'Macau Pataca',
                'currency_code' => 'MOP',
                'active' => 0,
            ),
            128 =>
            array (
                'id' => 129,
                'country_id' => 129,
                'currency_name' => 'Denar',
                'currency_code' => 'MKD',
                'active' => 0,
            ),
            129 =>
            array (
                'id' => 130,
                'country_id' => 130,
                'currency_name' => 'Malagasy Franc',
                'currency_code' => 'MGF',
                'active' => 0,
            ),
            130 =>
            array (
                'id' => 131,
                'country_id' => 131,
                'currency_name' => 'Malawi Kwacha',
                'currency_code' => 'MWK',
                'active' => 0,
            ),
            131 =>
            array (
                'id' => 132,
                'country_id' => 132,
                'currency_name' => 'Malaysian Ringgit',
                'currency_code' => 'MYR',
                'active' => 0,
            ),
            132 =>
            array (
                'id' => 133,
                'country_id' => 133,
                'currency_name' => 'Maldive Rufiyaa',
                'currency_code' => 'MVR',
                'active' => 0,
            ),
            133 =>
            array (
                'id' => 134,
                'country_id' => 134,
                'currency_name' => 'CFA Franc BCEAO',
                'currency_code' => 'XOF',
                'active' => 0,
            ),
            134 =>
            array (
                'id' => 135,
                'country_id' => 135,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            135 =>
            array (
                'id' => 136,
                'country_id' => 136,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            136 =>
            array (
                'id' => 137,
                'country_id' => 137,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            137 =>
            array (
                'id' => 138,
                'country_id' => 138,
                'currency_name' => 'Mauritanian Ouguiya',
                'currency_code' => 'MRO',
                'active' => 0,
            ),
            138 =>
            array (
                'id' => 139,
                'country_id' => 139,
                'currency_name' => 'Mauritius Rupee',
                'currency_code' => 'MUR',
                'active' => 0,
            ),
            139 =>
            array (
                'id' => 140,
                'country_id' => 140,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            140 =>
            array (
                'id' => 141,
                'country_id' => 141,
                'currency_name' => 'Mexican Nuevo Peso',
                'currency_code' => 'MXN',
                'active' => 0,
            ),
            141 =>
            array (
                'id' => 142,
                'country_id' => 142,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            142 =>
            array (
                'id' => 143,
                'country_id' => 143,
                'currency_name' => 'Moldovan Leu',
                'currency_code' => 'MDL',
                'active' => 0,
            ),
            143 =>
            array (
                'id' => 144,
                'country_id' => 144,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            144 =>
            array (
                'id' => 145,
                'country_id' => 145,
                'currency_name' => 'Mongolian Tugrik',
                'currency_code' => 'MNT',
                'active' => 0,
            ),
            145 =>
            array (
                'id' => 146,
                'country_id' => 146,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            146 =>
            array (
                'id' => 147,
                'country_id' => 147,
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'active' => 0,
            ),
            147 =>
            array (
                'id' => 148,
                'country_id' => 148,
                'currency_name' => 'Moroccan Dirham',
                'currency_code' => 'MAD',
                'active' => 0,
            ),
            148 =>
            array (
                'id' => 149,
                'country_id' => 149,
                'currency_name' => 'Mozambique Metical',
                'currency_code' => 'MZN',
                'active' => 0,
            ),
            149 =>
            array (
                'id' => 150,
                'country_id' => 150,
                'currency_name' => 'Myanmar Kyat',
                'currency_code' => 'MMK',
                'active' => 0,
            ),
            150 =>
            array (
                'id' => 151,
                'country_id' => 151,
                'currency_name' => 'Namibian Dollar',
                'currency_code' => 'NAD',
                'active' => 0,
            ),
            151 =>
            array (
                'id' => 152,
                'country_id' => 152,
                'currency_name' => 'Australian Dollar',
                'currency_code' => 'AUD',
                'active' => 0,
            ),
            152 =>
            array (
                'id' => 153,
                'country_id' => 153,
                'currency_name' => 'Nepalese Rupee',
                'currency_code' => 'NPR',
                'active' => 0,
            ),
            153 =>
            array (
                'id' => 154,
                'country_id' => 154,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            154 =>
            array (
                'id' => 155,
                'country_id' => 155,
                'currency_name' => 'Netherlands Antillean Guilder',
                'currency_code' => 'ANG',
                'active' => 0,
            ),
            155 =>
            array (
                'id' => 156,
                'country_id' => 156,
                'currency_name' => 'CFP Franc',
                'currency_code' => 'XPF',
                'active' => 0,
            ),
            156 =>
            array (
                'id' => 157,
                'country_id' => 157,
                'currency_name' => 'New Zealand Dollar',
                'currency_code' => 'NZD',
                'active' => 0,
            ),
            157 =>
            array (
                'id' => 158,
                'country_id' => 158,
                'currency_name' => 'Nicaraguan Cordoba Oro',
                'currency_code' => 'NIO',
                'active' => 0,
            ),
            158 =>
            array (
                'id' => 159,
                'country_id' => 159,
                'currency_name' => 'CFA Franc BCEAO',
                'currency_code' => 'XOF',
                'active' => 0,
            ),
            159 =>
            array (
                'id' => 160,
                'country_id' => 160,
                'currency_name' => 'Nigerian Naira',
                'currency_code' => 'NGN',
                'active' => 1,
            ),
            160 =>
            array (
                'id' => 161,
                'country_id' => 161,
                'currency_name' => 'New Zealand Dollar',
                'currency_code' => 'NZD',
                'active' => 0,
            ),
            161 =>
            array (
                'id' => 162,
                'country_id' => 162,
                'currency_name' => 'Australian Dollar',
                'currency_code' => 'AUD',
                'active' => 0,
            ),
            162 =>
            array (
                'id' => 163,
                'country_id' => 163,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            163 =>
            array (
                'id' => 164,
                'country_id' => 164,
                'currency_name' => 'Norwegian Krone',
                'currency_code' => 'NOK',
                'active' => 0,
            ),
            164 =>
            array (
                'id' => 165,
                'country_id' => 165,
                'currency_name' => 'Omani Rial',
                'currency_code' => 'OMR',
                'active' => 0,
            ),
            165 =>
            array (
                'id' => 166,
                'country_id' => 166,
                'currency_name' => 'Pakistan Rupee',
                'currency_code' => 'PKR',
                'active' => 0,
            ),
            166 =>
            array (
                'id' => 167,
                'country_id' => 167,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            167 =>
            array (
                'id' => 168,
                'country_id' => 168,
                'currency_name' => 'Panamanian Balboa',
                'currency_code' => 'PAB',
                'active' => 0,
            ),
            168 =>
            array (
                'id' => 169,
                'country_id' => 169,
                'currency_name' => 'Papua New Guinea Kina',
                'currency_code' => 'PGK',
                'active' => 0,
            ),
            169 =>
            array (
                'id' => 170,
                'country_id' => 170,
                'currency_name' => 'Paraguay Guarani',
                'currency_code' => 'PYG',
                'active' => 0,
            ),
            170 =>
            array (
                'id' => 171,
                'country_id' => 171,
                'currency_name' => 'Peruvian Nuevo Sol',
                'currency_code' => 'PEN',
                'active' => 0,
            ),
            171 =>
            array (
                'id' => 172,
                'country_id' => 172,
                'currency_name' => 'Philippine Peso',
                'currency_code' => 'PHP',
                'active' => 0,
            ),
            172 =>
            array (
                'id' => 173,
                'country_id' => 173,
                'currency_name' => 'New Zealand Dollar',
                'currency_code' => 'NZD',
                'active' => 0,
            ),
            173 =>
            array (
                'id' => 174,
                'country_id' => 174,
                'currency_name' => 'Polish Zloty',
                'currency_code' => 'PLN',
                'active' => 0,
            ),
            174 =>
            array (
                'id' => 175,
                'country_id' => 175,
                'currency_name' => 'CFP Franc',
                'currency_code' => 'XPF',
                'active' => 0,
            ),
            175 =>
            array (
                'id' => 176,
                'country_id' => 176,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            176 =>
            array (
                'id' => 177,
                'country_id' => 177,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            177 =>
            array (
                'id' => 178,
                'country_id' => 178,
                'currency_name' => 'Qatari Rial',
                'currency_code' => 'QAR',
                'active' => 0,
            ),
            178 =>
            array (
                'id' => 179,
                'country_id' => 179,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            179 =>
            array (
                'id' => 180,
                'country_id' => 180,
                'currency_name' => 'Romanian New Leu',
                'currency_code' => 'RON',
                'active' => 0,
            ),
            180 =>
            array (
                'id' => 181,
                'country_id' => 181,
                'currency_name' => 'Russian Ruble',
                'currency_code' => 'RUB',
                'active' => 0,
            ),
            181 =>
            array (
                'id' => 182,
                'country_id' => 182,
                'currency_name' => 'Rwanda Franc',
                'currency_code' => 'RWF',
                'active' => 0,
            ),
            182 =>
            array (
                'id' => 183,
                'country_id' => 183,
                'currency_name' => 'St. Helena Pound',
                'currency_code' => 'SHP',
                'active' => 0,
            ),
            183 =>
            array (
                'id' => 184,
                'country_id' => 184,
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'active' => 0,
            ),
            184 =>
            array (
                'id' => 185,
                'country_id' => 185,
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'active' => 0,
            ),
            185 =>
            array (
                'id' => 186,
                'country_id' => 186,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            186 =>
            array (
                'id' => 187,
                'country_id' => 187,
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'active' => 0,
            ),
            187 =>
            array (
                'id' => 188,
                'country_id' => 188,
                'currency_name' => 'Samoan Tala',
                'currency_code' => 'WST',
                'active' => 0,
            ),
            188 =>
            array (
                'id' => 189,
                'country_id' => 189,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            189 =>
            array (
                'id' => 190,
                'country_id' => 190,
                'currency_name' => 'Dobra',
                'currency_code' => 'STD',
                'active' => 0,
            ),
            190 =>
            array (
                'id' => 191,
                'country_id' => 191,
                'currency_name' => 'Saudi Riyal',
                'currency_code' => 'SAR',
                'active' => 0,
            ),
            191 =>
            array (
                'id' => 192,
                'country_id' => 192,
                'currency_name' => 'CFA Franc BCEAO',
                'currency_code' => 'XOF',
                'active' => 0,
            ),
            192 =>
            array (
                'id' => 193,
                'country_id' => 193,
                'currency_name' => 'Dinar',
                'currency_code' => 'RSD',
                'active' => 0,
            ),
            193 =>
            array (
                'id' => 194,
                'country_id' => 194,
                'currency_name' => 'Seychelles Rupee',
                'currency_code' => 'SCR',
                'active' => 0,
            ),
            194 =>
            array (
                'id' => 195,
                'country_id' => 195,
                'currency_name' => 'Sierra Leone Leone',
                'currency_code' => 'SLL',
                'active' => 0,
            ),
            195 =>
            array (
                'id' => 196,
                'country_id' => 196,
                'currency_name' => 'Singapore Dollar',
                'currency_code' => 'SGD',
                'active' => 0,
            ),
            196 =>
            array (
                'id' => 197,
                'country_id' => 197,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            197 =>
            array (
                'id' => 198,
                'country_id' => 198,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            198 =>
            array (
                'id' => 199,
                'country_id' => 199,
                'currency_name' => 'Solomon Islands Dollar',
                'currency_code' => 'SBD',
                'active' => 0,
            ),
            199 =>
            array (
                'id' => 200,
                'country_id' => 200,
                'currency_name' => 'Somali Shilling',
                'currency_code' => 'SOS',
                'active' => 0,
            ),
            200 =>
            array (
                'id' => 201,
                'country_id' => 201,
                'currency_name' => 'South African Rand',
                'currency_code' => 'ZAR',
                'active' => 1,
            ),
            201 =>
            array (
                'id' => 202,
                'country_id' => 202,
                'currency_name' => 'Pound Sterling',
                'currency_code' => 'GBP',
                'active' => 0,
            ),
            202 =>
            array (
                'id' => 203,
                'country_id' => 203,
                'currency_name' => 'South Sudan Pound',
                'currency_code' => 'SSP',
                'active' => 0,
            ),
            203 =>
            array (
                'id' => 204,
                'country_id' => 204,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            204 =>
            array (
                'id' => 205,
                'country_id' => 205,
                'currency_name' => 'Sri Lanka Rupee',
                'currency_code' => 'LKR',
                'active' => 0,
            ),
            205 =>
            array (
                'id' => 206,
                'country_id' => 206,
                'currency_name' => 'Sudanese Pound',
                'currency_code' => 'SDG',
                'active' => 0,
            ),
            206 =>
            array (
                'id' => 207,
                'country_id' => 207,
                'currency_name' => 'Surinam Dollar',
                'currency_code' => 'SRD',
                'active' => 0,
            ),
            207 =>
            array (
                'id' => 208,
                'country_id' => 208,
                'currency_name' => 'Norwegian Krone',
                'currency_code' => 'NOK',
                'active' => 0,
            ),
            208 =>
            array (
                'id' => 209,
                'country_id' => 209,
                'currency_name' => 'Swaziland Lilangeni',
                'currency_code' => 'SZL',
                'active' => 0,
            ),
            209 =>
            array (
                'id' => 210,
                'country_id' => 210,
                'currency_name' => 'Swedish Krona',
                'currency_code' => 'SEK',
                'active' => 0,
            ),
            210 =>
            array (
                'id' => 211,
                'country_id' => 211,
                'currency_name' => 'Swiss Franc',
                'currency_code' => 'CHF',
                'active' => 1,
            ),
            211 =>
            array (
                'id' => 212,
                'country_id' => 212,
                'currency_name' => 'Syrian Pound',
                'currency_code' => 'SYP',
                'active' => 0,
            ),
            212 =>
            array (
                'id' => 213,
                'country_id' => 213,
                'currency_name' => 'Taiwan Dollar',
                'currency_code' => 'TWD',
                'active' => 0,
            ),
            213 =>
            array (
                'id' => 214,
                'country_id' => 214,
                'currency_name' => 'Tajik Somoni',
                'currency_code' => 'TJS',
                'active' => 0,
            ),
            214 =>
            array (
                'id' => 215,
                'country_id' => 215,
                'currency_name' => 'Tanzanian Shilling',
                'currency_code' => 'TZS',
                'active' => 0,
            ),
            215 =>
            array (
                'id' => 216,
                'country_id' => 216,
                'currency_name' => 'Thai Baht',
                'currency_code' => 'THB',
                'active' => 0,
            ),
            216 =>
            array (
                'id' => 217,
                'country_id' => 217,
                'currency_name' => 'CFA Franc BCEAO',
                'currency_code' => 'XOF',
                'active' => 0,
            ),
            217 =>
            array (
                'id' => 218,
                'country_id' => 218,
                'currency_name' => 'New Zealand Dollar',
                'currency_code' => 'NZD',
                'active' => 0,
            ),
            218 =>
            array (
                'id' => 219,
                'country_id' => 219,
                'currency_name' => 'Tongan Pa\'anga',
                'currency_code' => 'TOP',
                'active' => 0,
            ),
            219 =>
            array (
                'id' => 220,
                'country_id' => 220,
                'currency_name' => 'Trinidad and Tobago Dollar',
                'currency_code' => 'TTD',
                'active' => 0,
            ),
            220 =>
            array (
                'id' => 221,
                'country_id' => 221,
                'currency_name' => 'Tunisian Dollar',
                'currency_code' => 'TND',
                'active' => 0,
            ),
            221 =>
            array (
                'id' => 222,
                'country_id' => 222,
                'currency_name' => 'Turkish Lira',
                'currency_code' => 'TRY',
                'active' => 0,
            ),
            222 =>
            array (
                'id' => 223,
                'country_id' => 223,
                'currency_name' => 'Manat',
                'currency_code' => 'TMT',
                'active' => 0,
            ),
            223 =>
            array (
                'id' => 224,
                'country_id' => 224,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            224 =>
            array (
                'id' => 225,
                'country_id' => 225,
                'currency_name' => 'Australian Dollar',
                'currency_code' => 'AUD',
                'active' => 0,
            ),
            225 =>
            array (
                'id' => 226,
                'country_id' => 226,
                'currency_name' => 'Pound Sterling',
                'currency_code' => 'GBP',
                'active' => 1,
            ),
            226 =>
            array (
                'id' => 227,
                'country_id' => 227,
                'currency_name' => 'Uganda Shilling',
                'currency_code' => 'UGX',
                'active' => 0,
            ),
            227 =>
            array (
                'id' => 228,
                'country_id' => 228,
                'currency_name' => 'Ukraine Hryvnia',
                'currency_code' => 'UAH',
                'active' => 0,
            ),
            228 =>
            array (
                'id' => 229,
                'country_id' => 229,
                'currency_name' => 'Arab Emirates Dirham',
                'currency_code' => 'AED',
                'active' => 0,
            ),
            229 =>
            array (
                'id' => 230,
                'country_id' => 230,
                'currency_name' => 'Uruguayan Peso',
                'currency_code' => 'UYU',
                'active' => 0,
            ),
            230 =>
            array (
                'id' => 231,
                'country_id' => 231,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 1,
            ),
            231 =>
            array (
                'id' => 232,
                'country_id' => 232,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            232 =>
            array (
                'id' => 233,
                'country_id' => 233,
                'currency_name' => 'Uzbekistan Sum',
                'currency_code' => 'UZS',
                'active' => 0,
            ),
            233 =>
            array (
                'id' => 234,
                'country_id' => 234,
                'currency_name' => 'Vanuatu Vatu',
                'currency_code' => 'VUV',
                'active' => 0,
            ),
            234 =>
            array (
                'id' => 235,
                'country_id' => 235,
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'active' => 0,
            ),
            235 =>
            array (
                'id' => 236,
                'country_id' => 236,
                'currency_name' => 'Venezuelan Bolivar',
                'currency_code' => 'VEF',
                'active' => 0,
            ),
            236 =>
            array (
                'id' => 237,
                'country_id' => 237,
                'currency_name' => 'Vietnamese Dong',
                'currency_code' => 'VND',
                'active' => 0,
            ),
            237 =>
            array (
                'id' => 238,
                'country_id' => 238,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            238 =>
            array (
                'id' => 239,
                'country_id' => 239,
                'currency_name' => 'US Dollar',
                'currency_code' => 'USD',
                'active' => 0,
            ),
            239 =>
            array (
                'id' => 240,
                'country_id' => 240,
                'currency_name' => 'CFP Franc',
                'currency_code' => 'XPF',
                'active' => 0,
            ),
            240 =>
            array (
                'id' => 241,
                'country_id' => 241,
                'currency_name' => 'Moroccan Dirham',
                'currency_code' => 'MAD',
                'active' => 0,
            ),
            241 =>
            array (
                'id' => 242,
                'country_id' => 242,
                'currency_name' => 'Yemeni Rial',
                'currency_code' => 'YER',
                'active' => 0,
            ),
            242 =>
            array (
                'id' => 243,
                'country_id' => 243,
                'currency_name' => 'Zambian Kwacha',
                'currency_code' => 'ZMW',
                'active' => 0,
            ),
            243 =>
            array (
                'id' => 244,
                'country_id' => 244,
                'currency_name' => 'Zimbabwe Dollar',
                'currency_code' => 'ZWD',
                'active' => 0,
            ),
        ));


    }
}
