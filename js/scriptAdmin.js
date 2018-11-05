var input=document.querySelectorAll("input:not('#submit'),textarea");
function resetValues() {


    for(var i=0;i<input.length ; i++)
    {
        input[i].value="";
    }

}




console.log(input);