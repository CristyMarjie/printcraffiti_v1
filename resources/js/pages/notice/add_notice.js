const { default: axios } = require("axios")

void new class AddNotice{
    constructor(){
        this.noticeTypeElement = document.querySelector('#notice_type')

        this.submitNotice = document.querySelector('#btnSubmitNotice')

        this.issuanceDate = document.querySelector('#issuance_date')

        this.deadline = document.querySelector('#deadline')

        this.form = document.querySelector('#addNoticeForm')

        this.tenantList  = document.querySelector('#tenantList')

        this.takeover = document.querySelector('#takeoverdt')

        this.eventHandlers()
    }

    eventHandlers = () =>{

        this.submitNotice.addEventListener('click',this.submitNoticeEvent)

        $(this.deadline).datepicker(datePickerDefaultSetting)
        $(this.issuanceDate).datepicker(datePickerDefaultSetting)
        $(this.takeover).datepicker(datePickerDefaultSetting)


        $('.sl2').select2().on('change',this.noticeTypeOnChange)

        $(this.noticeTypeElement).trigger('change')

    }

    noticeTypeOnChange = (e) => {



        if(e.target.value === 'FIRST_NOTICE'){
            $('.first_second_notice').removeClass('d-none')
        }

        if(e.target.value === 'SECOND_NOTICE'){
            $('.second-notice').removeClass('d-none')
            $('.first_second_notice').removeClass('d-none')
        }else{
            if(e.target.value === 'THIRD_NOTICE'){
                $('#deadlineLable').html('Overdue')
                $('.soaContainer').addClass('d-none')
                $('.first_second_notice').addClass('d-none')
            }else{
                if(e.target.value === 'TURNOVER_NOTICE'){
                    $('#deadlineLable').html('Statement Date')
                    $('.soaContainer').addClass('d-none')
                    $('#takeover').removeClass('d-none')
                    $('.first_second_notice').addClass('d-none')
                }else{
                    $('#deadlineLable').html('Deadline of Payment')
                    $('.soaContainer').removeClass('d-none')
                    $('#takeover').addClass('d-none')
                }

            }
            $('.second-notice').addClass('d-none')
        }


    }


    submitNoticeEvent = async() =>{
        try{
            const {data:result} = await axios.post('/notice/storev2',new FormData(this.form))

            showAlert('Success','Notice added','success')
            this.form.reset()
        }catch(err){

        }
    }




}
