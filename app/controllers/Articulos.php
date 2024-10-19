<?php
// Controlador Articulos.php
class Articulos extends Controller {
    public function __construct() {
        $this->modeloArticulo = $this->model('Articulo');
        $this->modeloUsuario = $this->model('User');
    }

    // Mostrar todos los artículos - No requiere autenticación
    public function index() {
        $articulos = $this->modeloArticulo->obtenerArticulos();
        $this->view('articulos/index', ['articulos' => $articulos]);
    }

    // Mostrar artículos por categoría - No requiere autenticación
    public function categoria($categoria) {
        $articulos = $this->modeloArticulo->obtenerArticulosPorCategoria($categoria);
        $this->view('articulos/categoria', ['categoria' => $categoria, 'articulos' => $articulos]);
    }

    // Mostrar un artículo específico - No requiere autenticación
    public function ver($id) {
        $articulo = $this->modeloArticulo->obtenerArticuloPorId($id);
        $comentarios = $this->model('Comentario')->obtenerComentariosPorArticulo($id);
        $this->view('articulos/ver', ['articulo' => $articulo, 'comentarios' => $comentarios]);
    }

    // Buscar un artículo (solo para administradores)
    public function admin() {
        // Verificar si el usuario está autenticado y es administrador
        if  (!isLoggedIn() || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . urlRoot . '/users/login');
            exit();
        }

        // Obtener todos los artículos
        $articulos = $this->modeloArticulo->obtenerArticulos();

        // Cargar la vista con los datos de los artículos
        $this->view('articulos/admin', ['articulos' => $articulos]);
    }

    
    public function buscar() {
        // Verificar si el usuario está autenticado y es administrador
        if (!isLoggedIn() || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . urlRoot . '/users/login');
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $criterio = trim($_POST['criterio']);
    
            // Verificar si el criterio es un número (ID) o un texto (título)
            if (is_numeric($criterio)) {
                $articulo = $this->modeloArticulo->obtenerArticuloPorId($criterio);
            } else {
                $articulo = $this->modeloArticulo->obtenerArticuloPorTitulo($criterio);
            }
    
            // Mostrar el resultado en la vista admin.php
            $this->view('articulos/admin', ['articulo' => $articulo]);
        } else {
            // Si no se realiza la búsqueda, mostrar solo el panel
            $this->view('articulos/admin');
        }
    }
    

    // Agregar un artículo (solo para administradores)
    public function agregar() {
        // Verificar si el usuario está autenticado y es administrador
        if (!isLoggedIn() || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . urlRoot . '/users/login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'titulo' => trim($_POST['titulo']),
                'contenido' => trim($_POST['contenido']),
                'categoria' => trim($_POST['categoria']),
                'imagen' => trim($_POST['imagen'])
            ];

            if ($this->modeloArticulo->agregarArticulo($data)) {
                header('Location: ' . urlRoot . '/articulos');
            } else {
                die('Algo salió mal.');
            }
        } else {
            $this->view('articulos/agregar');
        }
    }

    // Modificar un artículo (solo para administradores)
    public function modificar($id) {
        // Verificar si el usuario está autenticado y es administrador
        if (!isLoggedIn() || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . urlRoot . '/users/login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'titulo' => trim($_POST['titulo']),
                'contenido' => trim($_POST['contenido']),
                'categoria' => trim($_POST['categoria']),
                'imagen' => trim($_POST['imagen'])
            ];

            if ($this->modeloArticulo->modificarArticulo($data)) {
                header('Location: ' . urlRoot . '/articulos');
            } else {
                die('Algo salió mal.');
            }
        } else {
            $articulo = $this->modeloArticulo->obtenerArticuloPorId($id);
            $this->view('articulos/editar', ['articulo' => $articulo]);
        }
    }

    // Eliminar un artículo (solo para administradores)
    public function borrar($id) {
        // Verificar si el usuario está autenticado y es administrador
        if (!isLoggedIn() || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . urlRoot . '/users/login');
            exit();
        }

        if ($this->modeloArticulo->borrarArticulo($id)) {
            header('Location: ' . urlRoot . '/articulos');
        } else {
            die('Algo salió mal.');
        }
    }
}
?>
