<?php
    class Conjunto {
        private $nombre;
        private $valores;

        public function __construct(string $nombre, array $valores) {
            $this->nombre = $nombre;
            $this->valores = $valores;
        }

        public function union(Conjunto $conjunto) : Conjunto {
            $valores = array();
            
            foreach ($this->valores as $key => $value) $valores[$key] = $value;
            foreach ($conjunto->getValores() as $key => $value) $valores[$key] = $value;

            return new Conjunto("$this->nombre ∪ $conjunto->nombre", $valores);
        }

        public function diferencia(Conjunto $conjunto) : Conjunto {
            $valores = array();
            $valores_b = $conjunto->getValores();

            foreach ($this->valores as $key => $value)
                if (!array_key_exists($key, $valores_b)) 
                    $valores[$key] = $value;
            return new Conjunto("$this->nombre - $conjunto->nombre", $valores);
        }

        public function interseccion(Conjunto $conjunto) : Conjunto{
            $valores = array();
            $valores_b = $conjunto->getValores();

            foreach ($this->valores as $key => $value)
                if (array_key_exists($key, $valores_b)) 
                    $valores[$key] = $value;
            return new Conjunto("$this->nombre ∩ $conjunto->nombre", $valores);
        }

        public function getValores() {
            return $this->valores;
        }


        public function print() {
            $tam = sizeof($this->valores);

            echo "<b>Conjunto $this->nombre</b>: { ";
            foreach ($this->valores as $c => $v) {
                if ($tam > 1) {
                    echo "$c, ";
                    $tam--;
                }else echo "$c";
            }
            echo " }<br>";
        }
    }
?>
