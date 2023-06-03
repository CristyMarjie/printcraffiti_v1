import { default as axios } from "axios";

void new (class Product {
    constructor() {
        this.prod_id = document.querySelector('[name="prod_id"]')
        this.category_id = document.querySelector('[name="category_id"]')
        this.name = document.querySelector('[name="name"]')
        this.specs = document.querySelector('[name="specs"]')
        this.unit_price = document.querySelector('[name="unit_price"]')
        this.bundle_discount = document.querySelector('[name="bundle_discount"]')
        this.discount_percentage = document.querySelector('[name="discount_percentage"]')
        this.lead_time = document.querySelector('[name="lead_time"]')

        this.del_prod_id = document.querySelector('[name="del_prod_id"]')

        this.myForm = document.querySelector('#myForm')
        this.myMethod = document.querySelector('#myMethod')
        this.modalTitle= document.querySelector('#modal-title')
        this.btnAddProduct = document.querySelector('#addProd')

        this.btnDeleteConfirm = document.querySelector('.deleteConfirm')
        
        // this.modalDetails = document.querySelector('#modal-details')


        this.initialization();
        this.eventHandler();
    }

    initialization = () => {};
    eventHandler = () => {
        document
            .querySelectorAll(".editInfo")
            .forEach(async (el) =>
                el.addEventListener("click", this.getProductInformation)
                
            );
        
            this.btnAddProduct.addEventListener('click',() => {
                
                this.modalTitle.innerHTML = 'ADD PRODUCT'
    
                this.myForm.reset();
                this.myMethod.value = 'addProduct';
                // this.myForm.method = 'POST';
                
    
                $('#addProduct').modal('show')
    
            })

            document.querySelectorAll(".deleteConfirm").forEach(async (el) => el.addEventListener("click", this.getProductID));
        
            // this.btnDeleteConfirm.addEventListener('click',() => {
    
            //     
    
            // })
            
    };
    getProductInformation = async ({ target }) => {
        try {
            
            this.productId = target.dataset.product;
            console.log(`product-id : ${target.dataset.product}`);
            this.myForm.reset();
            console.log(target.dataset.product);
            const { data: result } = await axios.get(
                `/product/${target.dataset.product}`
            );

            this.populateProductInformation(result);

            this.modalTitle.innerHTML = 'EDIT PRODUCT'
            this.myMethod.value = 'editProduct';
            // this.myForm.method = 'PUT';

            $("#addProduct").modal("show");
        } catch (err) {
            console.log(err);
        }
    };

    getProductID = async ({ target }) => {
        try {
            $('#kt_modal_1').modal('show')
            console.log(`del_prod_id:${target.dataset.product}`);
            this.del_prod_id.value=target.dataset.product;

        } catch (err) {
            console.log(err);
        }
    };

    populateProductInformation = (data) => {
        this.prod_id.value = data.id;
        this.category_id.value = data.category_id;
        this.name.value = data.name;
        this.specs.value = data.specs;
        this.unit_price.value = data.unit_price;
        this.bundle_discount.value = data.bundle_discount;
        this.discount_percentage.value = data.discount_percentage;
        this.lead_time.value = data.lead_time;
        console.log(data.name);
    };

})();
