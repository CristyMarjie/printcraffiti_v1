import { default as axios } from "axios"

void new class Cart{

    constructor()
    {
        this.product_span = document.querySelector('[name="product_span"]')
        this.productTitle = document.querySelector('#product-title')
        this.productSpecs = document.querySelector('#product-specs')
        this.productPrice = document.querySelector('#product-price')

        this.product_id = document.querySelector('[name="product_id"]')
        this.unit_price = document.querySelector('[name="unit_price"]')
        this.bundle_discount = document.querySelector('[name="bundle_discount"]')
        this.discount_percentage = document.querySelector('[name="discount_percentage"]')
        this.subtotalLabel = document.querySelector('[name="subtotal"]')
        this.totalLabel = document.querySelector('[name="total"]')
        this.discountLabel = document.querySelector('[name="discount_amount"]')
        this.totalLabelHidden = document.querySelector('[name="hidden_total"]')
        this.discountLabelHidden = document.querySelector('[name="hidden_discount"]')

        this.initialization()
        this.eventHandler()
    }

    initialization = () => { 
       
    }
    eventHandler = () => { 
      
        document.querySelector('#quantity').addEventListener('keyup',(e) => { 
            let quantity = (e.target.value == null ? '' : e.target.value)
            let price = this.unit_price.value
            let bundle = this.bundle_discount.value
            let percentage = this.discount_percentage.value
            let percentageDecimal = percentage/100
            let subtotal = quantity * price
            let discount = 0.0;let total = 0.0
            if(quantity>=bundle){
                discount = subtotal*percentageDecimal
            }
            total = subtotal-discount

            console.log(total)

            // this.subtotalLabel.value = `₱${parseFloat(subtotal).toFixed(2)}`
            // this.totalLabel.value = `₱${parseFloat(total).toFixed(2)}`
            // this.discountLabel.value = `₱${parseFloat(discount).toFixed(2)}`
            this.subtotalLabel.value = subtotal
            this.totalLabel.value = total
            this.discountLabel.value = discount
            this.totalLabelHidden.value = total
            this.discountLabelHidden.value = discount

        })

          document.querySelectorAll('.editInfo').forEach(async el =>  el.addEventListener('click', this.getProductInformation))
          

    }
    getProductInformation = async({target}) =>{
        try{
            this.productId = target.dataset.product

            const {data:result} = await axios.get(`/cart/${target.dataset.product}`)

            this.populateProductInformation(result)

            $('#addToCart').modal('show')
        }catch(err){
            console.log(err)
        }
    }
    populateProductInformation =  (data) => {
        this.productTitle.innerHTML = data.name
        this.productSpecs.innerHTML = `Details : ${data.specs}`
        this.productPrice.innerHTML = `Unit Price : ${data.unit_price}`
        this.unit_price.value = data.unit_price
        this.bundle_discount.value = data.bundle_discount
        this.discount_percentage.value = data.discount_percentage
        this.product_id.value = data.id

    }

}