<?php
class Calc
{
   private $a;
   private $b;
   private $num;
   private $rm;

   function __construct()
   {
       $this->setRm(0);
   }

   function setA($a)
   {
       $this->a = $a;
   }

   function getA()
   {
       return $this->a;       
   }

   function setB($b)
   {
       $this->b = $b;
   }

   function getB()
   {
       return $this->b;
   }

   function setNum($num)
   {
       $this->num = $num;
   }

   function getNum()
   {
       return $this->num;       
   }

   function setRm($num)
   {
       $this->rm = $num;
   }

   function getRm()
   {
       return $this->rm;       
   }

   function plus()
   {
       $a = $this->getA();
       $b = $this->getB();

       if($a and $b)
       {
            $res = "$a + $b = " .  $a + $b . "<br>";
       }
       return $res;
   }

   function minus()
   {
       $a = $this->getA();
       $b = $this->getB();

       if($a and $b)
       {
           $res =  $a . " - " . $b . " = " .  $a - $b . "<br>";
       }
       return $res;
   }

   function delenie()
   {
       $a = $this->getA();
       $b = $this->getB();
       if($b <= 0) return ERR1;
            if($a and $b)
            {
                $res = $a . " / " . $b . " = " .  $a / $b . "<br>";
            }
            return $res;
   }

   function umnoj()
   {
       $a = $this->getA();
       $b = $this->getB();

       if($a and $b)
       {
           $res =  $a . " * " . $b . " = " .  $a * $b . "<br>";
       }
       return $res;
   }

   function koren()
   {
       $num = $this->getNum();

       if($num)
       {
           $res =  "Korenb iz $num = " . sqrt($num) . "<br>";
       }
       return $res;
   }
    
   function proc($proc)
   {
       $num = $this->getNum();

       if($num)
       {
           $res =  "$proc% ot  $num = " . $num * $proc / 100 . "<br>";
       }
       return $res;
   }
  
   function mPlus($num)
   {
       $rm = $this->getRm();
       $rm = $rm + $num;
   }

   function mMinus($num)
   {
       $rm = $this->getRm();
       $rm = $rm - $num;
   }

   function mR()
   {
       return $this->getRm();
   }

   function mC()
   {
       $this->setRm(0);
   }

   function __destruct(){}
}
