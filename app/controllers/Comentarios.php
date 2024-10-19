<?php
// Controlador Comentarios.php
class Comentarios extends Controller {
    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Instanciar el modelo
            $modeloComentario = $this->model('Comentario');
            $data = [
                'articulo_id' => $_POST['articulo_id'],
                'autor' => $_POST['autor'],
                'contenido' => $_POST['contenido']
            ];

            // Agregar comentario
            if ($modeloComentario->agregarComentario($data)) {
                // Redirigir a la página principal de artículos
                header('Location: ' . urlRoot . '/articulos/index');
                exit;  
            } else {
                die("Algo salió mal.");
            }
        }
    }
}
?>