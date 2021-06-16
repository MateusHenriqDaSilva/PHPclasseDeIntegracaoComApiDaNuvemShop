<?php

class NuvemshopProduto
{
    public $url = 'https://api.nuvemshop.com.br/v1/1737184/products';

    public function enviarTodosOsProdutos()
    {
        $data = $this->form->getData();
        $dt = [
            "images" => [
                [
                    "src" => "http://images1.wikia.nocookie.net/__cb20101106022321/pokemon/images/f/f1/UltraBallArt.png"
                ]
            ],
            "name" => [
                "en" => "{$data->nome}",
                "es" => "{$data->nome}",
                "pt" => "{$data->nome}"
            ],
            "variants" => [
                [
                    "price" => "{$data->valor_venda}",
                    "stock_management" => true,
                    "stock" => (int)"{$data->saldo_estoque_total}",
                    "weight" => "2.00"
                ]
            ]
        ];
        $curl = curl_init($this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($dt));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authentication: bearer f1db05fea5a658622d3e0057473d93672f3f0385',
            'User-Agent: Awesome App (awesome@app.com)'
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $response . PHP_EOL;
    }

    public function receberProdutosPorFiltro()
    {
        $url = 'https://api.nuvemshop.com.br/v1/1737184/products';
        // $collection_name = 'Consulta de Produtos Cadastrados na NuvemShop';
        // . '/'.$collection_name;
        $request_url = $url;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authentication: bearer f1db05fea5a658622d3e0057473d93672f3f0385',
            'User-Agent: Awesome App (awesome@app.com)',
            'Accept: */*'
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response . PHP_EOL;
    }
}
