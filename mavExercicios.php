<?php

    /*
        Exercício 1 -     

        Leia um valor inteiro correspondente à idade de uma pessoa em dias e informe-a em anos, meses e dias

        Observação: apenas para facilitar o cálculo, considere todo ano com 365 dias e todo mês com 30 dias. Nos casos de teste nunca haverá uma situação que permita 12 meses e alguns dias, como 360, 363 e 364. Este é apenas um exercício com objetivo de testar raciocínio matemático simples.

        Entrada:

        O arquivo de entrada contém um valor inteiro.

        Saída:

        Imprima a saída conforme exemplo fornecido.
    * */
    
    function calculaIdade ($idade){
        $anos = 0;
        $meses = 0;
        $dias = 0;

        $anos = $idade / 365;
        $anos = floor($anos);
        $meses = ($idade % 365) / 30;
        $meses = floor($meses);
        $dias = ($idade % 365) % 30;
        
        return $anos . " ano(s)" . " " . $meses . " mes(es)" . " " . $dias . " dia(s) <br>";
    }

    // Entrada em dias
    $idade = 400;
    echo calculaIdade($idade);
    echo "<br>";
    $idade = 800;
    echo calculaIdade($idade);
    echo "<br>";
    $idade = 30;
    echo calculaIdade($idade);
    echo "<br><br>";

    /*
        Exercício 2 -

        Leia um valor de ponto flutuante com duas casas decimais. Este valor representa um valor monetário. A seguir, calcule o menor número de notas e moedas possíveis no qual o valor pode ser decomposto. As notas consideradas são de 100, 50, 20, 10, 5, 2. As moedas possíveis são de 1, 0.50, 0.25, 0.10, 0.05 e 0.01. A seguir mostre a relação de notas necessárias.

        Entrada

        O arquivo de entrada contém um valor de ponto flutuante N (0 ≤ N ≤ 1000000.00).

        Saída

        Imprima a quantidade mínima de notas e moedas necessárias para trocar o valor inicial, conforme exemplo fornecido.

        Obs: Utilize ponto (.) para separar a parte decimal.
    * */
    
    function calcularTroco ($valor){
        
        $notas = array(100, 50, 20, 10, 5, 2);

        $moedas = array(1, 0.50, 0.25, 0.10, 0.05, 0.01);

        echo "NOTAS:";

        foreach ($notas as $nota) {
            $qtdNotas = floor($valor / $nota);
            $valor = $valor - ($qtdNotas * $nota);
            echo "<br>" . $qtdNotas . " nota(s) de R$ " . $nota . ".00";
        }

        echo "<br><br>MOEDAS:";

        foreach ($moedas as $moeda) {
            $qtdMoedas = floor($valor / $moeda);
            $valor = $valor - ($qtdMoedas * $moeda);
            echo "<br>" . $qtdMoedas . " moeda(s) de R$ " . number_format($moeda, 2, '.', '');
        }
        
        return;
    }

    // Entrada
    $valor = 576.73;
    calcularTroco($valor);
    echo "<br><br>";
    $valor = 4.00;
    calcularTroco($valor);
    echo "<br><br>";
    $valor = 91.01;
    calcularTroco($valor);
    echo "<br><br>";

    /*
        Exercício 3 -

        A tarefa aqui neste problema é ler uma expressão matemática na forma de dois números Racionais (numerador / denominador) e apresentar o resultado da operação. Cada operando ou operador é separado por um espaço em branco. A sequência de cada linha que contém a expressão a ser lida é: número, caractere, número, caractere, número, caractere, número. A resposta deverá ser apresentada e posteriormente simplificada. Deverá então ser apresentado o sinal de igualdade e em seguida a resposta simplificada. No caso de não ser possível uma simplificação, deve ser apresentada a mesma resposta após o sinal de igualdade.

        Considerando N1 e D1 como numerador e denominador da primeira fração, segue a orientação de como deverá ser realizada cada uma das operações:


        Soma: (N1*D2 + N2*D1) / (D1*D2)

        Subtração: (N1*D2 - N2*D1) / (D1*D2)

        Multiplicação: (N1*N2) / (D1*D2)

        Divisão: (N1/D1) / (N2/D2), ou seja (N1*D2)/(N2*D1)
    */

    function calcularOperacao ($num1, $den1, $num2, $den2, $operacao){
        $resultado = 0;
        $num = 0;
        $den = 0;

        switch ($operacao) {
            case '+':
                $num = ($num1 * $den2) + ($num2 * $den1);
                $den = $den1 * $den2;
                break;
            case '-':
                $num = ($num1 * $den2) - ($num2 * $den1);
                $den = $den1 * $den2;
                break;
            case '*':
                $num = $num1 * $num2;
                $den = $den1 * $den2;
                break;
            case '/':
                $num = $num1 * $den2;
                $den = $num2 * $den1;
                break;
        }

        $resultado = $num . "/" . $den;

        return $resultado;
    }

    // Entrada
    $num1 = 2;
    $den1 = 3;
    $num2 = 4;
    $den2 = 5;
    $operacao = '+';
    echo calcularOperacao($num1, $den1, $num2, $den2, $operacao);
    echo "<br><br>";

    /*
        Exercício 4 -

        Depois de um belo dia de aula é função das vans levarem os estudantes para suas respectivas casas. Mas o que muitos não sabem é que além dos gastos e manutenção da van, o motorista precisa ter uma rota para entregar os passageiros em suas casas. Como você é o menino(a) da informática, ele pediu sua ajuda para desenvolver essa rota ordenando os alunos pela distância(da menor para a maior), pela região (em ordem alfabética) e por último pelo nome. 


        Entrada

        Ele te dá a quantidade Q de alunos que não faltaram, o nome do aluno A é uma sigla para a região onde ele mora S ("L" Leste, "N" Norte, "O" Oeste, "S" Sul), e C que representa o custo da entrada da cidade até sua casa. A saída dos casos será (EOF).


        Saída

        A saída será uma lista das pessoas na ordem em que devem ser entregues.
    */

    function calculaRotas ($qtdAlunos, $alunos){
        $rotas = array();

        for ($i = 0; $i < $qtdAlunos; $i++) {
            $aluno = $alunos[$i];
            $regiao = $aluno["regiao"];
            $custo = $aluno["custo"];

            if (!isset($rotas[$regiao])) {
                $rotas[$regiao] = array();
            }

            $rotas[$regiao][] = array("nome" => $aluno["nome"], "custo" => $custo);
        }

        foreach ($rotas as $regiao => $alunos) {
            usort($alunos, function($a, $b) {
                if ($a["custo"] == $b["custo"]) {
                    return strcmp($a["nome"], $b["nome"]);
                }

                return $a["custo"] - $b["custo"];
            });

            $rotas[$regiao] = $alunos;
        }

        return $rotas;
    }

    // Entrada
    $qtdAlunos = 5;

    $alunos = array(
        array("nome" => "Samuel", "regiao" => "O", "custo" => 1),
        array("nome" => "Fabricio", "regiao" => "L", "custo" => 1),
        array("nome" => "Emanuel", "regiao" => "S", "custo" => 3),
        array("nome" => "Kaio", "regiao" => "S", "custo" => 20),
        array("nome" => "Hugo", "regiao" => "N", "custo" => 90)
    );

    $rotas = calculaRotas($qtdAlunos, $alunos);

    foreach ($rotas as $regiao => $alunos) {
        foreach ($alunos as $aluno) {
            echo $aluno["nome"] . " - " . $regiao . " - " . $aluno["custo"] . "<br>";
        }
    }
?>