<?php
// Modelo Comentario.php
class Comentario {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function obtenerComentariosPorArticulo($articuloId) {
        $this->db->query("SELECT * FROM comentarios WHERE articulo_id = :articuloId ORDER BY fecha_creacion DESC");
        $this->db->bind(':articuloId', $articuloId);
        return $this->db->resultSet();
    }

    public function agregarComentario($data) {
        $this->db->query("INSERT INTO comentarios (articulo_id, autor, contenido) VALUES (:articulo_id, :autor, :contenido)");
        $this->db->bind(':articulo_id', $data['articulo_id']);
        $this->db->bind(':autor', $data['autor']);
        $this->db->bind(':contenido', $data['contenido']);
        return $this->db->execute();
    }
}

?>