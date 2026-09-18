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