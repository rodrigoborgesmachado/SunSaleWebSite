const restify = require('restify');
const errs = require('restify-errors');

const server = restify.createServer({
    name: 'Api SunSale',
    version: '1.0.0'
});

const knex = require('knex')({
    client: 'mysql',
    connection: {
        host: '50.62.209.185',
        user: 'system',
        password: 'Masterkey1',
        database: 'sunsale'
    }
});

server.use(restify.plugins.acceptParser(server.acceptable));
server.use(restify.plugins.queryParser());
server.use(restify.plugins.bodyParser());

server.listen(8080, function() {
    console.log('%s listening at %s', server.name, server.url);
});

//------------------- CRUD TABELA INSTALADORES ------------------------//
server.get('/GetInstaladores', function(req, res, next) {

    knex('INSTALADORES').then((dados) => {
        res.send(dados);

    }, next);

    return next();
});

server.post('/InsertInstalador', function(req, res, next) {

    knex('INSTALADORES')
        .insert(req.body)
        .then((dados) => {
            res.send(dados);

        }, next);

    return next();
});

server.get('/GetInstalador/:versao', function(req, res, next) {

    const { versao } = req.params;
    knex('INSTALADORES')
        .where('VERSAO', versao)
        .first()
        .then((dados) => {
            if (!dados)
                return res.send(new errs.BadRequestError('Versão não localizada'));

            res.send(dados);
        }, next);
});

server.put('/UpdateInstalador/:versao', function(req, res, next) {

    const { versao } = req.params;
    knex('INSTALADORES')
        .where('VERSAO', versao)
        .update(req.body)
        .then((dados) => {
            if (!dados)
                return res.send(new errs.BadRequestError('Versão não localizada!'));

            res.send('Dados Atualizados');
        }, next);
});

server.del('/DeleteInstalador/:versao', function(req, res, next) {

    const { versao } = req.params;
    knex('INSTALADORES')
        .where('VERSAO', versao)
        .delete()
        .then((dados) => {
            if (!dados)
                return res.send(new errs.BadRequestError('Versão não localizada'));

            res.send('Registro Excluído');
        }, next);
});

//------------------- FIM - CRUD TABELA INSTALADORES ------------------------//

//------------------- CRUD TABELA ACESSO_KEY ------------------------//
server.get('/GetAcesso', function(req, res, next) {

    knex('ACESSO_KEY').then((dados) => {
        res.send(dados);

    }, next);

    return next();
});

server.post('/InsertAcesso', function(req, res, next) {

    knex('ACESSO_KEY')
        .insert(req.body)
        .then((dados) => {
            res.send(dados);

        }, next);

    return next();
});

server.get('/GetAcesso/:chave', function(req, res, next) {

    const { chave } = req.params;
    knex('ACESSO_KEY')
        .where('CHAVE', chave)
        .first()
        .then((dados) => {
            if (!dados)
                return res.send(new errs.BadRequestError('Chave não localizada'));

            res.send(dados);
        }, next);
});

/* Não é necessário atualizar
server.put('/UpdateAcesso/:chave', function(req, res, next) {

    const { chave } = req.params;
    knex('ACESSO_KEY')
        .where('CHAVE', chave)
        .update(req.body)
        .then((dados) => {
            if (!dados)
                return res.send(new errs.BadRequestError('Versão não localizada!'));

            res.send('Dados Atualizados');
        }, next);
});

server.del('/DeleteAcesso/:chave', function(req, res, next) {

    const { chave } = req.params;
    knex('ACESSO_KEY')
        .where('CHAVE', chave)
        .delete()
        .then((dados) => {
            if (!dados)
                return res.send(new errs.BadRequestError('Versão não localizada'));

            res.send('Registro Excluído');
        }, next);
});
*/

//------------------- FIM - CRUD TABELA INSTALADORES ------------------------//

//------------------- CRUD TABELA CLIENTESINTERESSADOS ------------------------//
server.get('/GetClientesInteressados', function(req, res, next) {

    knex('CLIENTESINTERESSADOS').then((dados) => {
        res.send(dados);

    }, next);

    return next();
});

server.post('/InsertClienteInteressado', function(req, res, next) {

    knex('CLIENTESINTERESSADOS')
        .insert(req.body)
        .then((dados) => {
            res.send(dados);

        }, next);

    return next();
});

server.get('/GetClienteInteressado/:cnpj', function(req, res, next) {

    const { cnpj } = req.params;
    knex('CLIENTESINTERESSADOS')
        .where('CNPJ', cnpj)
        .first()
        .then((dados) => {
            if (!dados)
                return res.send(new errs.BadRequestError('Cliente não localizado'));

            res.send(dados);
        }, next);
});

server.put('/UpdateClienteInteressado/:cnpj', function(req, res, next) {

    const { cnpj } = req.params;
    knex('CLIENTESINTERESSADOS')
        .where('CNPJ', cnpj)
        .update(req.body)
        .then((dados) => {
            if (!dados)
                return res.send(new errs.BadRequestError('Cliente não localizado!'));

            res.send('Dados Atualizados');
        }, next);
});

server.del('/DeleteClienteInteressado/:cnpj', function(req, res, next) {

    const { cnpj } = req.params;
    knex('CLIENTESINTERESSADOS')
        .where('CNPJ', cnpj)
        .delete()
        .then((dados) => {
            if (!dados)
                return res.send(new errs.BadRequestError('Cliente não localizado'));

            res.send('Registro Excluído');
        }, next);
});

//------------------- FIM - CRUD TABELA CLIENTESINTERESSADOS ------------------------//