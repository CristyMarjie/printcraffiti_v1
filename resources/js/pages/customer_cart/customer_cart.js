import { default as axios } from "axios"

void new class CustomerCart{

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

        document.querySelectorAll(".deleteConfirm").forEach(async (el) => el.addEventListener("click", this.getCartID));

        document.addEventListener('DOMContentLoaded', () => {
            this.lblShipCost.innerHTML = `Shipping Cost:`;
          });

        this.checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('click', (event) => {
                if (event.target.checked) {
                    const value = event.target.value;
                    const [discount, total, id] = value.split(':').map(parseFloat);
                    if (!isNaN(discount) && !isNaN(total) && !isNaN(id)) {
                        this.selectedItems.push({discount, total, id});
                        this.setStatus(id,1);
                    }
                } else {
                    const value = event.target.value;
                    const [discount, total, id] = value.split(':').map(parseFloat);
                    const index = this.selectedItems.findIndex(item => item.discount === discount && item.total === total && item.id === id);
                    if (index !== -1) {
                        this.selectedItems.splice(index, 1);
                        this.setStatus(id,0);
                    }
                }
                const totalDiscount = this.selectedItems.reduce((acc, item) => acc + item.discount, 0);
                const total = this.selectedItems.reduce((acc, item) => acc + item.total, 0);
                const options = { minimumFractionDigits: 2, maximumFractionDigits: 2 };
                const formattedTotalDiscount = totalDiscount.toLocaleString(undefined, options);
                const formattedTotal = total.toLocaleString(undefined, options);
    
                const formattedNum = total + 150;
                this.totalDiscount.innerHTML = `Total Discount : ₱${formattedTotalDiscount}`;
                this.totalPrice.innerHTML = formattedTotal;
                this.lblSubtotal.innerHTML = `Order Subtotal : ₱${formattedTotal}`;
                this.lblOrderTotal.innerHTML = `Order Total : ₱${formattedNum.toLocaleString(undefined, options)}`;
                this.lblShipCost.innerHTML = `Shipping Cost: : ₱150.00`;

                this.total_subtotal.value = total;
                this.total_discount.value = totalDiscount;
                this.total_amount.value = formattedNum;
                
            });
        });
    };
    
    getCartID = async ({ target }) => {
        try {
            $('#deleteModal').modal('show')
            console.log(`cart_id:${target.dataset.cart}`);
            this.cart_id.value=target.dataset.cart;

        } catch (err) {
            console.log(err);
        }
    };

      setStatus = async (target,status) => {
        try{
            
            console.log(`target:${target}`);
            if(status==1){
                const response = await axios.post(`/carts/status-1/${target}`)
                const data  = response.data
                console.log(`response:${data}`)
            }else{
                const response = await axios.post(`/carts/status-0/${target}`)
                const data  = response.data
                console.log(`response:${data}`)
            }

            

            // showAlert('Success!' , data.message,'success')
          


        }catch({response:err}){
            showAlert('Warning', err.data.message, 'warning')
            this.form.reset()
        }
    };

}