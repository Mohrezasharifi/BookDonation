$(document).ready(()=>{
    const inputs = document.querySelectorAll('input');
    const $save_changes = document.getElementById('save-changes');
    const $new_pwd = document.getElementById('new_pwd');
    const $cur_pwd = document.getElementById('current_pwd');
    const $con_pwd = document.getElementById('confirm_pwd');
    const $confirm_pwd_text = document.getElementById('confirm_pwd_text');
    const pattern = {
        new_pwd : /^(?=.*[A-Z]).{4,10}$/ ,
        confirm_pwd : /^(?=.*[A-Z]).{4,10}$/ ,
        current_pwd : /^\w+$/
    };
    
    inputs.forEach((input)=>{
        input.addEventListener('keyup',(e)=>{
            validate(e.target, pattern[e.target.attributes.name.value]);
        });
    });
    
    function validate(field, regex){
        if(regex.test(field.value))
        {
            field.className="valid form-control";
            $save_changes.removeAttribute("disabled");
            if(field===$new_pwd)
            {
                $con_pwd.removeAttribute("disabled");
            }
        }
        else
        {
            $save_changes.setAttribute("disabled","disabled");
            field.className="invalid form-control";
            if(field===$new_pwd)
            {
                $con_pwd.setAttribute("disabled","disabled");
            } 
        }
    }
    //when save-changes is clicked 
    var once_appended = true;
    var $success_result_once = true;
    $save_changes.addEventListener('click', (e)=>{
        if($cur_pwd.value !=="")
        {
            $cur_pwd.className = "valid form-control";
            if($new_pwd.value !=="")
            {
                $new_pwd.className = "valid form-control";
                if($con_pwd.value!=="")
                {
                    $con_pwd.className = "valid form-control";
                    //ajax calls starts from here.
                    e.preventDefault();
                    
                    $.ajax({
                        url: 'changepass.php',
                        beforeSend: function () {
                         
                            
                        },
                        
                        data: {
                            old_pwd: $cur_pwd.value ,
                            new_pwd: $new_pwd.value
                        },
                        async: false,
                        method: 'post',
                        success: function (data, textStatus, jqXHR) {
                          
                            if(data>0)
                            {
                                    $('#succeded_container').hide();
                                    $('#go_to_home_link').show();
                                    $('#success_result').append('\
                                        <div class="alert alert-success" role="alert">\n\
                                            Woo hoo! Your password has been changed!\n\
                                        </div>\n\
                                    ');
                            }
                            else
                            {
                                
                                $save_changes.setAttribute("disabled",'disabled');
                                if(once_appended)
                                {
                                    $cur_pwd.className="invalid form-control";
                                    $('#wrong_pwd').append("\
                                        <div class=\"alert alert-danger\" role=\"alert\" id=\"wrong_pwd_error\">\
                                            <small> \n\
                                                It seems you have entered an invalid password.\n\
                                            </small>\n\
                                        </div>\n\
                                    ");
                                    once_appended = false;
                                }
                            }
                        },
                        complete: function (jqXHR, textStatus) {
                            
                        }
                    });
                }
                else
                {
                    $con_pwd.className = "invalid form-control";
                }
            }
            else
            {
                $new_pwd.className = "invalid form-control";
            }
        }
        else
        {
            $cur_pwd.className = "invalid form-control";
        }
    },false);
    //Verifying new password with old one.
    $con_pwd.addEventListener('keyup', (e)=>{
        if( !( ( $con_pwd.value === "" ) && ( $new_pwd.value === "" ) ) )
        {
            if(($con_pwd.value)===($new_pwd.value))
            {
                 $con_pwd.className = "valid form-control";
                 $save_changes.removeAttribute('disabled');
            }
            else
            { 
                 $save_changes.setAttribute('disabled','disabled');
                 $con_pwd.className = "invalid form-control";
                 $confirm_pwd_text.innerHTML = "Passwords don't match";  
            }           
        }
        else
        {
                 $save_changes.setAttribute('disabled','disabled');
                 $con_pwd.className = "invalid form-control";
                 $confirm_pwd_text.innerHTML = "Passwords don't match";  
        }
    });
    
    if($cur_pwd.value==="")
    {
        $('forgot_pwd_link').hide();
    }
    

    
    $new_pwd.addEventListener('keyup', (e)=>{
        if( !( ( $con_pwd.value === "" ) || ( $new_pwd.value === "" ) ) )
        {
            if(($con_pwd.value)===($new_pwd.value))
            {
                 $con_pwd.className = "valid form-control";
                 $save_changes.removeAttribute('disabled');
            }
            else
            { 
                 $save_changes.setAttribute('disabled','disabled');
                 $con_pwd.className = "invalid form-control";
                 $confirm_pwd_text.innerHTML = "Passwords don't match";  
            }           
        }
        else
        {
           if($con_pwd.value === "")
           {
               $save_changes.setAttribute('disabled','disabled');
           }
        }
    });
    
    $('#forgot_pwd_link').on('click', (e)=>{
       e.preventDefault(); 
    });
});