<?php
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '-';

echo verificaDiretorio($cnpj);

function TrataCNPJ($cnpj){
    $cnpj = str_replace('.', '', $cnpj);
    $cnpj = str_replace('/', '', $cnpj);
    $cnpj = str_replace('-', '', $cnpj);
	return $cnpj;
}

function verificaDiretorio($cnpj)
{
	$result = 'True';

	$caminhoArquivo = '../Clientes/Arquivos/' . TrataCNPJ($cnpj);
    
    if(!is_dir($caminhoArquivo))
    {
		$result = 'False';
	}

    if($result == 'True')
    {
        $caminhoArquivo .= '/' . 'export.zfx';

        if(is_file($caminhoArquivo))
        {
            $result = 'True';
        }
        else
        {
            $result = 'False';
        }
    }
    
    
	$r['Result'] = $result;	
	return json_encode($r);
}

?>