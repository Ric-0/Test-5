<?php
    class Livre{

        private int $id;
        private string $titre;
        private string $edition;
        private string $information;
        private string $AUTEUR;

        

        function __construct(int $id = 0, string $titre, string $edition, string $information, string $AUTEUR) {
        	$this->id = $id;
        	$this->titre = $titre;
        	$this->edition = $edition;
        	$this->information = $information;
        	$this->AUTEUR = $AUTEUR;
        
        }

        /**
        * @return int
        */
        public function getId(): int {
        	return $this->id;
        }

        /**
        * @param int $id
        */
        public function setId(int $id): void {
        	$this->id = $id;
        }

        /**
        * @return string
        */
        public function getTitre(): string {
        	return $this->titre;
        }

        /**
        * @param string $titre
        */
        public function setTitre(string $titre): void {
        	$this->titre = $titre;
        }

        /**
        * @return string
        */
        public function getEdition(): string {
        	return $this->edition;
        }

        /**
        * @param string $edition
        */
        public function setEdition(string $edition): void {
        	$this->edition = $edition;
        }

        /**
        * @return string
        */
        public function getInformation(): string {
        	return $this->information;
        }

        /**
        * @param string $information
        */
        public function setInformation(string $information): void {
        	$this->information = $information;
        }

        /**
        * @return string
        */
        public function getAUTEUR(): string {
        	return $this->AUTEUR;
        }

        /**
        * @param string $AUTEUR
        */
        public function setAUTEUR(string $AUTEUR): void {
        	$this->AUTEUR = $AUTEUR;
        }

        /**
        * @return string
        */
        public function __toString(): string {
        	return "Id: {$this->id}, Titre: {$this->titre}, Edition: {$this->edition}, Information: {$this->information}, AUTEUR: {$this->AUTEUR}";
        }
    }
?>