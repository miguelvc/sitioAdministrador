<?php

namespace BackendBundle\Entity;

/**
 * Persona
 */
class Persona
{
    /**
     * @var integer
     */
    private $personaid;

    /**
     * @var string
     */
    private $paterno;

    /**
     * @var string
     */
    private $materno;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $rut;

    /**
     * @var string
     */
    private $dv;

    /**
     * @var \DateTime
     */
    private $nacimiento;

    /**
     * @var string
     */
    private $sexo;

    /**
     * @var integer
     */
    private $estadocivilid;

    /**
     * @var boolean
     */
    private $eliminado = '0';

    /**
     * @var \DateTime
     */
    private $fecha = 'CURRENT_TIMESTAMP';


    /**
     * Get personaid
     *
     * @return integer
     */
    public function getPersonaid()
    {
        return $this->personaid;
    }

    /**
     * Set paterno
     *
     * @param string $paterno
     *
     * @return Persona
     */
    public function setPaterno($paterno)
    {
        $this->paterno = $paterno;

        return $this;
    }

    /**
     * Get paterno
     *
     * @return string
     */
    public function getPaterno()
    {
        return $this->paterno;
    }

    /**
     * Set materno
     *
     * @param string $materno
     *
     * @return Persona
     */
    public function setMaterno($materno)
    {
        $this->materno = $materno;

        return $this;
    }

    /**
     * Get materno
     *
     * @return string
     */
    public function getMaterno()
    {
        return $this->materno;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Persona
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set rut
     *
     * @param string $rut
     *
     * @return Persona
     */
    public function setRut($rut)
    {
        $this->rut = $rut;

        return $this;
    }

    /**
     * Get rut
     *
     * @return string
     */
    public function getRut()
    {
        return $this->rut;
    }

    /**
     * Set dv
     *
     * @param string $dv
     *
     * @return Persona
     */
    public function setDv($dv)
    {
        $this->dv = $dv;

        return $this;
    }

    /**
     * Get dv
     *
     * @return string
     */
    public function getDv()
    {
        return $this->dv;
    }

    /**
     * Set nacimiento
     *
     * @param \DateTime $nacimiento
     *
     * @return Persona
     */
    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;

        return $this;
    }

    /**
     * Get nacimiento
     *
     * @return \DateTime
     */
    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Persona
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set estadocivilid
     *
     * @param integer $estadocivilid
     *
     * @return Persona
     */
    public function setEstadocivilid($estadocivilid)
    {
        $this->estadocivilid = $estadocivilid;

        return $this;
    }

    /**
     * Get estadocivilid
     *
     * @return integer
     */
    public function getEstadocivilid()
    {
        return $this->estadocivilid;
    }

    /**
     * Set eliminado
     *
     * @param boolean $eliminado
     *
     * @return Persona
     */
    public function setEliminado($eliminado)
    {
        $this->eliminado = $eliminado;

        return $this;
    }

    /**
     * Get eliminado
     *
     * @return boolean
     */
    public function getEliminado()
    {
        return $this->eliminado;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Persona
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}

