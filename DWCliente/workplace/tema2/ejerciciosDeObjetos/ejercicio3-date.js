

const start_date = document.querySelector("#start");
const end_date = document.querySelector("#end");
const form = document.querySelector(".form");



form.addEventListener("submit", (e) => {
    e.preventDefault();
    const start = new Date(start_date.value).getTime();
    const end = new Date(end_date.value).getTime();


    const diffDay = Math.round((end - start) / (1000 * 60 * 60 * 24));

    alert(`La diferencia entre las fechas es de ${diffDay} dias `);
})
