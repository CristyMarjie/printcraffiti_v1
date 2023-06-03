void new class UpdatePassword
{
    constructor()
    {

        this.form = document.querySelector('#tenant_profile_update_form')
        this.submitButton =  document.querySelector('#submitUpdate')
        this.currentID = this.submitButton.getAttribute('data-id')
        this.intiFormValidation()
    }



    intiFormValidation = () =>{

        this.validation = FormValidation.formValidation(
            this.form,
            {
                fields:{
                    new_password:{
                        validators:{
                            notEmpty:{
                                message:'Password is required'
                            }
                        }
                    },
                    confirm_password:{
                        validators:{
                            notEmpty:{
                                message:"Confirmation Password is required"
                            },
                            identical:{
                                compare:() =>  this.form.querySelector('[name="new_password"]').value,
                                message:"Password does not match"
                            }
                        }
                    }
                },
                plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
            }
        )
        this.eventHandlers(this.validation);
    }

    eventHandlers(validator){
        this.submitButton.addEventListener('click', async(e) => {
            e.preventDefault()

            let status = await validator.validate()

            if(status === 'Valid'){
                this.submitButton.disabled = true
                this.submitForm()
            }
        })

    }


    submitForm = async () =>{
        confirmAlert('Update password','Do you wish to continue?',this.updatePassword)
        this.submitButton.disabled = false;
    }

    updatePassword = async () =>{
        try{
            this.formData = new FormData(document.querySelector('#tenant_profile_update_form'))

            const response = await axios.post(`/admin/update/profile/credentials/${this.currentID}`,this.formData)

            const data  = response.data

            showAlert('Success!' , data.message,'success')
            this.form.reset()


        }catch({response:err}){
            showAlert('Warning', err.data.message, 'warning')
            this.form.reset()
        }
    }

}

