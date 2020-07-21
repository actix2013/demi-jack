<?php


use App\src\BlackJack;
use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/BlackJack.php";

$cardsPlayer = ["K", "J", "9"];
$cardsCroupier = ["Q", "9", "5"];
$playerWin = new BlackJack(null,null);
$playerWin->play([$cardsPlayer, $cardsCroupier]);
