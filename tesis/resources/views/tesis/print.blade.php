<!DOCTYPE html>
<html>
<head>
	<title>TESIS RELACIONADAS A EMPRESAS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  
	<div class="container">

		<h4 align="center" style="margin-bottom: 40px; margin-top: 30px"> Tesis relacionadas a empresas </h4>
		<table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Nombre Tesis</th>
          <th>Tipo Vinculacion</th>
        </tr>
        @foreach ($tes_empresas as $tesis)
	        <tr>
	          <td> {{ $tesis->id}} </td>
	          <td> {{ $tesis->nombre_completo}} </td>
	          <td> {{ $tesis->profesor_guia}} </td>
	          <td> {{ $tesis->nombre_tesis}} </td>
	          <td> {{ $tesis->tipo_vinculacion}} </td>
	        </tr>
        @endforeach
     </table>
	</div>

	<script>
		
		$(document).ready(function(){
			window.print();
		})
	</script>

</body>
</html>