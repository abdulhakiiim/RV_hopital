        <?php
            ini_set("display_errors",1);
            error_reporting(E_ALL);
            session_start();
            //les depandances
          require_once'model/UserDAO.php';
          require_once'model/SecretaireDAO.php';
          require_once'model/MedcinDAO.php';
          require_once'model/ServiceDAO.php';
          require_once'model/DomaineDAO.php';
          require_once'model/IPatientDAO.php';
          require_once'model/Rendez_VousDAO.php';
         require_once'entities/User.class.php';

        class Users extends Controller {
            
            public function construct(){
                parent::__construct();
            }
   //la fonction connection
        public function log(){
            if(isset($_POST['connecter'])){
            $udb= new userDB();
            $login=$_POST['login'];
            $password=$_POST['pasword'];
            $udb->login($login,$password);
            $log=$udb->login($login,$password);
            foreach($log as $pa){
                    $pa['id'];
            }
            //si la connection existe
                if($log){
                    $_SESSION['log']=true;
                    if($pa['profil']=='secretaire'){
                    header('Location:menu');
                    }elseif($pa['profil']=='admin'){
                        header('Location:menuA');
                    }else {
                        header('Location:menuM');
                    }
                
                }
                else{
                ?>
                <p class="text-danger"><?php echo "Mauvais identifiant ou mot de passe";?></p>
                <?php
            }

            return $this->view->load('users/log.php');
            
            }else{
            
            return $this->view->load('users/log.php');
            
            }
            
        }
        //fonction menu secretaire 
                public function menu(){
                    $addr=new RendezVousDB ();
                    $dat=$addr->nbRv();
                    $pdb=new PatientDB();
                    $data=$pdb->nbPa();
                return $this->view->load('menu.php',$data,$dat);
                    }
            //fonction menu admin
                public function menuA(){
                    $nbsec=new SecretaireDB();
                    $nbserv=new ServiceDB();
                    $nbmed=new MedcinDB();
                    $nbdom=new DomaineDB();
                    $data=$nbsec->nbSec();
                    $dat=$nbmed->nbMed();
                    $donne=$nbserv->nbServ();
                    $donne1=$nbdom->nbdom();
        
                    
                    return $this->view->load('menuA.php',$data,$dat,$donne,$donne1);
                    }
                //fonction menu Medcin
                    public function menuM(){

                        return $this->view->load('menuM.php');
                }
        }
        ?>