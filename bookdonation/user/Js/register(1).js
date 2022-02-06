$(document).ready(()=>{
    
    const inputs = document.querySelectorAll('input');
    const $save_changes = document.getElementById('join');
    const $email = document.getElementById('email');
    const $pwd = document.getElementById('password');
    const pattern = {
        username: /^[a-zA-Z0-9]{4,12}$/,
        email: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.+[a-z]{2,4}$/ ,
        password1 : /^(?=.*[A-Z]).{4,10}$/ ,
    };
    
    inputs.forEach((input)=>{
        input.addEventListener('keyup',(e)=>{
            validate(e.target, pattern[e.target.attributes.name.value]);
        });
    });
    var pwd;
    function validate(field, regex)
    {
        if(field.attributes.name.value === "password1")
        {
            
            if(regex.test(field.value))
            {
                field.className="valid form-control";
                $save_changes.removeAttribute("disabled");     
            }
            else
            {
                $save_changes.setAttribute("disabled","disabled");
                field.className="invalid form-control";  
            }
            pwd = field.value;
        }
        else if(field.attributes.name.value === "password2")
        {
            if(pwd === field.value)
            {
                field.className="valid form-control";
                $save_changes.removeAttribute("disabled");  
                $('#matched').fadeIn();
                $('#inmatched').css('display','none');
            }
            else
            {
                $save_changes.setAttribute("disabled","disabled");
                field.className="invalid form-control";  
                $('#inmatched').fadeIn();
                $('#matched').css('display','none');
            }
        }
        else
        {
            if(regex.test(field.value))
            {
                field.className="valid form-control";
                $save_changes.removeAttribute("disabled");     
            }
            else
            {
                $save_changes.setAttribute("disabled","disabled");
                field.className="invalid form-control";  
            }
        }

    }
    
    
});
