<?php

trait Calcolatore {
    public function sum($a, $b){
        return $a + $b;
    }

    public function sub($a, $b){
        return $a - $b;
    }

    public function mul($a, $b){
        return $a * $b;
    }

    public function div($a, $b){
        // Aggiungo un controllo per evitare la divisione per zero
        if ($b == 0) {
            return "Errore: divisione per zero non consentita.";
        }
        return $a / $b;
    }

    public function sqr($a){
        return sqrt($a);
    }
}

class Rettangolo {
    use Calcolatore; // Uso il trait Calcolatore nella classe Rettangolo

    public $base;
    public $altezza;

    public function __construct($base, $altezza){
        $this->base = $base;
        $this->altezza = $altezza;
    }

    public function calcolaArea(){
        return $this->mul($this->base, $this->altezza);
    }

    public function calcolaPerimetro() {
        return $this->sum($this->mul(2, $this->base), $this->mul(2, $this->altezza));
    }

    public function calcolaDiagonale(){
        $baseQuad = $this->mul($this->base, $this->base);
        $altezzaQuad = $this->mul($this->altezza, $this->altezza);
        return $this->sqr($this->sum($baseQuad, $altezzaQuad));
    }
}

$rettangolo = new Rettangolo(5, 12);
echo "Area: " . $rettangolo->calcolaArea() . "\n";
echo "Perimetro: " . $rettangolo->calcolaPerimetro() . "\n";
echo "Diagonale: " . $rettangolo->calcolaDiagonale() . "\n";

?>
