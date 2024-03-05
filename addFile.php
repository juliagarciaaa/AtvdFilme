<?php
require_once 'init.php';
// pega os dados do formuário
$Valor = isset($_POST['selectValor']) ? $_POST['selectValor'] : null;
$QtdProd = isset($_POST['selectQtdProd']) ? $_POST['selectQtdProd'] : null;
$Idioma = isset($_POST['selectIdioma']) ? $_POST['selectIdioma'] : null;



// validação (bem simples, só pra evitar dados vazios)
if (empty($Valor) || empty($QtdProd) || empty($Idioma))
{
    echo "Volte e preencha todos os campos";
    exit;
}
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO Filme(Valor, QtdProd, Idioma) VALUES(:valor, :QtdProd, :Idioma)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':valor', $descricao);
$stmt->bindParam(':QtdProd', $status);
$stmt->bindParam(':Idioma', $tipo_id);

if ($stmt->execute())
{
    header('Location: msgSucesso.html');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>