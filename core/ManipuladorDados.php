<?php
class dadosEvento {
    private $arquivo;
    public function __construct($arquivo) {
    $this->arquivo = $arquivo;
    }
    /**
     * função para renomear a foto e salvar no diretorio Export
     */
    private function salvarFoto($nomeArquivo, $fotoTemporaria) {
        $caminhoDestino = 'export/' . $nomeArquivo;
        // Obter as dimensões da imagem original
        list($larguraOriginal, $alturaOriginal) = getimagesize($fotoTemporaria);
        // Definir as novas dimensões desejadas
        $novaLargura = 480;
        $novaAltura = 640;
        // Criar uma nova imagem com as dimensões desejadas
        $novaImagem = imagecreatetruecolor($novaLargura, $novaAltura);
        // Carregar a imagem original
        $imagemOriginal = imagecreatefromstring(file_get_contents($fotoTemporaria));
        // Redimensionar a imagem original para as novas dimensões
        imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $novaLargura, $novaAltura, $larguraOriginal, $alturaOriginal);
        // Salvar a nova imagem redimensionada
        imagepng($novaImagem, $caminhoDestino);
        // Liberar a memória usada pelas imagens
        imagedestroy($novaImagem);
        imagedestroy($imagemOriginal);
        return $caminhoDestino;
    }    
    /**
     * Função para Salvar os dados do formulario em um arquivo dados.JSON
     * dentro da pasta Data na raiz do diretorio
     */
    public function salvarDados($nome, $foto, $data ,$email, $telefone, $cpf, $palestra){
        $dados = $this->carregarDados();
        /**
         * Gera um novo ID incrementando o último ID utilizado 
         */ 
        $ultimoId = $this->obterUltimoId($dados);
        $id = $ultimoId + 1;
        // Gere um nome único para a foto usando, por exemplo, um timestamp
        $nomeFoto = $id . '_' . str_replace(' ', '', basename($nome)) . '.png';
        // Salve a foto e obtenha o caminho
        $caminhoFoto = $this->salvarFoto($nomeFoto, $foto['tmp_name']);
        $novosDados= [
            'id'       => $id,
            'nome'     => $nome,
            'foto'     => $caminhoFoto,
            'data'     => $data,
            'email'    => $email,
            'telefone' => $telefone,
            'cpf'      => $cpf,
            'palestras'=> $palestra
        ] ;
        $dados[]= $novosDados;
        $this->salvarArquivo($dados);
        $this->exportarParaCSV();
        header("location: salvo.php");
    }
    /**
     * Função usada para recuperar os dados do arquivo dados.JSON
     * e exibir em tela, atualmente está carregando dados um Datatable
     * no arquivo nrm.php
     */
    public function recuperarDados()
    {
        $dados = $this->carregarDados();
        foreach ($dados as $item) {
            echo '<tr>';
            echo '<td>' . $item['nome'] . '</td>';
            echo '<td>' . $item['email'] . '</td>';
            echo '<td>' . $item['cpf'] . '</td>';
            echo '<td>' . $item['telefone'] . '</td>';
            echo '<td>' . $item['data'] . '</td>';
            echo '<td>' . implode(', ', $item['palestras']) . '</td>';
            echo '</tr>';
        } 
    }
    /**
     * Função utilizada para carregar os dados do arquivo dados.JSON
     */
    public function carregarDados(){
        $dados_json = file_get_contents($this->arquivo);
        return json_decode($dados_json, true) ?? [];
    }
    /**
     * Função utilizada para salvar os dados dentro do arquivo dados.JSON
     */
    private function salvarArquivo($dados){
        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT));
    }
    /**
     * Função para processar e obter o numero do ID gerado 
     */
    private function obterUltimoId($dados)
    {
        $ultimoId = 0;
        foreach ($dados as $item) {
            $ultimoId = max($ultimoId, $item['id']);
        }
        return $ultimoId;
    }
    /**
     * Função 
     */
    public function exportarParaCSV() {
        $dados = $this->carregarDados();
        $csvFileName = 'export/usuario.csv';

        $csvFile = fopen($csvFileName, 'w');
        if ($csvFile === false) {
            die('Erro ao criar o arquivo CSV.');
        }
        // Escrever o cabeçalho no arquivo CSV
        $header = [
            'uuid',
            'nome',
            'cartao',
            'tag',
            'senha',
            'controle',
            'email',
            'rg',
            'cpf',
            'tel',
            'matricula',
            'estado',
            'dt_inicial',
            'dt_final',
            'obs',
            'tp_usuario',
            'num_dig',
            'biometria',
            'foto',
            'modelo',
            'origem',
            'cartao_quant',
            'tag_uhf',
            'data_nascimento',
        ];
        fputcsv($csvFile, $header);
        // Escrever dados no arquivo CSV
        foreach ($dados as $usuario) {
            $csvData = [
                $usuario['id'],
                $usuario['nome'],
                '', // cartao
                '', // tag
                '', // senha
                '', // controle
                $usuario['email'],
                '', // rg
                $usuario['cpf'],
                $usuario['telefone'],
                '', // matricula
                'Ativo',
                '24/08/2023',
                '24/08/2099',
                '', // obs
                'normal', // tp_usuario
                '0', // num_dig
                '', // biometria
                'C:\\' . $usuario['foto'],//foto
                'SS', // modelo
                '', // origem
                '', // cartao_quant
                '', // tag_uhf
                $usuario['data'],
            ];

            fputcsv($csvFile, $csvData);
        }

        fclose($csvFile);
        echo "Dados exportados para CSV com sucesso!";
    }
}
?>