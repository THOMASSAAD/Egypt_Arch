<?php require_once 'include/header.php'; 
require_once 'Database/conn.php';
?>
<!DOCTYPE php>
<php lang="en">
<?php 
$title = "Home";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!-- <link rel="stylesheet" href="CSS/home.css"> -->
     <style>
        body {
    background-image: url('background.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    margin: 0;
    padding: 0;
    min-height: 100vh;
}

/* Search Bar */
.search-bar {
    margin-top: 120px;
    margin-left: auto;
    margin-right: auto;
    width: fit-content;
    padding: 10px 20px;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

.search-bar label {
    font-size: 16px;
    color: #131550;
    font-weight: 500;
}

.search-bar input[type="text"] {
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 15px;
    font-size: 14px;
    outline: none;
    width: 200px;
}

.search-bar input[type="text"]::placeholder {
    color: #999;
}

.search-bar select {
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 15px;
    font-size: 14px;
    background-color: #fff;
    outline: none;
    cursor: pointer;
}

.search-bar button {
    padding: 8px;
    border: none;
    background-color: transparent;
    cursor: pointer;
    font-size: 18px;
    color: #131550;
    transition: color 0.3s ease;
}

.search-bar button:hover {
    color: #00539f;
}

/* Grid Layout */
.grid-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    max-width: 1200px;
    margin: 30px auto;
    padding: 0 20px;
}

.grid-item {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.grid-item:hover {
    transform: translateY(-5px);
}

.grid-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.grid-item h3 {
    font-size: 18px;
    color: #1a3c5e;
    margin: 10px;
}

.grid-item .location {
    font-size: 14px;
    color: #666;
    margin: 0 10px;
}

.grid-item p {
    font-size: 14px;
    color: #333;
    margin: 10px;
    line-height: 1.5;
}

.grid-item .read-more {
    display: block;
    margin: 10px;
    margin-top: auto;
    padding: 8px 15px;
    background-color: transparent;
    border: 1px solid #007bff;
    color: #007bff;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    text-align: center;
    transition: all 0.3s ease;
}

.grid-item .read-more:hover {
    background-color: #007bff;
    color: white;
}

/* Footer Styling */
.footer {
    background-color: rgba(255, 255, 255, 0.7);
    box-shadow: 0 -1px 4px rgba(0, 0, 0, 0.1);
    padding: 20px 0;
    width: 100%;
    position: relative;
    bottom: 0;
    z-index: 1000;
    font-family: Arial, sans-serif;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-content p {
    margin: 0;
    font-size: 14px;
    color: #131550;
    font-weight: 400;
}

.back-to-top {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.back-to-top:hover {
    background-color: #00539f;
    transform: translateY(-3px);
}

.back-to-top:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.3);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .grid-container {
        grid-template-columns: repeat(3, 1fr);
    }

    .search-bar input[type="text"] {
        width: 150px;
    }
}

@media (max-width: 768px) {
    .grid-container {
        grid-template-columns: repeat(2, 1fr);
    }

    .search-bar {
        flex-direction: column;
        gap: 5px;
        padding: 15px;
    }

    .search-bar input[type="text"],
    .search-bar select {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .grid-container {
        grid-template-columns: 1fr;
    }

    .footer-content {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }

    .footer {
        padding: 15px 0;
    }

    .footer-content p {
        font-size: 12px;
    }

    .back-to-top {
        width: 32px;
        height: 32px;
        font-size: 16px;
    }
}
     </style>
</head>

<body>
<?php 
require_once 'Database/conn.php';
require_once 'include/header.php'; 
?>
    <div class="search-bar">
        <label for="keyword">Search</label>
        <input type="text" id="keyword" placeholder="Keyword">
        <select id="city-select">
            <option value="all">City</option>
            <option value="Alexandria">Alexandria</option>
            <option value="Aswan">Aswan</option>
            <option value="Beni Suef">Beni Suef</option>
            <option value="Cairo">Cairo</option>
            <option value="Giza">Giza</option>
            <option value="Kafr El-Sheikh">Kafr El-Sheikh</option>
            <option value="Luxor">Luxor</option>
            <option value="El Wadi El Gedid">El Wadi El Gedid</option>
            <option value="Qena">Qena</option>
            <option value="South Sinia">South Sinia</option>
            <option value="Sohag">Sohag</option>
            <option value="Al-Minya">Al-Minya</option>
            <option value="Red Sea">Red Sea</option>
            <option value="Matrouh">Matrouh</option>
            <option value="Al-Sharkia">Al-Sharkia</option>
            <option value="Port Said">Port Said</option>
            <option value="Ismailia">Ismailia</option>
            <option value="Behara">Behara</option>
            <option value="Tanta">Tanta</option>
        </select>
        <button class="icon refresh-icon" id="refresh-button">⟳</button>
        <button class="icon search-icon" id="search-button">🔍</button>
    </div>
    

    <div class="grid-container">

        <!-- Aswan -->
        
        <div class="grid-item">
            <img src="Aswan/مقابر-النبلاء-قبة-الهوا.jpg" alt="Destination">
            <h3>QUBBAT AL-HAWA CEMETERY</h3>
            <p class="location">📍 Aswan</p>
            <p>Qubbat Al-Hawa Cemetery consists of several tombs on the west bank of the Nile across the river from the northern tip of Elephantine Island cut in...</p>
           <button class="read-more" onclick="window.location.href='New_folder/Qubat alhawa.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="Aswan/جزيرة-إلفنتين.jpg" alt="Destination">
            <h3>Elephantine</h3>
            <p class="location">📍 Aswan</p>
            <p>Elephantine is an archaeological island on the Nile Riverbank, which was the gateway into Egypt for all traders entering from Nubia. </p>
           <button class="read-more" onclick="window.location.href='New_folder/Elephantine.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="Aswan/الكاب.jpg" alt="Destination">
            <h3>Al Kab</h3>
            <p class="location">📍 Aswan</p>
            <p>This is site of ancient city of Nekhbet. as the cult center of the vulture goddess Nekhbet, the tutelary deity of Upper Egypt </p>
           <button class="read-more" onclick="window.location.href='New_folder/Al Kab.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="Aswan/أسوان.jpeg" alt="Destination">
            <h3>Aswan</h3>
            <p class="location">📍 Aswan</p>
            <p>Aswan, called Sunn by the ancient Egyptians, is one of the most important cities in the south of Egypt, and acted as its southern gateway throughout history</p>
           <button class="read-more" onclick="window.location.href='New_folder/Aswan.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="Aswan/0288.jpg" alt="Destination">
            <h3>Amada Temples </h3>
            <p class="location">📍 Aswan</p>
            <p>Today, the temple of Amada, the temple of al-Derr, and the tomb of Pennut are located in the site of New Amada, around 160 km south of Aswan</p>
           <button class="read-more" onclick="window.location.href='New_folder/Amada Temples.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="Aswan/dsc_0173.jpg" alt="Destination">
            <h3>Temples of Wadi al Sebua  </h3>
            <p class="location">📍 Aswan</p>
            <p>The site New Wadi al-Sebua results from the relocation of temples in Nubia after the construction of the Aswan High Dam in the 1960s by the Egyptian government</p>
           <button class="read-more" onclick="window.location.href='New_folder/Temples of Wadi al Sebua.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="Aswan/img_20211214_132220.jpg" alt="Destination">
            <h3>Gebel al-Silsila   </h3>
            <p class="location">📍 Aswan</p>
            <p>Gebel al-Silsila is a mountainous region with sandstone quarries on both sides of the Nile. The sandstone quarries of Gebel al-Silsila have been used from the Middle Kingdom (c. 2034–1650 BC) until the 20th century</p>
           <button class="read-more" onclick="window.location.href='New_folder/Gebel al-Silsila.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="Aswan/new4.jpg" alt="Destination">
            <h3>Abu Simbel    </h3>
            <p class="location">📍 Aswan</p>
            <p>The Great Temple of Abu Simbel, in Nubia near Egypt’s southern border, is among the most awe-inspiring monuments of Egypt. It was cut into the living rock by King Ramesses II (the Great)</p>
           <button class="read-more" onclick="window.location.href='New_folder/Abu Simbel.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="Aswan/dsc_1871c.jpg" alt="Destination">
            <h3>Philae    </h3>
            <p class="location">📍 Aswan</p>
            <p>The monuments of Philae include many structures dating predominantly to the Ptolemaic Period (332–30 BC). The most prominent of these is a temple begun by Ptolemy II Philadelphus (285–246 BC),</p>
           <button class="read-more" onclick="window.location.href='New_folder/Philae.php'">Read More +</button>

        </div>

        <!-- End of Aswan -->

        <!-- Alexandria -->

        <div class="grid-item">
            <img src="alexandria/6.jpg" alt="Destination">
            <h3>Abu Mina   </h3>
            <p class="location">📍 Alexandria</p>
            <p>The archaeological site of Abu Mina features a number of structures, many of which are religious in nature. The most prominent of these is the tomb of the eponymous St. Menas (AD 285–309)</p>
           <button class="read-more" onclick="window.location.href='New_folder/Abu Mina.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="alexandria/roman-period.jpg" alt="Destination">
            <h3>Alexandria   </h3>
            <p class="location">📍 Alexandria</p>
            <p>Alexander the Great founded Alexandria in 331 BC on the Mediterranean coast in northern Egypt, tucked in the western Delta. An ancient Egyptian town or city by the name of Raqote appears to have already existed here.</p>
           <button class="read-more" onclick="window.location.href='New_folder/Alexandria.php'">Read More +</button>

        </div>

        <!-- end of alexandria -->

        <!-- Cairo -->

        <div class="grid-item">
            <img src="cairo/منطقة-ا-ثار-شجرة-مريم.jpeg" alt="Destination">
            <h3>Mary’s Tree    </h3>
            <p class="location">📍 Cairo</p>
            <p>The holy family sought refuge under a tree in Matariyya (the ancient city of Heliopolis), today known as “Mary’s Tree.” It became a popular religious site visited by many people from all over the world throughout the ages. The original tree eventually grew weak and fell in 1656 AD</p>
           <button class="read-more" onclick="window.location.href='New_folder/Marys Tree.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="cairo/08ba48031809782d2497f6a350b08fe2.jpg" alt="Destination">
            <h3>Heliopolis     </h3>
            <p class="location">📍 Cairo</p>
            <p>Baron Empain chose the site of Masr al-Gadida at the beginning of the twentieth century in agreement with Boghos Nubar Pasha. Both men agreed that the site was perfect for Baron Empain’s city of dreams, </p>
           <button class="read-more" onclick="window.location.href='New_folder/Heliopolies.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="cairo/5.jpg" alt="Destination">
            <h3>Al-Mu'izz Street     </h3>
            <p class="location">📍 Cairo</p>
            <p>  Al-Muizz Street is named after the Fatimid Caliph, al-Muizz li-Din Allah (341–365 AH / 953–975 AD), who first founded this street. He is also the founder of the Fatimid caliphates in Egypt since he ruled Egypt in (358-365AH\ 969-975AD). </p>
           <button class="read-more" onclick="window.location.href='New_folder/Al-Muizz Street.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="cairo/11.jpg" alt="Destination">
            <h3>Cairo Citadel     </h3>
            <p class="location">📍 Cairo</p>
            <p>The Citadel of Sultan Salah al-Din al-Ayyubi (Saladin) is one of the most iconic monuments in Islamic Cairo, and among the most impressive defensive fortresses dating to the Middle Ages</p>
           <button class="read-more" onclick="window.location.href='New_folder/Cairo Citadel.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="cairo/صلاج-الدين.jpg" alt="Destination">
            <h3>Salah al-Din Square     </h3>
            <p class="location">📍 Cairo</p>
            <p>Situated just beneath the Citadel, Salah al-Din Square (or Maydan al-Qal’a “Citadel Square”) is considered one of the most important historical squares in Cairo. It was given several names throughout its history, such as the Black Square and al-Remela Square.</p>
           <button class="read-more" onclick="window.location.href='New_folder/Salah al-Din Square.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="cairo/2.jpg" alt="Destination">
            <h3>Al-Saliba Street  </h3>
            <p class="location">📍 Cairo</p>
            <p>Al‑Saliba is one of the main old streets in medieval Islamic Cairo. It runs from Midan al‑Qalʿa (Salah al‑Din Square, also known as Citadel Square) all the way to al‑Sayyida Zeinab Square.</p>
           <button class="read-more" onclick="window.location.href='New_folder/Al-Saliba Street.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="cairo/dsc_0618.jpg" alt="Destination">
            <h3>Al-Suyufiyya Street   </h3>
            <p class="location">📍 Cairo</p>
            <p>Counted among the most important and longest streets in Islamic Egypt, al-Suyufiyya begins at the intersection of Muhammad Ali Street and ends at its intersection with al-Saliba Street</p>
           <button class="read-more" onclick="window.location.href='New_folder/Al-Suyufiyya Street.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="cairo/20160208_111547.jpg" alt="Destination">
            <h3>Al-Fustat (Old Cairo)   </h3>
            <p class="location">📍 Cairo</p>
            <p>After the Arab conquest in 21 AH/641 AD, Caliph Umar ibn al-Khattab wanted a new capital for Egypt, refusing Alexandria, the former capital city during the Ptolemaic and Roman Periods. Fustat was founded by general ‘Amr ibn al-‘As, making it  Egypt’s first Islamic capital.</p>
           <button class="read-more" onclick="window.location.href='New_folder/Al-Fustat (Old Cairo).php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="cairo/senusert-i-obelisk_matarya_edit.jpg" alt="Destination">
            <h3>Ayn Shams City   </h3>
            <p class="location">📍 Cairo</p>
            <p>Ayn Shams, meaning “Eye of the Sun” in Arabic, is located where the ancient ancient Egyptian centre Iunu was built. The Greeks called this town “Heliopolis”, referring to the Greek god of the sun Helios, as the Egyptian sun god Ra was worshiped in the main temple. </p>
           <button class="read-more" onclick="window.location.href='New_folder/Ayn-Shams.php'">Read More +</button>

        </div>

        <!-- End OF caIRo -->

        <!-- Giza -->

        <div class="grid-item">
            <img src="giza/140_cu0431.jpg" alt="Destination">
            <h3>Dahshur    </h3>
            <p class="location">📍 Giza</p>
            <p>Dahshur was the southern part of the cemetery of Memphis, the capital of ancient Egypt. Pyramids of the kings of the Old and Middle Kingdoms were erected on this hill </p>
           <button class="read-more" onclick="window.location.href='New_folder/Dahshur.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="giza/pyramidsss.jpg" alt="Destination">
            <h3>Giza Plateau    </h3>
            <p class="location">📍 Giza</p>
            <p>The pyramids of Giza and the Great Sphinx are among the most popular tourist destinations in the world, and indeed already were even in Roman times. Each of these spectacular structures served as the final resting place of a king of the 4th Dynasty (c.2613–2494 BC). </p>
           <button class="read-more" onclick="window.location.href='New_folder/Giza.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="giza/0674.jpg" alt="Destination">
            <h3>Saqqara    </h3>
            <p class="location">📍 Giza</p>
            <p>Located 40 km southwest of Cairo, Saqqara is one of the most important cemeteries of Memphis, which was itself one of the most important cities in ancient Egyptian history. The name of the site most likely derives from the god of this necropolis, Sokar.</p>
           <button class="read-more" onclick="window.location.href='New_folder/Saqqara.php'">Read More +</button>

        </div>

        <!-- End OF GizA -->

        <!-- Luxor -->

        <div class="grid-item">
            <img src="luxor/dsc_0102.jpg" alt="Destination">
            <h3>Karnak  </h3>
            <p class="location">📍 Luxor</p>
            <p>Aptly called Ipet‑Sut ‘The Most Select of Places’ by the ancient Egyptians, Karnak was one of the most important sites of all. Located on the east bank of Thebes (modern Luxor), Upper Egypt,</p>
           <button class="read-more" onclick="window.location.href='New_folder/Karnak.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="luxor/333222.jpg" alt="Destination">
            <h3>Valley of the Kings </h3>
            <p class="location">📍 Luxor</p>
            <p>The rulers of the Eighteenth, Nineteenth, and Twentieth Dynasties of Egypt’s prosperous New Kingdom (c.1550–1069 BC) were buried in a desolate dry river valley across the river from the ancient city of Thebes (modern Luxor),</p>
           <button class="read-more" onclick="window.location.href='New_folder/Valley of the Kings.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="luxor/queen-hatshepsut-edit-001.jpg" alt="Destination">
            <h3>Deir al-Bahari  </h3>
            <p class="location">📍 Luxor</p>
            <p>The celebrated temple of Hatshepsut (c.1473–1458 BC), the queen who became pharaoh, is located here, in Deir al-Bahari, on the west bank of Luxor. Composed of three man-made terraces that gradually rise up toward the sheer cliff face, this structure is truly a sight to behold.</p>
           <button class="read-more" onclick="window.location.href='New_folder/Deir al-Bahari.php'">Read More +</button>

        </div>

        <!-- End Of luXor -->

        <!-- South Sinia -->

        <div class="grid-item">
            <img src="south-sinia/katharinenkloster.jpg" alt="Destination">
            <h3>Saint Catherine’s Monastery  </h3>
            <p class="location">📍 South Sinia</p>
            <p>On the slopes of Mount Sinai, where Moses received the Ten Commandments from God, lies one of the oldest functioning monasteries in the world</p>
           <button class="read-more" onclick="window.location.href='New_folder/Saint Catherine’s Monastery.php'">Read More +</button>

        </div>


        <!-- End oF South Sinia -->

        <!-- Sohag -->

        <div class="grid-item">
            <img src="sohag/7c2bc464-14d2-4109-b1af-f2eee6718.jpg" alt="Destination">
            <h3>El Hawawish </h3>
            <p class="location">📍 Sohag</p>
            <p>Al Hawawish Cemetery is considered one of the most prominent archaeological sites in Sohag, as Al Hawaish is located about 10 km east of Sohag, and about 7 km from Akhmim, which was its main cemetery during the Old Kingdom</p>
           <button class="read-more" onclick="window.location.href='New_folder/El Hawawish.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="sohag/9ad2bf3a-d6ce-434a-af86-4395639c4d45.jpg" alt="Destination">
            <h3>El Sheikh Hamad (Athribis)  </h3>
            <p class="location">📍 Sohag</p>
            <p>Dating back to the 4th century BC, Athribis was founded relatively late in comparison to many other ancient Egyptian sites. Its temple is located to the west of the settlement with mud brick houses, which has yet to be excavated.</p>
           <button class="read-more" onclick="window.location.href='New_folder/El Sheikh Hamad.php'">Read More +</button>

        </div>

        <!-- End of Sohag -->


        <!-- Al-Minya -->

        <div class="grid-item">
            <img src="minya/download.jpg" alt="Destination">
            <h3>Al-Bahnasa Tombs   </h3>
            <p class="location">📍 Al-Minya</p>
            <p>Al-Bahansa is famous for its ancient cemeteries and hills, and for the births of saints and martyrs, and many developments and changes came to it throughout the historical ages.</p>
           <button class="read-more" onclick="window.location.href='New_folder/Al-Bahnasa Tombs.php'">Read More +</button>

        </div>

        <div class="grid-item">
            <img src="minya/dsc_0408-copy.jpg" alt="Destination">
            <h3>Beni Hasan</h3>
            <p class="location">📍 Al-Minya</p>
            <p>The Beni Hasan cemetery is located in one of the most fertile regions of Egypt. This site includes some of the most impressive tombs of the Middle Kingdom. Its rich and well-preserved tombs attest the economic prosperity that it enjoyed.</p>
           <button class="read-more" onclick="window.location.href='New_folder/Beni Hasan.php'">Read More +</button>

        </div>

        <!-- end of Al-Minya -->

        <!-- Matrouh -->

        <div class="grid-item">
            <img src="matrouh/307770-سيوة-القديمة-على-بعد-خطوات-من-إعلانها-منطقة-تراث-عالمي-10.jpg" alt="Destination">
            <h3>Shali village in Siwa Oasis </h3>
            <p class="location">📍 Matrouh</p>
            <p>The village of Shali in Siwa Oasis - Matrouh Governorate. "Shali" is a Siwi word meaning city. The village of Shali was built from the material of the archive, which is clay saturated with salt. If it dries up, it becomes similar to cement in its hardness</p>
           <button class="read-more" onclick="window.location.href='New_folder/Shali village in Siwa Oasis.php'">Read More +</button>

        </div>


        <!-- End OF MaTRouh -->

        <!-- Al-Sharkia -->

        <div class="grid-item">
            <img src="Alsharkia/00-2-jpgedit.jpg" alt="Destination">
            <h3>Tell Basta </h3>
            <p class="location">📍 Al-Sharkia</p>
            <p>Tell- Basta gets its name from the ancient Egyptian Per-Bastet “the house of goddess Bastet”, which was the cult center of the feline goddess Bastet. The latter, a lioness goddess, was associated with female fertility and played a main protective role.</p>
           <button class="read-more" onclick="window.location.href='New_folder/Tell Basta.php'">Read More +</button>

        </div>



        <!-- end of AL-sharkia -->






    </div>  

    <div class="footer">
        <div class="footer-content">
            <p>Copyright © 2025, All Rights Reserved</p>
            <button class="back-to-top" onclick="scrollToTop()">↑</button>
        </div>
    </div>

   


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('keyword');
        const searchSelect = document.getElementById('city-select');
        const searchButton = document.getElementById('search-button');
        const refreshButton = document.getElementById('refresh-button');
        const gridItems = document.querySelectorAll('.grid-item');  
    
        function filterItems() {
            const searchKeyword = searchInput.value.toLowerCase();
            const selectedCity = searchSelect.value.toLowerCase();
    
            gridItems.forEach(item => {
                const title = item.querySelector('h3').textContent.toLowerCase();
                const location = item.querySelector('.location').textContent.toLowerCase();
    
                const matchesKeyword = title.includes(searchKeyword);
                const matchesCity = selectedCity === 'all' || location.includes(selectedCity);
    
                if (matchesKeyword && matchesCity) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    
        searchButton.addEventListener('click', filterItems);
    
        refreshButton.addEventListener('click', function() {
            searchInput.value = '';
            searchSelect.value = 'all';  
            filterItems();  
        });
    
        
        searchInput.addEventListener('input', filterItems);
        searchSelect.addEventListener('change', filterItems);
    });
    

    
function scrollToTop() {

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}
        
    </script>
</body>
</php>