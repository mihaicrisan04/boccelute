const validation = new JustValidate("#signup");

validation
    .addField("#name", [    
        {
            rule: "required"
        }
    ])
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => () => {
                return fetch("validate-email.php?email=" + 
                    encodeURIComponent(value))
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(json) {
                            return json.available;
                        });
            },
            errorMessage: "Email already taken"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
            // sa fie cel putin 8 caractere cu cel putin un numar si un caracter
        }
    ])
    .addField("#password_confirmation", [
        {
            validator: (value, fields) => {
                if (fields["#password"] && fields["#password"].elem) {
                  const repeatPasswordValue = fields["#password"].elem.value;
                  return value === repeatPasswordValue;
                }
                return true;
              },
              errorMessage: "Passwords should be the same"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });