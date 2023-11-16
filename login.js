document.querySelector('form').addEventListener('submit', () => {
    if(document.querySelector('form').checkValidity){
        if(typeof(document.getElementById('username').value) != 'string' || typeof(document.getElementById('password').value) != 'string'){
            alert('Alguno de los datos ingresado no es una cadena de texto')
        }else{
            
        }
    }else{
        alert('Complete todos los formularios')
    }
})