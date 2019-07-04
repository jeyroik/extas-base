# extas-base

Пакет с базовыми интерфейсами и трейтами с их реализацией.

```php
use extas\interafces\IHasName;
use extas\interafces\IHasDescription;
use extas\interafces\IHasOwner;
use extas\interafces\parameters\IHasParameters;

use extas\components\THasName;
use extas\components\THasDescription;
use extas\components\THasOwner;
use extas\components\parameters\THasParameters;
use extas\components\Item;

class Car extends Item implements IHasName, IHasDescription
{
    use THasName;
    use THasDescription;
}

$car = new Car([
    IHasName::FIELD__NAME => 'My car',
    IHasDescription::FIELD__DESCRIPTION => 'This is my car'
]);

echo $car->getName(); // 'My car'
$car->setName('Not my car');

echo $car->getDescription(); // 'This is my car'
$car->setDescription('This is not my car');

class Car2 extends Item implements IHasParameters
{
    use THasParameters;
}

$car2 = new Car2([
    IHasParameters::FIELD__PARAMETERS => [
        [
            'name' => 'height',
            'value' => '1.5m'
        ],
        [
            'name' => 'width',
            'value' => '2m'
        ]
    ]
]);

$height = $car2->getParameter('height');
echo 'Car height is "' . $height->getValue() . '"'; // 'Car height is 1.5m'

$car2->setParameter('length', ['value' => '5m', 'name' => 'length']);
$length = $car2->getParameter('length');
echo 'Car length is "' . $length->getValue() . '"'; // 'Car length is 5m'
```