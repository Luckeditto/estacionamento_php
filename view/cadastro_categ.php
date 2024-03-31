<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Cadastro Categoria</title>
</head>
<body>
<form class="form-style" action="../model/dao/categoryDAO.php" method="POST">
        <h2>Preencha as informações para cadastro de categoria:</h2>
        <label for="name">Nome</label>
        <input class="form_field" type="text" name="cat_nome" required>
        <label for="tax">Tarifa por hora(R$):</label>
        <input class="form_field" type="number" name="tax" min="1" required>
        <input type="hidden" name="cadastrarcateg" value="cadastro">
        <input class="bttn_forms" type="submit" name="submit" value="Cadastrar"> 
    </form>

    <?php
       if(isset($_POST["submit"]) ) {
        $categ_name = htmlspecialchars($_POST["cat_nome"]);
        $categ_tax = htmlspecialchars($_POST["tax"]);
            if(empty($categ_name) || empty($categ_tax)){
                echo "nome e/ou tarifa inválidos! Tente novamente.";
            }elseif(!empty($categ_name) && !empty($categ_tax)){
                echo"categoria cadastrada!";
            }
           
       }
?>
</body>
</html>


   




