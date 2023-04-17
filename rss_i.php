<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Diarios de España</title>
    <style>
html{
    box-sizing: border-box;
}

body{
    font-family: 'Raleway', sans-serif;
    font-size: 1,6rem;
}
.nombre-sitio{
    margin-top: 50px;
    margin-bottom: 50px;
    text-align: center;
}

h1 span {
color: #005485;
}

    .formulario{
        max-width: 40rem;
        margin: 0 auto;

    }
    .formulario fieldset{
        border: 1px solid black;
        margin-bottom: 2rem;
    }

    .formulario legend{
        background-color: #005485 ;
        width: 80%;
        text-align: center;
        color: #FFF;
        text-transform: uppercase;
        font:900;
        padding: 1rem;
        margin-bottom: 4rem;
    }

    .campo{
        display: flex;
        margin-bottom: 1rem;
    }

    .campo label{
        flex-basis: 10rem;
    }
    .campo select {
        flex: 1;
        border: 1px solid #e1e1e1;
        padding: 1rem;
    }
    .btn{
    background-color: #8cbc00;
    display: block;
    color: #ffffff;
    text-transform: uppercase;
    font-weight: 900;
    padding: 1rem;
    margin: 1rem;
    transition: background-color .3s ease-out;
    text-align: center;
    border:none;
}

.btn:hover{
    background-color: #769c02;
    cursor:pointer;

}
    </style>
    <body>
    <header>
        <h1 class="nombre-sitio">Diarios <span>España</span></h1> 
    </header>
    <main >
        <form class ="formulario" action="rss_f.php" method="POST">
            <fieldset>
                <legend>Selecciona un diario</legend>
                <div class="campo">
                    <label for="diarios">Diarios</label>

            <?php
                        $enlace = mysqli_connect('localhost','prova','prova', 'rss', );
                        if (!$enlace) {
                                echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                                echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                                echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                                exit;
                            }
                            
                        echo "<SELECT name='rsse' id='rsse'>";
                        $sql=mysqli_query($enlace, "SELECT * FROM diarios ORDER BY Nombre");
                            
                                    while ($row = mysqli_fetch_array($sql)){
                
                                        echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                }
                        echo "</SELECT>"
						
						
                       
                        
            ?>
                    </div>
					<div class="campo">
                    <label for="opciones">Opciones</label>
					<select name="opcion" id="opcion" class="form-select" action="rss_f.php" method="POST">
						<option value="1">Ver titulares</option>
						<option value="2">Ver fotos</option>
						<option value="3">Ver titulares y fotos</option>
		
					</select>

           
                    </div>
                </fieldset>  
            <input type="submit" class="btn btn-dark" value="Enseñar">
            </form>
    </main>
</body>
</html>
