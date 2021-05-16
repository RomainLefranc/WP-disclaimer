<?php
    class DisclaimerOptions  {
        
        private $id_disclaimer;
        private $message_disclaimer;
        private $redirection_ko;
        
        public function __construct() {
            $this->id_disclaimer = $id_disclaimer;
            $this->message_disclaimer = $message_disclaimer;
            $this->message_disclaimer = $message_disclaimer;
        }

        public function getIdDisclaimer() {
            return $this->id_disclaimer;
        }

        public function getMessageDisclaimer() {
            return $this->message_disclaimer;
        }

        public function setMessageDisclaimer($msg) {
            $this->message_disclaimer = $msg;
        }

        public function getRedirectionko() {
            return $this->redirection_ko;
        }

        public function setRedirectionko($redirection) {
            $this->redirection_ko = $redirection;
        }
        
    }
?>