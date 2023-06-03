void new class Login{
    constructor(){
        this.form = document.querySelector('#user_signin_form')

        this.submitButton = document.querySelector('#submit_credentials')

        this.invalidCredentials = document.querySelector('.invalid-credentials')

        this.emailField = document.querySelector('#email')

        this.passwrodField = document.querySelector('#password')

        this.initFormValidation()

        this.eventHandlers()
    }

    initFormValidation = () =>{

        this.validator = FormValidation.formValidation(
            this.form,
            {
                fields:{
                    email:{
                        validators:{
                            notEmpty:{
                                message:"Email is required"
                            }
                        }
                    },
                    password:{
                        validators: {
                            notEmpty: {
                                message: "Password is required"
                            }
                        }
                    }
                },
                plugins:{
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap:new FormValidation.plugins.Bootstrap(),
                }


            }
        )


    }

    authenticate = async(formData) =>
    {
        try{

            this.submitButton.disabled = true

            const response = await axios.post('/login',formData)

            window.location.href = response.data.data.redirect_to

        }catch({response:err})
        {

            this.inputStates('is-invalid')

            this.invalidCredentials.classList.remove('d-none')

            this.submitButton.disabled = false
        }

    }

    eventHandlers(){

        this.emailField.addEventListener('input',() => this.inputStates('is-valid'))

        this.passwrodField.addEventListener('input',() => this.inputStates('is-valid'))

        this.submitButton.addEventListener('click',async (e)=>{
            e.preventDefault()

            this.result = await this.validator.validate()

            if(this.result === 'Valid') this.authenticate(new FormData(this.form))

        })

    }


    inputStates = (state) =>{

        this.invalidCredentials.classList.add('d-none')

        if(this.passwrodField.value || this.emailField.value){

            this.emailField.classList.add((state  === 'is-valid'  ? 'is-valid' : 'is-invalid'))
            this.emailField.classList.remove((state  === 'is-valid'  ? 'is-invalid' : 'is-valid'))

            this.passwrodField.classList.add( (state === 'is-valid' ? 'is-valid' : 'is-invalid' ))
            this.passwrodField.classList.remove((state === 'is-valid' ? 'is-invalid' : 'is-valid' ))

        }

    }

}
