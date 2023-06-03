import { default as axios } from "axios"

void new class GrantQuote{

    constructor() {
        this.initialization();
        this.eventHandler();
    }
    
    initialization = () => {
    // No initialization needed
    };
    
    eventHandler = () => {

        document.querySelectorAll(".btnGrantedQuote").forEach(async (el) => el.addEventListener("click", this.getQuoteInformation));

    };
    getQuoteInformation = async ({ target }) => {
        try {
            
            axios.get(`/granted_quote`)
            .then(response => {
                const data = response.data;
                console.log('data:', data);

                // Get a reference to the table and the table body
                const table = document.getElementById('myTable');
                const tbody = table.getElementsByTagName('tbody')[0];

                data.forEach(item => {
                const row = document.createElement('tr');
                const cell1 = document.createElement('td');
                const cell2 = document.createElement('td');
                const cell3 = document.createElement('td');
                cell1.innerHTML = item.id;
                cell2.innerHTML = item.quotation_tile;
                cell3.innerHTML = `<a href="/assets/quotations/${item.id}.pdf" class="btn btn-info m-2 fa-solid fa-download" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download File" download></a>`;
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                tbody.appendChild(row);
                });

                // $("#grantedQuoteModal").modal("show");
            })
            .catch(error => {
                console.error(error);
            });


            $("#grantedQuoteModal").modal("show");
        } catch (err) {
            console.log(err);
        }
    };
}