
<?php
    require_once("conexao.php");

    
    function cadastrarUsuario($nome, $CPF, $telefone, $Data_nascimento, $Endereco, $Bairro, $Estado, $email, $descr, $img, $rede_social) 
    {
        $con = getConnection();

        $sql = "insert into usuario (nome, CPF, telefone, Data_nascimento, Endereco, Bairro, Estado, email, descr, img, rede_social) values (:nome, :CPF, :telefone, :Data_nascimento, :Endereco, :Bairro, :Estado, :email, :descr, :img, :rede_social)";
        
        $stmt = $con->prepare($sql);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":CPF", $CPF);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":Data_nascimento", $Data_nascimento);
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



    function cadastrarVaga($Cargo, $Salario, $carga_horaria, $Requisitos) 
    {
        $con = getConnection();

        $sql = "insert into usuario (Cargo, Salario, carga_horaria, Requisitos) values (:Cargo, :Salario, :carga_horaria, :Requisitos)";
        
        $stmt = $con->prepare($sql);

        $stmt->bindParam(":Cargo", $Cargo);
        $stmt->bindParam(":Salario", $Salario);
        $stmt->bindParam(":carga_horaria", $carga_horaria);
        $stmt->bindParam(":Requisitos", $Requisitos);

        $status = $stmt->execute();
        unset($con);
        unset($stmt);

        if($status)
            return true; 

        return false; 
    }

    