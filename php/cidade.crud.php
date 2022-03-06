<?php
    require_once('./conexao.php');
    
    ### manipulação dos dados de cidade na base ###
    
    # persistencia da cidade
    function fnAddCidade($nomeCidade, $siglaUf)
    {
        $query = "insert into cidade(nome_cidade, sigla_uf) values ('{$nomeCidade}', '{$siglaUf}')";
        $link = getConnection();
        
        $result = mysqli_query($link, $query);

        mysqli_close($link); # fecha a conexão com o banco

        if($result) # if sempre espera uma verdade(true)
        {
            return true; # return encerra a execução no momento de chamada
        }
        return false; # default 
    }

    # listagem de cidades
    function fnListaCidade()
    {
        $link = getConnection();
        $query = "select * from cidade";

        $result = mysqli_query($link, $query);

        $cidades = array();
        while($cidade = mysqli_fetch_assoc($result))
        {
            array_push($cidades, $cidade);
        }
        
        mysqli_close($link);
        return $cidades;
    }