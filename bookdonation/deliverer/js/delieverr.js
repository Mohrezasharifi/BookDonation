$(document).ready(()=>{
    const inputs = document.querySelectorAll('input');
    const $save_changes = document.getElementById('login');
    const pwdLabel = document.getElementById('paswordLabel');
    const pattern = {
        new_pwd : /^(?=.*[A-Z]).{4,10}$/ ,
    };
    
    inputs.forEach((input)=>{
        input.addEventListener('keyup',(e)=>{
            validate(e.target, pattern[e.target.attributes.name.value]);
        });
    });
    
    function validate(field, regex){
        if(field.id ==="email")
        {
            if(regex.test(field.value))
            {
                emailLabel.classList.remove("invalidEmail");
                emailLabel.classList.add("validEmail");
                field.className="invalid form-control";
                $save_changes.removeAttribute("disabled");     
            }
            else
            {
                emailLabel.classList.remove("validEmail");
                emailLabel.classList.add("invalidEmail");
                $save_changes.setAttribute("disabled","disabled");
                field.className="valid form-control";  
            }   
        }
        else
        {

            if(regex.test(field.value))
            {
                pwdLabel.classList.remove("invalidPwd");
                pwdLabel.classList.add("validPwd");
                field.className="invalid form-control";
                $save_changes.removeAttribute("disabled");     
            }
            else
            {
                pwdLabel.classList.remove("validPwd");
                pwdLabel.classList.add("invalidPwd");
                $save_changes.setAttribute("disabled","disabled");
                field.className="valid form-control";  
            } 
        }
    }
    
});
