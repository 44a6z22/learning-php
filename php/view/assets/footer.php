   <!-- ************************** JS ****************************** -->
    <script >
        var inputs = document.querySelectorAll('input');

        inputs.forEach( (inp)=>{
            inp.addEventListener("blur",checkValidity);
        });

        function    checkValidity(e)
        {
            if(e.target.value == ""){
               var element = e.target.parentNode;
               createElem(element);
               e.target.focus();
            }
        }
        function    createElem(element)
        {
            var span = document.createElement("span");
            span.textContent = "can't leave this empty ";
            span.style.display = "block";
            span.classList.add("alert");
            span.classList.add('alert-warning');

            element.appendChild(span);
            
            setTimeout(() => {
                span.classList.remove('alert-warning');
                span.classList.remove("alert");
                span.style.display = "none";
                element.removeChild(span);
            }, 1000);
        }
    </script>
</body>
