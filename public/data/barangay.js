$("#municipality").change(function () {
var jsonBarangay = {
    "Apalit": [
        {
            "id": 1,
            "barCode": "100",
            "munCode": "1",
            "barName": "Balucuc (Nuestra Señora de la Divina Pastora)"
        },
        {
            "id": 2,
            "barCode": "101",
            "munCode": "1",
            "barName": "Calantipe (Sto. Niño)"
        },
        {
            "id": 3,
            "barCode": "102",
            "munCode": "1",
            "barName": "Cansinala (Nuestra Señora del Rosario)"
        },
        {
            "id": 4,
            "barCode": "103",
            "munCode": "1",
            "barName": "Capalangan (Holy Cross)"
        },
        {
            "id": 5,
            "barCode": "104",
            "munCode": "1",
            "barName": "Colgante (Holy Family)"
        },
        {
            "id": 6,
            "barCode": "105",
            "munCode": "1",
            "barName": "Paligui (Chair of St. Peter / Apu Iru)"
        },
        {
            "id": 7,
            "barCode": "106",
            "munCode": "1",
            "barName": "Sampaloc (San Roque)"
        },
        {
            "id": 8,
            "barCode": "107",
            "munCode": "1",
            "barName": "San Juan (San Juan Nepomuceno) (Poblacion)"
        },
        {
            "id": 9,
            "barCode": "108",
            "munCode": "1",
            "barName": "San Vicente (San Vicente Ferrer) (Business District)"
        },
        {
            "id": 10,
            "barCode": "109",
            "munCode": "1",
            "barName": "Sucad (Sta. Lucia)"
        },
        {
            "id": 11,
            "barCode": "110",
            "munCode": "1",
            "barName": "Sulipan (Christ the Eternal High Priest)"
        },
        {
            "id": 12,
            "barCode": "111",
            "munCode": "1",
            "barName": "Tabuyuc (Santo Rosario)"
        }
    ],

"Arayat": [
{
    "id": 13,
    "barCode": "112",
    "munCode": "2",
    "barName": "Arenas"
},
{
    "id": 14,
    "barCode": "113",
    "munCode": "2",
    "barName": "Baliti"
},
{
    "id": 15,
    "barCode": "114",
    "munCode": "2",
    "barName": "Batasan"
},
{
    "id": 16,
    "barCode": "115",
    "munCode": "2",
    "barName": "Buensuceso"
},
{
    "id": 17,
    "barCode": "116",
    "munCode": "2",
    "barName": "Candating"
},
{
    "id": 18,
    "barCode": "117",
    "munCode": "2",
    "barName": "Gatiawin"
},
{
    "id": 19,
    "barCode": "118",
    "munCode": "2",
    "barName": "Guemasan"
},
{
    "id": 20,
    "barCode": "119",
    "munCode": "2",
    "barName": "La Paz (Turu)"
},
{
    "id": 21,
    "barCode": "120",
    "munCode": "2",
    "barName": "Lacmit"
},
{
    "id": 22,
    "barCode": "121",
    "munCode": "2",
    "barName": "Lacquios"
},
{
    "id": 23,
    "barCode": "122",
    "munCode": "2",
    "barName": "Mangga-Cacutud"
},
{
    "id": 24,
    "barCode": "123",
    "munCode": "2",
    "barName": "Mapalad"
},
{
    "id": 25,
    "barCode": "124",
    "munCode": "2",
    "barName": "Palinlang"
},
{
    "id": 26,
    "barCode": "125",
    "munCode": "2",
    "barName": "Paralaya"
},
{
    "id": 27,
    "barCode": "126",
    "munCode": "2",
    "barName": "Plazang Luma"
},
{
    "id": 28,
    "barCode": "127",
    "munCode": "2",
    "barName": "Poblacion"
},
{
    "id": 29,
    "barCode": "128",
    "munCode": "2",
    "barName": "San Agustin Norte"
},
{
    "id": 30,
    "barCode": "129",
    "munCode": "2",
    "barName": "San Agustin Sur"
},
{
    "id": 31,
    "barCode": "130",
    "munCode": "2",
    "barName": "San Antonio"
},
{
    "id": 32,
    "barCode": "131",
    "munCode": "2",
    "barName": "San Jose Mesulo"
},
{
    "id": 33,
    "barCode": "132",
    "munCode": "2",
    "barName": "San Juan Bano"
},
{
    "id": 34,
    "barCode": "133",
    "munCode": "2",
    "barName": "San Mateo"
},
{
    "id": 35,
    "barCode": "134",
    "munCode": "2",
    "barName": "San Nicolas"
},
{
    "id": 36,
    "barCode": "135",
    "munCode": "2",
    "barName": "San Roque Bitas"
},
{
    "id": 37,
    "barCode": "136",
    "munCode": "2",
    "barName": "Cupang (Santa Lucia)"
},
{
    "id": 38,
    "barCode": "137",
    "munCode": "2",
    "barName": "Matamo (Santa Lucia)"
},
{
    "id": 39,
    "barCode": "138",
    "munCode": "2",
    "barName": "Santo Niño Tabuan"
},
{
    "id": 40,
    "barCode": "139",
    "munCode": "2",
    "barName": "Suclayin"
},
{
    "id": 41,
    "barCode": "140",
    "munCode": "2",
    "barName": "Telapayong"
},
{
    "id": 42,
    "barCode": "141",
    "munCode": "2",
    "barName": "Kaledian (Camba)"
}
],
    "Bacolor": [
        {
            "id": 43,
            "barCode": "142",
            "munCode": "3",
            "barName": "Balas"
        },
        {
            "id": 44,
            "barCode": "143",
            "munCode": "3",
            "barName": "Cabalantian"
        },
        {
            "id": 45,
            "barCode": "144",
            "munCode": "3",
            "barName": "Cabambangan (Poblacion)"
        },
        {
            "id": 46,
            "barCode": "145",
            "munCode": "3",
            "barName": "Cabetican"
        },
        {
            "id": 47,
            "barCode": "146",
            "munCode": "3",
            "barName": "Calibutbut"
        },
        {
            "id": 48,
            "barCode": "147",
            "munCode": "3",
            "barName": "Concepcion"
        },
        {
            "id": 49,
            "barCode": "148",
            "munCode": "3",
            "barName": "Dolores"
        },
        {
            "id": 50,
            "barCode": "149",
            "munCode": "3",
            "barName": "Duat"
        },
        {
            "id": 51,
            "barCode": "150",
            "munCode": "3",
            "barName": "Macabacle"
        },
        {
            "id": 52,
            "barCode": "151",
            "munCode": "3",
            "barName": "Magliman"
        },
        {
            "id": 53,
            "barCode": "152",
            "munCode": "3",
            "barName": "Maliwalu"
        },
        {
            "id": 54,
            "barCode": "153",
            "munCode": "3",
            "barName": "Mesalipit"
        },
        {
            "id": 55,
            "barCode": "154",
            "munCode": "3",
            "barName": "Parulog"
        },
        {
            "id": 56,
            "barCode": "155",
            "munCode": "3",
            "barName": "Potrero"
        },
        {
            "id": 57,
            "barCode": "156",
            "munCode": "3",
            "barName": "San Antonio"
        },
        {
            "id": 58,
            "barCode": "157",
            "munCode": "3",
            "barName": "San Isidro"
        },
        {
            "id": 59,
            "barCode": "158",
            "munCode": "3",
            "barName": "San Vicente"
        },
        {
            "id": 60,
            "barCode": "159",
            "munCode": "3",
            "barName": "Santa Barbara"
        },
        {
            "id": 61,
            "barCode": "160",
            "munCode": "3",
            "barName": "Santa Ines"
        },
        {
            "id": 62,
            "barCode": "161",
            "munCode": "3",
            "barName": "Talba"
        },
        {
            "id": 63,
            "barCode": "162",
            "munCode": "3",
            "barName": "Tinajero"
        }

    ],

        "Candaba": [
            {
                "id": 64,
                "barCode": "163",
                "munCode": "4",
                "barName": "Bahay Pare"
            },
            {
                "id": 65,
                "barCode": "164",
                "munCode": "4",
                "barName": "Bambang"
            },
            {
                "id": 66,
                "barCode": "165",
                "munCode": "4",
                "barName": "Barangca"
            },
            {
                "id": 67,
                "barCode": "166",
                "munCode": "4",
                "barName": "Barit"
            },
            {
                "id": 68,
                "barCode": "167",
                "munCode": "4",
                "barName": "Buas (Poblacion)"
            },
            {
                "id": 69,
                "barCode": "168",
                "munCode": "4",
                "barName": "Cuayang Bugtong"
            },
            {
                "id": 70,
                "barCode": "169",
                "munCode": "4",
                "barName": "Dalayap"
            },
            {
                "id": 71,
                "barCode": "170",
                "munCode": "4",
                "barName": "Dulong Ilog"
            },
            {
                "id": 72,
                "barCode": "171",
                "munCode": "4",
                "barName": "Gulap"
            },
            {
                "id": 73,
                "barCode": "172",
                "munCode": "4",
                "barName": "Lanang"
            },
            {
                "id": 74,
                "barCode": "173",
                "munCode": "4",
                "barName": "Lourdes"
            },
            {
                "id": 75,
                "barCode": "174",
                "munCode": "4",
                "barName": "Magumbali"
            },
            {
                "id": 76,
                "barCode": "175",
                "munCode": "4",
                "barName": "Mandasig"
            },
            {
                "id": 77,
                "barCode": "176",
                "munCode": "4",
                "barName": "Mandili"
            },
            {
                "id": 78,
                "barCode": "177",
                "munCode": "4",
                "barName": "Mangga"
            },
            {
                "id": 79,
                "barCode": "178",
                "munCode": "4",
                "barName": "Mapaniqui"
            },
            {
                "id": 80,
                "barCode": "179",
                "munCode": "4",
                "barName": "Paligui"
            },
            {
                "id": 81,
                "barCode": "180",
                "munCode": "4",
                "barName": "Pangclara"
            },
            {
                "id": 82,
                "barCode": "181",
                "munCode": "4",
                "barName": "Pansinao"
            },
            {
                "id": 83,
                "barCode": "182",
                "munCode": "4",
                "barName": "Paralaya (Poblacion)"
            },
            {
                "id": 84,
                "barCode": "183",
                "munCode": "4",
                "barName": "Pasig"
            },
            {
                "id": 85,
                "barCode": "184",
                "munCode": "4",
                "barName": "Pescadores (Poblacion)"
            },
            {
                "id": 86,
                "barCode": "185",
                "munCode": "4",
                "barName": "Pulong Gubat"
            },
            {
                "id": 87,
                "barCode": "186",
                "munCode": "4",
                "barName": "Pulong Palazan"
            },
            {
                "id": 88,
                "barCode": "187",
                "munCode": "4",
                "barName": "Salapungan"
            },
            {
                "id": 89,
                "barCode": "188",
                "munCode": "4",
                "barName": "San Agustin (Poblacion)"
            },
            {
                "id": 90,
                "barCode": "189",
                "munCode": "4",
                "barName": "Santo Rosario"
            },
            {
                "id": 91,
                "barCode": "190",
                "munCode": "4",
                "barName": "Tagulod"
            },
            {
                "id": 92,
                "barCode": "191",
                "munCode": "4",
                "barName": "Talang"
            },
            {
                "id": 93,
                "barCode": "192",
                "munCode": "4",
                "barName": "Tenejero"
            },
            {
                "id": 94,
                "barCode": "193",
                "munCode": "4",
                "barName": "Vizal San Pablo"
            },
            {
                "id": 95,
                "barCode": "194",
                "munCode": "4",
                "barName": "Vizal Santo Cristo"
            },
            {
                "id": 96,
                "barCode": "195",
                "munCode": "4",
                "barName": "Vizal Santo Niño"
            }
        ],

            "Floridablanca": [
                {
                    "id": 97,
                    "barCode": "196",
                    "munCode": "5",
                    "barName": "Anon"
                },
                {
                    "id": 98,
                    "barCode": "197",
                    "munCode": "5",
                    "barName": "Apalit"
                },
                {
                    "id": 99,
                    "barCode": "198",
                    "munCode": "5",
                    "barName": "Basa Air Base"
                },
                {
                    "id": 100,
                    "barCode": "199",
                    "munCode": "5",
                    "barName": "Benedicto"
                },
                {
                    "id": 101,
                    "barCode": "200",
                    "munCode": "5",
                    "barName": "Bodega"
                },
                {
                    "id": 102,
                    "barCode": "201",
                    "munCode": "5",
                    "barName": "Cabangcalan"
                },
                {
                    "id": 103,
                    "barCode": "202",
                    "munCode": "5",
                    "barName": "Calabasa"
                },
                {
                    "id": 104,
                    "barCode": "203",
                    "munCode": "5",
                    "barName": "Calantas"
                },
                {
                    "id": 105,
                    "barCode": "204",
                    "munCode": "5",
                    "barName": "Carmencita"
                },
                {
                    "id": 106,
                    "barCode": "205",
                    "munCode": "5",
                    "barName": "Consuelo"
                },
                {
                    "id": 107,
                    "barCode": "206",
                    "munCode": "5",
                    "barName": "Dampe"
                },
                {
                    "id": 108,
                    "barCode": "207",
                    "munCode": "5",
                    "barName": "Del Carmen"
                },
                {
                    "id": 109,
                    "barCode": "208",
                    "munCode": "5",
                    "barName": "Fortuna"
                },
                {
                    "id": 110,
                    "barCode": "209",
                    "munCode": "5",
                    "barName": "Gutad"
                },
                {
                    "id": 111,
                    "barCode": "210",
                    "munCode": "5",
                    "barName": "Mabical"
                },
                {
                    "id": 112,
                    "barCode": "211",
                    "munCode": "5",
                    "barName": "Malabo"
                },
                {
                    "id": 113,
                    "barCode": "212",
                    "munCode": "5",
                    "barName": "Maligaya"
                },
                {
                    "id": 114,
                    "barCode": "213",
                    "munCode": "5",
                    "barName": "Nabuclod"
                },
                {
                    "id": 115,
                    "barCode": "214",
                    "munCode": "5",
                    "barName": "Pabanlag"
                },
                {
                    "id": 116,
                    "barCode": "215",
                    "munCode": "5",
                    "barName": "Paguiruan"
                },
                {
                    "id": 117,
                    "barCode": "216",
                    "munCode": "5",
                    "barName": "Palmayo"
                },
                {
                    "id": 118,
                    "barCode": "217",
                    "munCode": "5",
                    "barName": "Pandaguirig"
                },
                {
                    "id": 119,
                    "barCode": "218",
                    "munCode": "5",
                    "barName": "Poblacion"
                },
                {
                    "id": 120,
                    "barCode": "219",
                    "munCode": "5",
                    "barName": "San Antonio"
                },
                {
                    "id": 121,
                    "barCode": "220",
                    "munCode": "5",
                    "barName": "San Isidro"
                },
                {
                    "id": 122,
                    "barCode": "221",
                    "munCode": "5",
                    "barName": "San Jose"
                },
                {
                    "id": 123,
                    "barCode": "222",
                    "munCode": "5",
                    "barName": "San Nicolas"
                },
                {
                    "id": 124,
                    "barCode": "223",
                    "munCode": "5",
                    "barName": "San Pedro"
                },
                {
                    "id": 125,
                    "barCode": "224",
                    "munCode": "5",
                    "barName": "San Ramon"
                },
                {
                    "id": 126,
                    "barCode": "225",
                    "munCode": "5",
                    "barName": "San Roque"
                },
                {
                    "id": 127,
                    "barCode": "226",
                    "munCode": "5",
                    "barName": "Santa Monica"
                },
                {
                    "id": 128,
                    "barCode": "227",
                    "munCode": "5",
                    "barName": "Solib"
                },
                {
                    "id": 129,
                    "barCode": "228",
                    "munCode": "5",
                    "barName": "Valdez"
                },
                {
                    "id": 130,
                    "barCode": "229",
                    "munCode": "5",
                    "barName": "Mawacat"
                }
            ],

                "Guagua": [

                    {
                        "id": 131,
                        "barCode": "300",
                        "munCode": "6",
                        "barName": "Bancal"
                    },
                    {
                        "id": 132,
                        "barCode": "301",
                        "munCode": "6",
                        "barName": "Plaza Burgos"
                    },
                    {
                        "id": 133,
                        "barCode": "302",
                        "munCode": "6",
                        "barName": "San Nicolas 1st"
                    },
                    {
                        "id": 134,
                        "barCode": "303",
                        "munCode": "6",
                        "barName": "San Pedro"
                    },
                    {
                        "id": 135,
                        "barCode": "304",
                        "munCode": "6",
                        "barName": "San Rafael"
                    },
                    {
                        "id": 136,
                        "barCode": "305",
                        "munCode": "6",
                        "barName": "San Roque"
                    },
                    {
                        "id": 137,
                        "barCode": "306",
                        "munCode": "6",
                        "barName": "Sta. Filomena"
                    },
                    {
                        "id": 138,
                        "barCode": "307",
                        "munCode": "6",
                        "barName": "Sto. Cristo"
                    },
                    {
                        "id": 139,
                        "barCode": "308",
                        "munCode": "6",
                        "barName": "Sto. Niño"
                    },
                    {
                        "id": 140,
                        "barCode": "309",
                        "munCode": "6",
                        "barName": "San Vicente (Ebus)"
                    },
                    {
                        "id": 141,
                        "barCode": "310",
                        "munCode": "6",
                        "barName": "Lambac"
                    },
                    {
                        "id": 142,
                        "barCode": "311",
                        "munCode": "6",
                        "barName": "Magsaysay"
                    },
                    {
                        "id": 143,
                        "barCode": "312",
                        "munCode": "6",
                        "barName": "Maquiapo"
                    },
                    {
                        "id": 144,
                        "barCode": "313",
                        "munCode": "6",
                        "barName": "Natividad"
                    },
                    {
                        "id": 145,
                        "barCode": "314",
                        "munCode": "6",
                        "barName": "Pulungmasle"
                    },
                    {
                        "id": 146,
                        "barCode": "315",
                        "munCode": "6",
                        "barName": "Rizal"
                    },
                    {
                        "id": 147,
                        "barCode": "316",
                        "munCode": "6",
                        "barName": "Ascomo"
                    },
                    {
                        "id": 148,
                        "barCode": "317",
                        "munCode": "6",
                        "barName": "Jose Abad Santos (Siran)"
                    },
                    {
                        "id": 149,
                        "barCode": "318",
                        "munCode": "6",
                        "barName": "San Pablo"
                    },
                    {
                        "id": 150,
                        "barCode": "319",
                        "munCode": "6",
                        "barName": "San Juan 1st"
                    },
                    {
                        "id": 151,
                        "barCode": "320",
                        "munCode": "6",
                        "barName": "San Jose"
                    },
                    {
                        "id": 152,
                        "barCode": "321",
                        "munCode": "6",
                        "barName": "San Matias"
                    },
                    {
                        "id": 153,
                        "barCode": "322",
                        "munCode": "6",
                        "barName": "San Isidro"
                    },
                    {
                        "id": 154,
                        "barCode": "323",
                        "munCode": "6",
                        "barName": "San Antonio"
                    },
                    {
                        "id": 155,
                        "barCode": "324",
                        "munCode": "6",
                        "barName": "San Agustin"
                    },
                    {
                        "id": 156,
                        "barCode": "325",
                        "munCode": "6",
                        "barName": "San Juan Bautista"
                    },
                    {
                        "id": 157,
                        "barCode": "326",
                        "munCode": "6",
                        "barName": "San Juan Nepomuceno"
                    },
                    {
                        "id": 158,
                        "barCode": "327",
                        "munCode": "6",
                        "barName": "San Miguel"
                    },
                    {
                        "id": 159,
                        "barCode": "328",
                        "munCode": "6",
                        "barName": "San Nicolas 2nd"
                    },
                    {
                        "id": 160,
                        "barCode": "329",
                        "munCode": "6",
                        "barName": "Sta. Ines"
                    },
                    {
                        "id": 161,
                        "barCode": "330",
                        "munCode": "6",
                        "barName": "Sta. Ursula"
                    }
                ],

                    "Lubao": [

                        {
                            "id": 162,
                            "barCode": "331",
                            "munCode": "7",
                            "barName": "San Isidro"
                        },
                        {
                            "id": 163,
                            "barCode": "332",
                            "munCode": "7",
                            "barName": "Santiago"
                        },
                        {
                            "id": 164,
                            "barCode": "333",
                            "munCode": "7",
                            "barName": "Santo Niño (Prado Saba)"
                        },
                        {
                            "id": 165,
                            "barCode": "334",
                            "munCode": "7",
                            "barName": "San Roque Arbol"
                        },
                        {
                            "id": 166,
                            "barCode": "335",
                            "munCode": "7",
                            "barName": "Baruya (San Rafael)"
                        },
                        {
                            "id": 167,
                            "barCode": "336",
                            "munCode": "7",
                            "barName": "Lourdes (Lauc Pau)"
                        },
                        {
                            "id": 168,
                            "barCode": "337",
                            "munCode": "7",
                            "barName": "Prado Siongco"
                        },
                        {
                            "id": 169,
                            "barCode": "338",
                            "munCode": "7",
                            "barName": "San Jose Gumi"
                        },
                        {
                            "id": 170,
                            "barCode": "339",
                            "munCode": "7",
                            "barName": "Balantacan"
                        },
                        {
                            "id": 171,
                            "barCode": "340",
                            "munCode": "7",
                            "barName": "Santa Teresa 2nd"
                        },
                        {
                            "id": 172,
                            "barCode": "341",
                            "munCode": "7",
                            "barName": "Bancal Sinubli"
                        },
                        {
                            "id": 173,
                            "barCode": "342",
                            "munCode": "7",
                            "barName": "Bancal Pugad"
                        },
                        {
                            "id": 174,
                            "barCode": "343",
                            "munCode": "7",
                            "barName": "Calangain"
                        },
                        {
                            "id": 175,
                            "barCode": "344",
                            "munCode": "7",
                            "barName": "San Pedro Palcarangan"
                        },
                        {
                            "id": 176,
                            "barCode": "345",
                            "munCode": "7",
                            "barName": "San Pedro Saug"
                        },
                        {
                            "id": 177,
                            "barCode": "346",
                            "munCode": "7",
                            "barName": "San Pablo 1st"
                        },
                        {
                            "id": 178,
                            "barCode": "347",
                            "munCode": "7",
                            "barName": "San Pablo 2nd"
                        },
                        {
                            "id": 179,
                            "barCode": "348",
                            "munCode": "7",
                            "barName": "De La Paz"
                        },
                        {
                            "id": 180,
                            "barCode": "349",
                            "munCode": "7",
                            "barName": "Santa Cruz"
                        },
                        {
                            "id": 181,
                            "barCode": "350",
                            "munCode": "7",
                            "barName": "Remedios"
                        },
                        {
                            "id": 182,
                            "barCode": "351",
                            "munCode": "7",
                            "barName": "Santa Maria"
                        },
                        {
                            "id": 183,
                            "barCode": "352",
                            "munCode": "7",
                            "barName": "Del Carmen"
                        },
                        {
                            "id": 184,
                            "barCode": "353",
                            "munCode": "7",
                            "barName": "San Agustin"
                        },
                        {
                            "id": 185,
                            "barCode": "354",
                            "munCode": "7",
                            "barName": "Santa Rita"
                        },
                        {
                            "id": 186,
                            "barCode": "355",
                            "munCode": "7",
                            "barName": "Santa Teresa 1st"
                        },
                        {
                            "id": 187,
                            "barCode": "356",
                            "munCode": "7",
                            "barName": "Santo Tomas (Poblacion)"
                        },
                        {
                            "id": 188,
                            "barCode": "357",
                            "munCode": "7",
                            "barName": "San Roque Dau"
                        },
                        {
                            "id": 189,
                            "barCode": "358",
                            "munCode": "7",
                            "barName": "Santo Cristo"
                        },
                        {
                            "id": 190,
                            "barCode": "359",
                            "munCode": "7",
                            "barName": "San Matias"
                        },
                        {
                            "id": 191,
                            "barCode": "360",
                            "munCode": "7",
                            "barName": "Don Ignacio Dimson"
                        },
                        {
                            "id": 192,
                            "barCode": "361",
                            "munCode": "7",
                            "barName": "Santa Monica"
                        },
                        {
                            "id": 193,
                            "barCode": "362",
                            "munCode": "7",
                            "barName": "Santo Domingo"
                        },
                        {
                            "id": 194,
                            "barCode": "363",
                            "munCode": "7",
                            "barName": "San Miguel"
                        },
                        {
                            "id": 195,
                            "barCode": "364",
                            "munCode": "7",
                            "barName": "Concepcion"
                        },
                        {
                            "id": 196,
                            "barCode": "365",
                            "munCode": "7",
                            "barName": "San Francisco"
                        },
                        {
                            "id": 197,
                            "barCode": "366",
                            "munCode": "7",
                            "barName": "San Vicente"
                        },
                        {
                            "id": 198,
                            "barCode": "367",
                            "munCode": "7",
                            "barName": "San Antonio"
                        },
                        {
                            "id": 199,
                            "barCode": "368",
                            "munCode": "7",
                            "barName": "San Jose Apunan"
                        },
                        {
                            "id": 200,
                            "barCode": "369",
                            "munCode": "7",
                            "barName": "San Nicolas 2nd"
                        },
                        {
                            "id": 201,
                            "barCode": "370",
                            "munCode": "7",
                            "barName": "San Juan (Poblacion)"
                        },
                        {
                            "id": 202,
                            "barCode": "371",
                            "munCode": "7",
                            "barName": "San Nicolas 1st (Poblacion)"
                        },
                        {
                            "id": 203,
                            "barCode": "372",
                            "munCode": "7",
                            "barName": "Santa Barbara"
                        },
                        {
                            "id": 204,
                            "barCode": "373",
                            "munCode": "7",
                            "barName": "Santa Catalina"
                        },
                        {
                            "id": 205,
                            "barCode": "374",
                            "munCode": "7",
                            "barName": "Santa Lucia (Poblacion)"
                        }
                    ],

                        "Macabebe": [
                            {
                                "id": 206,
                                "barCode": "375",
                                "munCode": "8",
                                "barName": "Batasan [Bitas]"
                            },
                            {
                                "id": 207,
                                "barCode": "376",
                                "munCode": "8",
                                "barName": "Caduang Tete"
                            },
                            {
                                "id": 208,
                                "barCode": "377",
                                "munCode": "8",
                                "barName": "Candelaria"
                            },
                            {
                                "id": 209,
                                "barCode": "378",
                                "munCode": "8",
                                "barName": "Castuli"
                            },
                            {
                                "id": 210,
                                "barCode": "379",
                                "munCode": "8",
                                "barName": "Consuelo"
                            },
                            {
                                "id": 211,
                                "barCode": "380",
                                "munCode": "8",
                                "barName": "Dalayap"
                            },
                            {
                                "id": 212,
                                "barCode": "381",
                                "munCode": "8",
                                "barName": "Mataguiti"
                            },
                            {
                                "id": 213,
                                "barCode": "382",
                                "munCode": "8",
                                "barName": "San Esteban"
                            },
                            {
                                "id": 214,
                                "barCode": "383",
                                "munCode": "8",
                                "barName": "San Francisco"
                            },
                            {
                                "id": 215,
                                "barCode": "384",
                                "munCode": "8",
                                "barName": "San Gabriel (Poblacion)"
                            },
                            {
                                "id": 216,
                                "barCode": "385",
                                "munCode": "8",
                                "barName": "San Isidro (Poblacion)"
                            },
                            {
                                "id": 217,
                                "barCode": "386",
                                "munCode": "8",
                                "barName": "San Jose"
                            },
                            {
                                "id": 218,
                                "barCode": "387",
                                "munCode": "8",
                                "barName": "San Juan"
                            },
                            {
                                "id": 219,
                                "barCode": "388",
                                "munCode": "8",
                                "barName": "San Rafael"
                            },
                            {
                                "id": 220,
                                "barCode": "389",
                                "munCode": "8",
                                "barName": "San Roque (Poblacion)"
                            },
                            {
                                "id": 221,
                                "barCode": "390",
                                "munCode": "8",
                                "barName": "San Vicente"
                            },
                            {
                                "id": 222,
                                "barCode": "391",
                                "munCode": "8",
                                "barName": "Santa Cruz (Poblacion)"
                            },
                            {
                                "id": 223,
                                "barCode": "392",
                                "munCode": "8",
                                "barName": "Santa Lutgarda"
                            },
                            {
                                "id": 224,
                                "barCode": "393",
                                "munCode": "8",
                                "barName": "Santa Maria"
                            },
                            {
                                "id": 225,
                                "barCode": "394",
                                "munCode": "8",
                                "barName": "Santa Rita (Poblacion)"
                            },
                            {
                                "id": 226,
                                "barCode": "395",
                                "munCode": "8",
                                "barName": "Santo Niño"
                            },
                            {
                                "id": 227,
                                "barCode": "396",
                                "munCode": "8",
                                "barName": "Santo Rosario (Poblacion)"
                            },
                            {
                                "id": 228,
                                "barCode": "397",
                                "munCode": "8",
                                "barName": "Sapang Pari"
                            },
                            {
                                "id": 229,
                                "barCode": "398",
                                "munCode": "8",
                                "barName": "Saplad David"
                            },
                            {
                                "id": 230,
                                "barCode": "399",
                                "munCode": "8",
                                "barName": "Tacasan"
                            },
                            {
                                "id": 231,
                                "barCode": "400",
                                "munCode": "8",
                                "barName": "Telacsan"
                            }
                        ],

                            "Magalang": [

                                {
                                    "id": 232,
                                    "barCode": "401",
                                    "munCode": "9",
                                    "barName": "Camias"
                                },
                                {
                                    "id": 233,
                                    "barCode": "402",
                                    "munCode": "9",
                                    "barName": "Dolores"
                                },
                                {
                                    "id": 234,
                                    "barCode": "403",
                                    "munCode": "9",
                                    "barName": "San Antonio"
                                },
                                {
                                    "id": 235,
                                    "barCode": "404",
                                    "munCode": "9",
                                    "barName": "San Agustin"
                                },
                                {
                                    "id": 236,
                                    "barCode": "405",
                                    "munCode": "9",
                                    "barName": "Navaling"
                                },
                                {
                                    "id": 237,
                                    "barCode": "406",
                                    "munCode": "9",
                                    "barName": "La Paz"
                                },
                                {
                                    "id": 238,
                                    "barCode": "407",
                                    "munCode": "9",
                                    "barName": "Escaler"
                                },
                                {
                                    "id": 239,
                                    "barCode": "408",
                                    "munCode": "9",
                                    "barName": "San Francisco"
                                },
                                {
                                    "id": 240,
                                    "barCode": "409",
                                    "munCode": "9",
                                    "barName": "San Ildefonso"
                                },
                                {
                                    "id": 241,
                                    "barCode": "410",
                                    "munCode": "9",
                                    "barName": "San Isidro"
                                },
                                {
                                    "id": 242,
                                    "barCode": "411",
                                    "munCode": "9",
                                    "barName": "San Jose"
                                },
                                {
                                    "id": 243,
                                    "barCode": "412",
                                    "munCode": "9",
                                    "barName": "San Miguel"
                                },
                                {
                                    "id": 244,
                                    "barCode": "413",
                                    "munCode": "9",
                                    "barName": "San Nicolas 1st (Poblacion)"
                                },
                                {
                                    "id": 245,
                                    "barCode": "414",
                                    "munCode": "9",
                                    "barName": "San Nicolas 2nd"
                                },
                                {
                                    "id": 246,
                                    "barCode": "415",
                                    "munCode": "9",
                                    "barName": "San Pablo (Poblacion)"
                                },
                                {
                                    "id": 247,
                                    "barCode": "416",
                                    "munCode": "9",
                                    "barName": "San Pedro I"
                                },
                                {
                                    "id": 248,
                                    "barCode": "417",
                                    "munCode": "9",
                                    "barName": "San Pedro II"
                                },
                                {
                                    "id": 249,
                                    "barCode": "418",
                                    "munCode": "9",
                                    "barName": "San Roque"
                                },
                                {
                                    "id": 250,
                                    "barCode": "419",
                                    "munCode": "9",
                                    "barName": "San Vicente"
                                },
                                {
                                    "id": 251,
                                    "barCode": "420",
                                    "munCode": "9",
                                    "barName": "Santa Cruz (Poblacion)"
                                },
                                {
                                    "id": 252,
                                    "barCode": "421",
                                    "munCode": "9",
                                    "barName": "Santa Lucia"
                                },
                                {
                                    "id": 253,
                                    "barCode": "422",
                                    "munCode": "9",
                                    "barName": "Santa Maria"
                                },
                                {
                                    "id": 254,
                                    "barCode": "423",
                                    "munCode": "9",
                                    "barName": "Santo Niño"
                                },
                                {
                                    "id": 255,
                                    "barCode": "424",
                                    "munCode": "9",
                                    "barName": "Santo Rosario"
                                },
                                {
                                    "id": 256,
                                    "barCode": "425",
                                    "munCode": "9",
                                    "barName": "Bucanan"
                                },
                                {
                                    "id": 257,
                                    "barCode": "426",
                                    "munCode": "9",
                                    "barName": "Turu"
                                },
                                {
                                    "id": 258,
                                    "barCode": "427",
                                    "munCode": "9",
                                    "barName": "Ayala"
                                }
                            ],

                                "Masantol": [
                                    {
                                        "id": 259,
                                        "barCode": "428",
                                        "munCode": "10",
                                        "barName": "Alauli"
                                    },
                                    {
                                        "id": 260,
                                        "barCode": "429",
                                        "munCode": "10",
                                        "barName": "Bagang"
                                    },
                                    {
                                        "id": 261,
                                        "barCode": "430",
                                        "munCode": "10",
                                        "barName": "Balibago"
                                    },
                                    {
                                        "id": 262,
                                        "barCode": "431",
                                        "munCode": "10",
                                        "barName": "Bebe Anac"
                                    },
                                    {
                                        "id": 263,
                                        "barCode": "432",
                                        "munCode": "10",
                                        "barName": "Bebe Matua"
                                    },
                                    {
                                        "id": 264,
                                        "barCode": "433",
                                        "munCode": "10",
                                        "barName": "Bulacus"
                                    },
                                    {
                                        "id": 265,
                                        "barCode": "434",
                                        "munCode": "10",
                                        "barName": "San Agustin (Caingin)"
                                    },
                                    {
                                        "id": 266,
                                        "barCode": "435",
                                        "munCode": "10",
                                        "barName": "Santa Monica (Caingin)"
                                    },
                                    {
                                        "id": 267,
                                        "barCode": "436",
                                        "munCode": "10",
                                        "barName": "Cambasi"
                                    },
                                    {
                                        "id": 268,
                                        "barCode": "437",
                                        "munCode": "10",
                                        "barName": "Malauli"
                                    },
                                    {
                                        "id": 269,
                                        "barCode": "438",
                                        "munCode": "10",
                                        "barName": "Nigui"
                                    },
                                    {
                                        "id": 270,
                                        "barCode": "439",
                                        "munCode": "10",
                                        "barName": "Palimpe"
                                    },
                                    {
                                        "id": 271,
                                        "barCode": "440",
                                        "munCode": "10",
                                        "barName": "Puti"
                                    },
                                    {
                                        "id": 272,
                                        "barCode": "441",
                                        "munCode": "10",
                                        "barName": "Sagrada (Tibagin)"
                                    },
                                    {
                                        "id": 273,
                                        "barCode": "442",
                                        "munCode": "10",
                                        "barName": "San Isidro Anac"
                                    },
                                    {
                                        "id": 274,
                                        "barCode": "443",
                                        "munCode": "10",
                                        "barName": "San Isidro Matua (Poblacion)"
                                    },
                                    {
                                        "id": 275,
                                        "barCode": "444",
                                        "munCode": "10",
                                        "barName": "San Nicolas (Poblacion)"
                                    },
                                    {
                                        "id": 276,
                                        "barCode": "445",
                                        "munCode": "10",
                                        "barName": "San Pedro"
                                    },
                                    {
                                        "id": 277,
                                        "barCode": "446",
                                        "munCode": "10",
                                        "barName": "Santa Cruz"
                                    },
                                    {
                                        "id": 278,
                                        "barCode": "447",
                                        "munCode": "10",
                                        "barName": "Santa Lucia Matua"
                                    },
                                    {
                                        "id": 279,
                                        "barCode": "448",
                                        "munCode": "10",
                                        "barName": "Santa Lucia Paguiaba"
                                    },
                                    {
                                        "id": 280,
                                        "barCode": "449",
                                        "munCode": "10",
                                        "barName": "Santa Lucia Wakas"
                                    },
                                    {
                                        "id": 281,
                                        "barCode": "450",
                                        "munCode": "10",
                                        "barName": "Santa Lucia Anac (Poblacion)"
                                    },
                                    {
                                        "id": 282,
                                        "barCode": "451",
                                        "munCode": "10",
                                        "barName": "Sapang Kawayan"
                                    },
                                    {
                                        "id": 283,
                                        "barCode": "452",
                                        "munCode": "10",
                                        "barName": "Sua"
                                    },
                                    {
                                        "id": 284,
                                        "barCode": "453",
                                        "munCode": "10",
                                        "barName": "Santo Niño"
                                    },
                                    {
                                        "id": 285,
                                        "barCode": "454",
                                        "munCode": "10",
                                        "barName": "Bebe Arabia"
                                    },
                                    {
                                        "id": 286,
                                        "barCode": "455",
                                        "munCode": "10",
                                        "barName": "Sagrada 2 (sagrada dos)"
                                    }
                                ],

                                    "Mexico": [
                                        {
                                            "id": 287,
                                            "barCode": "456",
                                            "munCode": "11",
                                            "barName": "Acli"
                                        },
                                        {
                                            "id": 288,
                                            "barCode": "457",
                                            "munCode": "11",
                                            "barName": "Anao"
                                        },
                                        {
                                            "id": 289,
                                            "barCode": "458",
                                            "munCode": "11",
                                            "barName": "Balas"
                                        },
                                        {
                                            "id": 290,
                                            "barCode": "459",
                                            "munCode": "11",
                                            "barName": "Buenavista"
                                        },
                                        {
                                            "id": 291,
                                            "barCode": "460",
                                            "munCode": "11",
                                            "barName": "Camuning"
                                        },
                                        {
                                            "id": 292,
                                            "barCode": "461",
                                            "munCode": "11",
                                            "barName": "Cawayan"
                                        },
                                        {
                                            "id": 293,
                                            "barCode": "462",
                                            "munCode": "11",
                                            "barName": "Concepcion"
                                        },
                                        {
                                            "id": 294,
                                            "barCode": "463",
                                            "munCode": "11",
                                            "barName": "Culubasa"
                                        },
                                        {
                                            "id": 295,
                                            "barCode": "464",
                                            "munCode": "11",
                                            "barName": "Divisoria"
                                        },
                                        {
                                            "id": 296,
                                            "barCode": "465",
                                            "munCode": "11",
                                            "barName": "Dolores (Piring)"
                                        },
                                        {
                                            "id": 297,
                                            "barCode": "466",
                                            "munCode": "11",
                                            "barName": "Eden"
                                        },
                                        {
                                            "id": 298,
                                            "barCode": "467",
                                            "munCode": "11",
                                            "barName": "Gandus"
                                        },
                                        {
                                            "id": 299,
                                            "barCode": "468",
                                            "munCode": "11",
                                            "barName": "Lagundi"
                                        },
                                        {
                                            "id": 300,
                                            "barCode": "469",
                                            "munCode": "11",
                                            "barName": "Laput"
                                        },
                                        {
                                            "id": 301,
                                            "barCode": "470",
                                            "munCode": "11",
                                            "barName": "Laug"
                                        },
                                        {
                                            "id": 302,
                                            "barCode": "471",
                                            "munCode": "11",
                                            "barName": "Masamat"
                                        },
                                        {
                                            "id": 303,
                                            "barCode": "472",
                                            "munCode": "11",
                                            "barName": "Masangsang"
                                        },
                                        {
                                            "id": 304,
                                            "barCode": "473",
                                            "munCode": "11",
                                            "barName": "Nueva Victoria"
                                        },
                                        {
                                            "id": 305,
                                            "barCode": "474",
                                            "munCode": "11",
                                            "barName": "Pandacaqui"
                                        },
                                        {
                                            "id": 306,
                                            "barCode": "475",
                                            "munCode": "11",
                                            "barName": "Pangatlan"
                                        },
                                        {
                                            "id": 307,
                                            "barCode": "476",
                                            "munCode": "11",
                                            "barName": "Panipuan"
                                        },
                                        {
                                            "id": 308,
                                            "barCode": "477",
                                            "munCode": "11",
                                            "barName": "Parian (Poblacion)"
                                        },
                                        {
                                            "id": 309,
                                            "barCode": "478",
                                            "munCode": "11",
                                            "barName": "Sabanilla"
                                        },
                                        {
                                            "id": 310,
                                            "barCode": "479",
                                            "munCode": "11",
                                            "barName": "San Antonio"
                                        },
                                        {
                                            "id": 311,
                                            "barCode": "480",
                                            "munCode": "11",
                                            "barName": "San Carlos"
                                        },
                                        {
                                            "id": 312,
                                            "barCode": "481",
                                            "munCode": "11",
                                            "barName": "San Jose Malino"
                                        },
                                        {
                                            "id": 313,
                                            "barCode": "482",
                                            "munCode": "11",
                                            "barName": "San Jose Matulid"
                                        },
                                        {
                                            "id": 314,
                                            "barCode": "483",
                                            "munCode": "11",
                                            "barName": "San Juan"
                                        },
                                        {
                                            "id": 315,
                                            "barCode": "484",
                                            "munCode": "11",
                                            "barName": "San Lorenzo"
                                        },
                                        {
                                            "id": 316,
                                            "barCode": "485",
                                            "munCode": "11",
                                            "barName": "San Miguel"
                                        },
                                        {
                                            "id": 317,
                                            "barCode": "486",
                                            "munCode": "11",
                                            "barName": "San Nicolas"
                                        },
                                        {
                                            "id": 318,
                                            "barCode": "487",
                                            "munCode": "11",
                                            "barName": "San Pablo"
                                        },
                                        {
                                            "id": 319,
                                            "barCode": "488",
                                            "munCode": "11",
                                            "barName": "San Patricio"
                                        },
                                        {
                                            "id": 320,
                                            "barCode": "489",
                                            "munCode": "11",
                                            "barName": "San Rafael"
                                        },
                                        {
                                            "id": 321,
                                            "barCode": "490",
                                            "munCode": "11",
                                            "barName": "San Roque"
                                        },
                                        {
                                            "id": 322,
                                            "barCode": "491",
                                            "munCode": "11",
                                            "barName": "San Vicente"
                                        },
                                        {
                                            "id": 323,
                                            "barCode": "492",
                                            "munCode": "11",
                                            "barName": "Santa Cruz"
                                        },
                                        {
                                            "id": 324,
                                            "barCode": "493",
                                            "munCode": "11",
                                            "barName": "Santa Maria"
                                        },
                                        {
                                            "id": 325,
                                            "barCode": "494",
                                            "munCode": "11",
                                            "barName": "Santo Domingo"
                                        },
                                        {
                                            "id": 326,
                                            "barCode": "495",
                                            "munCode": "11",
                                            "barName": "Santo Rosario"
                                        },
                                        {
                                            "id": 327,
                                            "barCode": "496",
                                            "munCode": "11",
                                            "barName": "Sapang Maisac"
                                        },
                                        {
                                            "id": 328,
                                            "barCode": "497",
                                            "munCode": "11",
                                            "barName": "Suclaban"
                                        },
                                        {
                                            "id": 329,
                                            "barCode": "498",
                                            "munCode": "11",
                                            "barName": "Tangle"
                                        }
                                    ],

                                        "Minalin": [
                                            {
                                                "id": 330,
                                                "barCode": "499",
                                                "munCode": "12",
                                                "barName": "Bulac"
                                            },
                                            {
                                                "id": 331,
                                                "barCode": "500",
                                                "munCode": "12",
                                                "barName": "Dawe"
                                            },
                                            {
                                                "id": 332,
                                                "barCode": "501",
                                                "munCode": "12",
                                                "barName": "Lourdes"
                                            },
                                            {
                                                "id": 333,
                                                "barCode": "502",
                                                "munCode": "12",
                                                "barName": "Maniango"
                                            },
                                            {
                                                "id": 334,
                                                "barCode": "503",
                                                "munCode": "12",
                                                "barName": "San Francisco Javier"
                                            },
                                            {
                                                "id": 335,
                                                "barCode": "504",
                                                "munCode": "12",
                                                "barName": "San Francisco de Asisi"
                                            },
                                            {
                                                "id": 336,
                                                "barCode": "505",
                                                "munCode": "12",
                                                "barName": "San Isidro"
                                            },
                                            {
                                                "id": 337,
                                                "barCode": "506",
                                                "munCode": "12",
                                                "barName": "San Nicolas (Poblacion)"
                                            },
                                            {
                                                "id": 338,
                                                "barCode": "507",
                                                "munCode": "12",
                                                "barName": "San Pedro"
                                            },
                                            {
                                                "id": 339,
                                                "barCode": "508",
                                                "munCode": "12",
                                                "barName": "Santa Catalina"
                                            },
                                            {
                                                "id": 340,
                                                "barCode": "509",
                                                "munCode": "12",
                                                "barName": "Santa Maria"
                                            },
                                            {
                                                "id": 341,
                                                "barCode": "510",
                                                "munCode": "12",
                                                "barName": "Santa Rita"
                                            },
                                            {
                                                "id": 342,
                                                "barCode": "511",
                                                "munCode": "12",
                                                "barName": "Santo Domingo"
                                            },
                                            {
                                                "id": 343,
                                                "barCode": "512",
                                                "munCode": "12",
                                                "barName": "Santo Rosario"
                                            },
                                            {
                                                "id": 344,
                                                "barCode": "513",
                                                "munCode": "12",
                                                "barName": "Saplad"
                                            }
                                        ],

                                            "Porac": [
                                                {
                                                    "id": 345,
                                                    "barCode": "514",
                                                    "munCode": "13",
                                                    "barName": "Babo Pangulo"
                                                },
                                                {
                                                    "id": 346,
                                                    "barCode": "515",
                                                    "munCode": "13",
                                                    "barName": "Babo Sacan (Guanson)"
                                                },
                                                {
                                                    "id": 347,
                                                    "barCode": "516",
                                                    "munCode": "13",
                                                    "barName": "Balubad"
                                                },
                                                {
                                                    "id": 348,
                                                    "barCode": "517",
                                                    "munCode": "13",
                                                    "barName": "Calzadang Bayu"
                                                },
                                                {
                                                    "id": 349,
                                                    "barCode": "518",
                                                    "munCode": "13",
                                                    "barName": "Camias"
                                                },
                                                {
                                                    "id": 350,
                                                    "barCode": "519",
                                                    "munCode": "13",
                                                    "barName": "Cangatba"
                                                },
                                                {
                                                    "id": 351,
                                                    "barCode": "520",
                                                    "munCode": "13",
                                                    "barName": "Diaz"
                                                },
                                                {
                                                    "id": 352,
                                                    "barCode": "521",
                                                    "munCode": "13",
                                                    "barName": "Dolores (Hacienda Dolores)"
                                                },
                                                {
                                                    "id": 353,
                                                    "barCode": "522",
                                                    "munCode": "13",
                                                    "barName": "Inararo (Aetas)"
                                                },
                                                {
                                                    "id": 354,
                                                    "barCode": "523",
                                                    "munCode": "13",
                                                    "barName": "Jalung"
                                                },
                                                {
                                                    "id": 355,
                                                    "barCode": "524",
                                                    "munCode": "13",
                                                    "barName": "Mancatian"
                                                },
                                                {
                                                    "id": 356,
                                                    "barCode": "525",
                                                    "munCode": "13",
                                                    "barName": "Manibaug Libutad"
                                                },
                                                {
                                                    "id": 357,
                                                    "barCode": "526",
                                                    "munCode": "13",
                                                    "barName": "Manibaug Paralaya"
                                                },
                                                {
                                                    "id": 358,
                                                    "barCode": "527",
                                                    "munCode": "13",
                                                    "barName": "Manibaug Pasig"
                                                },
                                                {
                                                    "id": 359,
                                                    "barCode": "528",
                                                    "munCode": "13",
                                                    "barName": "Manuali"
                                                },
                                                {
                                                    "id": 360,
                                                    "barCode": "529",
                                                    "munCode": "13",
                                                    "barName": "Mitla Proper"
                                                },
                                                {
                                                    "id": 361,
                                                    "barCode": "530",
                                                    "munCode": "13",
                                                    "barName": "Palat"
                                                },
                                                {
                                                    "id": 362,
                                                    "barCode": "531",
                                                    "munCode": "13",
                                                    "barName": "Pias"
                                                },
                                                {
                                                    "id": 363,
                                                    "barCode": "532",
                                                    "munCode": "13",
                                                    "barName": "Pio"
                                                },
                                                {
                                                    "id": 364,
                                                    "barCode": "533",
                                                    "munCode": "13",
                                                    "barName": "Planas"
                                                },
                                                {
                                                    "id": 365,
                                                    "barCode": "534",
                                                    "munCode": "13",
                                                    "barName": "Poblacion"
                                                },
                                                {
                                                    "id": 366,
                                                    "barCode": "535",
                                                    "munCode": "13",
                                                    "barName": "Pulung Santol"
                                                },
                                                {
                                                    "id": 367,
                                                    "barCode": "536",
                                                    "munCode": "13",
                                                    "barName": "Salu"
                                                },
                                                {
                                                    "id": 368,
                                                    "barCode": "537",
                                                    "munCode": "13",
                                                    "barName": "San Jose Mitla"
                                                },
                                                {
                                                    "id": 369,
                                                    "barCode": "538",
                                                    "munCode": "13",
                                                    "barName": "Santa Cruz"
                                                },
                                                {
                                                    "id": 370,
                                                    "barCode": "539",
                                                    "munCode": "13",
                                                    "barName": "Sapang Uwak (Aetas)"
                                                },
                                                {
                                                    "id": 371,
                                                    "barCode": "540",
                                                    "munCode": "13",
                                                    "barName": "Sepung Bulaun (Baidbid)"
                                                },
                                                {
                                                    "id": 372,
                                                    "barCode": "541",
                                                    "munCode": "13",
                                                    "barName": "Siñura (Seniora)"
                                                },
                                                {
                                                    "id": 373,
                                                    "barCode": "542",
                                                    "munCode": "13",
                                                    "barName": "Villa Maria (Aetas)"
                                                }
                                            ],

                                                "San Luis": [
                                                    {
                                                        "id": 374,
                                                        "barCode": "543",
                                                        "munCode": "14",
                                                        "barName": "San Agustin"
                                                    },
                                                    {
                                                        "id": 375,
                                                        "barCode": "544",
                                                        "munCode": "14",
                                                        "barName": "San Carlos"
                                                    },
                                                    {
                                                        "id": 376,
                                                        "barCode": "545",
                                                        "munCode": "14",
                                                        "barName": "San Isidro"
                                                    },
                                                    {
                                                        "id": 377,
                                                        "barCode": "546",
                                                        "munCode": "14",
                                                        "barName": "San Jose"
                                                    },
                                                    {
                                                        "id": 378,
                                                        "barCode": "547",
                                                        "munCode": "14",
                                                        "barName": "San Juan"
                                                    },
                                                    {
                                                        "id": 379,
                                                        "barCode": "548",
                                                        "munCode": "14",
                                                        "barName": "San Nicolas"
                                                    },
                                                    {
                                                        "id": 380,
                                                        "barCode": "549",
                                                        "munCode": "14",
                                                        "barName": "San Roque"
                                                    },
                                                    {
                                                        "id": 381,
                                                        "barCode": "550",
                                                        "munCode": "14",
                                                        "barName": "San Sebastian"
                                                    },
                                                    {
                                                        "id": 382,
                                                        "barCode": "551",
                                                        "munCode": "14",
                                                        "barName": "Santa Catalina"
                                                    },
                                                    {
                                                        "id": 383,
                                                        "barCode": "552",
                                                        "munCode": "14",
                                                        "barName": "Santa Cruz Pambilog"
                                                    },
                                                    {
                                                        "id": 384,
                                                        "barCode": "553",
                                                        "munCode": "14",
                                                        "barName": "Santa Cruz Poblacion"
                                                    },
                                                    {
                                                        "id": 385,
                                                        "barCode": "554",
                                                        "munCode": "14",
                                                        "barName": "Santa Lucia"
                                                    },
                                                    {
                                                        "id": 386,
                                                        "barCode": "555",
                                                        "munCode": "14",
                                                        "barName": "Santa Monica"
                                                    },
                                                    {
                                                        "id": 387,
                                                        "barCode": "556",
                                                        "munCode": "14",
                                                        "barName": "Santa Rita"
                                                    },
                                                    {
                                                        "id": 388,
                                                        "barCode": "557",
                                                        "munCode": "14",
                                                        "barName": "Santo Niño"
                                                    },
                                                    {
                                                        "id": 389,
                                                        "barCode": "558",
                                                        "munCode": "14",
                                                        "barName": "Santo Rosario"
                                                    },
                                                    {
                                                        "id": 390,
                                                        "barCode": "559",
                                                        "munCode": "14",
                                                        "barName": "Santo Tomas"
                                                    }
                                                ],

                                                    "San Simon" : [
                                                        {
                                                            "id": 391,
                                                            "barCode": "600",
                                                            "munCode": "15",
                                                            "barName": "Concepcion"
                                                        },
                                                        {
                                                            "id": 392,
                                                            "barCode": "601",
                                                            "munCode": "15",
                                                            "barName": "De La Paz"
                                                        },
                                                        {
                                                            "id": 393,
                                                            "barCode": "602",
                                                            "munCode": "15",
                                                            "barName": "San Juan"
                                                        },
                                                        {
                                                            "id": 394,
                                                            "barCode": "603",
                                                            "munCode": "15",
                                                            "barName": "San Agustin"
                                                        },
                                                        {
                                                            "id": 395,
                                                            "barCode": "604",
                                                            "munCode": "15",
                                                            "barName": "San Isidro"
                                                        },
                                                        {
                                                            "id": 396,
                                                            "barCode": "605",
                                                            "munCode": "15",
                                                            "barName": "San Jose"
                                                        },
                                                        {
                                                            "id": 397,
                                                            "barCode": "606",
                                                            "munCode": "15",
                                                            "barName": "San Miguel"
                                                        },
                                                        {
                                                            "id": 398,
                                                            "barCode": "607",
                                                            "munCode": "15",
                                                            "barName": "San Nicolas"
                                                        },
                                                        {
                                                            "id": 399,
                                                            "barCode": "608",
                                                            "munCode": "15",
                                                            "barName": "San Pablo Libutad"
                                                        },
                                                        {
                                                            "id": 400,
                                                            "barCode": "609",
                                                            "munCode": "15",
                                                            "barName": "San Pablo Propio"
                                                        },
                                                        {
                                                            "id": 401,
                                                            "barCode": "610",
                                                            "munCode": "15",
                                                            "barName": "San Pedro"
                                                        },
                                                        {
                                                            "id": 402,
                                                            "barCode": "611",
                                                            "munCode": "15",
                                                            "barName": "Sta. Cruz"
                                                        },
                                                        {
                                                            "id": 403,
                                                            "barCode": "612",
                                                            "munCode": "15",
                                                            "barName": "Sta.Monica"
                                                        },
                                                        {
                                                            "id": 404,
                                                            "barCode": "613",
                                                            "munCode": "15",
                                                            "barName": "Sto. Niño"
                                                        }
                                                    ],

                                                        "Sta Ana" : [
                                                            {
                                                                "id": 405,
                                                                "barCode": "614",
                                                                "munCode": "16",
                                                                "barName": "San Agustin (Sumpung)"
                                                            },
                                                            {
                                                                "id": 406,
                                                                "barCode": "615",
                                                                "munCode": "16",
                                                                "barName": "San Bartolome (Patayum)"
                                                            },
                                                            {
                                                                "id": 407,
                                                                "barCode": "616",
                                                                "munCode": "16",
                                                                "barName": "San Joaquin (Poblacion, Canukil)"
                                                            },
                                                            {
                                                                "id": 408,
                                                                "barCode": "617",
                                                                "munCode": "16",
                                                                "barName": "San Jose (Catmun)"
                                                            },
                                                            {
                                                                "id": 409,
                                                                "barCode": "618",
                                                                "munCode": "16",
                                                                "barName": "San Juan (Tinajeru)"
                                                            },
                                                            {
                                                                "id": 410,
                                                                "barCode": "619",
                                                                "munCode": "16",
                                                                "barName": "San Nicolas (Sepung Ilug)"
                                                            },
                                                            {
                                                                "id": 411,
                                                                "barCode": "620",
                                                                "munCode": "16",
                                                                "barName": "San Pablo (Muzun)"
                                                            },
                                                            {
                                                                "id": 412,
                                                                "barCode": "621",
                                                                "munCode": "16",
                                                                "barName": "San Pedro (Calumpang)"
                                                            },
                                                            {
                                                                "id": 413,
                                                                "barCode": "622",
                                                                "munCode": "16",
                                                                "barName": "San Roque (Tuclung)"
                                                            },
                                                            {
                                                                "id": 414,
                                                                "barCode": "623",
                                                                "munCode": "16",
                                                                "barName": "Santa Lucia (Calinan)"
                                                            },
                                                            {
                                                                "id": 415,
                                                                "barCode": "624",
                                                                "munCode": "16",
                                                                "barName": "Santa Maria (Balen Bayu)"
                                                            },
                                                            {
                                                                "id": 416,
                                                                "barCode": "625",
                                                                "munCode": "16",
                                                                "barName": "Santiago (Culsara)"
                                                            },
                                                            {
                                                                "id": 417,
                                                                "barCode": "626",
                                                                "munCode": "16",
                                                                "barName": "Santo Rosario (Pagbatuan)"
                                                            }
                                                        ],

                                                            "Santo Tomas": [
                                                                {
                                                                    "id": 418,
                                                                    "barCode": "627",
                                                                    "munCode": "17",
                                                                    "barName": "Becuran"
                                                                },
                                                                {
                                                                    "id": 419,
                                                                    "barCode": "628",
                                                                    "munCode": "17",
                                                                    "barName": "Dila Dila"
                                                                },
                                                                {
                                                                    "id": 420,
                                                                    "barCode": "629",
                                                                    "munCode": "17",
                                                                    "barName": "San Agustin"
                                                                },
                                                                {
                                                                    "id": 421,
                                                                    "barCode": "630",
                                                                    "munCode": "17",
                                                                    "barName": "San Basilio"
                                                                },
                                                                {
                                                                    "id": 422,
                                                                    "barCode": "631",
                                                                    "munCode": "17",
                                                                    "barName": "San Isidro"
                                                                },
                                                                {
                                                                    "id": 423,
                                                                    "barCode": "632",
                                                                    "munCode": "17",
                                                                    "barName": "San Jose"
                                                                },
                                                                {
                                                                    "id": 424,
                                                                    "barCode": "633",
                                                                    "munCode": "17",
                                                                    "barName": "San Juan"
                                                                },
                                                                {
                                                                    "id": 425,
                                                                    "barCode": "634",
                                                                    "munCode": "17",
                                                                    "barName": "San Matias"
                                                                },
                                                                {
                                                                    "id": 426,
                                                                    "barCode": "635",
                                                                    "munCode": "17",
                                                                    "barName": "Santa Monica"
                                                                },
                                                                {
                                                                    "id": 427,
                                                                    "barCode": "636",
                                                                    "munCode": "17",
                                                                    "barName": "San Vicente"
                                                                }
                                                            ],

                                                                "Sasmuan": [
                                                                    {
                                                                        "id": 428,
                                                                        "barCode": "637",
                                                                        "munCode": "18",
                                                                        "barName": "Moras De La Paz"
                                                                    },
                                                                    {
                                                                        "id": 429,
                                                                        "barCode": "638",
                                                                        "munCode": "18",
                                                                        "barName": "Poblacion"
                                                                    },
                                                                    {
                                                                        "id": 430,
                                                                        "barCode": "639",
                                                                        "munCode": "18",
                                                                        "barName": "San Bartolome"
                                                                    },
                                                                    {
                                                                        "id": 431,
                                                                        "barCode": "640",
                                                                        "munCode": "18",
                                                                        "barName": "San Matias"
                                                                    },
                                                                    {
                                                                        "id": 432,
                                                                        "barCode": "641",
                                                                        "munCode": "18",
                                                                        "barName": "San Vicente"
                                                                    },
                                                                    {
                                                                        "id": 433,
                                                                        "barCode": "642",
                                                                        "munCode": "18",
                                                                        "barName": "Santo Rosario (Pau)"
                                                                    },
                                                                    {
                                                                        "id": 434,
                                                                        "barCode": "643",
                                                                        "munCode": "18",
                                                                        "barName": "Sapa (Santo Niño)"
                                                                    }
                                                                ],

                                                                    "Mabalacat City" : [
                                                                        {
                                                                            "id": 435,
                                                                            "barCode": "644",
                                                                            "munCode": "19",
                                                                            "barName": "Santo Tomas includes Sitio Sta. Cruz"
                                                                        },
                                                                        {
                                                                            "id": 436,
                                                                            "barCode": "645",
                                                                            "munCode": "19",
                                                                            "barName": "San Nicolas 2nd includes Sitio Remedios"
                                                                        },
                                                                        {
                                                                            "id": 437,
                                                                            "barCode": "646",
                                                                            "munCode": "19",
                                                                            "barName": "San Nicolas 1st"
                                                                        },
                                                                        {
                                                                            "id": 438,
                                                                            "barCode": "647",
                                                                            "munCode": "19",
                                                                            "barName": "Santa Lucia"
                                                                        },
                                                                        {
                                                                            "id": 439,
                                                                            "barCode": "648",
                                                                            "munCode": "19",
                                                                            "barName": "San Antonio"
                                                                        },
                                                                        {
                                                                            "id": 440,
                                                                            "barCode": "649",
                                                                            "munCode": "19",
                                                                            "barName": "San Pedro"
                                                                        },
                                                                        {
                                                                            "id": 441,
                                                                            "barCode": "650",
                                                                            "munCode": "19",
                                                                            "barName": "Santa Monica includes Sitio San Francisco"
                                                                        },
                                                                        {
                                                                            "id": 442,
                                                                            "barCode": "651",
                                                                            "munCode": "19",
                                                                            "barName": "Malusac (Sto Rosario)"
                                                                        },
                                                                        {
                                                                            "id": 443,
                                                                            "barCode": "652",
                                                                            "munCode": "19",
                                                                            "barName": "Sebitanan (Sto Cristo)"
                                                                        },
                                                                        {
                                                                            "id": 444,
                                                                            "barCode": "653",
                                                                            "munCode": "19",
                                                                            "barName": "Mabuanbuan (Sagrada Pamilya)"
                                                                        },
                                                                        {
                                                                            "id": 445,
                                                                            "barCode": "654",
                                                                            "munCode": "19",
                                                                            "barName": "Batang 1st (Sto Nino)"
                                                                        },
                                                                        {
                                                                            "id": 446,
                                                                            "barCode": "655",
                                                                            "munCode": "19",
                                                                            "barName": "Batang 2nd (San Vicente)"
                                                                        }
                                                                    ],

                                                                        "San Fernando City": [
                                                                            {
                                                                                "id": 447,
                                                                                "barCode": "656",
                                                                                "munCode": "20",
                                                                                "barName": "Atlu-Bola"
                                                                            },
                                                                            {
                                                                                "id": 448,
                                                                                "barCode": "657",
                                                                                "munCode": "20",
                                                                                "barName": "Bical"
                                                                            },
                                                                            {
                                                                                "id": 449,
                                                                                "barCode": "658",
                                                                                "munCode": "20",
                                                                                "barName": "Bundagul"
                                                                            },
                                                                            {
                                                                                "id": 450,
                                                                                "barCode": "659",
                                                                                "munCode": "20",
                                                                                "barName": "Cacutud"
                                                                            },
                                                                            {
                                                                                "id": 451,
                                                                                "barCode": "660",
                                                                                "munCode": "20",
                                                                                "barName": "Calumpang"
                                                                            },
                                                                            {
                                                                                "id": 452,
                                                                                "barCode": "661",
                                                                                "munCode": "20",
                                                                                "barName": "Camachiles"
                                                                            },
                                                                            {
                                                                                "id": 453,
                                                                                "barCode": "662",
                                                                                "munCode": "20",
                                                                                "barName": "Dapdap"
                                                                            },
                                                                            {
                                                                                "id": 454,
                                                                                "barCode": "663",
                                                                                "munCode": "20",
                                                                                "barName": "Dau"
                                                                            },
                                                                            {
                                                                                "id": 455,
                                                                                "barCode": "664",
                                                                                "munCode": "20",
                                                                                "barName": "Dolores"
                                                                            },
                                                                            {
                                                                                "id": 456,
                                                                                "barCode": "665",
                                                                                "munCode": "20",
                                                                                "barName": "Duquit"
                                                                            },
                                                                            {
                                                                                "id": 457,
                                                                                "barCode": "666",
                                                                                "munCode": "20",
                                                                                "barName": "Lakandula"
                                                                            },
                                                                            {
                                                                                "id": 458,
                                                                                "barCode": "667",
                                                                                "munCode": "20",
                                                                                "barName": "Mabiga"
                                                                            },
                                                                            {
                                                                                "id": 459,
                                                                                "barCode": "668",
                                                                                "munCode": "20",
                                                                                "barName": "Macapagal Village"
                                                                            },
                                                                            {
                                                                                "id": 460,
                                                                                "barCode": "669",
                                                                                "munCode": "20",
                                                                                "barName": "Mamatitang"
                                                                            },
                                                                            {
                                                                                "id": 461,
                                                                                "barCode": "670",
                                                                                "munCode": "20",
                                                                                "barName": "Mangalit"
                                                                            },
                                                                            {
                                                                                "id": 462,
                                                                                "barCode": "671",
                                                                                "munCode": "20",
                                                                                "barName": "Marcos Village"
                                                                            },
                                                                            {
                                                                                "id": 463,
                                                                                "barCode": "672",
                                                                                "munCode": "20",
                                                                                "barName": "Mawaque (Mauaque)"
                                                                            },
                                                                            {
                                                                                "id": 464,
                                                                                "barCode": "673",
                                                                                "munCode": "20",
                                                                                "barName": "Paralayunan"
                                                                            },
                                                                            {
                                                                                "id": 465,
                                                                                "barCode": "674",
                                                                                "munCode": "20",
                                                                                "barName": "Poblacion"
                                                                            },
                                                                            {
                                                                                "id": 466,
                                                                                "barCode": "675",
                                                                                "munCode": "20",
                                                                                "barName": "San Francisco"
                                                                            },
                                                                            {
                                                                                "id": 467,
                                                                                "barCode": "676",
                                                                                "munCode": "20",
                                                                                "barName": "San Joaquin"
                                                                            },
                                                                            {
                                                                                "id": 468,
                                                                                "barCode": "677",
                                                                                "munCode": "20",
                                                                                "barName": "Santa Ines"
                                                                            },
                                                                            {
                                                                                "id": 469,
                                                                                "barCode": "678",
                                                                                "munCode": "20",
                                                                                "barName": "Santa Maria"
                                                                            },
                                                                            {
                                                                                "id": 470,
                                                                                "barCode": "679",
                                                                                "munCode": "20",
                                                                                "barName": "Santo Rosario"
                                                                            },
                                                                            {
                                                                                "id": 471,
                                                                                "barCode": "680",
                                                                                "munCode": "20",
                                                                                "barName": "Sapang Balen"
                                                                            },
                                                                            {
                                                                                "id": 472,
                                                                                "barCode": "681",
                                                                                "munCode": "20",
                                                                                "barName": "Sapang Biabas"
                                                                            },
                                                                            {
                                                                                "id": 473,
                                                                                "barCode": "682",
                                                                                "munCode": "20",
                                                                                "barName": "Tabun"
                                                                            }
                                                                        ],

                                                                            "Angeles City" : [
                                                                                {
                                                                                    "id": 474,
                                                                                    "barCode": "683",
                                                                                    "munCode": "21",
                                                                                    "barName": "Alasas"
                                                                                },
                                                                                {
                                                                                    "id": 475,
                                                                                    "barCode": "684",
                                                                                    "munCode": "21",
                                                                                    "barName": "Baliti"
                                                                                },
                                                                                {
                                                                                    "id": 476,
                                                                                    "barCode": "685",
                                                                                    "munCode": "21",
                                                                                    "barName": "Bulaon"
                                                                                },
                                                                                {
                                                                                    "id": 477,
                                                                                    "barCode": "686",
                                                                                    "munCode": "21",
                                                                                    "barName": "Calulut"
                                                                                },
                                                                                {
                                                                                    "id": 478,
                                                                                    "barCode": "687",
                                                                                    "munCode": "21",
                                                                                    "barName": "Dela Paz Norte"
                                                                                },
                                                                                {
                                                                                    "id": 479,
                                                                                    "barCode": "688",
                                                                                    "munCode": "21",
                                                                                    "barName": "Dela Paz Sur"
                                                                                },
                                                                                {
                                                                                    "id": 480,
                                                                                    "barCode": "689",
                                                                                    "munCode": "21",
                                                                                    "barName": "Del Carmen"
                                                                                },
                                                                                {
                                                                                    "id": 481,
                                                                                    "barCode": "690",
                                                                                    "munCode": "21",
                                                                                    "barName": "Del Pilar"
                                                                                },
                                                                                {
                                                                                    "id": 482,
                                                                                    "barCode": "691",
                                                                                    "munCode": "21",
                                                                                    "barName": "Del Rosario"
                                                                                },
                                                                                {
                                                                                    "id": 483,
                                                                                    "barCode": "692",
                                                                                    "munCode": "21",
                                                                                    "barName": "Dolores"
                                                                                },
                                                                                {
                                                                                    "id": 484,
                                                                                    "barCode": "693",
                                                                                    "munCode": "21",
                                                                                    "barName": "Juliana"
                                                                                },
                                                                                {
                                                                                    "id": 485,
                                                                                    "barCode": "694",
                                                                                    "munCode": "21",
                                                                                    "barName": "Lara"
                                                                                },
                                                                                {
                                                                                    "id": 486,
                                                                                    "barCode": "695",
                                                                                    "munCode": "21",
                                                                                    "barName": "Lourdes"
                                                                                },
                                                                                {
                                                                                    "id": 487,
                                                                                    "barCode": "696",
                                                                                    "munCode": "21",
                                                                                    "barName": "Maimpis"
                                                                                },
                                                                                {
                                                                                    "id": 488,
                                                                                    "barCode": "697",
                                                                                    "munCode": "21",
                                                                                    "barName": "Magliman"
                                                                                },
                                                                                {
                                                                                    "id": 489,
                                                                                    "barCode": "698",
                                                                                    "munCode": "21",
                                                                                    "barName": "Malino"
                                                                                },
                                                                                {
                                                                                    "id": 490,
                                                                                    "barCode": "699",
                                                                                    "munCode": "21",
                                                                                    "barName": "Malpitic"
                                                                                },
                                                                                {
                                                                                    "id": 491,
                                                                                    "barCode": "700",
                                                                                    "munCode": "21",
                                                                                    "barName": "Pandaras"
                                                                                },
                                                                                {
                                                                                    "id": 492,
                                                                                    "barCode": "701",
                                                                                    "munCode": "21",
                                                                                    "barName": "Panipuan"
                                                                                },
                                                                                {
                                                                                    "id": 493,
                                                                                    "barCode": "702",
                                                                                    "munCode": "21",
                                                                                    "barName": "Pulung Bulo"
                                                                                },
                                                                                {
                                                                                    "id": 494,
                                                                                    "barCode": "703",
                                                                                    "munCode": "21",
                                                                                    "barName": "Santo Rosario (Poblacion)"
                                                                                },
                                                                                {
                                                                                    "id": 495,
                                                                                    "barCode": "704",
                                                                                    "munCode": "21",
                                                                                    "barName": "Quebiawan"
                                                                                },
                                                                                {
                                                                                    "id": 496,
                                                                                    "barCode": "705",
                                                                                    "munCode": "21",
                                                                                    "barName": "Saguin"
                                                                                },
                                                                                {
                                                                                    "id": 497,
                                                                                    "barCode": "706",
                                                                                    "munCode": "21",
                                                                                    "barName": "San Agustin"
                                                                                },
                                                                                {
                                                                                    "id": 498,
                                                                                    "barCode": "707",
                                                                                    "munCode": "21",
                                                                                    "barName": "San Felipe"
                                                                                },
                                                                                {
                                                                                    "id": 499,
                                                                                    "barCode": "708",
                                                                                    "munCode": "21",
                                                                                    "barName": "San Isidro"
                                                                                },
                                                                                {
                                                                                    "id": 500,
                                                                                    "barCode": "709",
                                                                                    "munCode": "21",
                                                                                    "barName": "San Jose"
                                                                                },
                                                                                {
                                                                                    "id": 501,
                                                                                    "barCode": "710",
                                                                                    "munCode": "21",
                                                                                    "barName": "San Juan"
                                                                                },
                                                                                {
                                                                                    "id": 502,
                                                                                    "barCode": "711",
                                                                                    "munCode": "21",
                                                                                    "barName": "San Nicolas"
                                                                                },
                                                                                {
                                                                                    "id": 503,
                                                                                    "barCode": "712",
                                                                                    "munCode": "21",
                                                                                    "barName": "San Pedro Cutud"
                                                                                },
                                                                                {
                                                                                    "id": 504,
                                                                                    "barCode": "713",
                                                                                    "munCode": "21",
                                                                                    "barName": "Santa Lucia"
                                                                                },
                                                                                {
                                                                                    "id": 505,
                                                                                    "barCode": "714",
                                                                                    "munCode": "21",
                                                                                    "barName": "Santa Teresita"
                                                                                },
                                                                                {
                                                                                    "id": 506,
                                                                                    "barCode": "715",
                                                                                    "munCode": "21",
                                                                                    "barName": "Santo Niño"
                                                                                },
                                                                                {
                                                                                    "id": 507,
                                                                                    "barCode": "716",
                                                                                    "munCode": "21",
                                                                                    "barName": "Sindalan"
                                                                                },
                                                                                {
                                                                                    "id": 508,
                                                                                    "barCode": "717",
                                                                                    "munCode": "21",
                                                                                    "barName": "Telabastagan"
                                                                                }
                                                                            ],

                                                                                "22" : [
                                                                                    {
                                                                                        "id": 509,
                                                                                        "barCode": "718",
                                                                                        "munCode": "22",
                                                                                        "barName": "Agapito del Rosario"
                                                                                    },
                                                                                    {
                                                                                        "id": 510,
                                                                                        "barCode": "719",
                                                                                        "munCode": "22",
                                                                                        "barName": "Amsic"
                                                                                    },
                                                                                    {
                                                                                        "id": 511,
                                                                                        "barCode": "720",
                                                                                        "munCode": "22",
                                                                                        "barName": "Anunas"
                                                                                    },
                                                                                    {
                                                                                        "id": 512,
                                                                                        "barCode": "721",
                                                                                        "munCode": "22",
                                                                                        "barName": "Balibago"
                                                                                    },
                                                                                    {
                                                                                        "id": 513,
                                                                                        "barCode": "722",
                                                                                        "munCode": "22",
                                                                                        "barName": "Capaya"
                                                                                    },
                                                                                    {
                                                                                        "id": 514,
                                                                                        "barCode": "723",
                                                                                        "munCode": "22",
                                                                                        "barName": "Claro M. Recto"
                                                                                    },
                                                                                    {
                                                                                        "id": 515,
                                                                                        "barCode": "724",
                                                                                        "munCode": "22",
                                                                                        "barName": "Cuayan"
                                                                                    },
                                                                                    {
                                                                                        "id": 516,
                                                                                        "barCode": "725",
                                                                                        "munCode": "22",
                                                                                        "barName": "Cutcut"
                                                                                    },
                                                                                    {
                                                                                        "id": 517,
                                                                                        "barCode": "726",
                                                                                        "munCode": "22",
                                                                                        "barName": "Cutud"
                                                                                    },
                                                                                    {
                                                                                        "id": 518,
                                                                                        "barCode": "727",
                                                                                        "munCode": "22",
                                                                                        "barName": "Lourdes North West"
                                                                                    },
                                                                                    {
                                                                                        "id": 519,
                                                                                        "barCode": "728",
                                                                                        "munCode": "22",
                                                                                        "barName": "Lourdes Sur (Talimundoc)"
                                                                                    },
                                                                                    {
                                                                                        "id": 520,
                                                                                        "barCode": "729",
                                                                                        "munCode": "22",
                                                                                        "barName": "Lourdes Sur East"
                                                                                    },
                                                                                    {
                                                                                        "id": 521,
                                                                                        "barCode": "730",
                                                                                        "munCode": "22",
                                                                                        "barName": "Malabanias"
                                                                                    },
                                                                                    {
                                                                                        "id": 522,
                                                                                        "barCode": "731",
                                                                                        "munCode": "22",
                                                                                        "barName": "Margot"
                                                                                    },
                                                                                    {
                                                                                        "id": 523,
                                                                                        "barCode": "732",
                                                                                        "munCode": "22",
                                                                                        "barName": "Ninoy Aquino (Marisol)"
                                                                                    },
                                                                                    {
                                                                                        "id": 524,
                                                                                        "barCode": "733",
                                                                                        "munCode": "22",
                                                                                        "barName": "Mining"
                                                                                    },
                                                                                    {
                                                                                        "id": 525,
                                                                                        "barCode": "734",
                                                                                        "munCode": "22",
                                                                                        "barName": "Pampang"
                                                                                    },
                                                                                    {
                                                                                        "id": 526,
                                                                                        "barCode": "735",
                                                                                        "munCode": "22",
                                                                                        "barName": "Pandan"
                                                                                    },
                                                                                    {
                                                                                        "id": 527,
                                                                                        "barCode": "736",
                                                                                        "munCode": "22",
                                                                                        "barName": "Pulungbulu"
                                                                                    },
                                                                                    {
                                                                                        "id": 528,
                                                                                        "barCode": "737",
                                                                                        "munCode": "22",
                                                                                        "barName": "Pulung Cacutud"
                                                                                    },
                                                                                    {
                                                                                        "id": 529,
                                                                                        "barCode": "738",
                                                                                        "munCode": "22",
                                                                                        "barName": "Pulung Maragul"
                                                                                    },
                                                                                    {
                                                                                        "id": 530,
                                                                                        "barCode": "739",
                                                                                        "munCode": "22",
                                                                                        "barName": "Salapungan"
                                                                                    },
                                                                                    {
                                                                                        "id": 531,
                                                                                        "barCode": "740",
                                                                                        "munCode": "22",
                                                                                        "barName": "San José"
                                                                                    },
                                                                                    {
                                                                                        "id": 532,
                                                                                        "barCode": "741",
                                                                                        "munCode": "22",
                                                                                        "barName": "San Nicolas"
                                                                                    },
                                                                                    {
                                                                                        "id": 533,
                                                                                        "barCode": "742",
                                                                                        "munCode": "22",
                                                                                        "barName": "Santa Teresita"
                                                                                    },
                                                                                    {
                                                                                        "id": 534,
                                                                                        "barCode": "743",
                                                                                        "munCode": "22",
                                                                                        "barName": "Santa Trinidad"
                                                                                    },
                                                                                    {
                                                                                        "id": 535,
                                                                                        "barCode": "744",
                                                                                        "munCode": "22",
                                                                                        "barName": "Santo Cristo"
                                                                                    },
                                                                                    {
                                                                                        "id": 536,
                                                                                        "barCode": "745",
                                                                                        "munCode": "22",
                                                                                        "barName": "Santo Domingo"
                                                                                    },
                                                                                    {
                                                                                        "id": 537,
                                                                                        "barCode": "746",
                                                                                        "munCode": "22",
                                                                                        "barName": "Santo Rosario (Población)"
                                                                                    },
                                                                                    {
                                                                                        "id": 538,
                                                                                        "barCode": "747",
                                                                                        "munCode": "22",
                                                                                        "barName": "Sapalibutad"
                                                                                    },
                                                                                    {
                                                                                        "id": 539,
                                                                                        "barCode": "748",
                                                                                        "munCode": "22",
                                                                                        "barName": "Sapangbato"
                                                                                    },
                                                                                    {
                                                                                        "id": 540,
                                                                                        "barCode": "749",
                                                                                        "munCode": "22",
                                                                                        "barName": "Tabun"
                                                                                    },
                                                                                    {
                                                                                        "id": 541,
                                                                                        "barCode": "750",
                                                                                        "munCode": "22",
                                                                                        "barName": "Virgen Delos Remedios"
                                                                                    }
                                                                                ]

};






$(document).ready(function () {
    var listItems = '<option selected disabled value="0">- Select -</option>';
    var munic =  $("#municipality").val(); 

    // var muni = "jsonBarangay" + "." + munic;
    for (var i = 0; i < muni.length; i++) {
        listItems += "<option value='" + muni[i].barCode + "'>" + muni.barName + "</option>";
    }

    $("#barangay").html(listItems);
    console.log(muni);
});

});