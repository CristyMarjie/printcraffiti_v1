import { default as axios } from "axios"

void new class TrackOrder{

    constructor() {
        this.initialization();
        this.eventHandler();
    }
    
    initialization = () => {
    // No initialization needed
    };
    
    eventHandler = () => {

        document.querySelectorAll(".btnOrder").forEach(async (el) => el.addEventListener("click", this.getOrderInformation));

    };
    getOrderInformation = async ({ target }) => {
        try {
            
            
            this.orderId = target.dataset.order;
            
            axios.get(`/batch_order/${target.dataset.order}`)
            .then(response => {
                const data = response.data;
                console.log('data:', data);

                // Get a reference to the table and the table body
                const table = document.getElementById('myTable');
                const tbody = table.getElementsByTagName('tbody')[0];

                // const reset_table = document.getElementById('myTable');
                // const reset_rows = reset_table.rows;
                // for (let i = 0; i < reset_rows.length; i++) {
                //     const reset_cells = reset_rows[i].cells;
                //     for (let j = 0; j < reset_cells.length; j++) {
                //         reset_cells[j].innerHTML = ""; // or some default value
                //     }
                // }

                // Loop through the data and add it to the table
                data.forEach(item => {
                const row = document.createElement('tr');
                const cell1 = document.createElement('td');
                const cell2 = document.createElement('td');
                const cell3 = document.createElement('td');
                const cell4 = document.createElement('td');
                const cell5 = document.createElement('td');
                cell1.innerHTML = item.product.name;
                cell2.innerHTML = item.product.unit_price;
                cell3.innerHTML = item.quantity;
                cell4.innerHTML = item.discount;
                cell5.innerHTML = item.total_amount;
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                row.appendChild(cell5);
                tbody.appendChild(row);
                });

                $("#trackOrderModal").modal("show");
            })
            .catch(error => {
                console.error(error);
            });


            $("#trackOrderModal").modal("show");
        } catch (err) {
            console.log(err);
        }
    };
}