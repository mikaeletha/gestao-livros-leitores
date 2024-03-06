## LEITOR

[GET]
TODOS LEITORES
http://127.0.0.1:8000/api/leitor

[GET]
UM LEITOR
http://127.0.0.1:8000/api/leitor/{id}

[POST] 
CRIAR LEITOR
http://127.0.0.1:8000/api/leitor

Request Body:
{
    "nome": "Nome do Leitor",                // string
    "email": "email@example.com",            // email
    "telefone": "123456789",                  // string
    "endereco": "Endereço do Leitor",        // string
    "data_aniversario": "dd/mm"              // date dd/mm
}

[PUT] 
ATUALIZAR LEITOR
http://127.0.0.1:8000/api/leitor/{id}

Request Body:
{
    "nome": "Nome do Leitor",                // string
    "email": "email@example.com",            // email
    "telefone": "123456789",                  // string
    "endereco": "Endereço do Leitor",        // string
    "data_aniversario": "dd/mm"              // date dd/mm
}

[DELETE] 
REMOVER LEITOR
http://127.0.0.1:8000/api/leitor/{id}


## LIVRO

[GET]
TODOS LIVROS
http://127.0.0.1:8000/api/livro

[GET]
UM LIVRO
http://127.0.0.1:8000/api/livro/{id}

[POST] 
CRIAR LIVRO
http://127.0.0.1:8000/api/livro

Request Body:
{
    "nome": "Nome do Livro",                 // string
    "genero": "Gênero do Livro",             // string
    "autor": "Autor do Livro",               // string
    "ano": 2022,                             // integer
    "paginas": 200,                           // integer
    "idioma": "Idioma do Livro",             // string
    "edicao": 1,                             // integer
    "editora_nome": "Nome da Editora",       // string
    "editora_codigo": 123,                   // integer
    "editora_telefone": 123456789,           // integer
    "isbn": 123456789,                       // integer
    "leitor_id": 1                           // integer
}

[PUT]
ATUALIZAR LIVRO
http://127.0.0.1:8000/api/livro/{id}

Request Body:
{
    "nome": "Nome do Livro",                 // string
    "genero": "Gênero do Livro",             // string
    "autor": "Autor do Livro",               // string
    "ano": 2022,                             // integer
    "paginas": 200,                           // integer
    "idioma": "Idioma do Livro",             // string
    "edicao": 1,                             // integer
    "editora_nome": "Nome da Editora",       // string
    "editora_codigo": 123,                   // integer
    "editora_telefone": 123456789,           // integer
    "isbn": 123456789,                       // integer
    "leitor_id": 1                           // integer
}


## LIVRO LEITOR

[GET]
TOOS LIVROS COM A RELAÇÃO DE QUEM OS LEU
http://127.0.0.1:8000/api/livro-leitor

[GET] 
TODOS OS LIVROS LIDOS DAQUELE USUÁRIO
http://127.0.0.1:8000/api/livro-leitor/{leitorId}
