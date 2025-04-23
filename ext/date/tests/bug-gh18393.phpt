--TEST--
Test DateTime::diff() with DST transitions in Europe/Berlin
--FILE--
<?php
date_default_timezone_set('UTC');

$ref = new DateTime('2024-01-01 00:00:00', new DateTimeZone('Europe/Berlin'));
$t1 = new DateTime('2024-03-31 12:00:00', new DateTimeZone('Europe/Berlin'));
$t2 = new DateTime('2024-04-01 12:00:00', new DateTimeZone('Europe/Berlin'));
$t3 = new DateTime('2024-10-27 12:00:00', new DateTimeZone('Europe/Berlin'));
$t4 = new DateTime('2024-10-28 12:00:00', new DateTimeZone('Europe/Berlin'));

// DST start
$diff1 = $ref->diff($t1);
$diff2 = $ref->diff($t2);
// DST end
$diff3 = $ref->diff($t3);
$diff4 = $ref->diff($t4);

echo('DST start' . PHP_EOL);
var_dump($diff1->h, $diff2->h);

echo('DST end' . PHP_EOL);
var_dump($diff3->h, $diff4->h);
?>
--EXPECT--
DST start
int(12)
int(12)
DST end
int(12)
int(12)
 