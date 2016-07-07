var FormImageManager = {
    prop1: 0,
    prop2: 0,
    
    get: function()
    {
        return this.prop1 + this.prop2;
    }
};

var myobj1 = Object.create(FormImageManager);
myobj1.prop1 = 2;
myobj1.prop2 = 2;

var myobj2 = Object.create(FormImageManager);
myobj2.prop1 = 10;
myobj2.prop2 = 10;

alert(myobj1.get());
alert(myobj2.get());

