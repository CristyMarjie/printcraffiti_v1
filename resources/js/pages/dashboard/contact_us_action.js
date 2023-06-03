void new class ContactUsAction {

    constructor() {

        this.form = document.querySelector('#request_form')
        this.submitButton = document.querySelector('#submit_user_request')

        this.initValidation()
        this.eventHandler()
    }

    eventHandler = () => {
        this.submitButton.addEventListener('click', async(e) => {
            e.preventDefault()

            let status = await this.validation.validate()

            if(status === 'Valid') this.confirmSubmitRequest()
        })
    }

    confirmSubmitRequest = async() => {
        confirmAlert('Submit Request?', 'Do you wish to continue?', this.insertRequestAjax)
        this.submitButton.disabled = false
    }

    insertRequestAjax = async() => {

        this.formData = new FormData(this.form)

        try{
            const response = await axios.post(`/admin/store/feedback`, this.formData)

            const data = response.data;

            this.form.reset()
            showAlert('Success!', data.inquiry_title+ ' has been submitted.', 'success')

        }catch({response:err}){
                showAlert('Warning!', 'Something went wrong', 'warning')

        }

    }



    initValidation() {
        this.validation = FormValidation.formValidation(
            this.form,
            {
                fields:{
                    inquiry_title:{
                        validators:{
                            notEmpty:{
                                message:"Inquiry title is required"
                            }
                        }
                    },
                    message:{
                        validators:{
                            notEmpty:{
                                message:"Please describe your inquiry or request"
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
    }


}
