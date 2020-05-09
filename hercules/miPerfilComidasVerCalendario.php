<?php 
    require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
    <link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <title>Mi Perfil - Comidas</title>
</head>

<body>

<div id="contenedor">

    <?php
        require('includes/comun/cabecera.php');
        require('miPerfilCabecera.php');
    ?>

    <div id="contenido">
        <div class="boton-volver">
            <a href="miPerfilComidasVer.php"> 🔙Volver </a>
        </div>
        
        <?php
        if (!isset($_SESSION['login']))
        {
            echo '<p>Entra con tu usuario para ver comidas</p>';
        }
        
        $nif_usuario = $_SESSION['usuario']->getNif();
        $comidas = $ctrl->verComidas($nif_usuario);
        
        if (count($comidas) == 0)
        {
            echo "<p>No se ha registrado ninguna comida todavía.</p>";
        }
        else
        {
            echo'
            <div class="centrado_comidas">
            <p>
            <form action="miPerfilComidasVerCalendario.php" method="post"> 
                <button type="submit" name="sem_anterior"> Semana anterior </button> /
                <button type="submit" name="sem_actual"> Semana actual </button>
            </form>
            </p>
            </div>
            ';
            
            $fecha_hoy = getdate();
            
            $hayComidasEstaSemana = false; $huboComidasSemanaAnterior = false;
            foreach ($comidas as $valor)
            {               
                $fecha_comida = getdate(strtotime($valor['dia']));
                $diaSemana_num_comida = $fecha_comida['wday'];
                
                if (($fecha_hoy['yday'] - $fecha_comida['yday']) < 0) // última semana del año
                    $fecha_comida['yday'] -= 365;
                
                $diferencia_dias_año = $fecha_hoy['yday'] - $fecha_comida['yday'];
                
                if ($fecha_hoy['wday'] == 0) // domingo
                    $fecha_hoy['wday'] = 7;
                    
                if ($diaSemana_num_comida == 0) // domingo
                    $diaSemana_num_comida = 7;
                
                if (($diferencia_dias_año) == ($fecha_hoy['wday'] - $diaSemana_num_comida))
                {
                    $hayComidasEstaSemana = true;
                }
                elseif ((($diferencia_dias_año) == (($fecha_hoy['wday'] - $diaSemana_num_comida) + 7)))
                {
                    $huboComidasSemanaAnterior = true;
                }
            }
            
            $pulsoBoton = false;
            if ((isset($_REQUEST['sem_actual'])) || (isset($_REQUEST['sem_anterior'])))
            {
                $pulsoBoton = true;
            }
            if (!$pulsoBoton)
            {
                echo "
                <div class='primer_parrafo'
                <p>Selecciona una semana para ver las comidas que has registrado</p>
                </div>";
            }
            elseif (((!$hayComidasEstaSemana) && (isset($_REQUEST['sem_actual']))) ||
                ((!$huboComidasSemanaAnterior) && (isset($_REQUEST['sem_anterior']))))
            {
                echo "
                <div class='primer_parrafo'
                <p>No hay ninguna comida registrada en la semana que has seleccionado</p>
                </div>";
            }
            else
            {
            ?>
            
            <p>A continuación se muestra la hora a la que registraste una comida y el tipo de comida que es</p>
            <div class="tabla_comidas">
            <p><table>
            <tr> <th>Lunes</th> <th>Martes</th> <th>Miércoles</th> <th>Jueves</th> <th>Viernes</th>
                <th>Sábado</th> <th>Domingo</th> </tr>
            
            <?php
            
            $pulsoBotonEstaSemana = false; $pulsoBotonSemanaAnterior = false;
            if (isset($_REQUEST['sem_actual']))
            {
                $pulsoBotonEstaSemana = true;
            }
            elseif (isset($_REQUEST['sem_anterior']))
            {
                $pulsoBotonSemanaAnterior = true;
            }
            
            $hayComidaActualEstaSemana = false; $huboComidaActualSemanaAnterior = false;
            $k = 0;
            foreach ($comidas as $valor)
            {   
                $fecha_comida = getdate(strtotime($valor['dia']));
                $diaSemana_num_comida = $fecha_comida['wday'];
                
                if (($fecha_hoy['yday'] - $fecha_comida['yday']) < 0) // última semana del año
                    $fecha_comida['yday'] -= 365;
                
                $diferencia_dias_año = $fecha_hoy['yday'] - $fecha_comida['yday'];
                    
                if ($fecha_hoy['wday'] == 0) // domingo
                    $fecha_hoy['wday'] = 7;
                
                if ($diaSemana_num_comida == 0) // domingo
                    $diaSemana_num_comida = 7;
                    
                
                if (($diferencia_dias_año) == ($fecha_hoy['wday'] - $diaSemana_num_comida))
                {
                    $hayComidaActualEstaSemana = true;
                }
                elseif ((($diferencia_dias_año) == (($fecha_hoy['wday'] - $diaSemana_num_comida) + 7)))
                {
                    $huboComidaActualSemanaAnterior = true;
                }
                
                
                if (($pulsoBotonEstaSemana && $hayComidaActualEstaSemana) ||
                    ($pulsoBotonSemanaAnterior && $huboComidaActualSemanaAnterior))
                {
                    if ((count($comidas) == $k + 1) || ($comidas[$k]['dia'] != $comidas[$k + 1]['dia']))
                    {
                        echo "<tr>";
                        for ($i = 1; $i <= 7; ++$i) // ¿while?
                        {
                            if ($diaSemana_num_comida == $i)
                            {
                                echo "<td>".date("H:i", strtotime($valor['dia']))." - ".$valor['tipo']."</td>";
                                //break;
                                //¿salgo y guardo el valor de $i para meter la siguiente comida en la misma fila?
                            }
                            else
                                echo "<td />";
                        }
                        echo "</tr>";
                    }
                }
                $hayComidaActualEstaSemana = false; $huboComidaActualSemanaAnterior = false;
                ++$k;
            }
            ?>
            </table>
            </div>
            
        <?php   
            } // fin else (hay comidas en la semana seleccionada)
        } // fin else (hay comidas)
        ?>
            
    </div>
    
    <?php
    require('includes/comun/pie.php');
    ?>
</div> <!-- Fin del contenedor -->

</body>
</html>