import { default as axios } from "axios"

void new class Cart{

    constructor()
    {
        this.product_span = document.querySelector('[name="product_span"]')
        this.initialization()
        this.eventHandler()
    }

    initialization = () => { 
       
    }
    eventHandler = () => { 
      
        document.querySelector('#quantity').addEventListener('keyup',(e) => { 
            let quantity = (e.target.value == null ? '' : e.target.value);
            let price = document.querySelector('#unit_price').value;
            let bundle = document.querySelector('#bundle_discount').value;
            let percentage = document.querySelector('#discount_percentage').value;
            let percentageDecimal = percentage/100;
            let subtotal = quantity * price;
            let discount = 0.0;let total = 0.0;
            if(quantity>=bundle){
                discount = subtotal*percentageDecimal;
            }
            total = subtotal-discount;

            

            // document.getElementById("upc_barcode").value = "";
            // if(e.which == 13){
            //     this.upcData = upcData
            //     console.log(this.convertData(upcData));
            //     const current_date = document.querySelector('#current_date').value;
            //     console.log(`current date : ${current_date}`); 

            //     this.getItemBySku(this.convertData(upcData),current_date);
            // }

            console.log(total);


        })

        // document.querySelectorAll('.editInfo').forEach((element) => {
        //     element.addEventListener('click', this.getPersonInformation);
        //   });
          document.querySelectorAll('.editInfo').forEach(async el =>  el.addEventListener('click', this.getProductInformation));
          

    }
    getProductInformation = async({target}) =>{
        try{
            this.productId = target.dataset.product

            // this.form.reset()

            const {data:result} = await axios.get(`/product/${target.dataset.product}`)

            this.populateProductInformation(result)

            // this.modalTitle.innerHTML = 'Edit User'

            // this.modalDetails.innerHTML = 'Update Personal Information and User credentials'

            // this.submitButton.dataset.action = 'UPDATE'

            $('#addToCart').modal('show')
        }catch(err){
            console.log(err)
        }
    }
    populateProductInformation =  (data) => {

        this.product_span.value = data.name

        // this.last_name.value = data.last_name

        // this.email.value = user.email

        // this.buyer_code.value = user.buyer_code


    }

    // convertData = (upcData) => {
    //     this.upcDataLength = upcData.length
    //     let addLeadingZeros = ''
    //     if(this.upcDataLength<=14){
    //         addLeadingZeros=upcData.padStart(18, '0')
    //     }else{
    //         console.log('upc exceeds 13digits')
    //     }
          
    //      return addLeadingZeros
    // }


    // getItemBySku = async(barcode,current_date) => {  
    //     const sale_price = document.getElementById("sale_price");
    //     const sale_term = document.getElementById("sale_term");
    //     try{
    //         const {data:result} = await axios.get(`/api/get/item/${barcode}?current_date=${current_date}`);
            
    //         this.data = result    
    //         for(const data of result)
    //         {   
    //             console.log(data.short_descr)      
    //             console.log(`start : ${data.start_date}`)  
    //             console.log(`end : ${data.stop_date}`)  
    //             $('#short_descr').html(data.short_descr)
    //             $('#actual_barcode').html(data.upc)
                
    //             if(typeof data.start_date === 'undefined'){
    //                 sale_price.style.display = "none";
    //                 sale_term.style.display = "none";
    //                 $('#price').html('P'+ numberWithCommas(parseFloat(data.price).toFixed(2)))
    //             }else{
    //                 const p_before = parseFloat(data.before);
    //                 const num = p_before.toFixed(2);
    //                 sale_price.style.display = "";
    //                 sale_term.style.display = "";
    //                 $('#price').html('P'+ numberWithCommas(num))
    //                 $('#sale_term').html(`Sale Price : `);
    //                 $('#sale_price').html(`PHP ${parseFloat(data.price).toFixed(2)}`);
    //             }
                    
    //             document.getElementById("upc_barcode").value = "";
    //         }
            
    //     }catch({response:err}){
    //         $('#short_descr').html('Not Found!')
    //         $('#price').html('--')
    //         $('#actual_barcode').html('--')
    //         document.getElementById("upc_barcode").value = "";
    //         sale_price.style.display = "none";
    //         sale_term.style.display = "none";
    //     }
    // }
}