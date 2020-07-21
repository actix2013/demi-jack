<?php


use App\src\BlackJack;
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/BlackJack.php";

class BlackJackTest extends TestCase
{

    public function testPlayerWin () {
        $cardsPlayer = ["A","1","9"];
        $cardsCroupier = ["1", "2", "10"];
        $playerWin = new BlackJack(null,null);
        $this->assertSame("player",$playerWin->play([$cardsPlayer, $cardsCroupier]));
    }

    public function testPlayerLose()
    {
        $cardsPlayer = ["1", "1", "10"];
        $cardsCroupier = ["1", "2", "10"];
        $playerWin = new BlackJack(null, null);
        $this->assertSame("bank", $playerWin->play([$cardsPlayer, $cardsCroupier]));
    }

    public function testPlayerDualAsLoose()
    {
        $cardsPlayer = ["A", "A", "10"];
        $cardsCroupier = ["6", "2", "5"];
        $playerWin = new BlackJack(null, null);
        $this->assertSame("bank", $playerWin->play([$cardsPlayer, $cardsCroupier]));
    }

    public function testPlayerDualAsWin()
    {
        $cardsPlayer = ["A", "A", "9"];
        $cardsCroupier = ["1", "2", "5"];
        $playerWin = new BlackJack(null, null);
        $this->assertSame("player", $playerWin->play([$cardsPlayer, $cardsCroupier]));
        $cardsPlayer = ["9", "A", "A"];
        $cardsCroupier = ["1", "2", "5"];
        $this->assertSame("player", $playerWin->play([$cardsPlayer, $cardsCroupier]));

    }

    public function testAllOver()
    {
        $cardsPlayer = ["K", "J", "9"];
        $cardsCroupier = ["Q", "9", "5"];
        $playerWin = new BlackJack(null, null);
        $this->assertSame("par", $playerWin->play([$cardsPlayer, $cardsCroupier]));
    }

    public function testEquals()
    {
        $cardsPlayer = ["A", "2", "9"];
        $cardsCroupier = ["2", "9", "A"];
        $playerWin = new BlackJack(null, null);
        $this->assertSame("par", $playerWin->play([$cardsPlayer, $cardsCroupier]));
    }

    public function allOver()
    {
        $cardsPlayer = ["K", "K", "K"];
        $cardsCroupier = ["J", "J", "J"];
        $playerWin = new BlackJack(null, null);
        $this->assertSame("par", $playerWin->play([$cardsPlayer, $cardsCroupier]));
    }

    public function allOver2()
    {
        $cardsPlayer = ["Q","K", "K", "K"];
        $cardsCroupier = ["J", "J", "J"];
        $playerWin = new BlackJack(null, null);
        $this->assertSame("par", $playerWin->play([$cardsPlayer, $cardsCroupier]));
    }


}
