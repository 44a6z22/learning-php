
    var inputs = document.querySelectorAll('input'); 

    inputs.forEach((inp)=>{
        inp.addEventListener("click",checkValidity);
    });
    document.getElementsByClassName('input').addEventListener("click",function(){
        console.log("rip");      
    })

    function checkValidity(e){
        console.log('lol');
    }