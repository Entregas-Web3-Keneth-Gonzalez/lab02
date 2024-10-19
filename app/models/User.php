<?php
class User
{
    private $db;

    //create database object
    public function __construct()
    {
        $this->db = new Database;
    }

    //retrive all user data
    public function getUsers()
    {
        $this->db->query('select * from usuarios');
        $regis = $this->db->resultSet();
        return $regis;
    }
    
    //retrieve an user data, login function
    public function login($data){
        $this->db->query('select * from usuarios where nombre = :nomb');
        $this->db->bind(':nomb',$data['usuario']);
        
        $tupla = $this->db->singleRow();
        
        if($tupla && password_verify($data['contra'], $tupla->contrasena)){
            return $tupla;    
        } else {
            return false;
        }
    }
    
    // register new user function
    public function register($data){
        $this->db->query('insert into usuarios(nombre, contrasena, rol) values(:nomb, :cont, :rol)');
        $this->db->bind(':nomb', $data['usuario']);
        $this->db->bind(':cont', $data['contra']);
        $this->db->bind(':rol', 'usuario'); // El registro de nuevos usuarios siempre se asigna como usuario normal.

        return $this->db->execute();
    }

    // Verificar si el usuario es administrador
    public function esAdmin($usuario_id) {
        $this->db->query('SELECT rol FROM usuarios WHERE id = :id');
        $this->db->bind(':id', $usuario_id);
        $row = $this->db->singleRow();

        return ($row && $row->rol === 'admin');
    }
}
?>