<?php

    namespace App\Calculator;
    
    use App\Calculator\Exceptions\NoOperandsException;

    class Addition implements OperationInterface {

        protected $operands = [];

        public function setOperands(Array $operands)
        {
            $this->operands = $operands;
        }

        public function calculate () {
            $result = 0;
            if (count($this->operands) === 0) {
                throw new NoOperandsException;
            }
            foreach($this->operands as $operand) {
                $result += $operand;
            }

            return $result;
        }
    }
