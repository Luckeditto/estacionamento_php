<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Estacionamento Park 'n' Go</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1 class="parkingName">Park 'n' Go</h1>
            <img class="logocar-image" src="../imgs/parked-car_75905.png" alt="image of a parked car">
        </div>
       
        <form method="GET">
            <input type="submit" name="entrar" value="Entrar" id="bttn_entrar">
        </form>

    </header>
<div class="parking-description">
<div class="introduction">
        <p>Park 'N' Go: Estacionamento Sem Estresse!</p>
        <p>Cansado de perder tempo procurando vaga? O Park 'N' Go é a solução perfeita para você!
        Oferecemos estacionamento seguro e conveniente a preços acessíveis, para que você possa aproveitar ao máximo seu tempo.</p>
    </div>
    <div class="benefits">
        
        <img class="cars-aligned" src="../imgs/pexels-mike-bird-120049.jpg" alt="cars aligned">
        <p id="p-benefits">Nossas vantagens:</p>
        
        <ul id="lista-beneficios">
            <li>Localização estratégica: Próximo a aeroportos, centros comerciais, eventos e muito mais.</li>
            <li>Segurança 24 horas: Monitoramento por câmeras e equipe de segurança altamente treinada.</li>
            <li>Vagas amplas e confortáveis: Para todos os tipos de veículos, inclusive SUVs e caminhonetes.</li>
            <li>Preços acessíveis: Tarifas competitivas e planos especiais para mensalistas.</li>
            <li>Reservas online: Garanta sua vaga com antecedência, sem complicação.</li>
        </ul>
    </div>
</div>
    
    

</body>
</html>

<?php
    if(isset($_GET["entrar"])){
        header("Location: actions.php"); 
    }
?>