const { default: axios } = require("axios")
const { defaultsDeep } = require("lodash")

void new class AddUser{

    constructor()
    {
        this._wizardEl = KTUtil.getById('kt_wizard')
        this._formEl = KTUtil.getById('kt_form')
        this.roleOnChange = document.querySelector('#role_id')
        this.suObject = document.querySelector('#finance_SU')
        this.avatar = new KTImageInput('kt_user_add_avatar')
        this.object = document.querySelector('#tenant_number')
        this.handleRoleOnChange()


        this.initFormWizard()
        this._validations = []
        this.eventHandlers()
        this.initFormValidation()
        this.tenantList()


        $('#tenant_select2').attr('disabled', 'disabled')
    }

    tenantList = async() => {
        const result = await axios.get('/tenant/list')
        const data = result.data
        for(const e of data){$('#tenant_select2').append(`<option value="${e.tenant_number}" data-item="${e.location}">${e.tenant}</option>`)}

    }

    eventHandlers = () =>{
        $(document).on('click','#btnSubmit',this.submitForm)
        $('#tenant_select2').select2({multiple:true})
        $(document).on('change', '#tenant_select2', this.fetchMasterTenant)
        $('#tenant_select2').trigger('change')
    }

    fetchMasterTenant = async(e) => {

    this.result = $('#tenant_select2 option:selected').map(function(){return $(this).data('item')}).get()
    $('#location').val(this.result.join(',  '))
       const currentTenantID = e.target.value
       const {data:response} = await axios.get(`/admin/fetch/tenant/${currentTenantID}`)
    }

    initFormWizard = () =>{
        this._wizard = new KTWizard(this._wizardEl,{startStep:1,clickableSteps:true})

        this._wizard.on('change',() => KTUtil.scrollTop())

        this._wizard.on('beforeNext',async wizard => {

            this._wizard.stop()

            try{

                const success = await this._validations[wizard.getStep() - 1].validate()
                const permissions = new Promise((resolve,reject) =>  (wizard.getStep() === 3 && this._permissions.length === 0 ? reject('Please select atleast one permission') : resolve('Valid')))
                if(await success === 'Valid') this._wizard.goNext()
                if(wizard.getStep() === 4){

                    const formData = this.getFormData()
                    if(!this.roleOnChange.value === 4){
                        formData.forEach((value,key) =>{
                            $(`.${key}`).html(value)
                        })
                    }else{

                        $('.first_name').html(formData.get('first_name'))
                        $('.last_name').html(formData.get('last_name'))
                        $('.phone_number').html(formData.get('phone_number'))
                        $('.email').html(formData.get('email'))
                        $('.address1').html(formData.get('address1'))
                        $('.postcode').html(formData.get('postcode'))
                        $('.city').html(formData.get('city'))

                    }
                }

            }catch(err){
                $('#permissions_error').html(err);
            }
        })
    }

    submitForm = async (e) =>{
        e.preventDefault()
        confirmAlert('Create new user?','Do you wish to continue?',this.insertUserAjax)
    }

    insertUserAjax = async() => {
        try{

            const response = await axios.post('/admin/create/user',this.getFormData());

            const data =  response.data
            $('#profile_avatar').val("")
            showAlert('Success!', data.message,'success')

            this.resetForm()

        }catch({response:err}){

            const data = err.data

            let errorMessage = ''

            $.each(data.errors,(i,x)=>errorMessage = `${x[0]} \n ${errorMessage}`)

            showAlert('Warning!',errorMessage,'warning')

        }
    }

    getFormData = () =>{
        this.formData = new FormData(document.querySelector('#kt_form'))

        return this.formData
    }

    initFormValidation = () =>{
        this._validations.push(FormValidation.formValidation(this._formEl,{
            fields:{
                first_name:{
                    validators:{
                        notEmpty:{
                            message:'First Name is required'
                        }
                    }
                },
                last_name:{
                    validators:{
                        notEmpty:{
                            message:'Last Name is required'
                        }
                    }
                },

                phone_number:{
                  validators:{
                    integer:{
                        message:"This is not a valid number"
                    },
                    stringLength: {
                        max: 11,
                        message: 'The phone number must be less than 11 digit',
                    },
                  }
                }
            },
            plugins:{
                trigger: new FormValidation.plugins.Trigger({
                    delay:{
                        email:1
                    }
                }),
                bootstrap: new FormValidation.plugins.Bootstrap(),
            }
        }))

        this._validations.push(FormValidation.formValidation(this._formEl,{
                fields:{
                    role_id:{
                        validators:{
                            notEmpty:{
                                message:'Role is required'
                            }
                        }
                    },
                    username:{
                        validators:{
                            notEmpty:{
                                message:'Username is required'
                            }
                        }
                    },
                    password:{
                        validators:{
                            notEmpty:{
                                message:'Password is required'
                            }
                        }
                    },
                    email:{
                        validators:{
                            notEmpty:{
                                message:'Email is required'
                            },
                            emailAddress:{
                                message:'Invalid Email Address Format'
                            },
                            remote:{
                                message: 'This emaail has already been taken',
                                method: 'GET',
                                data:()=>{
                                    return {
                                        email:this._formEl.querySelector('[name="email"]').value,
                                        isProfile:false
                                    }
                                },
                                url: '/admin/validate/email'
                            }
                        }
                    },
                    confirm_password:{
                        validators:{
                            notEmpty:{
                                message:'Confirmation Password is required'
                            },
                            identical:{
                                compare:() => this._formEl.querySelector('[name="password"]').value,
                                message:"Password does not match"
                            }
                        }
                    },

                },
                plugins:{
                    trigger: new FormValidation.plugins.Trigger({
                        event:{password : !1},
                        delay: {
                            barcode: 1,
                            last_name:1,
                            email:1
                        },
                    }),
                    bootstrap:new FormValidation.plugins.Bootstrap(),
                    excluded: new FormValidation.plugins.Excluded(),
                }
        }))

        this._validations.push(FormValidation.formValidation(this._formEl,{
            fields:{
                role_id:{
                    validators:{
                        notEmpty:{
                            message:'Role is required'
                        }
                    }
                }
            },
            plugins:{
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap:new FormValidation.plugins.Bootstrap(),
                excluded: new FormValidation.plugins.Excluded(),
            }
        }))

    this._validations.push(FormValidation.formValidation(this._formEl,{
        fields:{
            address1:{
                validators:{
                    notEmpty:{
                        message:'Address is required'
                    }
                }
            }
        },
        plugins:{
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap:new FormValidation.plugins.Bootstrap(),
            excluded: new FormValidation.plugins.Excluded(),
        }
    }))
    }

    resetForm = () =>{
        this._wizard.goTo(1)

        $('.has-success , .is-valid').removeClass('has-success is-valid')

        $('.form-control').val('')

        this.dualListBox.remove_all_button.click()

        $("#role, #buyerList").val('').trigger('change')

    }


    handleRoleOnChange = () =>{

        this.roleOnChange.addEventListener('change',(e) => {


           if(e.target.value == 2)
           {

            this.suObject.hidden = false
           }else{
            this.suObject.hidden = true
           }

           if(e.target.value == 4){

                this.object.hidden = false
                $('#tenant_select2').removeAttr('disabled')

           }else {
               this.object.hidden = true
               $('#tenant_select2').attr('disabled', 'disabled')
           }

        })
    }

}

