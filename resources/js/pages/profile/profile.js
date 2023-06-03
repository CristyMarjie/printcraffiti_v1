const { default: axios } = require("axios");

void new class UpdateInformation{

    constructor()
    {
        this.form = document.querySelector('#tenant_update_personal_information')
        this.submitButton = document.querySelector('#updateInformation')
        this.avatar4 = new KTImageInput('kt_profile_avatar');
        this.currentUserId = this.submitButton.getAttribute('data-id')

        this.initFormValidation()

    }

    initFormValidation(){

        this.validator = FormValidation.formValidation(
            this.form,
            {
                fields:{
                    first_name:{
                        validators:{
                            notEmpty:{
                                message:"First Name is required"
                            }
                        }
                    },
                    last_name:{
                        validators:{
                            notEmpty:{
                                message:"Last Name is required"
                            }
                        }
                    },
                    phone_number:{
                        validators:{
                            integer:{
                                message:"This is not a valid number"
                            }
                        }
                    },
                    email:{
                        validators:{
                            notEmpty:{
                                message:"Email is required"
                            },
                            emailAddress:{
                                message:"Invalid Email Format"
                            },
                            remote:{
                                message: 'This email has been taken',
                                method: 'GET',
                                data:()=>{
                                    return {
                                        email:this.form.querySelector('[name="email"]').value,
                                        isProfile: true,
                                        currentID: this.currentUserId
                                    }
                                },
                                url: '/admin/validate/email'
                            }

                        }
                    },

                },
                plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
            }
        )
        this.eventHandlers(this.validator)
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

    submitForm = async()=>{

        confirmAlert('Update Profile','Do you wish to continue?',this.updateProfileAjax)
        this.submitButton.disabled = false;
    }

    updateProfileAjax = async()=>{

        try{
            this.formData = new FormData(this.form)
            const response = await axios.post(`/admin/update/profile/information/${this.currentUserId}`, this.formData)

            const data  = response.data
            showAlert('Success!',data.message,'success')

        }catch({response:err}){
            showAlert('Error',message,'error')
        }
    }


}

