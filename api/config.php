<?php

declare(strict_types=1);

const DB_HOST = '82.153.202.229';
const DB_PORT = 3306;
const DB_NAME = 's120_VPN_db';
const DB_USER = 'u120_WBJ3kOuuh5';
const DB_PASSWORD = '0QmQynYamYAlHbOtUpwsu==G';

const API_ALLOWED_ORIGIN = 'https://xokeza.github.io';

const SUBSCRIPTION_SECRET = 'k9X2m7QzL5vP8wR1tY4uI6oP3aS0dF9gH2jK5lZ8xCvBnM4qW7eR0tY3uI6oP9aS';

const SERVER_CONFIGS = [
    [
        'id' => 'auto-01',
        'name' => 'Авто-выбор сервера',
        'uri' => 'vless://758f49d3-5f5f-47e7-bfa4-4ce96faf800d@159.194.245.5:443?encryption=none&flow=xtls-rprx-vision&fp=qq&pbk=xcTXD3of3Yt5hHdIwYGZ1LjMBgiL6sqj5J33J4U4ozM&security=reality&sid=a7c31f92&sni=media.atlasparser.site&type=tcp#%F0%9F%87%AA%F0%9F%87%BA%20%D0%90%D0%B2%D1%82%D0%BE-%D0%B2%D1%8B%D0%B1%D0%BE%D1%80%20%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80%D0%B0'
    ],
    [
        'id' => 'auto-02',
        'name' => 'Авто-выбор сервера 2',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2053?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%AA%F0%9F%87%BA%20%D0%90%D0%B2%D1%82%D0%BE-%D0%B2%D1%8B%D0%B1%D0%BE%D1%80%20%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80%D0%B0%202'
    ],
    [
        'id' => 'us-01',
        'name' => 'США',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2057?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%BA%F0%9F%87%B8%20%D0%A1%D0%A8%D0%90'
    ],
    [
        'id' => 'nl-01',
        'name' => 'Нидерланды',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2056?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%B3%F0%9F%87%B1%20%D0%9D%D0%B8%D0%B4%D0%B5%D1%80%D0%BB%D0%B0%D0%BD%D0%B4%D1%8B'
    ],
    [
        'id' => 'fr-01',
        'name' => 'Франция',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2060?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%AB%F0%9F%87%B7%20%D0%A4%D1%80%D0%B0%D0%BD%D1%86%D0%B8%D1%8F'
    ],
    [
        'id' => 'de-01',
        'name' => 'Германия',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2054?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%A9%F0%9F%87%AA%20%D0%93%D0%B5%D1%80%D0%BC%D0%B0%D0%BD%D0%B8%D1%8F'
    ],
    [
        'id' => 'se-01',
        'name' => 'Швеция',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2061?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%B8%F0%9F%87%AA%20%D0%A8%D0%B2%D0%B5%D1%86%D0%B8%D1%8F'
    ],
    [
        'id' => 'es-01',
        'name' => 'Испания',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2063?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%AA%F0%9F%87%B8%20%D0%98%D1%81%D0%BF%D0%B0%D0%BD%D0%B8%D1%8F'
    ],
    [
        'id' => 'ch-01',
        'name' => 'Швейцария',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2058?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%A8%F0%9F%87%AD%20%D0%A8%D0%B2%D0%B5%D0%B9%D1%86%D0%B0%D1%80%D0%B8%D1%8F'
    ],
    [
        'id' => 'pl-01',
        'name' => 'Польша',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2062?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%B5%F0%9F%87%B1%20%D0%9F%D0%BE%D0%BB%D1%8C%D1%88%D0%B0'
    ],
    [
        'id' => 'kz-01',
        'name' => 'Казахстан',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2067?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%B0%F0%9F%87%BF%20%D0%9A%D0%B0%D0%B7%D0%B0%D1%85%D1%81%D1%82%D0%B0%D0%BD'
    ],
    [
        'id' => 'bg-01',
        'name' => 'Болгария',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2064?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%A7%F0%9F%87%AC%20%D0%91%D0%BE%D0%BB%D0%B3%D0%B0%D1%80%D0%B8%D1%8F'
    ],
    [
        'id' => 'fi-01',
        'name' => 'Финляндия',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2055?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%AB%F0%9F%87%AE%20%D0%A4%D0%B8%D0%BD%D0%BB%D1%8F%D0%BD%D0%B4%D0%B8%D1%8F'
    ],
    [
        'id' => 'gr-01',
        'name' => 'Греция',
        'uri' => 'vless://84a0ed6d-26b9-4ce7-ab0b-8e1673013264@rf.medsmm.ru:2065?encryption=none&flow=xtls-rprx-vision&fp=firefox&pbk=lJBsn9ndieTIUBzXkJUhf6O0OE8pm29_z1fUtARwL0s&security=reality&sid=937255313d6ce673&sni=www.cloudflare.com&type=tcp#%F0%9F%87%AC%F0%9F%87%B7%20%D0%93%D1%80%D0%B5%D1%86%D0%B8%D1%8F'
    ]
];