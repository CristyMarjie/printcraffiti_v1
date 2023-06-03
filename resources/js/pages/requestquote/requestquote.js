import { default as axios } from "axios";


// from model > QuoteRerquest.php
void new (class QuoteRequest {
    constructor() {
        this.customer_id = document.querySelector('[name="customer_id"]')
        this.quote_title = document.querySelector('[name="quote_title"]')
        this.quantity = document.querySelector('[name="quantity"]')
        this.dimension = document.querySelector('[name="dimension"]')
        this.details = document.querySelector('[name="details"]')

        this.myForm = document.querySelector('#myForm')
        this.myMethod = document.querySelector('#myMethod')
        // this.btnAddRequest = document.querySelector('#AddRequest')

        this.initialization();
        this.eventHandler();
    }

    getRequestID = async ({ target }) => {
        try {
            $('#kt_modal_1').modal('show')
            console.log(`req_prod_id:${target.dataset.quote_request}`);
            this.req_prod_id.value=target.dataset.quote_request;

        } catch (err) {
            console.log(err);
        }
    };
    
    populateRequestInformation = (data) => {
        this.req_id.value = data.id;
        this.customer_id.value = data.customer_id;
        console.log(data.name);
        this.quote_title.value = data.quote_title;
        this.quantity.value = data.quantity;
        this.dimension.value = data.dimension;
        this.details.value = data.details;
    };
})();
