<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
    
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); 
        $data_nasc = $_POST["data_nasc"];

        
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, data_nasc) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $senha, $data_nasc);
        $res = $stmt->execute();

        if ($res) {
            print "<script>alert('Cadastro com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;

    case 'editar':
        
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = !empty($_POST["senha"]) ? password_hash($_POST["senha"], PASSWORD_DEFAULT) : null; 
        $data_nasc = $_POST["data_nasc"];
        $id = $_REQUEST["id"];

        if ($senha) {
            $stmt = $conn->prepare("UPDATE usuarios SET nome=?, email=?, senha=?, data_nasc=? WHERE id=?");
            $stmt->bind_param("ssssi", $nome, $email, $senha, $data_nasc, $id);
        } else {
            
            $stmt = $conn->prepare("UPDATE usuarios SET nome=?, email=?, data_nasc=? WHERE id=?");
            $stmt->bind_param("sssi", $nome, $email, $data_nasc, $id);
        }

        $res = $stmt->execute();

        if ($res) {
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;

    case 'excluir':
     
        $id = $_REQUEST["id"];
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->bind_param("i", $id);
        $res = $stmt->execute();

        if ($res) {
            print "<script>alert('Excluído com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;
}
?>
