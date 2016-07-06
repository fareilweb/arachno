class persona {
 
    constructor(nome, cognome) {
        this.nome = nome;
        this.cognome = cognome;
        this.email = "";
        this.indirizzo = "";
    };
     
    mostraNomeCompleto() {
        return this.nome + " " + this.cognome;
    }
};


var ImagesManager = new function(param1, param2)
{
    this.prop1 = param1;
    this.prop2 = param2;
    
    this.get = function()
    {
        return this.prop1 + this.prop2;
    };
};


var myman = new ImagesManager();
myman.prop1 = 2;
myman.prop2 = 2;
