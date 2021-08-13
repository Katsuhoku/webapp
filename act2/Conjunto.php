<?php
    class Conjunto {
        public static $min = 1;
        public static $max = 20;
        
        private $nombre;
        private $valores;

        public function __construct(string $nombre, array $valores = null, int $tamaño = 0) {
            $this->nombre = $nombre;
            if ($valores == null)
                for ($i = 0 ; $i < $tamaño ; $i++)
                    $this->valores[$i] = rand(Conjunto::$min, Conjunto::$max);
            else
                $this->valores = $valores;
        }

        function union(Conjunto $conjunto) : Conjunto {
            $valores = array();
            
            foreach ($this->valores as $v) $valores[$v] = $v;
            foreach ($conjunto->valores as $v) $valores[$v] = $v;

            return new Conjunto("$this->nombre ∪ $conjunto->nombre", $valores);
        }

        function interseccion(Conjunto $conjunto) : Conjunto{
            $valores = array();

            foreach ($this->valores as $va) {
                foreach ($conjunto->valores as $vb)
                    if ($va == $vb)
                        $valores[$va] = $va;
            }
            return new Conjunto("$this->nombre ∩ $conjunto->nombre", $valores);
        }

        function diferencia(Conjunto $conjunto) : Conjunto {
            $valores = array();
        
            foreach ($this->valores as $va){
                $band = true;
                foreach($conjunto->valores as $vb)
                    if ($va == $vb) $band = false;
                if ($band) $valores[$va] = $va;
            }
                    
            return new Conjunto("$this->nombre - $conjunto->nombre", $valores);
        }

        public function getValores() {
            return $this->valores;
        }

        public function getTamaño() {
            return sizeof($this->valores);
        }

        public function print() {
            $tam = $this->getTamaño();
            echo "<b>$this->nombre</b>: { ";
            foreach ($this->valores as $v) {
                if ($tam > 1) {
                    echo "$v, ";
                    $tam--;
                }else echo "$v";
            }
            echo " }<br>";
        }
    }
?>
