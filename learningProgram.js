// Calculator Object
var Calculator = {
    add: function(num1, num2) {return num1 + num2;},
    subtract: function(num1, num2) {return num1 - num2;},
    multiply: function(num1, num2) {return num1 * num2;},
    divide: function(num1, num2) {return num1 / num2;},
};

// storing button press's into an input array
var buttonInput = [];
var buttonPress = (value) => { 
    buttonInput.push(value); 
    return value;
};

/********** PSUEDO LOGIC *************
 * - delimit or search for 1st operation eg, -, +, *, / and =
 * - group values from each side of operation (order left to right)
 * - switch on to determine which kind of operation
 *** rethink grabbing data from buttons ex: using data-action="" or class selectors in event binding ***
 *************************************/

var updateScreen = () => document.getElementById('screen').value = buttonInput.join(" ");

var fired_button;
$("button").click(function() {
    fired_button = buttonPress($(this).val());
    if(fired_button === '='){
        //alert(buttonInput);
        calculate();
    }
    updateScreen();
});

/* Calculate Function
* Breaks down input from buttons pressed and calculates equation 
* (Main Calculator Logic)
*/

function calculate(){
    let arr = buttonInput;

    // maybe make value pair of position # with operand (also for values)
    let operands = arr.filter(filterOperands);
    let values = [];
    let output;

   // arr.forEach()



    console.log(operands);
    //document.getElementById('screen').value = output;
}

function filterOperands(value){
    if(value === '+' || value === '-' || value === '*' || value === '/'){
        return value;
    }
}

function setup(value, index){

    let groupings =[];

    switch(value){
        case '+':
        groupings.push();// push groups of values between operands
    }
}

function execute(value){

}







