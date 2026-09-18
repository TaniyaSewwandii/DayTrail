<?php

$place = $_GET['place'] ?? 'galle-face';


$places = [

    "galle-face" => [
        "name" => "Galle Face Green",
        "category" => "NATURE",
        "image" => "pics/galleface.jpg",
        "distance" => "4 km from center",
        "price" => "Free",
        "opening" => "Open throughout the day",
        "visit" => "1–2 Hours",
        "location" => "Galle Road, Colombo",
        "map" => "https://www.google.com/maps/search/?api=1&query=Galle+Face+Green+Colombo",
        "description" => "Galle Face Green is a well-known ocean-side urban park in the heart of Colombo. The area stretches along the coast and is a popular place for walking, relaxing, enjoying the sea breeze and watching the sunset. It has also played an important role in Colombo's history and has been used for activities such as horse racing, golf, cricket and other sports in the past. Today, it is a popular recreational area for both local visitors and tourists."
    ],

    "one-galle-face" => [
        "name" => "One Galle Face",
        "category" => "SHOPPING",
        "image" => "pics/onegalleface.jpg",
        "distance" => "4 km from center",
        "price" => "Free entry",
        "opening" => "10:00 AM – 10:00 PM",
        "visit" => "2–3 Hours",
        "location" => "Colombo 03",
        "map" => "https://www.google.com/maps/search/?api=1&query=One+Galle+Face+Mall+Colombo",
        "description" => "One Galle Face is a modern lifestyle and shopping destination located beside Galle Face Green in Colombo. The mall offers several levels of international and local retail brands, restaurants, food options and entertainment facilities. Visitors can enjoy shopping, dining and spending time with family or friends. The location also provides views towards the Indian Ocean and is connected to a larger mixed-use development."
    ],

    "gangaramaya" => [
        "name" => "Gangaramaya Temple",
        "category" => "RELIGIOUS",
        "image" => "pics/gangaramaya.jpg",
        "distance" => "5 km from center",
        "price" => "Entry fee may apply",
        "opening" => "6:00 AM – 10:00 PM",
        "visit" => "1–2 Hours",
        "location" => "Sri Jinarathana Road, Colombo",
        "map" => "https://www.google.com/maps/search/?api=1&query=Gangaramaya+Temple+Colombo",
        "description" =>"Gangaramaya Temple is one of the well-known Buddhist temples in Colombo and an important religious and cultural attraction. The temple complex contains Buddhist religious objects, artworks and collections that reflect different aspects of Sri Lankan and Asian culture. Its architecture also shows influences from Sri Lanka and other Asian traditions. Visitors can experience a peaceful religious environment while learning about Buddhist culture and heritage."
    ],

    "museum" => [
        "name" => "Colombo National Museum",
        "category" => "HERITAGE",
        "image" => "pics/museum.jpg",
        "distance" => "6 km from center",
        "price" => "Ticket required",
        "opening" => "9:00 AM – 5:00 PM",
        "visit" => "2–3 Hours",
        "location" => "Sir Marcus Fernando Mawatha, Colombo",
        "map" => "https://www.google.com/maps/search/?api=1&query=Colombo+National+Museum",
        "description" => "The Colombo National Museum is an important museum for learning about Sri Lanka's history, culture and heritage. The museum contains historical objects, artworks, manuscripts, sculptures and other collections connected with the country's past. It provides visitors with an opportunity to learn about different periods of Sri Lankan history and understand the development of the country's culture and traditions."
    ],

    "lotus-tower" => [
        "name" => "Colombo Lotus Tower",
        "category" => "ENTERTAINMENT",
        "image" => "pics/loutus tower.jpg",
        "distance" => "5 km from center",
        "price" => "Ticket required",
        "opening" => "9:00 AM – 10:00 PM",
        "visit" => "1–2 Hours",
        "location" => "D. R. Wijewardena Mawatha, Colombo",
        "map" => "https://www.google.com/maps/search/?api=1&query=Colombo+Lotus+Tower",
        "description" => "Colombo Lotus Tower is one of the most recognizable modern landmarks in Colombo. The tower combines communication, observation, entertainment and tourism-related functions. Visitors can experience views of Colombo from its observation areas and explore attractions within the tower complex. Its distinctive lotus-inspired design has made it an important part of Colombo's modern city landscape.","Colombo Lotus Tower is an iconic landmark where visitors can enjoy observation areas and views of Colombo."
    ],

    "zoo" => [
        "name" => "Dehiwala Zoo",
        "category" => "WILDLIFE",
        "image" => "pics/zoo.jpg",
        "distance" => "10 km from center",
        "price" => "Ticket required",
        "opening" => "8:30 AM – 5:30 PM",
        "visit" => "2–4 Hours",
        "location" => "Dehiwala, Colombo",
        "map" => "https://www.google.com/maps/search/?api=1&query=Dehiwala+Zoological+Gardens",
        "description" => "Dehiwala Zoological Garden is one of Sri Lanka's major zoological attractions and is located in Dehiwala. The zoo provides visitors with an opportunity to see a variety of animals and learn about wildlife. It is a popular destination for families, students and tourists interested in animals and nature. Visitors can explore different areas of the zoo while learning about wildlife and conservation."
    ],

    "viharamahadevi" => [
        "name" => "Viharamahadevi Park",
        "category" => "NATURE",
        "image" => "pics/viharamahadevi.jpg",
        "distance" => "5 km from center",
        "price" => "Free",
        "opening" => "Open during daytime",
        "visit" => "1–2 Hours",
        "location" => "Colombo 07",
        "map" => "https://www.google.com/maps/search/?api=1&query=Viharamahadevi+Park+Colombo",
       "description" => "Viharamahadevi Park is a large public park located near Colombo Town Hall and the National Museum. The park was formerly known as Victoria Park and was later renamed in honour of Queen Viharamahadevi. It provides a green space within the busy city and includes areas for recreation and relaxation. The park also has a children's play area, open spaces and facilities for public events."
    ],

    "independence" => [
        "name" => "Independence Memorial Hall",
        "category" => "HERITAGE",
        "image" => "pics/independence.jpg",
        "distance" => "7 km from center",
        "price" => "Free",
        "opening" => "Open during daytime",
        "visit" => "1 Hour",
        "location" => "Independence Square, Colombo 07",
        "map" => "https://www.google.com/maps/search/?api=1&query=Independence+Square+Colombo",
        "description" => "Independence Memorial Hall is an important national monument located at Independence Square in Colombo. It commemorates Sri Lanka's independence and has become an important historical and architectural landmark. The surrounding area provides an open space where visitors can walk, relax and learn about an important part of Sri Lanka's modern history. The location is also connected with the Independence Memorial Museum."
    ],

    "havelock-city" => [
        "name" => "Havelock City Mall",
        "category" => "SHOPPING",
        "image" => "pics/havelockcity.jpg",
        "distance" => "8 km from center",
        "price" => "Free entry",
        "opening" => "10:00 AM – 10:00 PM",
        "visit" => "2–3 Hours",
        "location" => "Havelock Road, Colombo",
        "map" => "https://www.google.com/maps/search/?api=1&query=Havelock+City+Mall+Colombo",
        "description" => "Havelock City Mall is a modern shopping and lifestyle destination located on Havelock Road in Colombo. It provides visitors with a range of shopping, dining and entertainment options in one location. The mall is designed as part of a larger urban development and provides an indoor environment where visitors can spend time with family and friends while exploring shops, restaurants and entertainment facilities."
    ],

    "water-world" => [
        "name" => "Water World Lanka",
        "category" => "NATURE",
        "image" => "pics/waterworld.jpg",
        "distance" => "17 km from center",
        "price" => "Ticket required",
        "opening" => "9:00 AM – 5:30 PM",
        "visit" => "2–3 Hours",
        "location" => "Kelaniya, Sri Lanka",
        "map" => "https://www.google.com/maps/search/?api=1&query=Water+World+Kelaniya",
        "description" => "Water World Lanka is an aquatic attraction located in the Kelaniya area. It includes an aquarium and facilities designed to introduce visitors to aquatic life and the underwater environment. Visitors can explore different aquatic exhibits and learn about various species. The attraction can be included in a Colombo-area day trip for visitors interested in wildlife, aquatic life and educational experiences."
    ],
    "st-anthonys" => [
    "name" => "St. Anthony's Shrine, Kochchikade",
    "category" => "RELIGIOUS",
    "image" => "pics/stanthonys.jpg",
    "distance" => "4 km",
    "price" => "Free",
    "opening" => "Open daily",
    "visit" => "1–2 hours",
    "location" => "Kochchikade, Kotahena, Colombo 13",
    "map" => "https://www.google.com/maps/search/?api=1&query=St+Anthony's+Shrine+Kochchikade+Colombo",
    "description" => "St. Anthony's Shrine in Kochchikade is a historic Roman Catholic shrine and national shrine dedicated to Saint Anthony of Padua. It is an important place of worship and attracts visitors and pilgrims from different communities. The present church dates from the 19th century and has a long religious and cultural history in Colombo."
],

];


