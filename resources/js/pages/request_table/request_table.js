import { default as axios } from "axios";

void new (class Category {
    constructor() {

        this.req_id = document.querySelector('[name="req_id"]')
        
        
        this.initialization();
        this.eventHandler();
    }

    initialization = () => {};
    eventHandler = () => {

            document.querySelectorAll(".btnQuote").forEach(async (el) => el.addEventListener("click", this.getRequestID));
            
    };

    getRequestID = async ({ target }) => {
        try {
            $('#kt_modal_1').modal('show')
            console.log(`qrequest:${target.dataset.qrequest}`);
            this.req_id.value=target.dataset.qrequest;

        } catch (err) {
            console.log(err);
        }
    };

})();
