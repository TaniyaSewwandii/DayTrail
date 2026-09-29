document.addEventListener("DOMContentLoaded", function () {

    /* =========================
       LIGHT / DARK MODE
       ========================= */

    const themeToggle = document.getElementById("themeToggle");

    const savedTheme = localStorage.getItem("theme");

    if (savedTheme === "dark") {

        document.body.classList.add("dark-mode");

        if (themeToggle) {
            themeToggle.textContent = "☀️";
        }

    } else {

        document.body.classList.remove("dark-mode");

        if (themeToggle) {
            themeToggle.textContent = "🌙";
        }

    }


    /* THEME BUTTON */

    if (themeToggle) {

        themeToggle.addEventListener("click", function () {

            document.body.classList.toggle("dark-mode");

            if (document.body.classList.contains("dark-mode")) {

                localStorage.setItem("theme", "dark");
                themeToggle.textContent = "☀️";

            } else {

                localStorage.setItem("theme", "light");
                themeToggle.textContent = "🌙";

            }

        });

    }


    /* =========================
       SEARCH + URL CATEGORY
       ========================= */

    const searchInput = document.getElementById("searchInput");

    if (searchInput) {

        const placeCards =
            document.querySelectorAll(".place-card");


        /* Get category from URL */

        const urlParams =
            new URLSearchParams(window.location.search);

        const selectedCategory =
            urlParams.get("category");


        function filterPlaces() {

            const searchText =
                searchInput.value.toLowerCase().trim();


            placeCards.forEach(function (card) {

                const nameElement =
                    card.querySelector("h3");

                const descriptionElement =
                    card.querySelector("p");

                const categoryElement =
                    card.querySelector(".category-badge");


                if (
                    !nameElement ||
                    !descriptionElement ||
                    !categoryElement
                ) {
                    return;
                }


                const placeName =
                    nameElement.textContent.toLowerCase();

                const description =
                    descriptionElement.textContent.toLowerCase();

                const placeCategory =
                    categoryElement.textContent
                    .trim()
                    .toUpperCase();


                /* SEARCH */

                const matchesSearch =
                    placeName.includes(searchText) ||
                    description.includes(searchText);


                /* CATEGORY FROM category.php */

                const matchesCategory =
                    !selectedCategory ||
                    placeCategory ===
                    selectedCategory.toUpperCase();


                /* SHOW / HIDE */

                if (
                    matchesSearch &&
                    matchesCategory
                ) {

                    card.style.display = "";

                } else {

                    card.style.display = "none";

                }

            });

        }


        /* Search while typing */

        searchInput.addEventListener(
            "input",
            filterPlaces
        );


        /* Run immediately when page opens */

        filterPlaces();

    }

});
/* =========================
   MY DAY PLAN
========================= */

let myPlan =
    JSON.parse(localStorage.getItem("dayTrailPlan")) || [];


/* =========================================
   ADD PLACE FROM PLACES PAGE
========================================= */

const addButtons =
    document.querySelectorAll(".btn-card-add");


addButtons.forEach(function (button) {

    const placeName =
        button.dataset.name;


    /* Show already added places */

    const alreadyAdded =
        myPlan.some(function (place) {

            return place.name === placeName;

        });


    if (alreadyAdded) {

        button.textContent = "✓";

        button.classList.add("plan-added");

    }


    button.addEventListener("click", function () {

        const place = {

            name: button.dataset.name,

            category: button.dataset.category,

            image: button.dataset.image,

            distance: Number(button.dataset.distance),

            hours: Number(button.dataset.hours)

        };


        const exists =
            myPlan.some(function (item) {

                return item.name === place.name;

            });


        if (exists) {

            return;

        }


        myPlan.push(place);


        localStorage.setItem(
            "dayTrailPlan",
            JSON.stringify(myPlan)
        );


        button.textContent = "✓";

        button.classList.add("plan-added");

    });

});


/* =========================================
   DISPLAY MY PLAN
========================================= */

const planList =
    document.getElementById("planList");

const emptyPlan =
    document.getElementById("emptyPlan");


function displayMyPlan() {

    if (!planList) {

        return;

    }


    planList.innerHTML = "";


    if (myPlan.length === 0) {

        emptyPlan.style.display = "block";

    } else {

        emptyPlan.style.display = "none";

    }


    myPlan.forEach(function (place, index) {

        const item =
            document.createElement("div");


        item.className =
            "selected-place";


        item.innerHTML = `

            <div class="place-number">
                ${index + 1}
            </div>

            <img
                src="${place.image}"
                class="selected-place-image"
                alt="${place.name}"
            >

            <div class="selected-place-info">

                <h3>
                    ${place.name}
                </h3>

                <p>
                    ${place.category}
                    • ${place.hours} hours estimated
                </p>

            </div>

            <div class="selected-place-distance">

                ${place.distance} km

            </div>

            <button
                class="remove-place"
                data-index="${index}"
                title="Remove place"
            >
                🗑
            </button>

        `;


        planList.appendChild(item);

    });


    updatePlanSummary();

}


/* =========================================
   SUMMARY
========================================= */

function updatePlanSummary() {

    const count =
        document.getElementById("planCount");

    const summaryCount =
        document.getElementById("summaryCount");

    const totalDistance =
        document.getElementById("totalDistance");

    const totalHours =
        document.getElementById("totalHours");


    let distance = 0;

    let hours = 0;


    myPlan.forEach(function (place) {

        distance += Number(place.distance);

        hours += Number(place.hours);

    });


    if (count) {

        count.textContent =
            myPlan.length;

    }


    if (summaryCount) {

        summaryCount.textContent =
            myPlan.length;

    }


    if (totalDistance) {

        totalDistance.textContent =
            distance;

    }


    if (totalHours) {

        totalHours.textContent =
            hours;

    }

}


/* =========================================
   REMOVE PLACE
========================================= */

if (planList) {

    planList.addEventListener(
        "click",
        function (event) {

            const button =
                event.target.closest(".remove-place");


            if (!button) {

                return;

            }


            const index =
                Number(button.dataset.index);


            myPlan.splice(index, 1);


            localStorage.setItem(
                "dayTrailPlan",
                JSON.stringify(myPlan)
            );


            displayMyPlan();

        }
    );

}


/* =========================================
   CLEAR PLAN
========================================= */

const clearPlan =
    document.getElementById("clearPlan");


if (clearPlan) {

    clearPlan.addEventListener(
        "click",
        function () {

            myPlan = [];


            localStorage.removeItem(
                "dayTrailPlan"
            );


            displayMyPlan();


            /* Reset + buttons */

            document
                .querySelectorAll(".btn-card-add")
                .forEach(function (button) {

                    button.textContent = "+";

                    button.classList.remove(
                        "plan-added"
                    );

                });

        }
    );

}


displayMyPlan();