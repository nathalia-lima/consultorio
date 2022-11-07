<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gravando dados</title>
</head>
<body>
	
       <?php


        $nome = $_POST["nome"];
		$telefone = $_POST["telefone"];
		$email = $_POST["email"];
		$dataNasc = $_POST["dataNasc"];


		$sexo = 0;
		if (isset($_POST["sexo"])) {
			$sexo = $_POST["sexo"];;
		}

		$estadoCivil = $_POST["estadoCivil"];
		$numCarteirinha = $_POST["numCarteirinha"];
		$dataConsulta = $_POST["dataConsulta"];
		$hora = $_POST["hora"];

		$doenca = 0;
		if (isset($_POST["doenca"])) {
			$doenca = $_POST["doenca"];
		}


		$mensagem = $_POST["mensagem"];


        $rg = $_FILES['rg']['name'];
        $tipoArquivo = $_FILES['rg']['type'];
        $tamanho = $_FILES['rg']['size'];
        $nomeTemp = $_FILES['rg']['tmp_name'];

        $carteirinha = $_FILES["carteirinha"]["name"];
        $tipoArquivo1 = $_FILES["carteirinha"]["type"];
        $tamanho1 = $_FILES["carteirinha"]["size"];
        $nomeTemp1 = $_FILES["carteirinha"]["tmp_name"];

        


        if ( $nome == "" ){
            die("Nome do paciente deve ser informado!");
        }	
		
		if ($telefone==""){
			die("Telefone ser informado.");
		}	
		
		if ($email==""){
			die("Email deve ser informado");
		}


		echo "<h1>Nome: Nathalia Lima Ferreira RGM: 1732091001</h1>";
		echo "Nome: $nome <br>";
		echo "Telefone: $telefone <br>";
		echo "Email: $email <br>";
		echo "Data de nascimento: $dataNasc <br>";
		echo "Sexo: $sexo <br>";
		echo "Estado Civil: $estadoCivil <br>";
		echo "Número da carteirinha: $numCarteirinha <br>";
		echo "Data da consulta: $dataConsulta <br>";
		echo "Horário: $hora <br>";
		echo "Possui alguma doença? $doenca <br>";
		echo "Mensagem: $mensagem";
		
		echo "<hr>";
		echo "Arquivo da foto: $rg <br>";
		echo "Tipo: $tipoArquivo <br>" ;
		echo "Tamanho: $tamanho <br>" ;
		echo "Nome Temporário: $nomeTemp" ;
		echo "<hr>";

		echo "<hr>";
		echo "Arquivo da foto: $carteirinha <br>";
		echo "Tipo: $tipoArquivo1 <br>" ;
		echo "Tamanho: $tamanho1 <br>" ;
		echo "Nome Temporário: $nomeTemp1" ;
		echo "<hr>";
		
		
		$con = mysqli_connect("localhost", "root", "");
		mysqli_set_charset($con, "utf8");
		mysqli_select_db($con, "ALUNO1732091001") or
			die(
				"Erro na abertura do banco de dados:<br>" .
				mysqli_error($con)
		);


		if ($carteirinha<>"")
		{
			//transferir o arquivo temporário p/local que eu quero c/nome original
			$destino1="arquivos\\$carteirinha";
			echo "Transferindo de $nomeTemp1 para $destino1...<br>";
			move_uploaded_file($nomeTemp1, $destino1) or
			die("Erro na transferência: ". $_FILES["file"]["error"]);
			// Imagem transferida – exibir na tela
			echo "<br> <img src=' $destino1'><br>";
		}

		if ($rg<>"")
		{
			//transferir o arquivo temporário p/local que eu quero c/nome original
			$destino="arquivos\\$rg";
			echo "Transferindo de $nomeTemp para $destino...<br>";
			move_uploaded_file($nomeTemp, $destino) or
			die("Erro na transferência: ". $_FILES["file"]["error"]);
			// Imagem transferida – exibir na tela
			echo "<br> <img src=' $destino'><br>";
		}


		$sql = "INSERT INTO cadastro (
				nome,
				telefone,
				email,
				dataNasc,
				sexo,
				estadoCivil,
				numCarteirinha,
				dataConsulta,
				hora,
				doenca,
				mensagem,
				rg,
				carteirinha
			)
			VALUES (
				'$nome',
				'$telefone',
				'$email',
				'$dataNasc',
				'$sexo',
				'$estadoCivil',
				'$numCarteirinha',
				'$dataConsulta',
				'$hora',
				'$doenca',
				'$mensagem',
				'$rg',
				'$carteirinha'
			)";


			mysqli_query($con, $sql) or die("Erro na inserção do Cadastro:" . mysqli_error($con) );

        ?>

        Clique <a href="cadastro.html">aqui</a> para cadastrar um novo Paciente

</body>
</html>