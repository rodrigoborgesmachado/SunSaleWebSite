<?php 
    $nomeClinica = 'Sun Sale System';
    $inicio="";
	$softwares="";
	$blog="active";
	$contatos="";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
		<?php
			include 'php/head.php'
		?>
    </head>
    <body id="top" data-spy="scroll" data-target=".navbar" data-offset="60">
        <div class="jumbotron">	
        <?php
			include 'php/navegacao.php';
			include 'php/cabecalho.php';
		?>
		
			<div class="interna" style="background-color: #dddddd;" align="justify">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h2>
                            <font size="+1">
                                <b>BLOG - Estudos de Tecnologias</b>
                            </font>
							</h2>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row" id="regularexpression">
						<div class="col-sm-8">
							<h2>
                            <font size="+1">
                                <b>Regular expressions(Expressões Regulares) - .NET</b>
                            </font>
                            <br>
                            <font size="-1" color="#777">
                                Tags: .NET; Expressões Regulares; Comparações de strings;   
                            </font> 
                            </h2>
                            <hr>
							<h4>
								Expressões regulares (conhecidas também como regex) são utilizadas para pesquisa avançada em strings, além de manipulação delas, de modo codificado, através de chaves para validações estabelecimento de regras. Essas expressões regulares sõa incorporadas às ferramentas, tal como à muitas linguagens de programação, como C#, JavaScript, Java e Python.
								<br><br>
								Essas expressões tem como objetivo definir um padrão de pesquisa para cadeias de caracteres. As API's dessas linguagens listadas possibilitam combinar textos, substituir e dividir textos.
								<br><br>
								No C#, junto com a tecnologia .NET, existe a biblioteca própria para expressões regulares, a <a href="https://docs.microsoft.com/pt-br/dotnet/api/system.text.regularexpressions?view=netframework-4.8" target="_blank">System.Text.RegularExpressions</a>. Esse artigo tem o objetivo de demonstrar como essa biblioteca funciona citando exemplos de utilização.
								<br><br>
								<center>Regex Samples</center>
								<br><br>
								A tabela abaixo apresenta as principais expressões regulares.
								<br><br><center>
								<table width="100%" cellpadding="0" cellspacing="0" border="1">
									<tbody>
										<tr>
											<td> 
												<font size="+1">
													<b>REGEX</b>
												</font>
											</td>
											<td>
												<font size="+1">
													Significado
												</font>
											</td>
										</tr>
										<tr>
											<td><code>.</code></td>
											<td>Combina com todos os caracteres.</td>
										</tr>
										<tr>
											<td><code>?</code></td>
											<td>Combina com o caracter precedente pelo menos uma vez, ou nenhuma.</td>
										</tr>
										<tr>
											<td><code>+</code></td>
											<td>Combina com o caracter precedente pelo menos uma vez, ou mais.</td>
										</tr>
										<tr>
											<td><code>*</code></td>
											<td>Combina com o caracter precedente nenhuma vez, ou mais de uma.</td>
										</tr>
										<tr>
											<td><code>^</code></td>
											<td>Define o começo da string.</td>
										</tr>
										<tr>
											<td><code>$</code></td>
											<td>Marca o final da string.</td>
										</tr>
										<tr>
											<td><code>|</code></td>
											<td>Operador alternativo.</td>
										</tr>
										<tr>
											<td><code>[abc]</code></td>
											<td>Combina com a ou b, ou c.</td>
										</tr>
										<tr>
											<td><code>[a-c]</code></td>
											<td>Combina com a ou b, ou c.</td>
										</tr>
										<tr>
											<td><code>[^abc]</code></td>
											<td>Negação, combina com tudo menos a, ou b, ou c. </td>
										</tr>
										<tr>
											<td><code>\s</code></td>
											<td>Combina com espaçamento na string.</td>
										</tr>
										<tr>
											<td><code>\w</code></td>
											<td>Define apenas letras e números, nenhum caracter especial</code></td>
										</tr>
										<tr>
											<td><code>\d</code></td>
											<td>Define apenas números</code></td>
										</tr>
									</tbody>
								</table>
								</center><br><br>
								Essas expressões são utilizadas nas verificações. Um breve spoiler, um reges não é nada mais que um string, a biblioteca pegará essa string regex e utilizará ela como chave para interpretar o texto a ser validado ou alterado.
								<br><br>
								<center><a href="https://docs.microsoft.com/pt-br/dotnet/api/system.text.regularexpressions?view=netframework-4.8" target="_blank">Biblioteca C#</a></center>
								<br><br>
								O namespace System.Text.RegularExpressions contém classes que dão acesso ao mecanismo de expressão regular do .NET Framework. O namespace fornece funcionalidade de expressão regular que pode ser usada em qualquer plataforma ou linguagem que seja executada no Microsoft .NET Framework. Além dos tipos contidos neste namespace, a classe RegexStringValidator permite que você determine se uma cadeia de caracteres em particular está em conformidade com um padrão de expressão regular (2020, Microsoft).
								<br><br>
								Segue um exemplo de utilização:
								<br><br>
								Validando se uma string termina com "ão":<br><br>
								<div style="background-color: #eee;">
								<code>
								&nbsp;using System;<br>
								&nbsp;		using System.Collections.Generic;<br>
								&nbsp;using System.Text.RegularExpressions;<br>
								<br>
								&nbsp;namespace Simple<br>
								&nbsp;{<br>
								&nbsp;&nbsp;class Program<br>
								&nbsp;&nbsp;{<br>
								&nbsp;&nbsp;&nbsp;static void Main(string[] args)<br>
								&nbsp;&nbsp;&nbsp;{<br>
								&nbsp;&nbsp;&nbsp;&nbsp;List<string> words = new List<string>(){ "dragão", "cão",<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"avião", "dois", "três" };<br>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;var rx = new Regex(@".ão", RegexOptions.Compiled);<br>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;foreach (string word in words)<br>
								&nbsp;&nbsp;&nbsp;&nbsp;{<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if (rx.IsMatch(word))<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Console.WriteLine($"{word} combina");<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;else<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Console.WriteLine($"{word} não combina");<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
								&nbsp;&nbsp;&nbsp;&nbsp;}<br>
								&nbsp;&nbsp;&nbsp;}<br>
								&nbsp;&nbsp;}<br>
								&nbsp;}<br>
								</code>
								</div>
                            	<br><br>
								Para validação de strings utilizando regex então é bem simples. Um modo fácil de se fazer é imaginar no reges antes de fazer a implementação. Existe vários sites online que validam a string regex para se verificar se é a resposta que se espera, um desses sites é o <a href="https://tools.lymas.com.br/regexp_br.php" target="_blank">TESTE DE REGEXP</a>.
								<br><br>
								Segue alguns exemplos de strings regex:
								<br><br>
								<center>
								<table width="100%" cellpadding="0" cellspacing="0" border="1">
									<tbody>
										<tr>
											<th style="width:12em">Regex
											</th>
											<th>Matches any string that
									
											</th>
										</tr>
										<tr>
											<td><code>hello</code>
											</td>
											<td>contains {hello}
											</td>
										</tr>
										<tr>
											<td><code>gray|grey</code>
											</td>
											<td>contains {gray, grey}
											</td>
										</tr>
										<tr>
											<td><code>gr(a|e)y</code>
											</td>
											<td>contains {gray, grey}
											</td>
										</tr>
										<tr>
											<td><code>gr[ae]y</code>
											</td>
											<td>contains {gray, grey}
											</td>
										</tr>
										<tr>
											<td><code>b[aeiou]bble</code>
											</td>
											<td>contains {babble, bebble, bibble, bobble, bubble}
											</td>
										</tr>
										<tr>
											<td><code>[b-chm-pP]at|ot</code>
											</td>
											<td>contains {bat, cat, hat, mat, nat, oat, pat, Pat, ot}
											</td>
										</tr>
										<tr>
											<td><code>colou?r</code>
											</td>
											<td>contains {color, colour}
											</td>
										</tr>
										<tr>	
											<td><code>rege(x(es)?|xps?)</code>
											</td>
											<td>contains {regex, regexes, regexp, regexps}
											</td>
										</tr>
										<tr>
											<td><code>go*gle</code>
											</td>
											<td>contains {ggle, gogle, google, gooogle, goooogle, ...}
											</td>
										</tr>
										<tr>
											<td><code>go+gle</code>
											</td>
											<td>contains {gogle, google, gooogle, goooogle, ...}
											</td>
										</tr>
										<tr>
											<td><code>g(oog)+le</code>
											</td>
											<td>contains {google, googoogle, googoogoogle, googoogoogoogle, ...}
											</td>
										</tr>
										<tr>
											<td><code>z{3}</code>
											</td>
											<td>contains {zzz}
											</td>
										</tr>
										<tr>
											<td><code>z{3,6}</code>
											</td>
											<td>contains {zzz, zzzz, zzzzz, zzzzzz}
											</td>
										</tr>
										<tr>
											<td><code>z{3,}</code>
											</td>
											<td>contains {zzz, zzzz, zzzzz, ...}
											</td>
										</tr>
										<tr>
											<td><code>[Bb]rainf\*\*k</code>
											</td>
											<td>contains {Brainf**k, brainf**k}
											</td>
										</tr>
										<tr>
											<td><code>\d</code>
											</td>
											<td>contains {0,1,2,3,4,5,6,7,8,9}
											</td>
										</tr>
										<tr>
											<td><code>\d{5}(-\d{4})?</code>
											</td>
											<td>contains a United States zip code
											</td>
										</tr>
										<tr>
											<td><code>1\d{10}</code>
											</td>
											<td>contains an 11-digit string starting with a 1
											</td>
										</tr>
										<tr>
											<td><code>[2-9]|[12]\d|3[0-6]</code>
											</td>
											<td>contains an integer in the range 2..36 inclusive
											</td>
										</tr>
											<tr>
											<td><code>Hello\nworld</code>
											</td>
											<td>contains Hello followed by a newline followed by world
											</td>
										</tr>
										<tr>
											<td><code>mi.....ft</code>
											</td>
											<td>contains a nine-character (sub)string beginning with mi and ending with ft (Note: depending on context, the dot stands either for “any character at all” or “any character except a newline”.) Each dot is allowed to match a different character, so both microsoft and minecraft will match.
											</td>
										</tr>
										<tr>
											<td><code>\d+(\.\d\d)?</code>
											</td>
											<td>contains a positive integer or a floating point number with exactly two characters after the decimal point.
											</td>
										</tr>
										<tr>
											<td><code>[^i*&amp;2@]</code>
											</td>
											<td>contains any character other than an i, asterisk, ampersand, 2, or at-sign.
											</td>
										</tr>
										<tr>
											<td><code>//[^\r\n]*[\r\n]</code>
											</td>
											<td>contains a Java or C# slash-slash comment
											</td>
										</tr>
										<tr>
											<td><code>^dog</code>
											</td>
											<td>begins with "dog"
											</td>
										</tr>
										<tr>
											<td><code>dog$</code>
											</td>
											<td>ends with "dog"
											</td>
										</tr>
										<tr>
											<td><code>^dog$</code>
											</td>
											<td>is exactly "dog"
											</td>
										</tr>
									</tbody>
								</table>
								</center>
								<br>
								<div align="right">
									<font size="-1" color="#777">
                                		By Rodrigo Machado
										<br>
										24/04/2020
                            		</font> 
								</div>
							</h4>
						</div>
						<div class="col-sm-4">
							<center><span class="glyphicon glyphicon-text-width logo slideanim"></span></center>
						</div>
					</div>
				</div>
				<div class="text-center">
					<a href="#top">
						<center><span class="glyphicon glyphicon-chevron-up"></span></center>
					</a>
				</div>
			</div>
		</div>

        <?php
			include 'php/rodape.php'
		?>
    </body>
</html>

