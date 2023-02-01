<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //
    protected $table = "fornecedores";  //Corrigindo erro de busca no banco com nome fornecedors
    protected $fillable = ['nome', 'site', 'uf', 'email']; //define os campos a serem registrados no campo
    //método save() serve para inserir registros;
    //método create([vai um array de objetos]); faz uma inserção no banco;
    //método find("Aqui vai uma primary key"); faz uma busca de um item especifico, pode se passar um array com os parametros desejados;

    /* 
        Método where:
            use \App\SiteContato;
            > $contatos = SiteContato::where('id', '>', 1);
            = Illuminate\Database\Eloquent\Builder {#3500}

            > $contatos = SiteContato::where('id', '>', 1)->get();
            = Illuminate\Database\Eloquent\Collection {#4228
                all: [
                App\SiteContato {#4388
                    id: 2,
                    created_at: "2023-01-31 19:42:54",
                    updated_at: "2023-01-31 19:42:54",
                    nome: "Renato Railton",
                    telefone: "67898611890",
                    email: "railton2@gmail.com",
                    motivo_contato: 2,
                    mensagem: "Teste do seu Mestre Bahiano",
                },
                ],
            }
            Trazendo item a partir da igualdade(se omite o 2 parametro de comparaçao);
            > $contatos = SiteContato::where('nome', 'Renato Railton')->get();
            = Illuminate\Database\Eloquent\Collection {#4441
                all: [
                App\SiteContato {#4444
                    id: 2,
                    created_at: "2023-01-31 19:42:54",
                    updated_at: "2023-01-31 19:42:54",
                    nome: "Renato Railton",
                    telefone: "67898611890",
                    email: "railton2@gmail.com",
                    motivo_contato: 2,
                    mensagem: "Teste do seu Mestre Bahiano",
                },
                ],
            }

            Busca por texto no campo:
            > $contatos = SiteContato::where('mensagem', 'like', '%Bahiano%')->get();
            = Illuminate\Database\Eloquent\Collection {#4441
                all: [
                App\SiteContato {#4296
                    id: 2,
                    created_at: "2023-01-31 19:42:54",
                    updated_at: "2023-01-31 19:42:54",
                    nome: "Renato Railton",
                    telefone: "67898611890",
                    email: "railton2@gmail.com",
                    motivo_contato: 2,
                    mensagem: "Teste do seu Mestre Bahiano",
                },
                ],
            }


            

    */
}
