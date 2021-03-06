<?php
require_once(__DIR__ . '/libs/MessageRepository.php');
require_once(__DIR__ . '/libs/MessageService.php');
require_once('./libs/UserRepository.php');
require_once('./libs/AuthService.php');

$AuthService = new AuthService(new UserRepository());
$MessageService = new MessageService(new MessageRepository());
$seed_user = [
//   'Jacob' => 'Smith',
//   'Michael' => 'Johnson',
//   'Ethan' => 'Williams',
//   'Joshua' => 'Brown',
//   'Daniel' => 'Jones',
//   'Alexander' => 'Miller',
//   'Anthony' => 'Davis',
//   'William' => 'Garcia',
//   'Christopher' => 'Rodriguez',
//   'Matthew' => 'Wilson',
//   'Jayden' => 'Martinez',
//   'Andrew' => 'Anderson',
//   'Joseph' => 'Taylor',
//   'David' => 'Thomas',
//   'Noah' => 'Hernandez',
//   'Aiden' => 'Moore',
//   'James' => 'Martin',
//   'Ryan' => 'Jackson',
//   'Logan' => 'Thompson',
//   'John' => 'White',
//   'Nathan' => 'Lopez',
//   'Elijah' => 'Lee',
//   'Christian' => 'Gonzalez',
//   'Gabriel' => 'Harris',
//   'Benjamin' => 'Clark',
//   'Jonathan' => 'Lewis',
//   'Tyler' => 'Robinson',
//   'Samuel' => 'Walker',
//   'Nicholas' => 'Perez',
//   'Gavin' => 'Hall',
//   'Dylan' => 'Young',
//   'Jackson' => 'Allen',
//   'Brandon' => 'Sanchez',
//   'Caleb' => 'Wright',
//   'Mason' => 'King',
//   'Angel' => 'Scott',
//   'Isaac' => 'Green',
//   'Evan' => 'Baker',
//   'Jack' => 'Adams',
//   'Kevin' => 'Nelson',
//   'Jose' => 'Hill',
//   'Isaiah' => 'Ramirez',
//   'Luke' => 'Campbell',
//   'Landon' => 'Mitchell',
//   'Justin' => 'Roberts',
//   'Lucas' => 'Carter',
//   'Zachary' => 'Phillips',
//   'Jordan' => 'Evans',
//   'Robert' => 'Turner',
//   'Aaron' => 'Torres',
//   'Brayden' => 'Parker',
//   'Thomas' => 'Collins',
//   'Cameron' => 'Edwards',
//   'Hunter' => 'Stewart',
//   'Austin' => 'Flores',
//   'Adrian' => 'Morris',
//   'Connor' => 'Nguyen',
//   'Owen' => 'Murphy',
//   'Aidan' => 'Rivera',
//   'Jason' => 'Cook',
//   'Julian' => 'Rogers',
//   'Wyatt' => 'Morgan',
//   'Charles' => 'Peterson',
//   'Luis' => 'Cooper',
//   'Carter' => 'Reed',
//   'Juan' => 'Bailey',
//   'Chase' => 'Bell',
//   'Diego' => 'Gomez',
//   'Jeremiah' => 'Kelly',
//   'Brody' => 'Howard',
//   'Xavier' => 'Ward',
//   'Adam' => 'Cox',
//   'Carlos' => 'Diaz',
//   'Sebastian' => 'Richardson',
//   'Liam' => 'Wood',
//   'Hayden' => 'Watson',
//   'Nathaniel' => 'Brooks',
//   'Henry' => 'Bennett',
//   'Jesus' => 'Gray',
//   'Ian' => 'James',
//   'Tristan' => 'Reyes',
//   'Bryan' => 'Cruz',
//   'Sean' => 'Hughes',
//   'Cole' => 'Price',
//   'Alex' => 'Myers',
//   'Eric' => 'Long',
//   'Brian' => 'Foster',
//   'Jaden' => 'Sanders',
//   'Carson' => 'Ross',
//   'Blake' => 'Morales',
//   'Ayden' => 'Powell',
//   'Cooper' => 'Sullivan',
//   'Dominic' => 'Russell',
//   'Brady' => 'Ortiz',
//   'Caden' => 'Jenkins',
//   'Josiah' => 'Gutierrez',
//   'Kyle' => 'Perry',
//   'Colton' => 'Butler',
//   'Kaden' => 'Barnes',
//   'Eli' => 'Fisher',
//   'Miguel' => 'Henderson',
//   'Antonio' => 'Coleman',
//   'Parker' => 'Simmons',
//   'Steven' => 'Patterson',
//   'Alejandro' => 'Jordan',
//   'Riley' => 'Reynolds',
//   'Richard' => 'Hamilton',
//   'Timothy' => 'Graham',
//   'Devin' => 'Kim',
//   'Jesse' => 'Gonzales',
//   'Victor' => 'Alexander',
//   'Jake' => 'Ramos',
//   'Joel' => 'Wallace',
//   'Colin' => 'Griffin',
//   'Kaleb' => 'West',
//   'Bryce' => 'Cole',
//   'Levi' => 'Hayes',
//   'Oliver' => 'Chavez',
//   'Oscar' => 'Gibson',
//   'Vincent' => 'Bryant',
//   'Ashton' => 'Ellis',
//   'Cody' => 'Stevens',
//   'Micah' => 'Murray',
//   'Preston' => 'Ford',
//   'Marcus' => 'Marshall',
//   'Max' => 'Owens',
//   'Patrick' => 'Mcdonald',
//   'Seth' => 'Harrison',
//   'Jeremy' => 'Ruiz',
//   'Peyton' => 'Kennedy',
//   'Nolan' => 'Wells',
//   'Ivan' => 'Alvarez',
//   'Damian' => 'Woods',
//   'Maxwell' => 'Mendoza',
//   'Alan' => 'Castillo',
//   'Kenneth' => 'Olson',
//   'Jonah' => 'Webb',
//   'Jorge' => 'Washington',
//   'Mark' => 'Tucker',
//   'Giovanni' => 'Freeman',
//   'Eduardo' => 'Burns',
//   'Grant' => 'Henry',
//   'Collin' => 'Vasquez',
//   'Gage' => 'Snyder',
//   'Omar' => 'Simpson',
//   'Emmanuel' => 'Crawford',
//   'Trevor' => 'Jimenez',
//   'Edward' => 'Porter',
//   'Ricardo' => 'Mason',
//   'Cristian' => 'Shaw',
//   'Nicolas' => 'Gordon',
//   'Kayden' => 'Wagner',
//   'George' => 'Hunter',
//   'Jaxon' => 'Romero',
//   'Paul' => 'Hicks',
//   'Braden' => 'Dixon',
//   'Elias' => 'Hunt',
//   'Andres' => 'Palmer',
//   'Derek' => 'Robertson',
//   'Garrett' => 'Black',
//   'Tanner' => 'Holmes',
//   'Malachi' => 'Stone',
//   'Conner' => 'Meyer',
//   'Fernando' => 'Boyd',
//   'Cesar' => 'Mills',
//   'Javier' => 'Warren',
//   'Miles' => 'Fox',
//   'Jaiden' => 'Rose',
//   'Alexis' => 'Rice',
//   'Leonardo' => 'Moreno',
//   'Santiago' => 'Schmidt',
//   'Francisco' => 'Patel',
//   'Cayden' => 'Ferguson',
//   'Shane' => 'Nichols',
//   'Edwin' => 'Herrera',
//   'Hudson' => 'Medina',
//   'Travis' => 'Ryan',
//   'Bryson' => 'Fernandez',
//   'Erick' => 'Weaver',
//   'Jace' => 'Daniels',
//   'Hector' => 'Stephens',
//   'Josue' => 'Gardner',
//   'Peter' => 'Payne',
//   'Jaylen' => 'Kelley',
//   'Mario' => 'Dunn',
//   'Manuel' => 'Pierce',
//   'Abraham' => 'Arnold',
//   'Grayson' => 'Tran',
//   'Damien' => 'Spencer',
//   'Kaiden' => 'Peters',
//   'Spencer' => 'Hawkins',
//   'Stephen' => 'Grant',
//   'Edgar' => 'Hansen',
//   'Wesley' => 'Castro',
//   'Shawn' => 'Hoffman',
//   'Trenton' => 'Hart',
//   'Jared' => 'Elliott',
//   'Jeffrey' => 'Cunningham',
//   'Landen' => 'Knight',
//   'Johnathan' => 'Bradley',
//   'Bradley' => 'Carroll',
//   'Braxton' => 'Hudson',
//   'Ryder' => 'Duncan',
//   'Camden' => 'Armstrong',
//   'Roman' => 'Berry',
//   'Asher' => 'Andrews',
//   'Brendan' => 'Johnston',
//   'Maddox' => 'Ray',
//   'Sergio' => 'Lane',
//   'Israel' => 'Riley',
//   'Andy' => 'Carpenter',
//   'Lincoln' => 'Perkins',
//   'Erik' => 'Aguilar',
//   'Donovan' => 'Silva',
//   'Raymond' => 'Richards',
//   'Avery' => 'Willis',
//   'Rylan' => 'Matthews',
//   'Dalton' => 'Chapman',
//   'Harrison' => 'Lawrence',
//   'Andre' => 'Garza',
//   'Martin' => 'Vargas',
//   'Keegan' => 'Watkins',
//   'Marco' => 'Wheeler',
//   'Jude' => 'Larson',
//   'Sawyer' => 'Carlson',
//   'Dakota' => 'Harper',
//   'Leo' => 'George',
//   'Calvin' => 'Greene',
//   'Kai' => 'Burke',
//   'Drake' => 'Guzman',
//   'Troy' => 'Morrison',
//   'Zion' => 'Munoz',
//   'Clayton' => 'Jacobs',
//   'Roberto' => 'Obrien',
//   'Zane' => 'Lawson',
//   'Gregory' => 'Franklin',
//   'Tucker' => 'Lynch',
//   'Rafael' => 'Bishop',
//   'Kingston' => 'Carr',
//   'Dominick' => 'Salazar',
//   'Ezekiel' => 'Austin',
//   'Griffin' => 'Mendez',
//   'Devon' => 'Gilbert',
//   'Drew' => 'Jensen',
//   'Lukas' => 'Williamson',
//   'Johnny' => 'Montgomery',
//   'Ty' => 'Harvey',
//   'Pedro' => 'Oliver',
//   'Tyson' => 'Howell',
//   'Caiden' => 'Dean',
//   'Mateo' => 'Hanson',
//   'Braylon' => 'Weber',
//   'Cash' => 'Garrett',
//   'Aden' => 'Sims',
//   'Chance' => 'Burton',
//   'Taylor' => 'Fuller',
//   'Marcos' => 'Soto',
//   'Maximus' => 'Mccoy',
//   'Ruben' => 'Welch',
//   'Emanuel' => 'Chen',
//   'Simon' => 'Schultz',
//   'Corbin' => 'Walters',
//   'Brennan' => 'Reid',
//   'Dillon' => 'Fields',
//   'Skyler' => 'Walsh',
//   'Myles' => 'Little',
//   'Xander' => 'Fowler',
//   'Jaxson' => 'Bowman',
//   'Dawson' => 'Davidson',
//   'Kameron' => 'May',
//   'Kyler' => 'Day',
//   'Axel' => 'Schneider',
//   'Colby' => 'Newman',
//   'Jonas' => 'Brewer',
//   'Joaquin' => 'Lucas',
//   'Payton' => 'Holland',
//   'Brock' => 'Wong',
//   'Frank' => 'Banks',
//   'Enrique' => 'Santos',
//   'Quinn' => 'Curtis',
//   'Emilio' => 'Pearson',
//   'Malik' => 'Delgado',
//   'Grady' => 'Valdez',
//   'Angelo' => 'Pena',
//   'Julio' => 'Rios',
//   'Derrick' => 'Douglas',
//   'Raul' => 'Sandoval',
//   'Fabian' => 'Barrett',
//   'Corey' => 'Hopkins',
//   'Gerardo' => 'Keller',
//   'Dante' => 'Guerrero',
//   'Ezra' => 'Stanley',
//   'Armando' => 'Bates',
//   'Allen' => 'Alvarado',
//   'Theodore' => 'Beck',
//   'Gael' => 'Ortega',
//   'Amir' => 'Wade',
//   'Zander' => 'Estrada',
//   'Adan' => 'Contreras',
//   'Maximilian' => 'Barnett',
//   'Randy' => 'Caldwell',
//   'Easton' => 'Santiago',
//   'Dustin' => 'Lambert',
//   'Luca' => 'Powers',
//   'Phillip' => 'Chambers',
//   'Julius' => 'Nunez',
//   'Charlie' => 'Craig',
//   'Ronald' => 'Leonard',
//   'Jakob' => 'Lowe',
//   'Cade' => 'Rhodes',
//   'Brett' => 'Byrd',
//   'Trent' => 'Gregory',
//   'Silas' => 'Shelton',
//   'Keith' => 'Frazier',
//   'Emiliano' => 'Becker',
//   'Trey' => 'Maldonado',
//   'Jalen' => 'Fleming',
//   'Darius' => 'Vega',
//   'Lane' => 'Sutton',
//   'Jerry' => 'Cohen',
//   'Jaime' => 'Jennings',
//   'Scott' => 'Parks',
//   'Graham' => 'Mcdaniel',
//   'Weston' => 'Watts',
//   'Braydon' => 'Barker',
//   'Anderson' => 'Norris',
//   'Rodrigo' => 'Vaughn',
//   'Pablo' => 'Vazquez',
//   'Saul' => 'Holt',
//   'Danny' => 'Schwartz',
//   'Donald' => 'Steele',
//   'Elliot' => 'Benson',
//   'Brayan' => 'Neal',
//   'Dallas' => 'Dominguez',
//   'Lorenzo' => 'Horton',
//   'Casey' => 'Terry',
//   'Mitchell' => 'Wolfe',
//   'Alberto' => 'Hale',
//   'Tristen' => 'Lyons',
//   'Rowan' => 'Graves',
//   'Jayson' => 'Haynes',
//   'Gustavo' => 'Miles',
//   'Aaden' => 'Park',
//   'Amari' => 'Warner',
//   'Dean' => 'Padilla',
//   'Braeden' => 'Bush',
//   'Declan' => 'Thornton',
//   'Chris' => 'Mccarthy',
//   'Ismael' => 'Mann',
//   'Dane' => 'Zimmerman',
//   'Louis' => 'Erickson',
//   'Arturo' => 'Fletcher',
//   'Brenden' => 'Mckinney',
//   'Felix' => 'Page',
//   'Jimmy' => 'Dawson',
//   'Cohen' => 'Joseph',
//   'Tony' => 'Marquez',
//   'Holden' => 'Reeves',
//   'Reid' => 'Klein',
//   'Abel' => 'Espinoza',
//   'Bennett' => 'Baldwin',
//   'Zackary' => 'Moran',
//   'Arthur' => 'Love',
//   'Nehemiah' => 'Robbins',
//   'Ricky' => 'Higgins',
//   'Esteban' => 'Ball',
//   'Cruz' => 'Cortez',
//   'Finn' => 'Le',
//   'Mauricio' => 'Griffith',
//   'Dennis' => 'Bowen',
//   'Keaton' => 'Sharp',
//   'Albert' => 'Cummings',
//   'Marvin' => 'Ramsey',
//   'Mathew' => 'Hardy',
//   'Larry' => 'Swanson',
//   'Moises' => 'Barber',
//   'Issac' => 'Acosta',
//   'Philip' => 'Luna',
//   'Quentin' => 'Chandler',
//   'Curtis' => 'Blair',
//   'Greyson' => 'Daniel',
//   'Jameson' => 'Cross',
//   'Everett' => 'Simon',
//   'Jayce' => 'Dennis',
//   'Darren' => 'Oconnor',
//   'Elliott' => 'Quinn',
//   'Uriel' => 'Gross',
//   'Alfredo' => 'Navarro',
//   'Hugo' => 'Moss',
//   'Alec' => 'Fitzgerald',
//   'Jamari' => 'Doyle',
//   'Marshall' => 'Mclaughlin',
//   'Walter' => 'Rojas',
//   'Judah' => 'Rodgers',
//   'Jay' => 'Stevenson',
//   'Lance' => 'Singh',
//   'Beau' => 'Yang',
//   'Ali' => 'Figueroa',
//   'Landyn' => 'Harmon',
//   'Yahir' => 'Newton',
//   'Phoenix' => 'Paul',
//   'Nickolas' => 'Manning',
//   'Kobe' => 'Garner',
//   'Bryant' => 'Mcgee',
//   'Maurice' => 'Reese',
//   'Russell' => 'Francis',
//   'Leland' => 'Burgess',
//   'Colten' => 'Adkins',
//   'Reed' => 'Goodman',
//   'Davis' => 'Curry',
//   'Joe' => 'Brady',
//   'Ernesto' => 'Christensen',
//   'Desmond' => 'Potter',
//   'Kade' => 'Walton',
//   'Reece' => 'Goodwin',
//   'Morgan' => 'Mullins',
//   'Ramon' => 'Molina',
//   'Rocco' => 'Webster',
//   'Orlando' => 'Fischer',
//   'Ryker' => 'Campos',
//   'Brodie' => 'Avila',
//   'Paxton' => 'Sherman',
//   'Jacoby' => 'Todd',
//   'Douglas' => 'Chang',
//   'Kristopher' => 'Blake',
//   'Gary' => 'Malone',
//   'Lawrence' => 'Wolf',
//   'Izaiah' => 'Hodges',
//   'Solomon' => 'Juarez',
//   'Nikolas' => 'Gill',
//   'Mekhi' => 'Farmer',
//   'Justice' => 'Hines',
//   'Tate' => 'Gallagher',
//   'Jaydon' => 'Duran',
//   'Salvador' => 'Hubbard',
//   'Shaun' => 'Cannon',
//   'Alvin' => 'Miranda',
//   'Eddie' => 'Wang',
//   'Kane' => 'Saunders',
//   'Davion' => 'Tate',
//   'Zachariah' => 'Mack',
//   'Dorian' => 'Hammond',
//   'Titus' => 'Carrillo',
//   'Kellen' => 'Townsend',
//   'Camron' => 'Wise',
//   'Isiah' => 'Ingram',
//   'Javon' => 'Barton',
//   'Nasir' => 'Mejia',
//   'Milo' => 'Ayala',
//   'Johan' => 'Schroeder',
//   'Byron' => 'Hampton',
//   'Jasper' => 'Rowe',
//   'Jonathon' => 'Parsons',
//   'Chad' => 'Frank',
//   'Marc' => 'Waters',
//   'Kelvin' => 'Strickland',
//   'Chandler' => 'Osborne',
//   'Sam' => 'Maxwell',
//   'Cory' => 'Chan',
//   'Deandre' => 'Deleon',
//   'River' => 'Norman',
//   'Reese' => 'Harrington',
//   'Roger' => 'Casey',
//   'Quinton' => 'Patton',
//   'Talon' => 'Logan',
//   'Romeo' => 'Bowers',
//   'Franklin' => 'Mueller',
//   'Noel' => 'Glover',
//   'Alijah' => 'Floyd',
//   'Guillermo' => 'Hartman',
//   'Gunner' => 'Buchanan',
//   'Damon' => 'Cobb',
//   'Jadon' => 'French',
//   'Emerson' => 'Kramer',
//   'Micheal' => 'Mccormick',
//   'Bruce' => 'Clarke',
//   'Terry' => 'Tyler',
//   'Kolton' => 'Gibbs',
//   'Melvin' => 'Moody',
//   'Beckett' => 'Conner',
//   'Porter' => 'Sparks',
//   'August' => 'Mcguire',
//   'Brycen' => 'Leon',
//   'Dayton' => 'Bauer',
//   'Jamarion' => 'Norton',
//   'Leonel' => 'Pope',
//   'Karson' => 'Flynn',
//   'Zayden' => 'Hogan',
//   'Keagan' => 'Robles',
//   'Carl' => 'Salinas',
//   'Khalil' => 'Yates',
//   'Cristopher' => 'Lindsey',
//   'Nelson' => 'Lloyd',
//   'Braiden' => 'Marsh',
//   'Moses' => 'Mcbride',
//   'Isaias' => 'Owen',
//   'Roy' => 'Solis',
//   'Triston' => 'Pham',
//   'Walker' => 'Lang',
//   'Kale' => 'Pratt',
//   'Jermaine' => 'Lara',
//   'Leon' => 'Brock',
//   'Rodney' => 'Ballard',
//   'Kristian' => 'Trujillo',
//   'Mohamed' => 'Shaffer',
//   'Ronan' => 'Drake',
//   'Pierce' => 'Roman',
//   'Trace' => 'Aguirre',
//   'Warren' => 'Morton',
//   'Jeffery' => 'Stokes',
//   'Maverick' => 'Lamb',
//   'Cyrus' => 'Pacheco',
//   'Quincy' => 'Patrick',
//   'Nathanael' => 'Cochran',
//   'Skylar' => 'Shepherd',
//   'Tommy' => 'Cain',
//   'Conor' => 'Burnett',
//   'Noe' => 'Hess',
//   'Ezequiel' => 'Li',
//   'Demetrius' => 'Cervantes',
//   'Jaylin' => 'Olsen',
//   'Kendrick' => 'Briggs',
//   'Frederick' => 'Ochoa',
//   'Terrance' => 'Cabrera',
//   'Bobby' => 'Velasquez',
//   'Jamison' => 'Montoya',
//   'Jon' => 'Roth',
//   'Rohan' => 'Meyers',
//   'Jett' => 'Cardenas',
//   'Kieran' => 'Fuentes',
//   'Tobias' => 'Weiss',
//   'Ari' => 'Hoover',
//   'Colt' => 'Wilkins',
//   'Gideon' => 'Nicholson',
//   'Felipe' => 'Underwood',
//   'Kenny' => 'Short',
//   'Wilson' => 'Carson',
//   'Orion' => 'Morrow',
//   'Kamari' => 'Colon',
//   'Gunnar' => 'Holloway',
//   'Jessie' => 'Summers',
//   'Alonzo' => 'Bryan',
//   'Gianni' => 'Petersen',
//   'Omari' => 'Mckenzie',
//   'Waylon' => 'Serrano',
//   'Malcolm' => 'Wilcox',
//   'Emmett' => 'Carey',
//   'Abram' => 'Clayton',
//   'Julien' => 'Poole',
//   'London' => 'Calderon',
//   'Tomas' => 'Gallegos',
//   'Allan' => 'Greer',
//   'Terrell' => 'Rivas',
//   'Matteo' => 'Guerra',
//   'Tristin' => 'Decker',
//   'Jairo' => 'Collier',
//   'Reginald' => 'Wall',
//   'Brent' => 'Whitaker',
//   'Ahmad' => 'Bass',
//   'Yandel' => 'Flowers',
//   'Rene' => 'Davenport',
//   'Willie' => 'Conley',
//   'Boston' => 'Houston',
//   'Billy' => 'Huff',
//   'Marlon' => 'Copeland',
//   'Trevon' => 'Hood',
//   'Aydan' => 'Monroe',
//   'Jamal' => 'Massey',
//   'Aldo' => 'Roberson',
//   'Ariel' => 'Combs',
//   'Cason' => 'Franco',
//   'Braylen' => 'Larsen',
//   'Javion' => 'Pittman',
//   'Joey' => 'Randall',
//   'Rogelio' => 'Skinner',
//   'Ahmed' => 'Wilkinson',
//   'Dominik' => 'Kirby',
//   'Brendon' => 'Cameron',
//   'Toby' => 'Bridges',
//   'Kody' => 'Anthony',
//   'Marquis' => 'Richard',
//   'Ulises' => 'Kirk',
//   'Armani' => 'Bruce',
//   'Adriel' => 'Singleton',
//   'Alfonso' => 'Mathis',
//   'Branden' => 'Bradford',
//   'Will' => 'Boone',
//   'Craig' => 'Abbott',
//   'Ibrahim' => 'Charles',
//   'Osvaldo' => 'Allison',
//   'Wade' => 'Sweeney',
//   'Harley' => 'Atkinson',
//   'Steve' => 'Horn',
//   'Davin' => 'Jefferson',
//   'Deshawn' => 'Rosales',
//   'Kason' => 'York',
//   'Damion' => 'Christian',
//   'Jaylon' => 'Phelps',
//   'Jefferson' => 'Farrell',
//   'Aron' => 'Castaneda',
//   'Brooks' => 'Nash',
//   'Darian' => 'Dickerson',
//   'Gerald' => 'Bond',
//   'Rolando' => 'Wyatt',
//   'Terrence' => 'Foley',
//   'Enzo' => 'Chase',
//   'Kian' => 'Gates',
//   'Ryland' => 'Vincent',
//   'Barrett' => 'Mathews',
//   'Jaeden' => 'Hodge',
//   'Ben' => 'Garrison',
//   'Bradyn' => 'Trevino',
//   'Giovani' => 'Villarreal',
//   'Blaine' => 'Heath',
//   'Madden' => 'Dalton',
//   'Jerome' => 'Valencia',
//   'Muhammad' => 'Callahan',
//   'Ronnie' => 'Hensley',
//   'Layne' => 'Atkins',
//   'Kolby' => 'Huffman',
//   'Leonard' => 'Roy',
//   'Vicente' => 'Boyer',
//   'Cale' => 'Shields',
//   'Alessandro' => 'Lin',
//   'Zachery' => 'Hancock',
//   'Gavyn' => 'Grimes',
//   'Aydin' => 'Glenn',
//   'Xzavier' => 'Cline',
//   'Malakai' => 'Delacruz',
//   'Raphael' => 'Camacho',
//   'Cannon' => 'Dillon',
//   'Rudy' => 'Parrish',
//   'Asa' => 'Oneill',
//   'Darrell' => 'Melton',
//   'Giancarlo' => 'Booth',
//   'Elisha' => 'Kane',
//   'Junior' => 'Berg',
//   'Zackery' => 'Harrell',
//   'Alvaro' => 'Pitts',
//   'Lewis' => 'Savage',
//   'Valentin' => 'Wiggins',
//   'Deacon' => 'Brennan',
//   'Jase' => 'Salas',
//   'Harry' => 'Marks',
//   'Kendall' => 'Russo',
//   'Rashad' => 'Sawyer',
//   'Finnegan' => 'Baxter',
//   'Mohammed' => 'Golden',
//   'Ramiro' => 'Hutchinson',
//   'Cedric' => 'Liu',
//   'Brennen' => 'Walter',
//   'Santino' => 'Mcdowell',
//   'Stanley' => 'Wiley',
//   'Tyrone' => 'Rich',
//   'Chace' => 'Humphrey',
//   'Francis' => 'Johns',
//   'Johnathon' => 'Koch',
//   'Teagan' => 'Suarez',
//   'Zechariah' => 'Hobbs',
//   'Alonso' => 'Beard',
//   'Kaeden' => 'Gilmore',
//   'Kamden' => 'Ibarra',
//   'Gilberto' => 'Keith',
//   'Ray' => 'Macias',
//   'Karter' => 'Khan',
//   'Luciano' => 'Andrade',
//   'Nico' => 'Ware',
//   'Kole' => 'Stephenson',
//   'Aryan' => 'Henson',
//   'Draven' => 'Wilkerson',
//   'Jamie' => 'Dyer',
//   'Misael' => 'Mcclure',
//   'Lee' => 'Blackwell',
//   'Alexzander' => 'Mercado',
//   'Camren' => 'Tanner',
//   'Giovanny' => 'Eaton',
//   'Amare' => 'Clay',
//   'Rhett' => 'Barron',
//   'Rhys' => 'Beasley',
//   'Rodolfo' => 'Oneal',
//   'Nash' => 'Preston',
//   'Markus' => 'Small',
//   'Deven' => 'Wu',
//   'Mohammad' => 'Zamora',
//   'Moshe' => 'Macdonald',
//   'Quintin' => 'Vance',
//   'Dwayne' => 'Snow',
//   'Memphis' => 'Mcclain',
//   'Atticus' => 'Stafford',
//   'Davian' => 'Orozco',
//   'Eugene' => 'Barry',
//   'Jax' => 'English',
//   'Antoine' => 'Shannon',
//   'Wayne' => 'Kline',
//   'Randall' => 'Jacobson',
//   'Semaj' => 'Woodard',
//   'Uriah' => 'Huang',
//   'Clark' => 'Kemp',
//   'Aidyn' => 'Mosley',
//   'Jorden' => 'Prince',
//   'Maxim' => 'Merritt',
//   'Aditya' => 'Hurst',
//   'Lawson' => 'Villanueva',
//   'Messiah' => 'Roach',
//   'Korbin' => 'Nolan',
//   'Sullivan' => 'Lam',
//   'Freddy' => 'Yoder',
//   'Demarcus' => 'Mccullough',
//   'Neil' => 'Lester',
//   'Brice' => 'Santana',
//   'King' => 'Valenzuela',
//   'Davon' => 'Winters',
//   'Elvis' => 'Barrera',
//   'Ace' => 'Leach',
//   'Dexter' => 'Orr',
//   'Heath' => 'Berger',
//   'Duncan' => 'Mckee',
//   'Jamar' => 'Strong',
//   'Sincere' => 'Conway',
//   'Irvin' => 'Stein',
//   'Remington' => 'Whitehead',
//   'Kadin' => 'Bullock',
//   'Soren' => 'Escobar',
//   'Tyree' => 'Knox',
//   'Damarion' => 'Meadows',
//   'Talan' => 'Solomon',
//   'Adrien' => 'Velez',
//   'Gilbert' => 'Odonnell',
//   'Keenan' => 'Kerr',
//   'Darnell' => 'Stout',
//   'Adolfo' => 'Blankenship',
//   'Tristian' => 'Browning',
//   'Derick' => 'Kent',
//   'Isai' => 'Lozano',
//   'Rylee' => 'Bartlett',
//   'Gauge' => 'Pruitt',
//   'Harold' => 'Buck',
//   'Kareem' => 'Barr',
//   'Deangelo' => 'Gaines',
//   'Agustin' => 'Durham',
//   'Coleman' => 'Gentry',
//   'Zavier' => 'Mcintyre',
//   'Lamar' => 'Sloan',
//   'Emery' => 'Melendez',
//   'Jaydin' => 'Rocha',
//   'Devan' => 'Herman',
//   'Jordyn' => 'Sexton',
//   'Mathias' => 'Moon',
//   'Prince' => 'Hendricks',
//   'Sage' => 'Rangel',
//   'Seamus' => 'Stark',
//   'Jasiah' => 'Lowery',
//   'Efrain' => 'Hardin',
//   'Darryl' => 'Hull',
//   'Arjun' => 'Sellers',
//   'Mike' => 'Ellison',
//   'Roland' => 'Calhoun',
//   'Conrad' => 'Gillespie',
//   'Kamron' => 'Mora',
//   'Hamza' => 'Knapp',
//   'Santos' => 'Mccall',
//   'Frankie' => 'Morse',
//   'Dominique' => 'Dorsey',
//   'Marley' => 'Weeks',
//   'Vance' => 'Nielsen',
//   'Dax' => 'Livingston',
//   'Jamir' => 'Leblanc',
//   'Kylan' => 'Mclean',
//   'Todd' => 'Bradshaw',
//   'Maximo' => 'Glass',
//   'Jabari' => 'Middleton',
//   'Matthias' => 'Buckley',
//   'Haiden' => 'Schaefer',
//   'Luka' => 'Frost',
//   'Marcelo' => 'Howe',
//   'Keon' => 'House',
//   'Layton' => 'Mcintosh',
//   'Tyrell' => 'Ho',
//   'Kash' => 'Pennington',
//   'Raiden' => 'Reilly',
//   'Cullen' => 'Hebert',
//   'Donte' => 'Mcfarland',
//   'Jovani' => 'Hickman',
//   'Cordell' => 'Noble',
//   'Kasen' => 'Spears',
//   'Rory' => 'Conrad',
//   'Alfred' => 'Arias',
//   'Darwin' => 'Galvan',
//   'Ernest' => 'Velazquez',
//   'Bailey' => 'Huynh',
//   'Gaige' => 'Frederick',
//   'Hassan' => 'Randolph',
//   'Jamarcus' => 'Cantu',
//   'Killian' => 'Fitzpatrick',
//   'Augustus' => 'Mahoney',
//   'Trevin' => 'Peck',
//   'Zain' => 'Villa',
//   'Ellis' => 'Michael',
//   'Rex' => 'Donovan',
//   'Yusuf' => 'Mcconnell',
//   'Bruno' => 'Walls',
//   'Jaidyn' => 'Boyle',
//   'Justus' => 'Mayer',
//   'Ronin' => 'Zuniga',
//   'Humberto' => 'Giles',
//   'Jaquan' => 'Pineda',
//   'Josh' => 'Pace',
//   'Kasey' => 'Hurley',
//   'Winston' => 'Mays',
//   'Dashawn' => 'Mcmillan',
//   'Lucian' => 'Crosby',
//   'Matias' => 'Ayers',
//   'Sidney' => 'Case',
//   'Ignacio' => 'Bentley',
//   'Nigel' => 'Shepard',
//   'Van' => 'Everett',
//   'Elian' => 'Pugh',
//   'Finley' => 'David',
//   'Jaron' => 'Mcmahon',
//   'Addison' => 'Dunlap',
//   'Aedan' => 'Bender',
//   'Braedon' => 'Hahn',
//   'Jadyn' => 'Harding',
//   'Konner' => 'Acevedo',
//   'Zayne' => 'Raymond',
//   'Franco' => 'Blackburn',
//   'Niko' => 'Duffy',
//   'Savion' => 'Landry',
//   'Cristofer' => 'Dougherty',
//   'Deon' => 'Bautista',
//   'Krish' => 'Shah',
//   'Anton' => 'Potts',
//   'Brogan' => 'Arroyo',
//   'Cael' => 'Valentine',
//   'Coby' => 'Meza',
//   'Kymani' => 'Gould',
//   'Marcel' => 'Vaughan',
//   'Yair' => 'Fry',
//   'Dale' => 'Rush',
//   'Bo' => 'Avery',
//   'Jordon' => 'Herring',
//   'Samir' => 'Dodson',
//   'Darien' => 'Clements',
//   'Zaire' => 'Sampson',
//   'Ross' => 'Tapia',
//   'Vaughn' => 'Bean',
//   'Devyn' => 'Lynn',
//   'Kenyon' => 'Crane',
//   'Clay' => 'Farley',
//   'Dario' => 'Cisneros',
//   'Ishaan' => 'Benton',
//   'Jair' => 'Ashley',
//   'Kael' => 'Mckay',
//   'Adonis' => 'Finley',
//   'Jovanny' => 'Best',
//   'Clinton' => 'Blevins',
//   'Rey' => 'Friedman',
//   'Chaim' => 'Moses',
//   'German' => 'Sosa',
//   'Harper' => 'Blanchard',
//   'Nathen' => 'Huber',
//   'Rigoberto' => 'Frye',
//   'Sonny' => 'Krueger',
//   'Glenn' => 'Bernard',
//   'Octavio' => 'Rosario',
//   'Blaze' => 'Rubio',
//   'Keshawn' => 'Mullen',
//   'Ralph' => 'Benjamin',
//   'Ean' => 'Haley',
//   'Nikhil' => 'Chung',
//   'Rayan' => 'Moyer',
//   'Sterling' => 'Choi',
//   'Branson' => 'Horne',
//   'Jadiel' => 'Yu',
//   'Dillan' => 'Woodward',
//   'Jeramiah' => 'Ali',
//   'Koen' => 'Nixon',
//   'Konnor' => 'Hayden',
//   'Antwan' => 'Rivers',
//   'Houston' => 'Estes',
//   'Tyrese' => 'Mccarty',
//   'Dereon' => 'Richmond',
//   'Leonidas' => 'Stuart',
//   'Zack' => 'Maynard',
//   'Fisher' => 'Brandt',
//   'Jaydan' => 'Oconnell',
//   'Quinten' => 'Hanna',
//   'Nick' => 'Sanford',
//   'Urijah' => 'Sheppard',
//   'Darion' => 'Church',
//   'Jovan' => 'Burch',
//   'Salvatore' => 'Levy',
//   'Beckham' => 'Rasmussen',
//   'Jarrett' => 'Coffey',
//   'Antony' => 'Ponce',
//   'Eden' => 'Faulkner',
//   'Makai' => 'Donaldson',
//   'Zaiden' => 'Schmitt',
//   'Broderick' => 'Novak',
//   'Camryn' => 'Costa',
//   'Malaki' => 'Montes',
//   'Nikolai' => 'Booker',
//   'Howard' => 'Cordova',
//   'Immanuel' => 'Waller',
//   'Demarion' => 'Arellano',
//   'Valentino' => 'Maddox',
//   'Jovanni' => 'Mata',
//   'Ayaan' => 'Bonilla',
//   'Ethen' => 'Stanton',
//   'Leandro' => 'Compton',
//   'Royce' => 'Kaufman',
//   'Yael' => 'Dudley',
//   'Yosef' => 'Mcpherson',
//   'Jean' => 'Beltran',
//   'Marquise' => 'Dickson',
//   'Alden' => 'Mccann',
//   'Leroy' => 'Villegas',
//   'Gaven' => 'Proctor',
//   'Jovany' => 'Hester',
//   'Tyshawn' => 'Cantrell',
//   'Aarav' => 'Daugherty',
//   'Kadyn' => 'Cherry',
//   'Milton' => 'Bray',
//   'Zaid' => 'Davila',
//   'Kelton' => 'Rowland',
//   'Tripp' => 'Levine',
//   'Kamren' => 'Madden',
//   'Slade' => 'Spence',
//   'Hezekiah' => 'Good',
//   'Jakobe' => 'Irwin',
//   'Nathanial' => 'Werner',
//   'Rishi' => 'Krause',
//   'Shamar' => 'Petty',
//   'Geovanni' => 'Whitney',
//   'Pranav' => 'Baird',
//   'Roderick' => 'Hooper',
//   'Bentley' => 'Pollard',
//   'Clarence' => 'Zavala',
//   'Lyric' => 'Jarvis',
//   'Bernard' => 'Holden',
//   'Carmelo' => 'Haas',
//   'Denzel' => 'Hendrix',
//   'Maximillian' => 'Mcgrath',
//   'Reynaldo' => 'Bird',
//   'Cassius' => 'Lucero',
//   'Gordon' => 'Terrell',
//   'Reuben' => 'Riggs',
//   'Samson' => 'Joyce',
//   'Yadiel' => 'Mercer',
//   'Jayvon' => 'Rollins',
//   'Reilly' => 'Galloway',
//   'Sheldon' => 'Duke',
//   'Abdullah' => 'Odom',
//   'Jagger' => 'Andersen',
//   'Thaddeus' => 'Downs',
//   'Case' => 'Hatfield',
//   'Kyson' => 'Benitez',
//   'Lamont' => 'Archer',
//   'Chaz' => 'Huerta',
//   'Makhi' => 'Travis',
//   'Jan' => 'Mcneil',
//   'Marques' => 'Hinton',
//   'Oswaldo' => 'Zhang',
//   'Donavan' => 'Hays',
//   'Keyon' => 'Mayo',
//   'Kyan' => 'Fritz',
//   'Simeon' => 'Branch',
//   'Trystan' => 'Mooney',
//   'Andreas' => 'Ewing',
//   'Dangelo' => 'Ritter',
//   'Landin' => 'Esparza',
//   'Reagan' => 'Frey',
//   'Turner' => 'Braun',
//   'Arnav' => 'Gay',
//   'Brenton' => 'Riddle',
//   'Callum' => 'Haney',
//   'Jayvion' => 'Kaiser',
//   'Bridger' => 'Holder',
//   'Sammy' => 'Chaney',
//   'Deegan' => 'Mcknight',
//   'Jaylan' => 'Gamble',
//   'Lennon' => 'Vang',
//   'Odin' => 'Cooley',
//   'Abdiel' => 'Carney',
//   'Jerimiah' => 'Cowan',
//   'Eliezer' => 'Forbes',
//   'Bronson' => 'Ferrell',
//   'Cornelius' => 'Davies',
//   'Pierre' => 'Barajas',
//   'Cortez' => 'Shea',
//   'Baron' => 'Osborn',
//   'Carlo' => 'Bright',
//   'Carsen' => 'Cuevas',
//   'Fletcher' => 'Bolton',
//   'Izayah' => 'Murillo',
//   'Kolten' => 'Lutz',
//   'Damari' => 'Duarte',
//   'Hugh' => 'Kidd',
//   'Jensen' => 'Key',
//   'Yurem' => 'Cooke',
];

// foreach ($seed_user as $first_name => $last_name) {
//     $AuthService->signup("$first_name $last_name", "$first_name.$last_name@mail.com", "testtest");
// }

// for ($i=0; $i < 10000; $i++) { 
//     $id = random_int(1, 1002);
//     $MessageService->create_message($id, 'Lorem Ipsum');
// }

echo 'success';
