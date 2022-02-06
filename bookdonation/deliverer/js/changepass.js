$(document).ready(()=>{
    
    const inputs = document.querySelectorAll('input');
    const $save_changes = document.getElementById('save-changes');
    const pwdLabel = document.getElementById('paswordLabel');
    const new_pwd = document.getElementById('new_pwd');
    const pattern = {
        new_pwd : /^(?=.*[A-Z]).{4,10}$/ ,
    };
    
    inputs.forEach((input)=>{
        input.addEventListener('keyup',(e)=>{
            validate(e.target, pattern[e.target.attributes.name.value]);
        });
    });
    var pwd;
    function validate(field, regex)
    {
        if(field.id === "current_pwd")
        {
            if(field.value === "")
            {
                field.classList.remove("invalid");
                field.classList.add("valid");
            }
            else
            {
               field.classList.remove('valid');
               field.classList.add("invalid");
            }
        }
        else if(field.id === "new_pwd")
        {
            pwd = field.value;
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
        else if(field.id === "confirm_pwd")
        {
            
            if(pwd === field.value)
            {
                field.className="invalid form-control";
                $save_changes.removeAttribute("disabled");                  
            }
            else
            {
                $save_changes.setAttribute("disabled","disabled");
                field.className="valid form-control";                 
            }
        }
    }
    
    
});
