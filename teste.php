<?php

$cnpj = '27595907000105';

function TrataCNPJ($cnpj){
    $cnpj = str_replace('.', '', $cnpj);
    $cnpj = str_replace('/', '', $cnpj);
    $cnpj = str_replace('-', '', $cnpj);
	return $cnpj;
}

/** 
 * recursively create a long directory path
 */
function createPath($path) {
    if (is_dir($path)) {
        return true;
    }    
    $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1 );
    $return = createPath($prev_path);
    return ($return && is_writable($prev_path)) ? mkdir($path) : false;
}

$caminhoArquivo = '../Clientes/Arquivos/' . TrataCNPJ($cnpj);
if(!is_dir($caminhoArquivo)){
    if(createPath($caminhoArquivo)){
        echo $caminhoArquivo . ' <b>criado</b>';
    }
    else{
        echo $caminhoArquivo . ' <b>não foi possível criar</b>';
    }
}

echo '<br>';

if(!is_dir($caminhoArquivo)){
    echo $caminhoArquivo . ' <b>não existe</b>';
}
else{
    echo $caminhoArquivo . ' <b>existe</b>';
}
?>