if (!isset($places[$place])) {
    $place = "galle-face";
}

$currentPlace = $places[$place];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="stylesheet.css">

    <title>
        <?php echo $currentPlace['name']; ?> | DayTrail
    </title>

</head>


<body>



<main class="details-container">
     <a href="places.php" class="back-btn">← Back to Places</a>


    <div class="details-card">


        <!-- IMAGE -->

        <div class="details-image">

            <img
                src="<?php echo $currentPlace['image']; ?>"
                alt="<?php echo $currentPlace['name']; ?>"
            >

        </div>


        <!-- DETAILS -->

        <div class="details-content">


            <span class="category-badge">

                <?php echo $currentPlace['category']; ?>

            </span>


            <h1>

                <?php echo $currentPlace['name']; ?>

            </h1>


            <div class="details-info">


                <div class="info-box">

                    <span>📍</span>

                    <div>

                        <small>Distance</small>

                        <strong>
                            <?php echo $currentPlace['distance']; ?>
                        </strong>

                    </div>

                </div>


                <div class="info-box">

                    <span>🎟️</span>

                    <div>

                        <small>Entry Fee</small>

                        <strong>
                            <?php echo $currentPlace['price']; ?>
                        </strong>

                    </div>

                </div>


                <div class="info-box">

                    <span>🕐</span>

                    <div>

                        <small>Opening Hours</small>

                        <strong>
                            <?php echo $currentPlace['opening']; ?>
                        </strong>

                    </div>

                </div>


                <div class="info-box">

                    <span>⏱️</span>

                    <div>

                        <small>Suggested Visit</small>

                        <strong>
                            <?php echo $currentPlace['visit']; ?>
                        </strong>

                    </div>

                </div>


            </div>


            <!-- ABOUT -->

            <section class="about-place">

                <h2>
                    About This Place
                </h2>

                <p>

                    <?php echo $currentPlace['description']; ?>

                </p>

            </section>


            <!-- LOCATION -->

            
                <div class="place-location">
    <h3>📍 Location</h3>
    <p><?php echo $currentPlace['location']; ?></p>

    <a href="<?php echo $currentPlace['map']; ?>" 
       target="_blank" 
       class="map-button">
        🗺️ View on Google Maps
    </a>
</div>

        


            <!-- GOOD FOR -->

            <section class="good-for">

                <h2>
                    ✨ Good For
                </h2>

                <div class="tags">

                    <span>
                        Sightseeing
                    </span>

                    <span>
                        Photography
                    </span>

                    <span>
                        Day Trip
                    </span>

                    <span>
                        Exploring
                    </span>

                </div>

            </section>


        </div>

    </div>
   

</main>

<script src="script.js"></script>
</body>

</html>