<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class XmlController extends Controller {
    public function index(Request $request) {
        // Можна замість цього отримати дані з бази даних чи з будь-якого іншого джерела
        $houses = [
            [
                'Назва_будинку' => 'Будинок 1',
                'Фото' => 'https://cdn.discordapp.com/attachments/1105792496400875574/1188144152735653999/image.png?ex=65997478&is=6586ff78&hm=b516bfa3cd91825387329205551e823aa3e616c1f05b9389e8ccce1e3b8910ec&',
                'Ціна' => '$100,000',
                'Інші_характеристики' => [
                    'Кімнати' => 4,
                    'Площа' => '200 кв.м',
                    // Інші характеристики
                ],
            ],
            [
                'Назва_будинку' => 'Будинок 2',
                'Фото' => 'https://cdn.discordapp.com/attachments/1105792496400875574/1188144152735653999/image.png?ex=65997478&is=6586ff78&hm=b516bfa3cd91825387329205551e823aa3e616c1f05b9389e8ccce1e3b8910ec&',
                'Ціна' => '$150,000',
                'Інші_характеристики' => [
                    'Кімнати' => 3,
                    'Площа' => '150 кв.м',
                    // Інші характеристики
                ],
            ],
            // Додайте інші об'єкти будинків, які потрібно включити в XML
        ];

        // Створення XML з даних про будинки
        $xml_data = new \SimpleXMLElement('<?xml version="1.0"?><houses></houses>');
        $this->array_to_xml($houses, $xml_data);

        // Повернення XML-відповіді
        $response = Response::make($xml_data->asXML(), 200);
        $response->header('Content-Type', 'text/xml');

        return $response;
    }

    // Функція для конвертації масиву в XML
    private function array_to_xml($data, &$xml_data) {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xml_data->addChild("$key");
                    $this->array_to_xml($value, $subnode);
                } else {
                    $subnode = $xml_data->addChild("item$key");
                    $this->array_to_xml($value, $subnode);
                }
            } else {
                $xml_data->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}
