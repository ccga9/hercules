<?php
/**
 * Transfer Object Usuario
 * Con atributos comunes para usuariosRegistrados y entrenadores
 */
class TOUsuario {
    private $nif;
    private $nombre;
    private $password;
    private $foto;
    private $email;
    private $sexo;
    private $fechaNac;
    private $telefono;
    private $ubicacion;
    private $peso;
    private $altura;
    private $preferencias;
    private $tipoUsuario;
    
/**
 * Constructor del TOUsuario
 */
    private function __construct($nif, $nombre, $password, $foto, $email, $sexo, $fechaNac, $telefono, $ubicacion, $peso, $altura, $preferencias, $tipoUsuario){
      $this->nif = $nif;
      $this->nombre = $nombre;
      $this->password = $password;
      $this->foto = $foto;
      $this->email = $email;
      $this->sexo = $sexo;
      $this->fechaNac = $fechaNac;
      $this->telefono = $telefono;
      $this->ubicacion = $ubicacion;
      $this->peso = $peso;
      $this->altura = $altura;
      $this->preferencias = $preferencias;
      $this->tipoUsuario = $tipoUsuario;
    }
    
    /**
     * @return mixed
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param mixed $nif
     */
    public function setNif($nif)
    {
        $this->nif = $nif;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    /**
     * @param mixed $fechaNac
     */
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * @param mixed $ubicacion
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }

    /**
     * @return mixed
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @param mixed $peso
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @param mixed $altura
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    /**
     * @return mixed
     */
    public function getPreferencias()
    {
        return $this->preferencias;
    }

    /**
     * @param mixed $preferencias
     */
    public function setPreferencias($preferencias)
    {
        $this->preferencias = $preferencias;
    }

    /**
     * @return mixed
     */
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    /**
     * @param mixed $tipoUsuario
     */
    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    
}

?>