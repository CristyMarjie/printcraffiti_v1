import { default as axios } from "axios"

void new class BatchOrder{

    constructor() {
        this.checkboxes = document.querySelectorAll('.checkbox');
        this.lblSubtotal = document.querySelector('#lblSubtotal');
        this.lblOrderTotal = document.querySelector('#lblOrderTotal');
        this.totalDiscount = document.querySelector('#lblTotalDiscount');
        this.lblShipCost = document.querySelector('#lblShipCost');
        this.totalPrice = document.querySelector('#allTotal');
        this.selectedItems = [];

        this.ship_add = document.querySelector('[name="ship_add"]')
        this.total_subtotal = document.querySelector('[name="txtTotalSubtotal"]')
        this.total_discount = document.querySelector('[name="txtTotalDiscount"]')
        this.total_amount = document.querySelector('[name="txtTotalAmount"]')
        this.cart_id = document.querySelector('[name="cart_id"]')


        this.initialization();
        this.eventHandler();
      }
      
      initialization = () => {
        // No initialization needed
      };
      
      eventHandler = () => {

        // document.querySelectorAll(".deleteConfirm").forEach(async (el) => el.addEventListener("click", this.getCartID));
        document.querySelectorAll(".orderProduction").forEach(async (el) => el.addEventListener("click", this.setProductionStatus));
        document.querySelectorAll(".shippedOut").forEach(async (el) => el.addEventListener("click", this.setShipStatus));
        document.querySelectorAll(".forDelivery").forEach(async (el) => el.addEventListener("click", this.setForDeliveryStatus));
        document.querySelectorAll(".delivered").forEach(async (el) => el.addEventListener("click", this.setDeliveredStatus));

    };
    
    // getCartID = async ({ target }) => {
    //     try {
    //         $('#deleteModal').modal('show')
    //         console.log(`cart_id:${target.dataset.cart}`);
    //         this.cart_id.value=target.dataset.cart;

    //     } catch (err) {
    //         console.log(err);
    //     }
    // };

    setProductionStatus = async ({ target }) => {
        try {
            
            this.batchId = target.dataset.batch;

            console.log(target.dataset.batch);

            const response = await axios.post(`/admin/orders/status-2/${target.dataset.batch}`)
            const data  = response.data
            console.log(`responses:${data}`)
            location.reload()
        } catch (err) {
            console.log(err);
        }
    };

    setShipStatus = async ({ target }) => {
        try {
            
            this.batchId = target.dataset.batch;

            console.log(target.dataset.batch);

            const response = await axios.post(`/admin/orders/status-3/${target.dataset.batch}`)
            const data  = response.data
            console.log(`response:${data}`)
            location.reload()
        } catch (err) {
            console.log(err);
        }
    };

    setForDeliveryStatus = async ({ target }) => {
        try {
            
            this.batchId = target.dataset.batch;

            console.log(target.dataset.batch);

            const response = await axios.post(`/admin/orders/status-4/${target.dataset.batch}`)
            const data  = response.data
            console.log(`response:${data}`)
            location.reload()
        } catch (err) {
            console.log(err);
        }
    };

    setDeliveredStatus = async ({ target }) => {
        try {
            
            this.batchId = target.dataset.batch;

            console.log(target.dataset.batch);

            const response = await axios.post(`/admin/orders/status-5/${target.dataset.batch}`)
            const data  = response.data
            console.log(`response:${data}`)
            location.reload()
        } catch (err) {
            console.log(err);
        }
    };

}