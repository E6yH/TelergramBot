<?php
  $chat_id = $_GET['chat_id'];
  $first_name = $_GET['first_name'];
  $message = $_GET['message'];
  file_put_contents('log.txt', 'input:'. date('d.m.Y G:i', time()) . PHP_EOL . "$chat_id $first_name $message". PHP_EOL, FILE_APPEND);  
  
  $access_token = '248518376:AAGDYgvpnspXHoyuU8L2KWkRFwo5gjokjpM';
  $api = 'https://api.telegram.org/bot' . $access_token;
  if (!preg_match("/тоха/i", mb_convert_case ($message, MB_CASE_LOWER, "UTF-8"))) {
    die();
  } 
  $dict = array('Сижки', 'Бухло', 'Пивко', 'Водочка', 'Дрочка', 'Виталюр', 'На недельку', 'Двуха', 'Пилснер', 'Чмо',
  'Член', 'Кто знал?', 'Трубы', 'Филимонова', 'Слепянка', 'Работаем', 'Тёлка', 'Шлюха', 'Куприяного', 'Хотлайн', 'Танки',
  'Соответвенно себе', 'Стрим', 'Варгейминг', 'Бухать', 'Наливаю', 'Первый Ipad', 'Тру детектив', 'ВТВ', 'Дрочим клиентам',
  'Ларёк', 'Заправочка', 'Хоты', 'Соусы', 'Тёлка', 'Классика', 'Очко', 'Дрочить');  
  $text = getRandomWord($dict).' '.getRandomWord($dict).' '.getRandomWord($dict);
  sendMessage($chat_id, $text);  
  http_response_code(200);
  
function sendMessage($chat_id, $message) {
  file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message));
}  
function getRandomWord($arr){
  return $arr[mt_rand(0, count($arr) - 1)];
}
?>
