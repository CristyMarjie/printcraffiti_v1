import { default as axios } from "axios";

void new (class Category {
    constructor() {
        this.name = document.querySelector('[name="name"]')
        this.cat_description = document.querySelector('[name="cat_description"]')
        this.cat_id = document.querySelector('[name="cat_id"]')
        this.myForm = document.querySelector('#myForm')
        this.myMethod = document.querySelector('#myMethod')
        this.modalTitle= document.querySelector('#modal-title')
        this.btnAddCategory = document.querySelector('#addCat')

        this.cat_prod_id = document.querySelector('[name="cat_prod_id"]')
        this.btnDeleteConfirm = document.querySelector('.deleteConfirm')
        // this.modalDetails = document.querySelector('#modal-details')
        
        this.initialization();
        this.eventHandler();
    }

    initialization = () => {};
    eventHandler = () => {
        document.querySelectorAll(".editInfo")
            .forEach(async (el) =>
                el.addEventListener("click", this.getCategoryInformation)
                
            );
        
            this.btnAddCategory.addEventListener('click',() => {
                
                this.modalTitle.innerHTML = 'ADD CATEGORY'
    
                this.myForm.reset();
                this.myMethod.value = 'addCategory';
                // this.myForm.method = 'POST';
    
                $('#addCategory').modal('show')
    
            })

            document.querySelectorAll(".deleteConfirm").forEach(async (el) => el.addEventListener("click", this.getCategoryID));
            
    };

    getCategoryID = async ({ target }) => {
        try {
            $('#kt_modal_1').modal('show')
            console.log(`cat_prod_id:${target.dataset.category}`);
            this.cat_prod_id.value=target.dataset.category;

        } catch (err) {
            console.log(err);
        }
    };


    getCategoryInformation = async ({ target }) => {
        try {
            
            this.categoryId = target.dataset.category;
            console.log(`cat-id : ${target.dataset.category}`);
            this.myForm.reset();
            console.log(target.dataset.category);
            const { data: result } = await axios.get(
                `/category/${target.dataset.category}`
            );

            this.populateCategoryInformation(result);

            this.modalTitle.innerHTML = 'EDIT CATEGORY'
            this.myMethod.value = 'editCategory';
            // this.myForm.method = 'PUT';

            $("#addCategory").modal("show");
        } catch (err) {
            console.log(err);
        }
    };
    populateCategoryInformation = (data) => {
        this.cat_id.value = data.id;
        this.name.value = data.name;
        console.log(data.name);
        this.cat_description.value = data.description;
    };
})();
