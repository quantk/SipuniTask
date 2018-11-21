# Задание на позицию PHP Developer
Нужно написать функцию (или класс), которая принимает utf8-текст и возвращает текст, в котором буквы слов отсортированы в алфавитном порядке.

примеры: 
'lemon orange banana apple' ---> 'elmno aegnor aaabnn aelpp' 
'лимон апельсин банан яблоко' ---> 'илмно аеилнпсь аабнн бклооя' 
'αβγαβγ αβγαβγαβγ' ---> 'ααββγγ αααβββγγγ'

1. оформить результат как готовый проект на github 
2. использовать composer для автозагрузки классов и зависимостей 
3. покрыть код unit-тестами

# Использование
```php
use App\Reader\Reader;
use App\TextSorter\TextSorter;


require_once __DIR__ . '/vendor/autoload.php';

$reader = new Reader();

try {
    $textSorter = new TextSorter();
    $reader->open('./text.txt');

    foreach ($reader->getLines() as $line) {
        echo $textSorter->sort($line) . PHP_EOL;
    }
} catch (\Throwable $e) {
    $reader->close();
    throw $e;
}

```