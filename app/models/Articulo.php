<?php
// Modelo Articulo.php
class Articulo {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Obtener todos los artículos
    public function obtenerArticulos() {
        $this->db->query("SELECT * FROM articulos ORDER BY fecha_creacion DESC");
        return $this->db->resultSet();
    }

    // Obtener artículos por categoría
    public function obtenerArticulosPorCategoria($categoria) {
        $this->db->query("SELECT * FROM articulos WHERE categoria = :categoria ORDER BY fecha_creacion DESC");
        $this->db->bind(':categoria', $categoria);
        return $this->db->resultSet();
    }

    // Obtener un artículo por ID
    public function obtenerArticuloPorId($id) {
        $this->db->query("SELECT * FROM articulos WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->singleRow();
    }

    // Obtener un artículo por Titulo
    public function obtenerArticuloPorTitulo($titulo) {
        $this->db->query("SELECT * FROM articulos WHERE titulo LIKE :titulo");
        $this->db->bind(':titulo', '%' . $titulo . '%');
        return $this->db->singleRow();
    }    
    
    // Agregar un nuevo artículo
    public function agregarArticulo($data) {
        $this->db->query('INSERT INTO articulos (titulo, contenido, categoria, imagen, fecha_creacion) VALUES (:titulo, :contenido, :categoria, :imagen, NOW())');
        $this->db->bind(':titulo', $data['titulo']);
        $this->db->bind(':contenido', $data['contenido']);
        $this->db->bind(':categoria', $data['categoria']);
        $this->db->bind(':imagen', $data['imagen']);

        return $this->db->execute();
    }

    // Modificar un artículo existente
    public function modificarArticulo($data) {
        $this->db->query('UPDATE articulos SET titulo = :titulo, contenido = :contenido, categoria = :categoria, imagen = :imagen WHERE id = :id');
        $this->db->bind(':titulo', $data['titulo']);
        $this->db->bind(':contenido', $data['contenido']);
        $this->db->bind(':categoria', $data['categoria']);
        $this->db->bind(':imagen', $data['imagen']);
        $this->db->bind(':id', $data['id']);

        return $this->db->execute();
    }

    // Eliminar un artículo
    public function borrarArticulo($id) {
        $this->db->query('DELETE FROM articulos WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}
?>
