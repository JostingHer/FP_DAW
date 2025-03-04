const express = require('express');

const app = express();
const PORT = 3000;



// Rutas
app.get('/', (req, res) => 
    res.send('<p style="color:red;">hola</p>')
);

app.post('/test', (req, res) => {

    const name = req.query.name;
    const email = req.query.email;

    // res.json({
    //     msj: `POST: Hola ${name}, tu email es ${email}`,
    //     status: 200
    // });   
    // OJO
    res.status(200).json({msj: `POST: Hola ${name}, tu email es ${email}`});                                                                                                
});


app.delete('/test/:id', (req, res) => {

    const id = req.params.id;

    res.json({msj: `eliminando ${id}`});                                                                                                   
});


app.get('/suma/:num1/:num2', (req, res) => {

    const num1 = req.params.num1;
    const num2 = req.params.num2;
    const suma = parseInt(num1) + parseInt(num2);

    if(typeof num1 !== 'number' || typeof num2 !== 'number'){
    res.status(400).json({msj: 'Los valores deben ser numéricos', status: 400});                                                                                                

        return;
    }

    res.json({msj: suma, status: 400});                                                                                                   
});
app.get('/random/:num1/:num2', (req, res) => {

    const num1 = req.params.num1;
    const num2 = req.params.num2;

    if(parseInt(num1) > parseInt(num2)){
       const random =  Math.random() * (parseInt(num1) - parseInt(num2) + 1) + parseInt(num2);
       res.json({msj: 'El primer número debe ser menor al segundo', random});                                                                                                   
        return;
    }
    
    const random = Math.random() * (parseInt(num2) - parseInt(num1) ) + parseInt(num1);
    res.json({msj: 'el primer mayor al segundo', random});      
    return;                                                                                              

});

app.get('/mayusminus/', (req, res) => {

    const sentence = req.query.sentence;
    const mode = req.query.mode;

    if(mode === 'mayus'){
        res.json({msj: sentence.toUpperCase()});                                                                                                   
        return;
    }
    if(mode === 'minus'){
        res.json({msj: sentence.toLowerCase()});                                                                                                   
        return;
    }
    res.json({msj: 'modo no válido'});
});


app.get('/count', (req, res) => {

    const sentence = req.query.sentence;

    res.send(`<p>La cantidad de caracteres es: ${sentence.length}</p>`);                                                                                            
});





// Iniciar servidor
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});

// console.log('Hola mundo');