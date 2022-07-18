<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function relatorio(){
        $salarios_corretos = [
            ['id' => 1, 'nome'=> 'Franklim Delano', 'salario'=> 1200],
            ['id' => 2, 'nome'=> 'Paulo Freire', 'salario'=> 1300],
            ['id' => 3, 'nome'=> 'Juarez Farias', 'salario'=> 1000],
            ['id' => 4, 'nome'=> 'Reginaldo Rossi', 'salario'=> 500],
            ['id' => 5, 'nome'=> 'Professor Simão', 'salario'=> 2100],
        ];

        $salarios_empresa_especializada = [
            ['id' => 1, 'nome'=> 'Franklim Delano', 'salario'=> 1300],
            ['id' => 2, 'nome'=> 'Paulo Freire', 'salario'=> 1200],
            ['id' => 3, 'nome'=> 'Juarez Farias', 'salario'=> 1000],
            ['id' => 4, 'nome'=> 'Reginaldo Rossi', 'salario'=> 1200],
            ['id' => 5, 'nome'=> 'Professor Simão', 'salario'=> 1200],
        ];

        $soma_salario = 0;
        $soma_empresa_especializada = 0;
        $salario_errado = 0;
        $resultado_conferencia= [];
        foreach($salarios_corretos as $key => $salario_correto){

            //Realiza a diferença entre o valor do salário real e o valor do
            //e o valor do salário da empresa especializada
            $diferenca = $salarios_corretos[$key]["salario"] - $salarios_empresa_especializada[$key]["salario"];
           
            //Verifica se houve diferença entre os salários
            if($diferenca != 0){
                //Faz uma cópia de array com os salário de referência,
                //Porém adiciona um nova coluna com diferença do salário calculado
                $salario_correto["diferenca"] = $diferenca;
                $resultado_conferencia[] = $salario_correto; 
            }
            //Computar diferença do salário da folha de referência com
            //O salário da da empresa especializada irá gerar valores negativos
            //Como nossa intenção é descobrirmos a média dessas diferenças
            //Iremos pegar o valor absoluto dessa operação
            //E ao final computamos a média
            $salario_errado  +=  abs($diferenca);
            //Realiza a soma de todos os salários corretos
            $soma_salario += $salarios_corretos[$key]["salario"];
            //Realiza a soma de todos os salários fornecidos pela empresa especializada
            $soma_empresa_especializada += $salarios_empresa_especializada[$key]["salario"];
        }

        //Diferença entre o valor total da folha de referência 
        //E o valor da folha que foi enviada pela empresa especializada
        $diferenca_valor_total = $soma_salario - $soma_empresa_especializada;

        //Diferença média entre os valores da folha de referência 
        //E os valores da folha enviada pela empresa especializada
        $diferenca_media =  $salario_errado/count($salarios_corretos);

        return json_encode([
            "colaboradores_salario_errado" => $resultado_conferencia,
            "diferenca_valor_total" => $diferenca_valor_total,
            "diferenca_media" => $diferenca_media
        ]);
        
    }
}
