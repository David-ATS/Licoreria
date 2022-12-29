<?php
    if (!empty($_POST['idrol'])) {
        require("../conexion.php");
        $idrol = $_GET['idrol'];
        $result = 0;
        $query = mysqli_query($conexion, "SELECT * FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE r.idrol = '$idrol'");
        $result = mysqli_fetch_array($query);
        if ($result > 0) {
            $alert = '
            <div class="alert alert-danger" role="alert">
                No se puede eliminar. Existen usuarios con este rol.
            </div>';
            header("location: sup_CrearRol.php");
        } else {
            $query_delete = mysqli_query($conexion, "DELETE FROM rol WHERE idrol = $idrol");
            if ($query_insert) {
                $alert = '
                <div class="alert alert-primary" role="alert">
                    Rol eliminado correctamente
                </div>';
                header("location: sup_CrearRol.php");
            } else {
                $alert = '
                <div class="alert alert-danger" role="alert">
                    Error al eliminar
                </div>';
                header("location: sup_CrearRol.php");
            }
            mysqli_close($conexion);
        }
    }
?>
