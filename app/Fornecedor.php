<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //
    use SoftDeletes;
    
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


            whereDate: 
            > $contatos = SiteContato::whereDate('created_at', '2023-02-01')->get();
            = Illuminate\Database\Eloquent\Collection {#4223
                all: [
                App\SiteContato {#4380
                    id: 1,
                    created_at: "2023-02-01 00:00:00",
                    updated_at: null,
                    nome: "Fernando",
                    telefone: "(11) 94444-5555",
                    email: "fernando@contato.com.br",
                    motivo_contato: 1,
                    mensagem: "Como consigo criar multiplos usuários para minha empresa?",
                },
                ],
            }

            $contatos = SiteContato::where(function($query){ $query->where('nome', 'Jorge')->orWhere('nome', 'Ana');  })->where(function($query){ $query->whereIn('motivo_contato', [1,2])->orWhereBetween('id', [4,6]);  })->get();
            = Illuminate\Database\Eloquent\Collection {#4477
                all: [
                App\SiteContato {#4466
                    id: 6,
                    created_at: null,
                    updated_at: null,
                    nome: "Ana",
                    telefone: "(33) 96666-7777",
                    email: "ana@contato.com.br",
                    motivo_contato: 3,
                    mensagem: "Não gostei muito das cores, consigo mudar de tema?",
                },
                ],
            }

            > $contato = SiteContato::orderBy('nome', 'desc')->get();
        = Illuminate\Database\Eloquent\Collection {#4449
            all: [
            App\SiteContato {#4448
                id: 4,
                created_at: null,
                updated_at: null,
                nome: "Rosa",
                telefone: "(33) 92222-3333",
                email: "rosa@contato.com.br",
                motivo_contato: 1,
                mensagem: "Quando custa essa aplicação?",
            },
            App\SiteContato {#4447
                id: 2,
                created_at: null,
                updated_at: null,
                nome: "João",
                telefone: "(88) 91111-2222",
                email: "joao@contato.com.br",
                motivo_contato: 3,
                mensagem: "É muito difícil localizar a opção de listar todos os produtos",
            },
            App\SiteContato {#4446
                id: 7,
                created_at: null,
                updated_at: null,
                nome: "Helena",
                telefone: "(11) 97777-8888",
                email: "helena@contato.com.br",
                motivo_contato: 2,
                mensagem: "Consigo controlar toda a minha empresa de modo fácil e prático.",
            },

            > $contato = SiteContato::where('id','>', '3')->get(); Uso de collections, após o uso do método get, é gerado um objeto do tipo collection
            = Illuminate\Database\Eloquent\Collection {#4445
                all: [
                App\SiteContato {#4450
                    id: 4,
                    created_at: null,
                    updated_at: null,
                    nome: "Rosa",
                    telefone: "(33) 92222-3333",
                    email: "rosa@contato.com.br",
                    motivo_contato: 1,
                    mensagem: "Quando custa essa aplicação?",
                },
                App\SiteContato {#4451
                    id: 5,
                    created_at: null,
                    updated_at: null,
                    nome: "André",
                    telefone: "(88) 95555-6666",
                    email: "andre@contato.com.br",
                    motivo_contato: 2,
                    mensagem: "Parabéns pela ferramenta, estou obtendo ótimos resultados!",
                },
                App\SiteContato {#4454
                    id: 6,
                    created_at: null,
                    updated_at: null,
                    nome: "Ana",
                    telefone: "(33) 96666-7777",
                    email: "ana@contato.com.br",
                    motivo_contato: 3,
                    mensagem: "Não gostei muito das cores, consigo mudar de tema?",
                },
                App\SiteContato {#4446
                    id: 7,
                    created_at: null,
                    updated_at: null,
                    nome: "Helena",
                    telefone: "(11) 97777-8888",
                    email: "helena@contato.com.br",
                    motivo_contato: 2,
                    mensagem: "Consigo controlar toda a minha empresa de modo fácil e prático.",
                },
                ],
            }

            > $contato->first();
            = App\SiteContato {#4450
                id: 4,
                created_at: null,
                updated_at: null,
                nome: "Rosa",
                telefone: "(33) 92222-3333",
                email: "rosa@contato.com.br",
                motivo_contato: 1,
                mensagem: "Quando custa essa aplicação?",
            }

            > 

        
    */
}
