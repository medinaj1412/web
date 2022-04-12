<?php 
class conexion{
    const server="localhost";
    const user="root";
    const pass="";
    const database="bioancestro";
    /*
    const server="localhost";
    const user="jyldigit_jose";
    const pass="jylwebjose1993";
    const database="jyldigit_bioancestro";
    */
    private $cn = null;

    public function getconection(){
        try {
            $this->cn=@mysqli_connect(self::server,self::user,self::pass,self::database)or die("no se encontro la base de datos :(");
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $this->cn;
    }

}
$cn=new conexion();
    $conec=$cn->getconection();
?>


