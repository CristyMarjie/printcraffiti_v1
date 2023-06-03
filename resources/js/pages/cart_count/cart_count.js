import { default as axios } from "axios"

void new class CartCount{

    constructor()
    {
        this.cart_count = document.querySelector('#cart_count')
        this.cus_id = document.querySelector('[name="cus_id"]')

        this.initialization()
        this.eventHandler()
    }

    initialization = () => { 
       
    }
    eventHandler = () => { 
      
        document.addEventListener('DOMContentLoaded', () => {
            // Your code here
            this.getCartCount()
          });
          

    }
    getCartCount = async() =>{
        try{

            const {data:result} = await axios.get(`/cart_count/${this.cus_id.value}`)
            this.cart_count.innerHTML = result
            console.log(result);
            console.log(this.cus_id.value);

        }catch(err){
            console.log(err)
        }
    }
    

}