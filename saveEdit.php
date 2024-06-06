<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');

    // Verifica se todos os campos obrigatórios foram enviados via POST
    if(isset($_POST['update']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['telefone']) && !empty($_POST['genero']) && !empty($_POST['data_nascimento']) && !empty($_POST['cidade']) && !empty($_POST['estado']) && !empty($_POST['endereco'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        
        // Atualiza os dados no banco de dados
        $sqlInsert = "UPDATE usuarios 
        SET nome='$nome', senha='$senha', email='$email', telefone='$telefone', sexo='$sexo', data_nascimento='$data_nasc', cidade='$cidade', estado='$estado', endereco='$endereco'
        WHERE id=$id";
        $result = $conn->query($sqlInsert);

        if($result) {
            // Redireciona para a página 'sistema.php' se a atualização for bem-sucedida
            header('Location: sistema.php');
            exit();
        } else {
            // Exibe uma mensagem de erro se a atualização falhar
            echo "Erro ao atualizar os dados.";
        }
    } else {
        // Exibe uma mensagem de erro se algum campo obrigatório estiver vazio
        echo "Por favor, preencha todos os campos obrigatórios.";
    }
?>
