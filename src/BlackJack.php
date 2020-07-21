<?php

namespace App\src;


class BlackJack
{
    private $gameCards = [];
    private $cardsPlayer = [];
    private $cardsBank = [];

    public function __construct(?array $cardsPlayer, ?array $cardsCroupier)
    {

        if ($cardsPlayer && $cardsCroupier) {
            $this->cardsPlayer = $cardsPlayer ? $cardsPlayer : null;
            $this->cardsBank = $cardsCroupier ? $cardsCroupier : null;
        }
    }

    public function play( array $cardDesks ) : string
    {
        $this->cardsPlayer = $cardDesks[0];
        $this->cardsBank = $cardDesks[1];
        $sumPlayer = $this->getScore($this->cardsPlayer);
        if ($sumPlayer > 21)$sumPlayer = 0;
        $sumBank = $this->getScore($this->cardsBank);
        if ($sumBank > 21) $sumBank = 0;
        if($sumPlayer > $sumBank ) {
            return "player";
        } elseif ($sumPlayer === $sumBank) {
            return "par";
        } else {
            return "bank";
        }

    }

    private function getScore(array $cards) {
        $points = [];
        rsort($cards);
        $letters = preg_grep("/A|K|Q|J/",$cards);
        rsort($letters);
        $nbAs = 0;
        // calcul de la somme des cartes chiffre
        foreach ($cards as $card) {
            switch ($card) {
                case "A":
                    $nbAs++;
                    break;
                case "J":
                    break;
                case "Q":
                    break;
                case "K":
               default :
                    $points[] = intval($card);
                    break;
            }
        }
        // calcul de la somme des cartes lettres , le but est de traiter les AS en dernier
        foreach ($letters as $letter) {
            switch ($letter) {
                case "A":
                    if ((array_sum($points) + 11) > ( 21 -$nbAs +1 ) ) {
                        $points[] = 1;
                    } else {
                        $points[] = 11;
                    }
                    break;
                case "J":
                    $points[] = 10;
                    break;
                case "Q":
                    $points[] = 10;
                    break;
                case "K":
                    $points[] = 10;
                default :
                    break;
            }
        }
        return array_sum($points) ;

    }

}
