
<?php
    require_once("conexao.php");

    
    function cadastrarUsuario($nome, $CPF, $telefone, $Data_nascimento, $formacao, $Endereco, $Bairro, $Estado, $email, $descr, $img, $rede_social) 
    {
        $con = getConnection();

        $sql = "insert into usuario (nome, CPF, telefone, Data_nascimento, formacao, Endereco, Bairro, Estado, email, descr, img, rede_social) values (:nome, :CPF, :telefone, :Data_nascimento, :formacao, :Endereco, :Bairro, :Estado, :email, :descr, :img, :rede_social)";
        
        $stmt = $con->prepare($sql);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":CPF", $CPF);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":Data_nascimento", $Data_nascimento);
        $stmt->bindParam(":formacao", $formacao);
        $stmt->bindParam(":Endereco", $Endereco);
        $stmt->bindParam(":Bairro", $Bairro);
        $stmt->bindParam(":Estado", $Estado);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":descr", $descr);
        $stmt->bindParam(":img", $img);
        $stmt->bindParam(":rede_social", $rede_social);

        $status = $stmt->execute();
        unset($con);
        unset($stmt);

        if($status)
            return true; 

        return false; 
    }



    function cadastrarEmpresa($CNPJ, $nome, $Local, $Hora_Funcionamento, $Logo) 
    {
        $con = getConnection();

        $sql = "insert into empresa (CNPJ, nome, Local, Hora_Funcionamento, Logo) values (:CNPJ, :nome, :Local, :Hora_Funcionamento, :Logo)";

        $stmt = $con->prepare($sql);


        $stmt->bindParam(":CNPJ", $CNPJ);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":Local", $Local);
        $stmt->bindParam(":Hora_Funcionamento", $Hora_Funcionamento);
        $stmt->bindParam(":Logo", $Logo);


        $status = $stmt->execute();
        unset($con);
        unset($stmt);

        if($status)
            return true; 

        return false; 
    }


    function listaUsuario()
    {
        $link = getConnection();

        $sql = "select * from usuario";

    
        $result = mysqli_query($link, $sql); 

        $listaUsuario = array();
        
        while($usuario = mysqli_fetch_object($result))
        {
            array_push($listaUsuario, $usuario);
        }

        mysqli_close($link);
        return $listaUsuario;
    }
  
    
    function localizaUsuarioPeloID($id)
    {
        $link = getConnection();

        $sql = "select * from usuario where id = {$id}";

        $usuario = mysqli_fetch_object(mysqli_query($link, $sql));

        mysqli_close($link);

        return $usuario;
    }