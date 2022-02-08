<?php
use PHPUnit\Framework\TestCase;

require_once "Constantes.php";
include_once "PDO/connectionPDO.php";
require_once "metier/Livre.php";
require_once "PDO/LivreDB.php";

class LivreDBTest extends TestCase {

    /**
     * @var LivreDB
     */
    protected $Livre;
    protected $pdodb;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp():void {
        //parametre de connexion à la bae de donnée
       $strConnection = Constantes::TYPE . ':host=' . Constantes::HOST . ';dbname=' . Constantes::BASE;
        $arrExtraParam = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $this->pdodb = new PDO($strConnection, Constantes::USER, Constantes::PASSWORD, $arrExtraParam); //Ligne 3; Instancie la connexion
        $this->pdodb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown():void {
        
    }

    /**
     * @covers LivreDB::ajout
     * @todo   Implement testAjout().
     */
    public function testAjout() {
        try {
            $this->Livre = new LivreDB($this->pdodb);
            $l = new Livre(99, "Le Petit Prince", "GALIMARD", "Sortie : 6 avril 1943","Antoine de Saint-Exupery");

          $this->Livre->ajout($l);

          $livre = $this->Livre->selectionId($l->getId());
            $this->assertEquals($l->getNumero(), $livre->getNumero());
            $this->assertEquals($l->getRue(), $livre->getRue());
            $this->assertEquals($l->getCodePostal(), $livre->getCodePostal());
            $this->assertEquals($l->getVille(), $livre->getVille());
            $this->Livre->suppression($livre);
        } catch (Exception $e) {
            echo 'Exception recue : ', $e->getMessage(), "\n";
        }
    }

    /**
     * @covers LivreDB::suppression
     * @todo   Implement testSuppression().
     */
    public function testSuppression() {
        try{
 
    $this->Livre = new LivreDB($this->pdodb);
    $l = new Livre(99, "Le Petit Prince", "GALIMARD", "Sortie : 6 avril 1943","Antoine de Saint-Exupery");

          $this->Livre->ajout($l);
          

  $livre=$this->Livre->selectionId($l->getId());
$nb=$this->Livre->suppression($livre);
$livre=$this->Livre->selectionId($l->getId());

   
if($adr!=null){
      $this->markTestIncomplete(
                'This test delete not ok.'
        );
     
    }

    }  catch (Exception $e){
        //verification exception
        $exception="RECORD Livre not present in DATABASE";
        $this->assertEquals($exception,$e->getMessage());

    }
         
    }

    /**
     * @covers LivreDB::update
     * @todo   Implement testUpdate().
     */
    public function testUpdate() {
      $this->Livre = new LivreDB($this->pdodb);
      $l = new Livre(99, "Le Petit Prince", "GALIMARD", "Sortie : 6 avril 1943","Antoine de Saint-Exupery");
$l->setId(100);
$this->Livre->update($l);   
 //TODO  à finaliser 
    }

    /**
     * @covers LivreDB::selectAll
     * @todo   Implement testSelectAll().
     */
    public function testSelectAll() {
       $this->Livre = new LivreDB($this->pdodb);
    $res=$this->Livre->selectAll();
    $i=0; $ok=true;
   foreach ($res as $key=>$value) {
       $i++; 
   }

		
	if($i==0){
       $this->markTestIncomplete(
                'Pas de résultats'
        );
 $ok=false;
    
        }
$this->assertTrue($ok);
    print_r($res);
    
    }

    /**
     * @covers LivreDB::selectionId
     * @todo   Implement testSelectionId().
     */
    public function testSelectionIdLivre() {
        $this->Livre = new LivreDB($this->pdodb);
         $l=$this->Livre->selectionId(1);
         $livre=$this->Livre->selectionId($l->getId());
           $this->assertEquals($l->getTitre(), $livre->getTitre());
            $this->assertEquals($l->getEdition(), $livre->getEdition());
            $this->assertEquals($l->getInformation(), $livre->getInformation());
            $this->assertEquals($l->getAUTEUR(), $livre->getAUTEUR());
    }

}
