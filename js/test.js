var parent = {
    val: 0,
    setVal: function(arg1){
        this.val = arg1;
    },
    getVal: function(){
        alert("Valore Attuale: " + this.val);
    }
};


jQuery(document).ready(function(){
    
    var child = Object.create(parent);

    jQuery("#btn_test").click(function(){
        var val = jQuery("#input_val").val();

        child.setVal(val);

        child.getVal();

    });


});