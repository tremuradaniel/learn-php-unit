<?php
    namespace App\Models;

    class User {
        public $first_name;
        public $last_name;
        public $email;

        public function setFirstName(String $first_name)
        {
            $this->first_name = trim( $first_name);
        }

        public function getFirstName()
        {
            return $this->first_name;
        }

        public function setLastName(String $last_name)
        {
            $this->last_name = trim($last_name);
        }

        public function getLastName()
        {
            return $this->last_name;
        }

        public function getFullName()
        {
            return $this->first_name . ' ' . $this->last_name;
        }

        public function setEmail(String $email)
        {
            $this->email = $email;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getEmailVariables()
        {
            return [
                'full_name' => $this->getFullName(),
                'email' => $this->getEmail()
            ];
        }
    }
