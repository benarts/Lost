<?php
class Bdd{
    private $_host;
    private $_name_Bdd;
    private $_id;
    private $_mdp;

    public function bdd(){
        $this->_host = '127.0.0.1';
        $this->_name_bdd = 'Wanted';
        $this->_id = 'root';
        $this->_mdp ='root';
    }

    public function connect_bdd(){
        $host = $this->_host;
        $name_bdd = $this->_name_Bdd;
        $id = $this->_id;
        $mdp = $this->_mdp;
        
        $bdd = new PDO('mysql:host='.$host.' ;dbname= '.$name_bdd.'', ''.$id.'',''.$mdp.'');
    }
}
/*On rajoute la derniere partie pour pouvoir afficher les accents*/
?>