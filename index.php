<?php
include_once 'crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 7 Calificado</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<center>
    <br>
    <br>
    <div id="form">
        <form method="post">
            <table width="100%" border="1" cellpading="15">
                <tr>
                    <td>
                        <input type="text" name="añ" placeholder="Año">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="text" name="au" placeholder="Autor(a)">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="text" name="ti" placeholder="Titulo">
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <input type="text" name="url" placeholder="Enlace URL">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="text" name="es" placeholder="Especialidad">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="text" name="ed" placeholder="Editorial">
                    </td>
                </tr>

                <tr>
                    <td>
                        <?php
                        if(isset($_GET['edit'])) {
                            ?>
                            <button type="submit" name="update">Editar</button>
                            <?php
                        }else{
                            ?>
                            <button type="submit" name="save">Registrar</button>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </form>

        <br><br>

        <table width="50%" border="1" cellpading="15" align="center">
            <?php
            $res = $MySQLiconn->query("SELECT * FROM datos");
            while($row=$res->fetch_array()) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['añ']; ?></td>
                <td><?php echo $row['au']; ?></td>
                <td><?php echo $row['ti']; ?></td>
                <td><?php echo $row['url']; ?></td>
                <td><?php echo $row['es']; ?></td>
                <td><?php echo $row['ed']; ?></td>

                <td><a href="?del=<?php echo $row['id'];?>" onclick="return confirm('Confirmar eliminacion')">Eliminar</a></td>
                <td><a href="?edit=<?php echo $row['id'];?>" onclick="return confirm('Confirmar edicion')">Editar</a></td>
                <td><a href="<?php echo $row['url'];?>" target="blank">Leer Libro</a></td>
                
            </tr>
            <?php    
            }
            ?>
        </table>

    </div>
</center>    
</body>
</html>