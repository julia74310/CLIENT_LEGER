<?php
    class Modele{
        private $unPDO ; // instance de la classe PDO
        private $table;

        public function __construct($serveur, $bdd, $user, $mdp){
            $this->unPDO = null;
            try{
    
                $this->unPDO = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp);

            }
            //si la connexion ne marche pas il renvera vers le catch
            catch(PDOException $exp){
                echo "Erreur de connexion à la base de données";
                echo $exp->getMessage();
            }
        }
        public function getTable(){
            return $this->table;
        }

        public function setTable($uneTable){
           $this->table=$uneTable;
        }
        

        public function modifierAdmin($tab){
            if($this->unPDO!=null){
                $requete="update user set nom=:nom, email=:email, mdp=:mdp, telephone=:telephone, role=:role where iduser=:iduser;";
                $donnees=array(
                    ":iduser"=>$tab['iduser'],
                    ":nom"=>$tab['nom'],
                    ":email"=>$tab['email'],
                    ":mdp"=>$tab['mdp'],
                    ":telephone"=>$tab['telephone'],
                    ":role"=>$tab['role']
                );
                //On prépare la requête
                $insert=$this->unPDO->prepare($requete);
                $insert->execute($donnees);
            }
        }
        public function selectAll ($liste){
            if($this->unPDO != null){
                $chaine = $liste;
                $requete = "select ".$chaine." from ".$this->table.";";
                 
                $select = $this->unPDO->prepare($requete);
                $select->execute();
                $resultats = $select->fetchAll();
                return $resultats;
            }else{
                return null;
            }
        }
        public function selectWhere ($where){
            if($this->unPDO != null){
                $requete = "select * from ".$this->table." where ".$where.";";
                echo $requete;
                $select = $this->unPDO->prepare($requete);
                $select->execute();
                $resultats = $select->fetch();
                return $resultats;
            }else{
                return null;
            }
        }
        public function selectSearch($mot, $liste){
            if($this->unPDO != null){
                $chaine="";
                $tab=array();
                foreach ($liste as $element){
                    $tab[]=$element." like :mot";
                }
                $chaine=implode(" or ", $tab);
                $requete = "select * from ".$this->table." where ".$chaine." like :mot ;";
                echo ($requete);
                $donnees= array(":mot"=>"%".$mot."%");
                $select = $this->unPDO->prepare($requete);
                $select->execute();
                $resultats= $select->fetch();
                return $resultats;
            }else{
                return null ;
        }   
    }
        public function insert($tab){
            if($this->unPDO !=null){
                $chaine="";
                $tabElements=array();
                $donnees=array();
                foreach ($tab as $element=>$valeur) {
                    $tabElements[]= ":".$element;
                    $donnees[":".$element]=$valeur;
                }
                $chaine= implode(", ", $tabElements);
                $requete="insert into ".$this->table." values(null, ".$chaine.");";
                
                $insert=$this->unPDO->prepare($requete);
                $insert->execute($donnees);
            }
        }

        public function update($tab, $where){
            if($this->unPDO !=null){
                $chaine="";
                $tabElements=array();
                $donnees=array();
                foreach ($tab as $element=>$valeur) {
                    $tabElements[]= $element ."= :".$element;
                    $donnees[":".$element]=$valeur;
                }
                $chaineTab= implode(", ", $tabElements);

                
                $requete="update ".$this->table." set ".$chaineTab." where ".$where;
                echo $requete;
                $update=$this->unPDO->prepare($requete);
                $update->execute($donnees);
            }
        }
        public function delete($where){
            if($this->unPDO !=null){
                $requete="delete from ".$this->table." where ".$where.";";
                $update=$this->unPDO->prepare($requete);
                $update->execute();
            }
        }

        public function callProcedure($nom, $tab){
            $tabParametres = array (); 
            $donnees = array(); 
            foreach ($tab as $element=>$valeur) {
                $tabParametres[]=  ":".$element;
                $donnees[":".$element]=$valeur;
            }
            $chaineParametres = implode (",", $tabParametres);
            $requete = "call ".$nom." ( ".$chaineParametres.");";
            $proc=$this->unPDO->prepare($requete);
            $proc->execute($donnees);
           
        }
        public	function selectUser($email, $mdp){
            $requete="select * from user where email='".$email."' and mdp='".$mdp."';";
            if($this->unPDO !=null)
              {
                $select=$this->unPDO->prepare($requete);  
                  $select->execute();
                  //extraction de toutes les Users
                  return $select->fetch();
              }else
              {
                  return null;
              }
          }

        
    }
    ?>


