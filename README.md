## Sistema Web - Formulario de Cadastro FaceID Intelbras SS5530 👩🏻‍💻
![Static Badge](https://img.shields.io/badge/php-8.0-blue)
![Static Badge](https://img.shields.io/badge/bootstrap-5.2.0-orange)
![Static Badge](https://img.shields.io/badge/datatables-1.13.7-red)

Formulario desenvolvido para auxiliar o cadastro de fotos e dados para reconhecimento facial no equipamento Intelbras SS5530 FaceID

## Features
O formulario está contido na pasta "index.php", onde ele captura os dados que serão usados para alimentar o arquivo que será usado para importar dos dados para o Leitor Facial Intelbras SS5530 FaceID. Os dados capturados são salvos dentro de uma pasta chamada "data" dentro de um arquivo .JSON, essa estrutura é utilizada para gerar os arquivos que serão importados para o equipamento de leitura facial. Toda a regra de negocio é realizada atraves de um arquivo chamado "ManipuladorDados.php" dentro da pasta "core", utilizando Programação Orientada a Objetos ou POO, resumido em apenas uma classe, o manipulador executa todas as requisições usando somente a "funções" contidas no arquivo, o codigo está comentado e é de facil compreensão. Por fim, dentro dos arquivos existe uma pasta chamada "export" nela estão contidos os arquivos que serão usados para importar os dados para o leitor facial, a importação para o equipamento é simple, basta copiar a pasta "export" inteira para dentro do disco "C:\" e nas configurações do equipamento basta direcionar o local da pasta e pronto os dados serão importados com sucesso.


## Como Usar?
Você precisa ter um servidor Web como o Apache ou Nginx. Uma versão do PHP 7.4 ou superior.
navegue até a pasta do seu servidor e coloque os arquivos dentro de uma pasta htdocs, www ou public_html ...(vai depender do seu servidor)
execute o seu servidor e abra o caminho da pasta utilizando o prefixo "localhost" Exemplo: "http://localhost/nome-da-pasta"

## Não sei como instalar/configurar, o que eu faço?
Entre em contato pelo e-mail brunoramalho01@gmail.com que irei fazer o possível para ajudar você a implementar essa aplicação.

## Donates
[![Buy Me a Coffee](https://img.buymeacoffee.com/button-api/?text=Buy%20me%20a%20coffee&emoji=%E2%98%95&slug=brunoramalho01&button_colour=FFDD00&font_colour=000000&font_family=Poppins&outline_colour=000000&coffee_colour=ffffff)](https://www.buymeacoffee.com/brunoramalho01)
