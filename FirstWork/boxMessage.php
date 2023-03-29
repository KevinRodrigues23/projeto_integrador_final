<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "firstwork";

    // Cria uma conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Prepara a query SQL para inserir os dados no banco de dados
    $stmt = $conn->prepare("INSERT INTO boxmessages (id_boxMessage, nome_boxMessage, email_boxMessage, telefone_boxMessage, message_boxMessage) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $_POST['id_boxMessage'], $_POST['nome_boxMessage'], $_POST['email_boxMessage'], $_POST['telefone_boxMessage'], $_POST['message_boxMessage']);

    // Executa a query SQL
    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso";
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    // Fecha a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}

?>
